<?php
//http://traveljolly.com/api/invoicepayments/
require '../base.php';

function Post() {
    ouputHeader("405", "Method Not Allowed");
}
function Put() {
    ouputHeader("405", "Method Not Allowed");
}
function Get() {

    try {

        spl_autoload_register('invoicepayments_autoloader');
        $gatlingEntity = new invoicepayment();
        $app = new iSDK;
        $app->cfgCon("connection");

        $queryParams = NULL;
        $queryString = $_SERVER['QUERY_STRING'];
        if (array_key_exists('id', $_GET)) { 
            if (empty($_GET['id'])) {
            //if id not set remove from querystring
            $queryString = str_replace('id=&', '', $queryString);
            } 
        }
        $queryString = str_replace('path=', '', $queryString);
        $queryParams = getUrlParms($queryString);

        $returnFields = $gatlingEntity->getSelectFieldsArray(TRUE);
        $query = $queryParams;
        $result = $app->dsQuery("InvoicePayment",100,0,$query,$returnFields);

    }
    catch(Exception $exception) {
         ouputHeader("400", "Bad Request");
         returnResponse("error: " . $exception->getMessage());
         return;
     }
     
     if (is_array($result)){
        if (empty($result)) {
            returnResponseWithHeader("204", "No Content", $result);
            return;
        }
    }

    returnResponse($result);
}
function Delete() {
    ouputHeader("405", "Method Not Allowed");
}

?>