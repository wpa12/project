<?php 
@date_default_timezone_set("GMT");
require_once 'config.php';

function errors($error_code)
{
	switch($error_code)
	{
		case 1000:
			$error_message = "Required parameter is missing";
			break;

		case 1100: 
			$error_message = "Parameters not recognised";
			break;

		case 1200: 
			$error_message = "Currency type not recognized";
			break;

		case 1300:
			$error_message = "Currency amount must be a decimal number";
			break;
		case 1400:
			$error_message = "Format must be xml or json";
			break;
		case 1500: 
			$error_message = "Error in service";
			break;

		default:
			$error_message = "service unavailable";
			break;
	}

	$error_array = array(
		'e_code' => $error_code,
		'e_message' => $error_message
	);


		$error_output = '<?xml version="1.0" encoding="UTF-8" ?>'."\n";
		$error_output .= "<conv>\n";
			$error_output .= "<error>\n";
				$error_output .= "<code>".$error_code."</code>\n";
				$error_output .= "<msg>".$error_message."</msg>\n";
			$error_output .= "</error>\n";
		$error_output .="</conv>\n";

		$xmlfile = fopen("error_xml.xml", "w+");
		header("Content-type: text/xml");
		fwrite($xmlfile, $error_output);
		fclose($xmlfile);

		check_format($_GET['format'], $error_output);
	}

	function check_format ($format, $error_output){
		

		if(!$format)
		{
			$format = "xml";
		}

		if($format == "xml")
		{
			header("Content-type: text/xml");
			echo $error_output;
			exit;
		}

		if($format == "json")
		{
			$xml_2_json = simplexml_load_file("error_xml.xml");
			header("Content-type: application/json");
			echo json_encode($xml_2_json, JSON_PRETTY_PRINT);
			exit;
		}

		return $error_output;
	}

	function form_error($error_code, $method)
	{
		switch($error_code)
		{
			case 2000:
				$error_message = "Method not recognized or is missing";
				break;

			case 2100:
				$error_message = "Rate in wrong format or is missing";
				break;

			case 2200: 
				$error_message = "Currency code in wrong format or is missing";
				break;

			case 2300: 
				$error_message = "Country name in wrong format or is missing";
				break;

			case 2400:
				$error_message = "Currency code not found for update";
				break;
			case 2500:
				$error_message = "Error in service";
				break;
			default:
				$error_message = "Service unavailable";
				break;
		}

		$error_array = array(
			"error_code" => $error_code,
			"error_message" => $error_messsage
		);

		$error_xml = <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<method type="$method">
	<error>
		<code>$error_code</code>
		<msg>$error_message</code>
	</error>
</method>

XML;

$xmlfile = fopen("error_xml.xml", "w+");
header("Content-type: text/xml");
fwrite($xmlfile, $error_xml);
fclose($xmlfile);
	}
	return $error_xml;
}