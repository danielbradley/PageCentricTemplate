<?php

spl_autoload_register( function ( $classname )
{
	$classname = str_replace( "\\", ".", $classname );

	switch ( $classname )
	{
	case 'HomePage':
		include( "home.page/HomePage.php" );
		break;

	case 'CategoriesPage':
		include( "home.page/CategoriesPage.php" );
		break;

	case 'ArticlesPage':
		include( "home.page/ArticlesPage.php" );
		break;

	case 'ArticlePage':
		include( "home.page/ArticlePage.php" );
		break;

	case 'ContentPage':
		include( "home.page/ContentPage.php" );
		break;

	case 'SitePage':
		include( "base.page/SitePage.php" );
		break;

	}
});
