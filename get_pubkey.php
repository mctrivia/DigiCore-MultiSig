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
	
	//verify wallet connects
	if (!isset($data['rpc_user'],$data['rpc_pass'],$data['rpc_port'])) {
		echo json_encode(false);
	} else {
		try {
			//connected to wallets
			$digibyte = new Bitcoin($data['rpc_user'],$data['rpc_pass'],'localhost',$data['rpc_port']);
			$getNewAddress=$digibyte->getnewaddress('forMultiSig','p2sh-segwit');
			$addressValues=$digibyte->getaddressinfo($getNewAddress);
			$pubKey=$addressValues['pubkey'];
			
			echo json_encode($pubKey);
		} catch (\Exception $e) {
			echo json_encode(false);
		}
	}