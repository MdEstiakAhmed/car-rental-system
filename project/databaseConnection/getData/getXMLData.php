<?php
    function loadFromXML(){
        global $data;
        $data=array();
        $xml=simplexml_load_file("../XML/aboutUsInfo.xml") or die("Error: Cannot create object");
        // print_r($xml);
        // echo "hello";
        // echo count($xml->data);
        
        foreach($xml->info as $st){
            $ar=array();
            $ar["companyName"]=(string)$st->companyName;
            $ar["moto"]=(string)$st->moto;
            $ar["email"]=(string)$st->email;
            $ar["phoneNumber"]=(string)$st->phoneNumber;
            $ar["address"]=(string)$st->address;
            $ar["details"]=(string)$st->details;
            $data[]=$ar;
        }
        //print_r($xml);
    }
?>