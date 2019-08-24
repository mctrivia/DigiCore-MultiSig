<?php
	//initialize
	require_once(__DIR__.'/includes/autoload.php');
	use Bitcoin\Bitcoin;
	use ExeOutput\Storage;
	
	//don't timeout
	ignore_user_abort(true);
	set_time_limit(0);
	
	//get inputs
	$data=Storage::getConfig();
	
	//get inputs
	$key1=$_GET['key1'];
	$key2=$_GET['key2'];
	$key3=$_GET['key3'];
	$label=$_GET['label'];
	
	//verify wallet connects
	if (!isset($data['rpc_user'],$data['rpc_pass'],$data['rpc_port'])) {
		echo json_encode(false);
	} else {
		try {
			//connected to wallets
			$digibyte = new Bitcoin($data['rpc_user'],$data['rpc_pass'],'localhost',$data['rpc_port']);
			$result=$digibyte->addmultisigaddress(2,array($key1,$key2,$key3),$label,'p2sh-segwit');
			/*
			{
			  "address":"multisigaddress",  (string) The value of the new multisig address.
			  "redeemScript":"script"       (string) The string value of the hex-encoded redemption script.
			}			
			*/			
			$result['label']=$label;
			
			//store in config
			if (!isset($data['addresses'])) $data['addresses']=array();
			$data['addresses'][$result['address']]=$result;
			
			//save config
			Storage::setConfig($data);
			echo json_encode($data);
			
		} catch (\Exception $e) {
			echo json_encode(false);
		}
	}