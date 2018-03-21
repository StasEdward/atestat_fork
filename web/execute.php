<?php

function WriteToMyFile($textowrite){

    $myfile = fopen("logs.txt", "a") or die("Unable to open file!");
	fwrite($myfile, "*******************************************************************\n");
	fwrite($myfile, $textowrite."\n");
	fwrite($myfile, "*******************************************************************\n");
	fclose($myfile);

}

function funcdefault() {

   	echo "funcdefault";

}

function Qms3InsertTestResult() {
    $sn = $_GET['sn'];
    $result =  $_GET['result'];
    $flex_user_code = $_GET['flex_user_code'];
    $passwd = $_GET['passwd'];
    $station_code = $_GET['station_code'];
    $customer_code = $_GET['customer_code'];
    $pc_name =  $_GET['pc_name'];
    $symptom =  $_GET['pc_name'];

    WriteToMyFile("Qms3InsertTestResult: Result recorded: ".$sn."\n flex_user_code: ".$flex_user_code.", passwd:".$passwd.",  station_code:".$station_code.", customer_code:".$customer_code.", sn:".$sn.", pc_name:".$pc_name.", result:".$result."");

   	echo "Result recorded: ".$sn." Result: ".$result."";
}


function Qms3FailSafe() {
    $sn = $_GET['sn'];
//    $result =  $_GET['result'];
    $flex_user_code = $_GET['flex_user_code'];
    $passwd = $_GET['passwd'];
    $station_code = $_GET['station_code'];
    $customer_code = $_GET['customer_code'];

    $failsafe = "Rev_control\tNot_OK\n Routing\tIn route\n FailSafe\tNot OK:explanations.\n SN_info ".$sn." P/N: 24-TEST";
    WriteToMyFile("Qms3FailSafe:\n ".$failsafe." \nflex_user_code: ".$flex_user_code.", passwd:".$passwd.",  station_code:".$station_code.", customer_code:".$customer_code.", sn:".$sn."");

    echo $failsafe;

}

function Qms3VerifyPassword() {
   	echo "Qms3VerifyPassword OK: 1";
}


  //  print_r($_GET);

   $func = $_GET['func'];


switch($func) {




        case "Qms3VerifyPassword":
            Qms3VerifyPassword();
    break;

    case "Qms3FailSafe":
            Qms3FailSafe();
    break;

    case "Qms3InsertTestResult":
            Qms3InsertTestResult();
    break;

    case "Qms3VerifyPassword":
            Qms3VerifyPassword();
    break;




   default:
            funcdefault();
    break;



}

?>