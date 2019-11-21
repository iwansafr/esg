<?php defined('BASEPATH') OR exit('No direct script access allowed');
function ip()
{
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = $_SERVER['REMOTE_ADDR'];

	if(filter_var($client, FILTER_VALIDATE_IP))
	{
		$ip = $client;
	}
	elseif(filter_var($forward, FILTER_VALIDATE_IP))
	{
		$ip = $forward;
	}
	else
	{
		$ip = $remote;
	}

	return $ip;
}

function ip_detail($IPaddress) 
{
  $json       = @file_get_contents("http://ipinfo.io/{$IPaddress}");
  $details    = json_decode($json, 1);
  return $details;
}