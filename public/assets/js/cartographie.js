 /** Chart map code
  * Recuperation et affichage des formations et entreprises par ville 
  * en utilisant la carte du senegal
  */
 $(document).ready(function() {
     Highcharts.seriesType('mappie', 'pie', {
         center: null, // Can't be array by default anymore
         clip: true, // For map navigation
         states: {
             hover: {
                 halo: {
                     size: 5
                 }
             },
             click: {
                 color: '#b25f35'
             }
         },
         dataLabels: {
             enabled: false
         }
     }, {
         getCenter: function() {
             var options = this.options,
                 chart = this.chart,
                 slicingRoom = 2 * (options.slicedOffset || 0);
             if (!options.center) {
                 options.center = [null, null]; // Do the default here instead
             }
             // Handle lat/lon support
             if (options.center.lat !== undefined) {
                 var point = chart.fromLatLonToPoint(options.center);
                 options.center = [
                     chart.xAxis[0].toPixels(point.x, true),
                     chart.yAxis[0].toPixels(point.y, true)
                 ];
             }
             // Handle dynamic size
             if (options.sizeFormatter) {
                 options.size = options.sizeFormatter.call(this);
             }
             // Call parent function
             var result = Highcharts.seriesTypes.pie.prototype.getCenter.call(this);
             // Must correct for slicing room to get exact pixel pos
             result[0] -= slicingRoom;
             result[1] -= slicingRoom;
             return result;
         },
         translate: function(p) {
             this.options.center = this.userOptions.center;
             this.center = this.getCenter();
             return Highcharts.seriesTypes.pie.prototype.translate.call(this, p);
         }
     });


     var citiesData = $("#container").data("content");
     var data = [];
     // console.log(citiesData);
     citiesData.forEach(function(cityForm) {
         data.push([cityForm.ville, parseFloat(cityForm.entrepriseCount), parseFloat(cityForm.formationCount)]);
     })

     maxVotes = 0,
         repColor = '#b25f35',
         demColor = '#3588b2';


     // Compute max votes to find relative sizes of bubbles
     Highcharts.each(data, function(row) {
         maxVotes = Math.max(maxVotes, row[3]);
     });

     Highcharts.setOptions({
         lang: {
             viewFullscreen: "Plein écran",
             downloadJPEG: "Télécharger en format JPEG",
             downloadPDF: "Télécharger en format PDF",
             downloadPNG: "Télécharger en format PNG",
             downloadSVG: "Télécharger en format SVF",
             printChart: "Imprimer"
         }
     });

     // Build the chart
     var chart = Highcharts.mapChart('container', {
         title: {
             text: 'Cartographie des entreprises et formations'
         },

         labels: {
             useHTML: Highcharts.hasBidiBug
         },
         chart: {
             animation: false // Disable animation, especially for zooming
         },

         colorAxis: {
             dataClasses: [{
                 from: -1,
                 to: 0,
                 color: '#3588b2',
                 name: 'Entreprise'
             }, {
                 from: 0,
                 to: 1,
                 color: '#b25f35',
                 name: 'Formations'
             }]
         },

         mapNavigation: {
             enabled: true
         },
         // Limit zoom range
         yAxis: {
             minRange: 1000
         },

         tooltip: {
             useHTML: true
         },

         // Default options for the pies
         plotOptions: {
             mappie: {
                 borderColor: 'rgba(255,255,255,0.4)',
                 borderWidth: 1,
                 tooltip: {
                     headerFormat: ''
                 }
             }
         },

         series: [{
             mapData: Highcharts.maps['countries/sn/sn-all'],
             data: data,
             name: 'States',
             borderColor: '#FFF',
             showInLegend: false,
             joinBy: ['name', 'id'],
             keys: ['id', 'demVotes', 'repVotes'],
             point: {
                 events: {
                     click: pointClick
                 }
             },
             tooltip: {
                 headerFormat: '',
                 pointFormatter: function() {
                     var hoverVotes = this.hoverVotes; // Used by pie only
                     return '<b>' + this.id + ' </b><br/>' +
                         Highcharts.map([
                             ['Entreprises', this.demVotes, demColor],
                             ['Formations', this.repVotes, repColor],
                         ].sort(function(a, b) {
                             return b[1] - a[1]; // Sort tooltip by most votes
                         }), function(line) {
                             return '<span style="color:' + line[2] +
                                 // Colorized bullet
                                 '">\u25CF</span> ' +
                                 // Party and votes
                                 (line[0] === hoverVotes ? '<b>' : '') +
                                 line[0] + ': ' +
                                 Highcharts.numberFormat(line[1], 0) +
                                 (line[0] === hoverVotes ? '</b>' : '') +
                                 '<br/>';
                         }).join('');
                 }
             }
         }, {
             name: 'Separators',
             type: 'mapline',
             data: Highcharts.geojson(Highcharts.maps['countries/sn/sn-all'], 'mapline'),
             color: '#707070',
             showInLegend: false,
             enableMouseTracking: false
         }, {
             name: 'Connectors',
             type: 'mapline',
             color: 'rgba(130, 130, 130, 0.5)',
             zIndex: 5,
             showInLegend: false,
             enableMouseTracking: false
         }]
     });

     // Add the pies after chart load, optionally with offset and connectors
     Highcharts.each(chart.series[0].points, function(state) {
         if (!state.id) {
             return; // Skip points with no data, if any
         }

         var pieOffset = state.pieOffset || {},
             centerLat = parseFloat(state.properties.latitude),
             centerLon = parseFloat(state.properties.longitude);

         // Add the pie for this state
         chart.addSeries({
             type: 'mappie',
             name: state.id,
             zIndex: 6, // Keep pies above connector lines
             sizeFormatter: function() {
                 var yAxis = this.chart.yAxis[0],
                     zoomFactor = (yAxis.dataMax - yAxis.dataMin) /
                     (yAxis.max - yAxis.min);
                 return Math.max(
                     this.chart.chartWidth / 45 * zoomFactor, // Min size
                     this.chart.chartWidth / 11 * zoomFactor * state.sumVotes / maxVotes
                 );
             },
             tooltip: {
                 // Use the state tooltip for the pies as well
                 pointFormatter: function() {
                     return state.series.tooltipOptions.pointFormatter.call({
                         id: state.id,
                         hoverVotes: this.name,
                         demVotes: state.demVotes,
                         repVotes: state.repVotes,
                         libVotes: state.libVotes,
                         grnVotes: state.grnVotes,
                         sumVotes: state.sumVotes
                     });
                 }
             },
             data: [{
                 name: 'Democrats',
                 y: state.demVotes,
                 color: demColor
             }, {
                 name: 'Republicans',
                 y: state.repVotes,
                 color: repColor
             }],
             center: {
                 lat: centerLat + (pieOffset.lat || 0),
                 lon: centerLon + (pieOffset.lon || 0)
             }
         }, false);

         // Draw connector to state center if the pie has been offset
         if (pieOffset.drawConnector !== false) {
             var centerPoint = chart.fromLatLonToPoint({
                     lat: centerLat,
                     lon: centerLon
                 }),
                 offsetPoint = chart.fromLatLonToPoint({
                     lat: centerLat + (pieOffset.lat || 0),
                     lon: centerLon + (pieOffset.lon || 0)
                 });
             chart.series[2].addPoint({
                 name: state.id,
                 path: 'M' + offsetPoint.x + ' ' + offsetPoint.y +
                     'L' + centerPoint.x + ' ' + centerPoint.y
             }, false);
         }
     });
     // Only redraw once all pies and connectors have been added
     chart.redraw();
     // Fin du code de la cartographie
 });