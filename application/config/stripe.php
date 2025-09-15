<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Stripe API Configuration
| -------------------------------------------------------------------
|
| You will get the API keys from Developers panel of the Stripe account
| Login to Stripe account (https://dashboard.stripe.com/)
| and navigate to the Developers » API keys page
|
|  stripe_api_key        	string   Your Stripe API Secret key.
|  stripe_publishable_key	string   Your Stripe API Publishable key.
|  stripe_currency   		string   Currency code.
*/

//Test
// $config['stripe_api_key']         = 'sk_test_51KoXIDDRDOuiR2HYhMgHqMpfjKG0oSLnkHgLvAFYZwAFf2ilsYWFlle1p31nxvUOxXqCWRhlosP2AI47rtAxnXcM00u3pFGXY9'; 
// $config['stripe_publishable_key'] = 'pk_test_51KoXIDDRDOuiR2HYO5qGwN56tzjOk6ShkACryUaxB5VYUcMuK0Yn3ZsDki6IwKzc5gRZD5HtRIeWykaNXCA97LKF00uGXvY5u6'; 

//Live

$config['stripe_api_key']         = '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'; 
$config['stripe_publishable_key'] = 'pk_live_51KoXIDDRDOuiR2HY1DCVkQMeCxDNJ8kW1laHbV08jMlvzRiuBdQJZL1qZgQL68jBLeMZC7H4RH6viaPE22UsBW9C00nVv0pZrf';


$config['stripe_currency']        = 'USD';