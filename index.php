<?php
 
	$ip = '10.70.1.6';

	$esno_local = snmp2_get($ip, "public", "1.3.6.1.4.1.6247.80.1.3.2.5.0");
	$esno_remote = snmp2_get($ip, "public", "1.3.6.1.4.1.6247.80.1.3.5.1.0");

?>
