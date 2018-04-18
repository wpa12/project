<?php
##
##file       : config.php
##Created by : Wayne Anstey (14015750)
##Description: Contains file definitions, date/time and list 
##  			of currencies. 
##
##
##

@date_default_timezone_set("GMT");
require_once "error_handler.php";


//URLs defined, and YAHOOs base rate in USD
define("YAHOO_XML",	"http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=xml");
define("ISO_XML","http://www.currency-iso.org/dam/downloads/lists/list_one.xml");
define("C_BASE","USD");


//Defining the rates.xml file
define("RATES", "rates.xml");
//holds currency codes, and location.
define("CURRENCIES", "currencies.xml");

$time = time();
$time = date('d M Y H:i', $time);
define ("TIME", $time);

$currency_codes = array (
			'CAD', 'CHF', 'CNY', 'DKK', 'EUR',
            'GBP', 'HKD', 'HUF', 'INR', 'JPY',
            'MXN', 'MYR', 'NOK', 'NZD', 'PHP',
            'RUB', 'SEK', 'SGD', 'THB', 'TRY',
            'USD', 'ZAR'
              );