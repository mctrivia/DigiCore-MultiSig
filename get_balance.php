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
	$address=$_GET['address'];		
	
	//verify wallet connects
	if (!isset($data['rpc_user'],$data['rpc_pass'],$data['rpc_port'])) {
		echo json_encode(false);
	} else {
		try {
			//connected to wallets
			$digibyte = new Bitcoin($data['rpc_user'],$data['rpc_pass'],'localhost',$data['rpc_port']);
			
			//get address balance
			$result=$digibyte->listunspent(6,9999999,array($address));
			$total=0-ceil(count($result)/6)*0.00001;		//compute max fee
			foreach ($result as $value) {
				$total+=$value["amount"];				
			}
			echo json_encode($total);
		} catch (\Exception $e) {
			echo json_encode(false);
		}
	}