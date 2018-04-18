<?php
############################################
## File: currPost.php					  		
## Created by: Wayne Anstey (14015750)	  
## Description: This file lets the user	  
##				update currently saved    
##				rates.					  
############################################

@date_default_timezone_set("GMT");

//load config.php into file
require_once 'config.php';

//create post class
class post {

	//constructor to be run on object creation
	function __construct() {
		
		//load errors into file
		$errors = new error_check();


		$xml_rates = simplexml_load_file("./rates.xml") or die($errors->error_check_messages(2700, "post"));

		//Checks date/time of rates.xml file
		//$this->check_time($xml_rates);

		$regexes = array(
			"letters" => "/^[A-Z]+$/",
			"float"   => "/^[+-]?(\d*\.\d+([eE]?[+-]?\d+)?|\d+[eE][+-]?\d+)$/"
		);

		$code = null;
		$rate = null;

		// assigning GET parameters to local variables
		if(isset($_GET["code"]) && isset($_GET["rate"])){
			$code = $_GET["code"];
			$rate = $_GET["rate"];
		}

		//assigns currency code to $code providing meets regex
		elseif(!preg_match($regexes["letters"], $code)){
			// error if regex test fails
		
			$errors->error_check_messages(2200 , "post");

		}
		//assigns rate to $rates
		elseif(!preg_match($regexes["float"], $rate)){
			//errors if regex check fails.
			//header("Content-type: text/xml");
			$errors->error_check_messages(1300, "post");

		}
		else {
			$errors->error_check_messages( 2700, "post");
		}
	
	/*
		if($code && $rate)
		{
			$file_rate = $xml_rates->xpath('//rates/rate[@code="'. $code . '"]/@value');
			echo "<br>";
			print_r($file_rate);
			echo "<br>";

			if($xml_rates->rate['code'] == $code){

			echo $xml_rates->rate['value'] = $rate;
			
			}
			//$xml_rates->saveXML("./rates.xml");   
		}
		*/
	}

	function check_time() {

		
		#	This function checks the date and time of the rates.xml file,
		#	and will run the create_xml_files.php file if the rates.xml is more than 
		#	12hrs old.
		

		$currentTime = date('d M Y H:i');
		$filetime = date('d M Y H:i', filemtime("rates.xml"));
		#$filetime = date('d M Y H:i' ,filectime("index.php"));
		
		$time1 = new DateTime($currentTime);
		$time2 = new DateTime($filetime);

		$interval = $time1->diff($time2);
		echo $filetime. "</br>";
		echo $currentTime."<br />";
		echo $interval->format('%H:%i');
		// check time difference below:
		$timeDiff = null;
		echo $timeDiff;
		clearstatcache();
	
		//Tests to the filetime and checks if hours are greater than 12

		}
	
}


$post = new post();


############################################################################################################################### BROKEN CODE BELOW ####################################################################################################################################################
/*
class currency_post {
	
	//Handles the updating of rates
    public $errors;
	public $c_code;
	#public $c_name;
	#public $c_rate;
	#public $c_country;
	public $method;

	private $rate_xml;
	private $iso_xml;
	private $location_xml;

	function __construct ($code)
	{
		$this->c_code = $code;
		#$this->c_name = $name;
		#$this->c_rate = $rate;
		#$this->c_country = $country;
		
		$this->errors = new error_check(); //instantiates error_check Class from error_handler.php
		
#		$this->rates_xml = simplexml_load_file(RATES) or die($this->errors->error_check_create_error_XML(2700));
		$this->iso_xml = simplexml_load_file(ISO_XML) or die($this->errors->error_check_messages(2700));
		$this->iso_url = simplexml_load_file(CURRENCIES) or die($this->errors->error_check_messages(2700));
		$this->method = "GET";

		$this->check();
		
	}


	function check ()
	{
		$regex_letters = '/^[A-Z]+$/';

		if(!preg_match($regex_letters, $this->c_code))
		{

			## DISPLAY ERROR 2200
			$this->errors->error_check_messages(2200);
			exit;
		}

		if(strlen($code) != 3)
		{
			## DISPLAY ERROR 2200
			$this->errors->error_check_messages(2200);
			exit;
		}

		if($code == null)
		{
			##DISPLAY ERROR 2200
			$this->errors->error_check_messages(2200);
			exit;
		}

			$code_exists = 0;

			//Checks for existing currencies
			foreach ($iso_xml->locations as $location)
			{
				$iso_c_code = (string) $location->code;

				if($iso_c_code == $this->c_code){

					$code_exists++;

				}elseif($iso_c_code == 0)
				{
					##Display ERROR 2400
					$this->errors->error_check_create_error_XML(2400);
					exit;
				}
			}
		
	}// End of check();

} // End of Class

*/




//Extending class above to allow for use of variables


	####################################################
	#This class allows for backend error checking
	#of the submitted data, and will display error codes
	#from error_handler.php depending on result.
	#####################################################


//$post = new currency_post($_GET['code']);
