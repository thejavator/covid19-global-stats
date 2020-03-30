<?php

namespace lib;

class controller
{

   const BASE_URL = 'https://coronavirus-monitor.p.rapidapi.com/coronavirus/';
	const END_POINTS = array(
		'cases_by_country'=>'cases_by_country.php',
		'latest_stat_by_country'=>'latest_stat_by_country.php',
		'worldstat'=>'worldstat.php',
		'cases_by_particular_country'=>'cases_by_particular_country.php'
	);

    public function getWorldStats()
    {
        $response = $this->send_request_status_cache('https://coronavirus-monitor.p.rapidapi.com/coronavirus/worldstat.php');
        $array = json_decode($response, true);

        return $array;
    }
    public function getCasesByCountry()
    {
        $response = $this->send_request_status_cache('https://coronavirus-monitor.p.rapidapi.com/coronavirus/cases_by_country.php');
        $array = json_decode($response, true);

        return $array;
    }
    private function send_request_status_cache($url, $parrams = array())
    {
        //open connection
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		// curl_setopt($ch, CURLOPT_ENCODING, "");
		// curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		// curl_setopt($ch, CURLOPT_MAXREDIRS, 30);
		// curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		// "x-rapidapi-host: coronavirus-monitor.p.rapidapi.com",
		// "x-rapidapi-key: ebc4c9dc2dmsh934a963b19cfe77p16e6dejsn862cf1ddba7d"));
        // $data = curl_exec($ch);
        // curl_close($ch);
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"x-rapidapi-host: coronavirus-monitor.p.rapidapi.com",
				"x-rapidapi-key: ebc4c9dc2dmsh934a963b19cfe77p16e6dejsn862cf1ddba7d"
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		
        return $response;
    }

    private function connect($server, $username, $password, $database_name)
    {
        $db1 = mysql_connect($server, $username, $password) or die('{"success":false,"code":"1001","message","Error"}');
        mysql_set_charset('utf8', $db1);
        mysql_select_db($database_name, $db1) or die('{"success":false,"code":"1002","message","Error"}');
        return $db1;
    }


    public function readConfig()
    {
        return yaml_parse_file('../config/app.yml');
    }
	
    private function getUrlByTag($tag)
    {
		$url = $BASE_URL . $END_POINTS[$tag];
        return $url ;
    }
	
}

?>
