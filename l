^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  1) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  2) # Example Environment Configuration file
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  3) #
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  4) # This file can be used as a starting point for your own
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  5) # custom .env files, and contains most of the possible settings
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  6) # available in a default install.
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  7) #
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  8) # By default, all of the settings are commented out. If you want
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200  9) # to override the setting, you must un-comment it by removing the '#'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 10) # at the beginning of the line.
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 11) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 12) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 13) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 14) # ENVIRONMENT
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 15) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 16) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 17) CI_ENVIRONMENT = development
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 18) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 19) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 20) # APP
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 21) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 22) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 23) app.baseURL = 'http://localhost:8080/'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 24) # app.forceGlobalSecureRequests = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 25) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 26) # app.sessionDriver = 'CodeIgniter\Session\Handlers\FileHandler'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 27) # app.sessionCookieName = 'ci_session'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 28) # app.sessionSavePath = NULL
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 29) # app.sessionMatchIP = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 30) # app.sessionTimeToUpdate = 300
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 31) # app.sessionRegenerateDestroy = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 32) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 33) # app.cookiePrefix = ''
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 34) # app.cookieDomain = ''
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 35) # app.cookiePath = '/'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 36) # app.cookieSecure = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 37) # app.cookieHTTPOnly = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 38) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 39) # app.CSRFProtection  = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 40) # app.CSRFTokenName   = 'csrf_test_name'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 41) # app.CSRFCookieName  = 'csrf_cookie_name'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 42) # app.CSRFExpire      = 7200
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 43) # app.CSRFRegenerate  = true
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 44) # app.CSRFExcludeURIs = []
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 45) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 46) # app.CSPEnabled = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 47) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 48) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 49) # DATABASE
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 50) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 51) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 52) database.default.hostname = localhost
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 53) database.default.database = pocdb
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 54) database.default.username = root
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 55) database.default.password =
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 56) database.default.DBDriver = MySQLi
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 57) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 58) # database.tests.hostname = localhost
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 59) # database.tests.database = ci4
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 60) # database.tests.username = root
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 61) # database.tests.password = root
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 62) # database.tests.DBDriver = MySQLi
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 63) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 64) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 65) # CONTENT SECURITY POLICY
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 66) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 67) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 68) # contentsecuritypolicy.reportOnly = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 69) # contentsecuritypolicy.defaultSrc = 'none'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 70) # contentsecuritypolicy.scriptSrc = 'self'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 71) # contentsecuritypolicy.styleSrc = 'self'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 72) # contentsecuritypolicy.imageSrc = 'self'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 73) # contentsecuritypolicy.base_uri = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 74) # contentsecuritypolicy.childSrc = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 75) # contentsecuritypolicy.connectSrc = 'self'
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 76) # contentsecuritypolicy.fontSrc = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 77) # contentsecuritypolicy.formAction = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 78) # contentsecuritypolicy.frameAncestors = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 79) # contentsecuritypolicy.mediaSrc = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 80) # contentsecuritypolicy.objectSrc = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 81) # contentsecuritypolicy.pluginTypes = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 82) # contentsecuritypolicy.reportURI = null
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 83) # contentsecuritypolicy.sandbox = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 84) # contentsecuritypolicy.upgradeInsecureRequests = false
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 85) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 86) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 87) # HONEYPOT
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 88) #--------------------------------------------------------------------
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 89) 
^1dc3148 (LamineMediath321 2022-04-07 19:40:54 +0200 90) #  honeypot.hid