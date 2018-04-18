<?php 

####################################################
## File: currPut.php
## Created by: Wayne Anstey (14015750)
## Description: adds a currency to the rates file.
###################################################

@date_default_timezone_set('GMT');

//load config file into document.
require_once "config.php";


class put{

	function __construct(){

		$code = null;
		$rate = null;
		$timestamp = null;

		$regexes = array(
			"letters" => "/^[A-Z]+$/",
			"float"   => "/^[+-]?(\d*\.\d+([eE]?[+-]?\d+)?|\d+[eE][+-]?\d+)$/"
		);

		if(isset($_GET['code']) && isset($_GET['rate']))
		{
			$code = $_GET['code'];
			$rate = $_GET['rate'];
			$timestamp = new DateTime();
			$ts = $timestamp->getTimestamp();
			
		}

		$timestamp = new DateTime();
		$ts = $timestamp->getTimeStamp();

		$this->add_rate("WPA", 1000.40, $ts);

	}

	function add_rate($code, $input_rate, $timestamp) 
	{

		$doc = new DOMDocument();
		$doc->load("rates.xml");

		$root = $doc->getElementsByTagName("rates")->item(0);
			$rate = $doc->createElement("rate");
		$root->appendChild($rate);


		header("Content-type: text/xml");
		echo $doc->saveXML();
/*
		$domDoc = new DOMDocument("1.0", "UTF-8");
		$rates = $domDoc->createElement("rates");
			$rate = $domDoc->createElement("rate");

		$domDoc->appendChild($rates);
			$rates->appendChild($rate);

		header("Content-type: text/xml");
		$domDoc->save("new_rates.xml");
		echo $domDoc->saveXML();
*/
	}


}

$put = new put();