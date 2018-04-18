<?php 
#############################################################
##	   	   File: Index.php
##	 Created by: Wayne Anstey (14015750)
##	Description: Handle a GET request URL and do conversion
##

@date_default_timezone_set('GMT');
require_once 'config.php';
require_once 'error_handler.php';
require_once 'create_xml_files.php';
#require_once 'update_xml.php';


//defining variables required
global $currency_codes;
//create_xml_files();

$method = "post";
$from = null;
$to = null;
$amount = null;
$format = null;

$error = new error_check(); 


if(isset($_GET['from']) && isset($_GET['to']) && isset($_GET["amount"]) && isset($_GET["format"]))
{
	$from = $_GET['from'];
	$to = $_GET['to'];
	$amount = $_GET['amount'];
	$format = $_GET['format'];
}
else {
	echo $error->error_check_messages(1000, $method);
	return false;
}


	// checking all parameters are met
	if(count($_GET) < 4)
	{
		echo $error->error_check_messages(1000, $method);
		exit;
	}elseif (count($_GET) > 4){
		echo $error->error_check_messages(1100, $method);
		exit;
	}

$from = $_GET['from'];
$to = $_GET['to'];
$amount = $_GET['amount'];
$format = $_GET['format'];

//error checking object

//storing regexes
$regexes = array(
				"float" => "/^[+-]?(\d*\.\d+([eE]?[+-]?\d+)?|\d+[eE][+-]?\d+)$/",
				"letters" => "/^[A-Z]+$/"
				);


	//spelling check for the parameters 
/*	if ((isset($from) != "from") || (isset($to) != "to") || (isset($amount) != "amount") || (isset($format) != "format"))
	{
    	echo $error->error_check_messages(1100, $method, $format);
    	exit;
	}
*/
	//checks that the currency codes are in the array defined in config.php
	if(!in_array($from, $currency_codes) || !in_array($to, $currency_codes))
	{
		#print_r($currency_codes);
		echo $error->error_check_messages(1200, $method, $format);
		exit;
	}

	//checks that the format is either XML or JSON
	if($format != "xml" && $format != "json")
	{
		
		echo $error->error_check_messages(1400, $method, $format);
		exit;
	}



	//check floating point number is in correct format
 	if(!preg_match($regexes["float"], $amount))
 	{
 		echo $error->error_check_messages(1300, $method, $format);
 		exit;
 	}elseif($amount < 0)
 	{
 		$amount = 0;	//if url amount is less than zero, equate amount to zero.
 	}

 	if(!preg_match($regexes["letters"], $from) ||(!preg_match($regexes["letters"], $to)))
 	{
 		echo $error->error_check_messages(1000, $method, $format);
 		exit;
 	}



 	$xml_rates = simplexml_load_file("rates.xml") or die("error");
 	$xml_currencies = simplexml_load_file("currencies.xml") or die("error");
 
 /*
 echo "<pre>";
	print_r($xml_rates);
# 	print_r($xml_currencies);
 echo "</pre>";


 foreach($xml_rates->rates->rate as $item)
{
    if ($item->code == 12437)
    {
        echo "ID: " . $item->id . "\n";
        echo "Title: " . $item->title . "\n";
    }
}

*/

//Access toRate using xpath to get the attribute.
$to_Rates = $xml_rates->xpath('//rates/rate[@code="' . $to .'"]/@value');
$to_Rate = $to_Rates[0];

//Access fromRate using xpath to get Attribute
$from_Rates = $xml_rates->xpath('//rates/rate[@code="' . $from .'"]/@value');
$from_Rate = $from_Rates[0];

//Access currency codes using xpath on attributes
$to_Name = $xml_currencies->xpath('//currencies/currency[ccode="' . $to .'"]/cname[1]');
$to_Countries = $xml_currencies->xpath('//currencies/currency[ccode="' . $to .'"]/cntry[1]');

//Access Currency codes usnig xpath on attributes.
$from_Name = $xml_currencies->xpath('//currencies/currency[ccode="' . $from .'"]/cname[1]');
$from_Countries = $xml_currencies->xpath('//currencies/currency[ccode="' . $from .'"]/cntry[1]');

//echo $to . ": " . $toRate  . " - " . $toName[0]  . " - " . $toCountries[0];
//echo "</br>";
//echo $from . ": " . $fromRate  . " - " . $fromName[0]  . " - " . $fromCountries[0];

//Finding the conversion rate and making sure it is a floating point number, rounded to 2 decimal places.
$conversion_Rate = round(floatval($to_Rate) / floatval($from_Rate), 2);

//calculates the converted amount, using the amount (passed by $_GET) and multiplied by the conversion rate.
$conversion_Amount = $amount * $conversion_Rate;

//Round to two decimal places.
$conversion_Amount = round($conversion_Amount, 2);

//sets the date ad time.
$time = date('d M Y H:i');



//process the output in xml
if($format == "xml"){

 $response = <<<RES
 <conv>
 	<at>$time</at>
 	<rate>$conversion_Rate</rate>
 	<from>
 		<code>$from</code>
 		<curr>$from_Name[0]</curr>
 		<loc>$from_Countries[0]</loc>
 		<amnt>$amount</amnt>
 	</from>
 	<to>
 		<code>$to</code>
 		<curr>$to_Name[0]</curr>
 		<loc>$to_Countries[0]</loc>
 		<amnt>$conversion_Amount</amnt>
 	</to>
 </conv> 

RES;



header("Content-type: text/xml");
echo $response;
}else {

	//processes the output in json.
		$json = array("conv" => array());
		$json["conv"]["at"] = $time;
		$json["conv"]["rate"] = $conversion_Rate;
		$json["conv"]["from"] = array();
		$json["conv"]["from"]["code"] = $from;
		$json["conv"]["from"]["curr"] = $from_Name[0];
		$json["conv"]["from"]["loc"] = $from_Countries[0];
		$json["conv"]["from"]["amnt"] = $amount;

		$json["conv"]["to"] = array();
		$json["conv"]["to"]["code"] = $to;
		$json["conv"]["to"]["curr"] = $to_Name[0];
		$json["conv"]["to"]["loc"] = $to_Countries[0];
		$json["conv"]["to"]["amnt"] = $conversion_Amount;


		header("Content-type: application/json");
		echo json_encode($json, JSON_PRETTY_PRINT);

}
//param_checker($from, $to, $amount, $format, $currency_codes);