
function Logout()
{
	var parameters = {};

	Call( Resolve_API_Server() + "/api/users/sessions/terminate/", parameters, Logout.Handler );
}

Logout.Handler
=
function( responseText )
{
	Redirect( "" );
}
