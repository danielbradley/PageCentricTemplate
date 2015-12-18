<?php

function main()
{
	switch ( REDIRECT_URL )
	{
	case "/initialise/":
		$page = new InitialisationPage();
		break;

	default:
		if ( string_startsWith( REDIRECT_URL, "/api/" ) )
		{
			$page = new APIPage();
		}
		else
		{
			$page = new SitePage();
		}
	}
	if ( isset( $page ) ) $page->render();

	return 0;
}

main();
