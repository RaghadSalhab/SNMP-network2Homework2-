<?php


$newSysContact = isset($_REQUEST['newSysContact']) ? $_REQUEST['newSysContact'] : " raghadsalhab ";
//$newSysContact = $newSysContact[0] . $newSysContact . $newSysContact[strlen($newSysContact) - 1];
if($_REQUEST['newSysContact']=""){
    $newSysContact=" raghadsalhab ";
}
snmp2_set("localhost", "fff", ".1.3.6.1.2.1.1.4.0", 's', $newSysContact);

$newSysName = isset($_REQUEST['newSysName']) ? $_REQUEST['newSysName'] : " raghad ";
//$newSysName = $newSysName[0] . $newSysName . $newSysName[strlen($newSysName) - 1];
snmp2_set("localhost", "fff", ".1.3.6.1.2.1.1.5.0", 's', $newSysName);

$newSysLocation = isset($_REQUEST['newSysLocation']) ? $_REQUEST['newSysLocation'] : " Nablus ";
//$newSysLocation = $newSysLocation[0] . $newSysLocation . $newSysLocation[strlen($newSysName) - 1];
snmp2_set("localhost", "fff", ".1.3.6.1.2.1.1.6.0", 's', $newSysLocation);

header("Location: ../html/p1.html");
?>