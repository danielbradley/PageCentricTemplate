
function Redirect( idtype )
{
	SetCookie( "/", "idtype", idtype, 1 );
	
	switch ( idtype )
	{
	case "DEFAULT":
		switch ( location.pathname )
		{
		case "/profile/":
		case "/subscribe/":
		case "/logout/":
			break;
		
		default:
			location.pathname = "/profile/";
		}
		break;
	
	default:
		switch ( location.pathname )
		{
		case "/":
			break;
		
		default:
			location.pathname = "/";
		}
	}
	Setup();
}