<?php 
// just a test file
$xmlstr = <<<XML
<conv>
	<error>
		<code>$error_code</code>
		<msg>$error_code_array_1[$error_code]</msg>
	</error>
</conv>
XML;

	$fp = fopen("xml_error.xml", "w+");
	$xml = new SimpleXMLElement($xmlstr);
	header("Content-type: text/xml");
	fwrite($fp, $xml->asXML());
	echo $xml->asXML();
	fclose($fp);

?>