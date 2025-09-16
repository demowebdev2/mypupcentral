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
$config['stripe_api_key']         = 'sk_test_51PY3AGD9uHoqx8pMRDjyQTUo2SU9RnTH8Wpsx8BTxIftT6XWj7H39MmN8wmNN36Qn9vwB0zfQWeOBCqcTzuIss7R00yOjrIW3r'; 
$config['stripe_publishable_key'] = 'pk_test_51PY3AGD9uHoqx8pMBIqMKjHA9tCdSr7UGUnNPYiZa3QyZsdeYGs5Gn6vYX9gmGutfdBG0bWgIqHI0lUS4DMkdeQK00kd3k112J'; 

//Live

// $config['stripe_api_key']         = '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'; 
// $config['stripe_publishable_key'] = 'pk_live_51KoXIDDRDOuiR2HY1DCVkQMeCxDNJ8kW1laHbV08jMlvzRiuBdQJZL1qZgQL68jBLeMZC7H4RH6viaPE22UsBW9C00nVv0pZrf';


$config['stripe_currency']        = 'USD';