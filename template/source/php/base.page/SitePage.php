<?php

class SitePage extends \Page
{
	function __construct()
	{
		parent::__construct();

		$this->addClass( "gs1080" );

		$this->setPageTitle( "Home" );
	}

	function meta( $out )
	{
		header( "Content-Type: text/html; charset=UTF-8" );

		$out->println( "<meta charset='UTF-8'>" );
		$out->println( "<meta http-equiv='X-UA-Compatible' content='IE=edge'>" );
		$out->println( "<meta name='viewport' content='width=1080'>" );
	}

	function stylesheets( $out )
	{
		$out->println( "<link rel='stylesheet' type='text/css' href='/resources/fonts/OpenSans/font-opensans.css'>" );
		$out->println( "<link rel='stylesheet' type='text/css' href='/resources/styles/dygrid-1080.php3'>" );
		$out->println( "<link rel='stylesheet' type='text/css' href='/resources/styles/modular-css/most.css.php3'>" );

		$out->println( "<link rel='stylesheet' type='text/css' href='/resources/styles/template/page.css'>" );
		$out->println( "<link rel='stylesheet' type='text/css' href='/resources/styles/template/site.css'>" );
		$out->println( "<link rel='stylesheet' type='text/css' href='/resources/styles/template/form.css'>" );
		$out->println( "<link rel='stylesheet' type='text/css' href='/resources/styles/template/type.css'>" );
	}

	function javascript( $out )
	{
		$out->println( "<script type='text/javascript' src='/resources/javascript/purejavascript/Base.js'            ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/purejavascript/Call.js'            ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/purejavascript/GetFormValues.js'   ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/purejavascript/GetSearchValues.js' ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/purejavascript/SetCookie.js'       ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/purejavascript/Validate.js'        ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/Logout.js'                         ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/OnLoad.js'                         ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/Redirect.js'                       ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/Session.js'                        ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/Setup.js'                          ></script>" );
		$out->println( "<script type='text/javascript' src='/resources/javascript/Submit.js'                         ></script>" );
	}

	function bodyContent( $out )
	{
		$out->inprint( "<div id='body-content'>" );
		{
			$out->inprint( "<div id='page' class='center p_width'>" );
			{
				$out->inprint( "<div id='page-inner' class='center p_width'>" );
				{
//					$this->bodyNotifications( $out );
//					$this->bodyBackground( $out );
//					$this->bodyBreadcrumbs( $out );
//					$this->bodyHeader( $out );
					$this->bodyMiddle( $out );
					$this->bodyFooter( $out );
				}
				$out->outprint( "</div>" );
			}
			$out->outprint( "</div>" );

			$this->bodyNavigation( $out );
		}
		$out->outprint( "</div><!-- body-content -->" );
	}
	
	function bodyNavigation( $out )
	{
		switch ( array_get( $_COOKIE, "idtype" ) )
		{
		case "DEFAULT":
			$logo = Content::getHTMFor( "site", "logo-DEFAULT"       );
			$nav  = Content::getHTMFor( "site", "navigation-DEFAULT" );
			break;
			
		default:
			$logo = Content::getHTMFor( "site", "logo"       );
			$nav  = Content::getHTMFor( "site", "navigation" );
		}
		
		$out->inprint( "<div id='navigation'>" );
		{
//			$out->inprint( "<div class='valign-outer'>" );
//			{
//				$out->inprint( "<div class='valign-middle'>" );
//				{
					$out->inprint( "<div class='center c_width relative'>" );
					{
						$out->inprint( $logo );
						$out->inprint( $nav );
					}
					$out->outprint( "</div>" );
//				}
//				$out->outprint( "</div>" );
//			}
//			$out->outprint( "</div>" );
		}
		$out->outprint( "</div>" );
	}

	function bodyMiddle( $out )
	{
		$out->inprint( "<div id='middle'>" );
		{
			$out->inprint( "<div id='middle-inner'>" );
			{
				$this->middleContent( $out );
			}
			$out->outprint( "</div>" );
		}
		$out->outprint( "</div>" );
	}

	function middleContent( $out )
	{
		$htm = Content::getHTMFor( $this->getPageID(), "middle-content" );

		$out->inprint( "<div id='middle-content'>" );
		{
			$out->println( $htm );
		}
		$out->outprint( "</div>" );
	}

	function bodyFooter( $out )
	{
		$htm = Content::getHTMFor( "site", "footer" );

		$out->inprint( "<div id='footer'>" );
		{
			$out->println( $htm );
		}
		$out->outprint( "</div>" );
	}

	function setPageTitle( $title )
	{
		$this->setTitle( $title . " | " . APP_NAME );
	}
	
	function finalJavascript( $out )
	{
		parent::finalJavascript( $out );

		$out->inprint( "<div class='javascript_libraries'>" );
		{
		}
		$out->outprint( "</div>" );
	}
	
	function todo( $out )
	{}
}
