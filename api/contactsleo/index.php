<?php
//header('Access-Control-Allow-Origin','https://rgreenconsortium.bookingenginegiftcard.com');
// header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

//http://traveljolly.com/api/contacts/

require '../base.php';

function Post() {

    spl_autoload_register('contacts_autoloader');
    $gatlingEntity = new contact();

    $payload = "";
    try {

        $app = new iSDK;
        $app->cfgCon("connection");
        $payload = getPayload();

        $addGroups = "";
        if (isset($payload["addGroups"]))
        {
            $addGroups = explode(",", $payload["addGroups"]);
            unset($payload["addGroups"]);
        }

        $result = $app->addWithDupCheck($payload, 'Email');//returns contactId
        if (strpos($result, 'ERROR') !== false)
            throw new Exception($result);

        if (is_array($addGroups))
        {
            foreach($addGroups as $group) {
                $addResult = $app->grpAssign($result, $group);
                //echo "addResut:".$addResult;
                if (strpos($addResult, 'ERROR') !== false) {
                    throw new Exception($result);
                    return;
                }
            }
        }

         ouputHeader("201", "Created");
         returnResponse("http://traveljolly.com/api/contacts/".$result, false);
    }
    catch(Exception $e) {
        ouputHeader("400", "Bad Request");
        returnResponse("error: " . $e->getMessage());
    }
    finally {

    }
}
function Put() {

    spl_autoload_register('contacts_autoloader');
    $gatlingEntity = new contact();

    $payload = "";
    try {

        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id = $_GET["id"];
        } else {
            throw new Exception("How about some data dude.");
        };
        $app = new iSDK;
        $app->cfgCon("connection");
        $payload = getPayload($payload);
        $groups = ""; $addGroups = ""; $removeGroups = "";
        if (isset($payload["Groups"]))
        {
            $groups = $payload["Groups"];
            unset($payload["Groups"]);
        }
        if (isset($payload["addGroups"]))
        {
            $addGroups = explode(",", $payload["addGroups"]);
            unset($payload["addGroups"]);
        }
        if (isset($payload["removeGroups"]))
        {
            $removeGroups = explode(",", $payload["removeGroups"]);
            unset($payload["removeGroups"]);
        }

        if (!empty($payload))
        {
            $result = $app->dsUpdate("Contact", $id, $payload);
            if (strpos($result, 'ERROR') !== false)
                throw new Exception($result);
        }
        if (is_array($removeGroups))
        {
            foreach($removeGroups as $group) {
                $removeResult = $app->grpRemove($id, $group);
            }
        }
        if (is_array($addGroups))
        {
            foreach($addGroups as $group) {
                $addResult = $app->grpAssign($id, $group);
            }
        }
    }
    catch(Exception $e) {
        ouputHeader("400", "Bad Request");
        returnResponse("error: " . $e->getMessage());
    }
    finally {

    }
    returnResponse($result);
}

function Get() {
   // echo "URI:".$_SERVER["REQUEST_URI"];
   // echo "method:".$_SERVER['REQUEST_METHOD'];
   // echo "pathinfo:".$_SERVER["PATH_INFO"];
   // $url_elements = explode('/', $_SERVER['PATH_INFO']);
   // echo "uri:".print_r($url_elements);
    try {
        
        spl_autoload_register('contacts_autoloader');
        $gatlingEntity = new contact();
        $app = new iSDK;
        $app->cfgCon("connection");

        $queryParams = "";
        $queryString = $_SERVER['QUERY_STRING'];
        if (array_key_exists('id', $_GET)) { 
            if (empty($_GET['id'])) {
            //if id not set remove from querystring
            $queryString = str_replace('id=&', '', $queryString);
            } 
        }
        $queryString = str_replace('path=', '', $queryString);
        $queryParams = getUrlParms($queryString);
        //echo "qs: ".print_r($queryString);
        //$returnFields = array('Id','FirstName','LastName','Email','Phone1', 'Phone1Type', 'Groups', 'LeadSource', "_AFFemail", '_AFFphone', '_GiftCardPin');
        $excludeCustomFields = TRUE;
        $returnFields = $gatlingEntity->getSelectFieldsArray($excludeCustomFields);
        if ($excludeCustomFields) {//so get custom fields from api
            $returnCustomFields = array('DataType', 'DefaultValue', 'FormId','GroupId', 'Id', 'Label', 'ListRows', 'Name', 'Values');
	        $queryCustomFields = array('FormId' => -1);
            $customFields = $app->dsQuery("DataFormField",100,0,$queryCustomFields,$returnCustomFields);
            //echo "customFields: ".print_r($customFields);
            foreach ($customFields as $key=>$val)
            {
                //if ($key["Name"] == "Name")
                    $returnFields[] = "_".$val["Name"];
            }
        }
        $query = $queryParams;
        //echo "<br>query = ".print_r($returnFields)."<br>";
        $result = $app->dsQuery("Contact",100,0,$query,$returnFields);

        //echo "queryparms: ".print_r($queryParams)." x</br>";
        // echo "Entered val GET: ".$_GET['val']." x</br>";
        // echo "Entered val POST: ".$_POST['val']." x</br>";
        // echo "querystring: ".$_SERVER['QUERY_STRING']." x</br>";
        // echo "params: ".print_r($queryParams)." x</br>";
        // echo "properties: ".$gatlingEntity->getSelectClause()." x</br>";


    }
    catch(Exception $exception) {
         ouputHeader("400", "Bad Request");
         returnResponse("error: " . $exception->getMessage());
     }
     
    returnResponse($result);
}
function Delete() {
    ouputHeader("405", "Method Not Allowed");
}

?>