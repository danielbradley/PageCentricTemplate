
function Submit( event )
{
	var form       = event.target;
	var apihost    = Resolve_API_Server();
	var parameters = GetFormValues( form );
	
	switch ( form.action.value )
	{
	case "preregistrations_replace":
		Call( apihost + "/api/preregistrations/replace/", parameters, PregistrationsHandler );
		break;

	case "accounts_create":
		Call( apihost + "/api/users/create_and_login/", parameters, AccountCreateHandler );
		break;

	case "users_sessions_replace":
		Call( apihost + "/api/users/sessions/replace/", parameters, LoginHandler );
		break;
		
	case "payments_credit_cards_replace":
		PaymentsCreditCardsReplace( form );
		break;

	default:
		alert( "No action specified" );
	}
	return false;
}

function PregistrationsHandler( responseText )
{
	alert( responseText );
	
	var form = document.getElementById( "form-preregister" );
		form.name.value      = "";
		form.email.value     = "";
		form.submit.value    = "You are registered";
		form.submit.disabled = true;
	
	//location.reload();
}

function AccountCreateHandler( responseText )
{
	var obj = JSON.parse( responseText );
	
	if ( ("OK" == obj.status) && (0 < obj.results.length) )
	{
		var tuple = obj.results[0];
		
		switch ( tuple.status )
		{
		case "OK":
			if ( tuple.USER )
			{
				Redirect( tuple.idtype );
			}
			break;

		default:
			switch ( tuple.message )
			{
			case "USER_EXISTS":
				alert( "That email address is already in use... Try resetting your password." );
				break;
			}
		}
	}
	
	console.log( responseText );
}

function LoginHandler( responseText )
{
	var obj = JSON.parse( responseText );
	
	if ( ("OK" == obj.status) && (0 < obj.results.length) )
	{
		var tuple = obj.results[0];
		
		switch ( tuple.status )
		{
		case "OK":
			if ( tuple.idtype )
			{
				Redirect( tuple.idtype );
			}
			break;

		default:
			alert( tuple.message );
		}
	}
	
	console.log( responseText );
}

function CreateCustomer()
{
	Call( Resolve_API_Server() + "/api/payments/customers/replace/", tuple, CustomerHandler );
}

function CustomerHandler( responseText )
{
//	var obj = JSON.parse( responseText );
//	
//	if ( "OK" != obj.status )
//	{
//		alert( "Could not create customer account." );
//	}
//	else
//	{
//	}
}

function PaymentsCreditCardsReplace( form )
{
	form.submit.disabled = true;
	form.submit.value = "Saving...";

	var parameters = { USER: Session.USER };

	Call( Resolve_API_Server() + "/api/payments/customers/by_user/", parameters, PaymentsCreditCardsReplace.Handler );
}

PaymentsCreditCardsReplace.Handler
=
function( responseText )
{
	var obj = JSON.parse( responseText );
	
	if ( ("OK" == obj.status) && (1 == obj.results.length ) )
	{
		var clientToken     = obj.results[0].clientToken;
		var number          = document.getElementById( "number"          ).value;
		var expiration_date = document.getElementById( "expiration_date" ).value;
		var cvv             = document.getElementById( "cvv"             ).value;
		var bits            = expiration_date.split( "/" );
		var final_four      = number.substring( number.length - 4 );
		
		if ( 2 == bits.length )
		{
			var month = bits[0];
			var year  = bits[1];

			var card
			=
			{
				number: number,
				expiration_date: expiration_date,
				cvv: cvv
			};

			try
			{
				var client = new braintree.api.Client( {clientToken: clientToken } );
					client.tokenizeCard( card,
						function( error, nonce )
						{
							if ( ! error )
							{
								var parameters
								=
								{
									USER: Session.USER,
									final_four: final_four,
									month: month,
									year:  year,
									nonce: nonce
								};

								Call( Resolve_API_Server() + "/api/payments/credit_cards/replace/", parameters, PaymentsCreditCardReplaceHandler );
							}
						} );
			}
			catch ( ex )
			{
				console.log( ex );
			}
		}
	}
}

function PaymentsCreditCardReplaceHandler( responseText )
{
	var form = document.getElementById( "form-credit-card" );
		form.submit.disabled = true;
		form.submit.value = "Saved";

	console.log( responseText );
}

function StatusHandler( responseText )
{
	alert( responseText );
}

function Resolve_API_Server()
{
	var api_server = "";

	switch ( location.protocol + "//" + location.hostname )
	{
	case "http://www.pagecentric.local":
		api_server = "http://api.pagecentric.local";
		break;

	default:
		api_server = "http://api.pagecentric.local";
	}
	
	return api_server;
}
