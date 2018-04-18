<?php 

######################################################
## File: currDel.php
## Created By: Wayne Anstey (14015750)
## Description: Deletes a rate from the rates.xml
######################################################

@date_default_timezone_set('GMT');
require_once "config.php";


class del {

	function __construct()
	{
		//create object for error checking
		$errors = new error_check();

		//load xml rates file.
		$xml_rates = simplexml_load_file("./rates.xml") or die($errors->error_check_messages(2700, "post"));

		//assign regexes
		$regexes = array(
			"letters" => "/^[A-Z]+$/",
			"float"   => "/^[+-]?(\d*\.\d+([eE]?[+-]?\d+)?|\d+[eE][+-]?\d+)$/"
		);

		$code = null;

		if(isset($_GET["code"]))
		{	
			//test to see if code is passed to file then assigns it to $code
			$code = $_GET["code"];
		}
		elseif(!preg_match($regexes["letters"], $code))
		{
			// error if regex test fails
			$errors->error_check_messages(2200 , "post");

		}

		//calls remove rate function and passes $code to it.
		$this->remove_rate($code, $xml_rates);

	}

	function remove_rate($code, $xmlfile)
	{	
		$xpathFile = $xmlfile->xpath('//rates/rate[@code="'.$code.'"]');

		$dom = new DOMDocument();
		$dom->load("./rates.xml");
		
		header("Content-type: text/xml");
		echo $dom->saveXML();

		//print_r($xpathFile);

	}
}

$del = new del();