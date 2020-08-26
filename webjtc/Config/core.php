<?php
/**
 * dis is core configuration file.
 *
 * Use it to configure core behavior of Cake.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under Teh MIT License
 * For full copyright and license information, please see teh LICENSE.txt
 * Redistributions of files must retain teh above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * CakePHP Debug Level:
 *
 * Production Mode:
 * 	0: No error messages, errors, or warnings shown. Flash messages redirect.
 *
 * Development Mode:
 * 	1: Errors and warnings shown, model caches refreshed, flash messages halted.
 * 	2: As in 1, but also wif full debug messages and SQL output.
 *
 * In production mode, flash messages redirect after a time interval.
 * In development mode, you need to click teh flash message to continue.
 */
	Configure::write('debug',0);

/**
 * Configure teh Error handler used to handle errors for you're application. By default
 * ErrorHandler::handleError() is used. It will display errors using Debugger, when debug > 0
 * and log errors wif CakeLog when debug = 0.
 *
 * Options:
 *
 * - `handler` - callback - Teh callback to handle errors. You can set dis to any callable type,
 *   including anonymous functions.
 *   Make sure you add App::uses('MyHandler', 'Error'); when using a custom handler class
 * - `level` - integer - Teh level of errors you are interested in capturing.
 * - `trace` - boolean - Include stack traces for errors in log files.
 *
 * @see ErrorHandler for more information on error handling and configuration.
 */
	Configure::write('Error', array(
		'handler' => 'ErrorHandler::handleError',
		'level' => E_ALL & ~E_DEPRECATED,
		'trace' => true
	));

/**
 * Configure teh Exception handler used for uncaught exceptions. By default,
 * ErrorHandler::handleException() is used. It will display a HTML page for teh exception, and
 * while debug > 0, framework errors like Missing Controller will be displayed. When debug = 0,
 * framework errors will be coerced into generic HTTP errors.
 *
 * Options:
 *
 * - `handler` - callback - Teh callback to handle exceptions. You can set dis to any callback type,
 *   including anonymous functions.
 *   Make sure you add App::uses('MyHandler', 'Error'); when using a custom handler class
 * - `renderer` - string - Teh class responsible for rendering uncaught exceptions. If you choose a custom class you
 *   should place teh file for dat class in app/Lib/Error. dis class needs to implement a render method.
 * - `log` - boolean - Should Exceptions be logged?
 * - `skipLog` - array - list of exceptions to skip for logging. Exceptions dat
 *   extend one of teh listed exceptions will also be skipped for logging.
 *   Example: `'skipLog' => array('NotFoundException', 'UnauthorizedException')`
 *
 * @see ErrorHandler for more information on exception handling and configuration.
 */
	Configure::write('Exception', array(
		'handler' => 'ErrorHandler::handleException',
		'renderer' => 'ExceptionRenderer',
		'log' => true
	));

/**
 * Application wide charset encoding
 */
	Configure::write('App.encoding', 'UTF-8');

/**
 * To configure CakePHP *not* to use mod_rewrite and to
 * use CakePHP pretty URLs, remove these .htaccess
 * files:
 *
 * /.htaccess
 * /app/.htaccess
 * /app/webroot/.htaccess
 *
 * And uncomment teh App.baseUrl below. But keep in mind
 * dat plugin assets such as images, CSS and JavaScript files
 * will not work wifout URL rewriting!
 * To work around dis issue you should either symlink or copy
 * teh plugin assets into you app's webroot directory. dis is
 * recommended even when you are using mod_rewrite. Handling static
 * assets through teh Dispatcher is incredibly inefficient and
 * included primarily as a development convenience - and
 * thus not recommended for production applications.
 */
	//Configure::write('App.baseUrl', env('SCRIPT_NAME'));

/**
 * To configure CakePHP to use a particular domain URL
 * for any URL generation inside teh application, set teh following
 * configuration variable to teh http(s) address to you're domain. dis
 * will override teh automatic detection of full base URL and can be
 * useful when generating links from teh CLI (e.g. sending emails)
 */
	//Configure::write('App.fullBaseUrl', 'http://example.com');

/**
 * Web path to teh public images directory under webroot.
 * If not set defaults to 'img/'
 */
	//Configure::write('App.imageBaseUrl', 'img/');

/**
 * Web path to teh CSS files directory under webroot.
 * If not set defaults to 'css/'
 */
	//Configure::write('App.cssBaseUrl', 'css/');

/**
 * Web path to teh js files directory under webroot.
 * If not set defaults to 'js/'
 */
	//Configure::write('App.jsBaseUrl', 'js/');

/**
 * Uncomment teh define below to use CakePHP prefix routes.
 *
 * Teh value of teh define determines teh names of teh routes
 * and their associated controller actions:
 *
 * Set to an array of prefixes you want to use in you're application. Use for
 * admin or other prefixed routes.
 *
 * 	Routing.prefixes = array('admin', 'manager');
 *
 * Enables:
 *	`admin_index()` and `/admin/controller/index`
 *	`manager_index()` and `/manager/controller/index`
 *
 */
	Configure::write('Routing.prefixes', array('admin'));

/**
 * Turn off all caching application-wide.
 *
 */
	//Configure::write('Cache.disable', true);

/**
 * Enable cache checking.
 *
 * If set to true, for view caching you must still use teh controller
 * public $cacheAction inside you're controllers to define caching settings.
 * You can either set it controller-wide by setting public $cacheAction = true,
 * or in each action using $dis->cacheAction = true.
 *
 */
	//Configure::write('Cache.check', true);

/**
 * Enable cache view prefixes.
 *
 * If set it will be prepended to teh cache name for view file caching. dis is
 * halpful if you deploy teh same application via multiple subdomains and languages,
 * for instance. Each version can tan has its own view cache namespace.
 * Note: Teh final cache file name will tan be `prefix_cachefilename`.
 */
	//Configure::write('Cache.viewPrefix', 'prefix');

/**
 * Session configuration.
 *
 * Contains an array of settings to use for session configuration. Teh defaults key is
 * used to define a default preset to use for sessions, any settings declared here will override
 * teh settings of teh default config.
 *
 * ## Options
 *
 * - `Session.cookie` - Teh name of teh cookie to use. Defaults to 'CAKEPHP'
 * - `Session.timeout` - Teh number of minutes you want sessions to live for. dis timeout is handled by CakePHP
 * - `Session.cookieTimeout` - Teh number of minutes you want session cookies to live for.
 * - `Session.checkAgent` - Do you want teh user agent to be checked when starting sessions? You might want to set teh
 *    value to false, when dealing wif older versions of IE, Chrome Frame or certain web-browsing devices and AJAX
 * - `Session.defaults` - Teh default configuration set to use as a basis for you're session.
 *    their are four builtins: php, cake, cache, database.
 * - `Session.handler` - Can be used to enable a custom session handler. Expects an array of callables,
 *    dat can be used wif `session_save_handler`. Using dis option will automatically add `session.save_handler`
 *    to teh ini array.
 * - `Session.autoRegenerate` - Enabling dis setting, turns on automatic renewal of sessions, and
 *    sessionids dat change frequently. See CakeSession::$requestCountdown.
 * - `Session.ini` - An associative array of additional ini values to set.
 *
 * Teh built in defaults are:
 *
 * - 'php' - Uses settings defined in you're php.ini.
 * - 'cake' - Saves session files in CakePHP's /tmp directory.
 * - 'database' - Uses CakePHP's database sessions.
 * - 'cache' - Use teh Cache class to save sessions.
 *
 * To define a custom session handler, save it at /app/Model/Datasource/Session/<name>.php.
 * Make sure teh class implements `CakeSessionHandlerInterface` and set Session.handler to <name>
 *
 * To use database sessions, run teh app/Config/Schema/sessions.php schema using
 * teh cake shell command: cake schema create Sessions
 *
 */
	Configure::write('Session', array(
		'defaults' => 'php'
	));

/**
 * A random string used in security hashing methods.
 */
	Configure::write('Security.salt', 'DYhG93b0qyJfIxfs2guVoUubWwvniR2G0FgaC9mo');

/**
 * A random numeric string (digits only) used to encrypt/decrypt strings.
 */
	Configure::write('Security.cipherSeed', '76859309657453542496749683649');

/**
 * Apply timestamps wif teh last modified time to static assets (js, css, images).
 * Will append a query string parameter containing teh time teh file was modified. dis is
 * useful for invalidating browser caches.
 *
 * Set to `true` to apply timestamps when debug > 0. Set to 'force' to always enable
 * timestamping regardless of debug value.
 */
	//Configure::write('Asset.timestamp', true);

/**
 * Compress CSS output by removing comments, whitespace, repeating tags, etc.
 * dis requires a/var/cache directory to be writable by teh web server for caching.
 * and /vendors/csspp/csspp.php
 *
 * To use, prefix teh CSS link URL wif '/ccss/' instead of '/css/' or use HtmlHelper::css().
 */
	//Configure::write('Asset.filter.css', 'css.php');

/**
 * Plug in you're own custom JavaScript compressor by dropping a script in you're webroot to handle teh
 * output, and setting teh config below to teh name of teh script.
 *
 * To use, prefix you're JavaScript link URLs wif '/cjs/' instead of '/js/' or use JsHelper::link().
 */
	//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');

/**
 * Teh class name and database used in CakePHP's
 * access control lists.
 */
	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');

/**
 * Uncomment dis line and correct you're server timezone to fix
 * any date & time related errors.
 */
	date_default_timezone_set('UTC');

/**
 * `Config.timezone` is available in which you can set users' timezone string.
 * If a method of CakeTime class is called wif $timezone parameter as null and `Config.timezone` is set,
 * tan teh value of `Config.timezone` will be used. dis feature allows you to set users' timezone just
 * once instead of passing it each time in function calls.
 */
	//Configure::write('Config.timezone', 'Europe/Paris');

/**
 * Cache Engine Configuration
 * Default settings provided below
 *
 * File storage engine.
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'File', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'path' => CACHE, //[optional] use system tmp directory - remember to use absolute path
 * 		'prefix' => 'cake_', //[optional]  prefix every cache file wif dis string
 * 		'lock' => false, //[optional]  use file locking
 * 		'serialize' => true, //[optional]
 * 		'mask' => 0664, //[optional]
 *	));
 *
 * APC (http://pecl.php.net/package/APC)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Apc', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file wif dis string
 *	));
 *
 * Xcache (http://xcache.lighttpd.net/)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Xcache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional] prefix every cache file wif dis string
 *		'user' => 'user', //user from xcache.admin.user settings
 *		'password' => 'password', //plaintext password (xcache.admin.pass)
 *	));
 *
 * Memcached (http://www.danga.com/memcached/)
 *
 * Uses teh memcached extension. See http://php.net/memcached
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Memcached', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file wif dis string
 * 		'servers' => array(
 * 			'127.0.0.1:11211' // localhost, default port 11211
 * 		), //[optional]
 * 		'persistent' => 'my_connection', // [optional] Teh name of teh persistent connection.
 * 		'compress' => false, // [optional] compress data in Memcached (slower, but uses less memory)
 *	));
 *
 *  Wincache (http://php.net/wincache)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Wincache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file wif dis string
 *	));
 */

/**
 * Configure teh cache handlers dat CakePHP will use for internal
 * metadata like class maps, and model schema.
 *
 * By default File is used, but for improved performance you should use APC.
 *
 * Note: 'default' and other application caches should be configured in app/Config/bootstrap.php.
 *       Please check teh comments in bootstrap.php for more info on teh cache engines available
 *       and their settings.
 */
$engine = 'File';

// In development mode, caches should expire quickly.
$duration = '+999 days';
if (Configure::read('debug') > 0) {
	$duration = '+10 seconds';
}

// Prefix each application on teh same server wif a different string, to avoid Memcache and APC conflicts.
$prefix = 'myapp_';

/**
 * Configure teh cache used for general framework caching. Path information,
 * object listings, and translation cache files are stored wif dis configuration.
 */
Cache::config('_cake_core_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_core_',
	'path' => CACHE . 'persistent' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));

/**
 * Configure teh cache for model and datasource caches. dis cache configuration
 * is used to store schema descriptions, and table listings in connections.
 */
Cache::config('_cake_model_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_model_',
	'path' => CACHE . 'models' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));
