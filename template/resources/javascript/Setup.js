
function Setup()
{
	var divs = document.getElementsByTagName( "DIV" );
	var n    = divs.length;
	
	for ( var i=0; i < n; i++ )
	{
		var div = divs[i];
		
		if ( div.hasAttribute( "data-action" ) )
		{
			var action = div.getAttribute( "data-action" );
			
			switch ( action )
			{
			case "setup-update_billing":
				Setup.UpdateBilling();
				break;
			}
		}
	}
}

Setup.UpdateBilling
=
function()
{
}

Setup.UpdateBilling.Handler
=
function( responseText )
{
	var obj = JSON.parse( responseText );
	
	if ( ("OK" == obj.status) && (1 == obj.results.length ) )
	{
		var clientToken = obj.results[0].clientToken;
		var form        = document.getElementById( "form-credit-card" );
			form.clientToken.value = clientToken;
			form.submit.disabled = false;
			form.submit.value    = "Save Details";
	}
}
