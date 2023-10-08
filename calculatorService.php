<?php
ini_set("soap.wsdl_cache_enabled", "0");
class CalculatorService {
    // Ici nous definissons une classe CalculatorService qui pour l'instant va prendre deux methodes (Add et Subtract) Etant donnée que nous avons lié notre SoapServer a un WSDL et que nous avons ensuite lié notre SoapServer a cette classe (CalculatorService), nous allons pouvoir concretement lié nos methodes Add et Subtract dans cette classe a notre WSDL


    public function Add($obj) {
        // Ici nous voyons que la methode Add prendra en parametre un objet avec deux proprietés a et b. En effet, PHP va pouvoir parser notre element xml qui dans ce cas est un type complexe et il va pouvoir parser ce type complexe et le transformer en objet PHP. Cette objet PHP va contenir deux proprietés qui vont correpondre a nos elements XML a et b mais encore une fois, ces elements auront etait parser et maintenant vont se representer sous forme de proprietés d'un objet php.
        $a=$obj->a;
        $b=$obj->b;

       // Ici, je defini le contenu de ma reponse qui va devoir etre formatté comme un tableau associatif et qui va contenir le nom de mon element a retourné ainsi que ca valeur (Dans ce cas le resultat de l'addition de mex deux proprietés a et b qui ont etait mes données d'entreés)
       return ["AddResult"=>$a+$b];
        
    }

    public function Subtract($obj) {
        $a=$obj->a;
        $b=$obj->b;

        return ["SubtractResult"=>$a-$b];
    }

}

$wsdlFilePath=__DIR__."/service.wsdl";
// Ici nous avons une classe PHP qui s'apelle SoapServer et qui peux traiter des requettes en utilisant le protocole SOAP. Nous allons donc creer une variable $server en instanciant notre classe SoapServer et nous allons preciser notre wsdl pour preciser les operations differentes a ecouter
$server = new SoapServer($wsdlFilePath);



// ici nous allons concretement lier notre serveur SOAP a une classe (dans ce cas, ca sera la classe CalculatorService) que nous venons de definir avec les methodes Add et Subtract
$server->setClass('CalculatorService');
$server->handle();




?>