<?php
header("Access-Control-Allow-Origin: *"); // السماح لجميع النطاقات، يمكنك تخصيص النطاقات كما تحتاج
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$newSysContact = isset($_REQUEST['newSysContact']) ? $_REQUEST['newSysContact'] : " raghadsalhab ";
if($_REQUEST['newSysContact']=""){
    $newSysContact=" raghadsalhab ";
}

snmp2_set("localhost", "public", ".1.3.6.1.2.1.1.4.0", 's', $newSysContact);

$newSysName = isset($_REQUEST['newSysName']) ? $_REQUEST['newSysName'] : " raghad ";
snmp2_set("localhost", "public", ".1.3.6.1.2.1.1.5.0", 's', $newSysName);

$newSysLocation = isset($_REQUEST['newSysLocation']) ? $_REQUEST['newSysLocation'] : " Nablus ";
snmp2_set("localhost", "public", ".1.3.6.1.2.1.1.6.0", 's', $newSysLocation);

header("Location: ../html/p1.html");
?>