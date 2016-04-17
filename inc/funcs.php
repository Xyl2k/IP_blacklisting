<?php
error_reporting(0);
		
if(!connect_db()) exit ('unavailable server');
$client_ip =  (empty($_SERVER['HTTP_CLIENT_IP'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['HTTP_CLIENT_IP']);
 
if(strstr($client_ip, ',')) {
	$ip = explode(',', $client_ip);
	$client_ip = $ip[0];
}

if(!have_access($client_ip)){
	include('inc/banned.php'); // You are banned !
	die();
}

	$time = time();
	$gi = geoip_open("inc/GeoIP/GeoIP.dat",GEOIP_STANDARD);


	
////////FUNCTIONS
	function reloadIpList()
	{

	global $client_ip, $_vars, $time;
		
		$result = mysql_query("SELECT `per` FROM hostile_act WHERE ip='$client_ip'");
		if(mysql_num_rows($result)>0)  {
			$field = mysql_fetch_row($result);
			$new_per = $field[0]+1;
			mysql_query("UPDATE hostile_act SET `per`='$new_per' WHERE ip='$client_ip'");
		}
		else
		{			
			mysql_query("INSERT INTO hostile_act SET ip='$client_ip', `per`=1");
			$new_per = 1;
		}

		if($new_per>=$_vars['login_block_position']) 
			{
				setcookie(
  "block_mine",
  "true",
  time() + (10 * 365 * 24 * 60 * 60)
);

$country = CountryName($client_ip);
				mysql_query ("INSERT INTO blocked_ip SET ip='$client_ip', country='$country', added='$time'");
				mysql_query ("DELETE FROM hostile_act WHERE ip='$client_ip'");
				die('Welcome to the ban list !'); 
			}
	}

	function connect_db()
	{
		global $db;

		if(!@mysql_connect(
		$db['localhost'], 
		$db['user'], 
		$db['pass'])) return false;
		if(!@mysql_select_db($db['db'])) return false;
				return true; ##all is ok
	}


	function have_access($addr){
	
	if(isset($_COOKIE['block_mine'])) return false;
	$result = mysql_query("SELECT * FROM blocked_ip  WHERE ip = '$addr'");
	if(mysql_num_rows($result)==1) 
		return false;
		 else 
		 	return true;
	}

function CountryName($IP){
	global $gi;
	$country= geoip_country_code_by_addr($gi, $IP) ;
	if (empty($country)) return 'Unk';
	return $country;
}

?>