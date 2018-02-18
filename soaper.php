<?php 

if(isset($_POST['soap']) && !empty($_POST['soap'])){

$sentSoap = htmlspecialchars($_POST['soap']);
//Create the client object
$soapclient = new SoapClient('http://www.webservicex.net/globalweather.asmx?WSDL');


// Get the Cities By Country
$param = array('CountryName' => $sentSoap);
$response = $soapclient->getCitiesByCountry($param);

echo '<b>These are the cities Found For '.$sentSoap.'</b><br/><br/><ol>';
foreach($response as $res => $key){

    $boss = str_replace('<Country>'.$param['CountryName'].'</Country>','',$key);
    $boss1 = str_replace('<Table>','',$boss);
    $boss2 = str_replace('</Table>','',$boss1);
    $boss3 = str_replace('City','li',$boss2);
    
    $boss4 = ''.str_replace('<NewDataSet>','',$boss3).'';
    $boss5 = ''.str_replace('</NewDataSet>','',$boss4).'';
    echo ' ' .($boss5) . '';

    
}
echo '</ol>';


}

else{

    echo '<b>Country Nmae is Required</b>';
}

