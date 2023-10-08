<?php

try{


   
    echo file_get_contents("./service.wsdl");
  
    $wsdlUrl="http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?wsdl";
    $client = new SoapClient($wsdlUrl);

    $response1=$client->ListOfCountryNamesByName();

    $response2=$client->CurrencyName(["sCurrencyISOCode"=>"EUR"]);

    echo '<pre>';
    var_dump($response2);
    echo '</pre>';

   

    

    
    
    
}

catch(SoapFault $e){
  
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
    echo $e->getMessage();
}


?>

