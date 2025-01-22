<?php

//header("Access-Control-Allow-Origin: *"); // السماح لجميع النطاقات، يمكنك تخصيص النطاقات كما تحتاج
//header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
//header("Access-Control-Allow-Headers: Content-Type, Authorization");

function getSystemGroup()
{

    $systemGroup = snmp2_walk("localhost", "public", ".1.3.6.1.2.1.1");
    $ob = new stdClass();
    foreach($systemGroup as $index => $val){
        if (!strpos($index, '.1.3.6.1.2.1.1.9'))
            $ob -> $index = $val;
    }
    $jsonOb = json_encode($ob);
    print $jsonOb;
}

function getARPTable() {
    $ARPTable = @snmp2_walk("localhost", "public", ".1.3.6.1.2.1.4.22");
    $ob = new stdClass();
    foreach($ARPTable as $index => $val) {
        $ob->$index = $val;
    }
    // Ensure proper JSON response
    header('Content-Type: application/json');
    echo json_encode($ob);
}



function getTCPTable()
{

    $TCPTable = snmp2_walk("localhost", "public", ".1.3.6.1.2.1.6.13");
    $ob = new stdClass();
    foreach($TCPTable as $index => $val){
        $ob -> $index = $val;
    }
    $jsonOb = json_encode($ob);
    print $jsonOb;
}

if (isset($_GET['function'])){
    if($_GET['function'] === 'getSystemGroup')
        getSystemGroup();
    else if($_GET['function'] === 'getARPTable')
        getARPTable();
    else if($_GET['function'] === 'getTCPTable')
        getTCPTable();
}

?>