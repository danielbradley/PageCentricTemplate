<?php

define(          "APP_NAME", "PageCentric"     );
define(        "BRAND_NAME", "PageCentric"     );
define(       "DB_HOSTNAME", "localhost"       );
define(      "DB_HOSTNAME1", "localhost"       );
define(      "DB_HOSTNAME2", "localhost"       );
define(         "DB_PREFIX", ""                );
define(                "DB", "pc"              );
define(        "DB_VERSION", "00"              );
define(        "PC_VERSION", "0u"              );
define(       "DB_USERNAME", "public"          );
define(       "DB_PASSWORD", "public"          );

define(     "AUTH_REDIRECT", "/profile/"       );
define(         "USER_TYPE", "DEFAULT"         );

define(       "MAIL_DOMAIN", "pagecentric.org" );
define(      "USE_SENDGRID", "TRUE"            );
define( "USE_SENDGRID_USER", ""                );
define(   "USE_SENDGRID_PW", ""                );
define(      "SENDUSERMAIL", FALSE             );

define(         "HOST_NAME", gethostname()     );

if ( false !== strpos( __FILE__, "/local/served/development/PAGECENTRIC" ) )
{
	define( "DOCUMENT_ROOT", "/local/served/development/PAGECENTRIC"        );
	define(          "BASE", DOCUMENT_ROOT . "/Template/latest/template"    );
	define(  "CONTENT_PATH", BASE . "/share/content"                        );
	define(    "PAGES_PATH", BASE . "/share/pages"                          );

	if ( ! isset( $_SERVER ) || !array_key_exists( "SERVER_NAME", $_SERVER ) )
	{
		define( "SERVER_NAME", "pagecentric.org" );

		$_SERVER["SERVER_NAME"]     = SERVER_NAME;
		$_SERVER["DOCUMENT_ROOT"]   = DOCUMENT_ROOT;
		$_SERVER["REDIRECT_URL"]    = "";
		$_SERVER["REQUEST_URI"]     = "";
		$_SERVER["HTTP_USER_AGENT"] = "";
	}
}
else
{
	define( "DOCUMENT_ROOT", "/local/served/development/PAGECENTRIC"          );
	define(          "BASE", DOCUMENT_ROOT . "/Template/latest/template"    );
	define(  "CONTENT_PATH", BASE . "/share/content"                        );
	define(    "PAGES_PATH", BASE . "/share/pages"                          );

	if ( ! isset( $_SERVER ) || !array_key_exists( "SERVER_NAME", $_SERVER ) )
	{
		define( "SERVER_NAME", "pagecentric.org" );

		$_SERVER["SERVER_NAME"]     = SERVER_NAME;
		$_SERVER["DOCUMENT_ROOT"]   = DOCUMENT_ROOT;
		$_SERVER["REDIRECT_URL"]    = "";
		$_SERVER["REQUEST_URI"]     = "";
		$_SERVER["HTTP_USER_AGENT"] = "";
	}
}

if ( "www.pagecentric.local" == $_SERVER["SERVER_NAME"] )
{
	define( "DEBUG", true );
}

set_include_path( BASE . "/dep/libpagecentric/source/php:" . BASE . "/source/php" );

include_once( BASE . "/dep/libpagecentric/lib/autoload.php" );
include_once( BASE . "/lib/autoload.php" );

Page::initialise();

?>
