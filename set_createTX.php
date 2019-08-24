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
	$from=$_GET['from'];
	$to=$_GET['to'];
	$amount=$_GET['amount'];
	$pass=$_GET['pass'];	
	
	//verify wallet connects
	if (!isset($data['rpc_user'],$data['rpc_pass'],$data['rpc_port'])) {
		echo json_encode("Error");
	} else {
		try {
			//connected to wallets
			$digibyte = new Bitcoin($data['rpc_user'],$data['rpc_pass'],'localhost',$data['rpc_port']);
			$digibyte->settxfee(0.00001);
			
			//get address balance
			$inputs=$digibyte->listunspent(6,9999999,array($from));
			$total=0-ceil(count($inputs)/6)*0.00001;		//compute max fee
			foreach ($inputs as $value) {
				$total+=$value["amount"];				
			}
			
			//verify balance exists
			if ($total<$amount) throw new \Exception("Insuficiant Funds");
			
			//create raw transaction
			$outputs=array();
			$outputs[$to]=round($amount*100000000)/100000000;
			$outputs[$from]=round(($total-$amount)*100000000)/100000000;
			$hex=$digibyte->createrawtransaction($inputs,$outputs);
			
			//sign the transaction
			$digibyte->walletpassphrase($pass,1000);
			$hex=$digibyte->signrawtransactionwithwallet($hex);
			
			echo json_encode($hex['hex']);
		} catch (\Exception $e) {
			echo json_encode("Error $e");
		}
	}