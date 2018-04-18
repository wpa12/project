<?php 
##############################################################
## File: error_handler.php
## Created by: Wayne Anstey (14015750)
## Description: To handle errors upon error checking
##
## Classes: error_check();
## Functions: __construct($error_code);
##			  create_error_XML($error_code);
##			  xml_string($error_code, $method, $error_array);
##############################################################

ob_start(); // start output buffering to prevent potential header() errors

//Load config file in
require_once 'config.php';

//class to check for errors
class error_check {

	public $error_codes_array = array();
	//will output some xml error codes and messages

/*
	function __construct($error_code, $method, $format)
	{

		$this->error_check_messages ($error_code, $method, $format);
	}
*/





	function error_check_messages ($error_code, $method, $format = "xml")
	{
		//assigns $format as XML by default.

				//Store error codes in an array with messages
		$error_codes_array_1 = array(
					1000 => "Required parameter is missing",
					1100 => "Parameter not recognized",
					1200 => "Currency type not recognized",
					1300 => "Currency amount must be a decimal number",
					1400 => "Format must be xml or json",
					1500 => "Error in service",

					2000 => "Method not Recognised or is missing", 
					2100 => "Rate in wrong format or is missing", 
					2200 => "Currency code in wrong format or is missing", 
					2300 => "Country name in wrong format or is missing", 
					2400 => "Currency code not found for update", 
					2500 => "Currency name in wrong format or is missing",
					2600 => "Currency already exists",
					2700 => "Error in service",
					"undefined_value" => "Error not recognised"
				);

		if(!$format){
			$format = 'xml';
		}


		if($format == 'xml')
			$this->error_string($error_code, $method, $error_codes_array_1);
	
		elseif($format == 'json')
			$this->json_string($error_code, $method, $error_codes_array_1);
	}//End of create_error_XML();



	function error_string($error_code, $method, $error_code_array_1)
	{
		//for Error codes 1000s
		if(($error_code >= 1000) && ($error_code <= 1500))
		{

$xmlstr = <<<XML
<conv>
	<error>
		<code>$error_code</code>
		<msg>$error_code_array_1[$error_code]</msg>
	</error>
</conv>
XML;

header("Content-type: text/xml");
echo $xmlstr;

		}
	

	//For Error codes 2000s
		elseif (($error_code >= 2000) && ($error_code <= 2700))
		{
			$xmlstr = <<<XML
<method type="$method">
	<error>
		<code>$error_code</code>
		<msg>$error_code_array_1[$error_code]</msg>
	</error>
</method>
XML;

	//$xml = new SimpleXMLElement($xmlstr);
	header("Content-type: text/xml");
	echo $xmlstr;
	//echo $xml->asXML();
		}

		else 
		{
$xmlstr = <<<XML
<method type="$method">
	<error>
		<code>$error_code</code>
		<msg>Error Undefined</msg>
	</error>
</method>
XML;

	//$xml = new SimpleXMLElement($xmlstr);
	header("Content-type: text/xml");
	echo $xmlstr;
	//echo $xml->asXML();
		}

	}//End of xml_string();
	

	function json_string($error_code, $method, $error_code_array_1){

		//$this->error_string($error_code, $method, $format);
		$json = array("conv" => array());
		$json["conv"]["error"] = array();
		$json["conv"]["error"]["code"] = $error_code;
		$json["conv"]["error"]["msg"] = $error_code_array_1[$error_code];

		header("Content-type: application/json");
		echo json_encode($json, JSON_PRETTY_PRINT);
		exit;
	}
}// End of Class


//$xml_error = new error_check(2100);
#$xml_error = new error_check(2800); <- used to test above output ^

//$error = new error_check(2200, "post", "json");
ob_end_flush(); //ends and flushes the output buffer.
