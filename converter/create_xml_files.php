<?php 
###################################################################
## File: create_files.php
## created by: Wayne Anstey (14015750)
## Description: Create the files for the Rates and Locations XMLs
###################################################################

@date_default_timezone_set('GMT');
require_once 'config.php';

function create_xml_files(){

# pull the ISO currencies file into a simplexml object
$xml=simplexml_load_file('http://www.currency-iso.org/dam/downloads/lists/list_one.xml') or die("Error: Cannot create object");
$writer = new XMLWriter();
$writer->openURI('currencies.xml');
$writer->startDocument("1.0");
$writer->startElement("currencies");
# get all the currency codes
$codes = $xml->xpath("//CcyNtry/Ccy");
$ccodes = [];
# make array with unique currency codes
foreach ($codes as $code) {
	if (!in_array($code, $ccodes)) {
		$ccodes[] = (string) $code;
	}
}
foreach ($ccodes as $ccode) { 
	$nodes = $xml->xpath("//Ccy[.='$ccode']/parent::*");
	
	$cname =  $nodes[0]->CcyNm;
	
	# begin writing out the nodes & values

	$writer->startElement("currency");
		$writer->startElement("ccode");
		$writer->text($ccode);
		$writer->endElement();
		$writer->startElement("cname");
		$writer->text($cname);
		$writer->endElement();
		$writer->startElement("cntry");
		
			$last = count($nodes) - 1;
			
			# group countries together using the same code
			# & lowercase first letter in name
			foreach ($nodes as $index=>$node) {
				$writer->text(mb_convert_case($node->CtryNm, MB_CASE_TITLE, "UTF-8"));
				if ($index!=$last) {$writer->text(', ');}
			}
		$writer->endElement();
	
	$writer->endElement();
}
$writer->endDocument();
$writer->flush();


# our 22 currency codes
$ccodes = array(
   'CAD','CHF','CNY','DKK',
   'EUR','GBP','HKD','HUF',
   'INR','JPY','MXN','MYR',
   'NOK','NZD','PHP','RUB',
   'SEK','SGD','THB','TRY',
   'USD','ZAR');
# get the yahoo finance rates file as xml or die
$xml=simplexml_load_file("http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=xml") or die("Error: Cannot create object");
# get the USD to GBP rate
$usd_rate = $xml->xpath('//field[text()="USD/GBP"]/following-sibling::field[@name="price"]');
# calculate the reciprocal to get £=1 value
$gbp_rate = 1/(float) $usd_rate[0];
# create the xml writer object
$writer = new XMLWriter();
$writer->openURI('rates.xml');
$writer->startDocument("1.0");
$writer->startElement("rates");
# get three arrays holding codes, price $ timestamps
$codes = $xml->xpath('//field[@name="name"]');
$values = $xml->xpath('//field[@name="price"]');
$ts = $xml->xpath('//field[@name="ts"]');
foreach($codes as $key=>$code) { 
  if (in_array(substr($code, -3), $ccodes)) {
		
    $writer->startElement("rate");
			$writer->writeAttribute('code',  substr($code, -3)); 
					
			# check for GBP and always write 1.00
			if (substr($code, -3) == 'GBP') {
				$writer->writeAttribute('value', '1.00');
			}
			else {
				# convert value to base GBP
				$gbp_val = (float) $values[$key] * $gbp_rate;
				$writer->writeAttribute('value', $gbp_val);
			}
										
			$writer->writeAttribute('ts', $ts[$key]);
		$writer->endElement(); 		
	}
}
$writer->endDocument();
$writer->flush();

}

create_xml_files();

/*

class create_xml_files {

	public $errors;
	public $yahoo_xml;
	public $iso_xml;
	public $xpath;

	function __construct()
	{   
		#########################################################
		## Function Assigns values to the public class variables.
		#########################################################

		//Instantiates the error_check() Class from error_handler.php
		$this->errors = new error_check();

		$this->yahoo_xml = simplexml_load_file(YAHOO_XML) or die($this->errors->create_error_xml(1600));
		
		$this->iso_xml = simplexml_load_file(ISO_XML) or die($this->errors->create_error_xml(1600));
		$this->iso_xml->saveXML("iso_xml.xml");

		$this->xpath = "//CcyNtry/Ccy";
	}

	function make_rates_xml ()
	{
		######################################################################
		## Function uses the public variables and creates the rates.xml file.
		######################################################################
		$makefile = new XMLWriter();
		$makefile->openURI(RATES);
		$makefile->setIdent(true);
		$makefile->startDocument("1.0", "UTF-8");
		$makefile->startElement("conv");

		foreach($this->yahoo_xml->resource->resource as $key => $value)
		{
			$yahoo_name = $resource->xpath('//field[@name = "name"]');
			$yahoo_name = $resource->xpath('//field[@name = "price"]');
			$yahoo_timestamp = $resource->xpath('//field[@name = "ts"]');
		}
	}

	function make_currencies_xml()
	{
		##
		## Function uses the public variables and creates the currencies.xml file
		##
	}
}
*/
