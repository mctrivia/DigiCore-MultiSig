<?php
	//initialize
	require_once(__DIR__.'/includes/autoload.php');
	use Bitcoin\Bitcoin;
	
	//don't timeout
	ignore_user_abort(true);
	set_time_limit(0);
	
	//get inputs
	$data=array();
	if (file_exists(__DIR__.'/config.json')) {
		$data=json_decode(file_get_contents(__DIR__.'/config.json'),true);
	}
	
	//get inputs
	$hex=$_GET['hex'];		
	$pass=$_GET['pass'];	
	
	//verify wallet connects
	if (!isset($data['rpc_user'],$data['rpc_pass'],$data['rpc_port'])) {
		echo json_encode(false);
	} else {
		try {
			//connected to wallets
			$digibyte = new Bitcoin($data['rpc_user'],$data['rpc_pass'],'localhost',$data['rpc_port']);
						
			//sign the transaction
			$digibyte->walletpassphrase($pass,1000);
			$hex=$digibyte->signrawtransactionwithwallet($hex);
			
			//send raw transaction
			$result=$digibyte->sendrawtransaction($hex['hex']);
			echo json_encode($result);
		} catch (\Exception $e) {
			echo json_encode("Error $e");
		}
	}