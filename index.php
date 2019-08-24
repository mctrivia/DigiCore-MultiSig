<html>
	<head>
	<style>
		.flex-container {
			display: flex;
			width: 100%;
			padding: 5px;
		}
		.fill-width {
			flex: 1;
		}
		.code {
			padding: 10px;
			
		}
		.pages {
			display: none;
		}
		
		#tx_table{
			display: 			table;
			width: 				100%;
		}
		.table_row{
			display: 			table-row;	
		}
		.table_header{
			display: 			table-cell;
			border: 			1px solid #999999;
			background-color: 	#888888;	
		}
		.table_cell{
			display: 			table-cell;
			border: 			1px solid #999999;
			background-color: 	#FFFFFF;
		}
		#createTXRaw{
			height:				300px;
		}
		#sendTXContent{
			height:				300px;
		}
		
		
		
		
		
		
		#shadow {
			position:			fixed;
			padding:			0;
			margin:				0;

			top:				0;
			left:				0;

			width: 				100%;
			height: 			100%;
			background:			rgba(0,0,0,0.5);
			display: 			none;
			z-index:			999999;
		}
		.window {
			text-align:			center;
			margin: 			0;
			position: 			fixed;  
			top: 				50%;
			left: 				50%;
			transform: 			translate(-50%, -50%);
			display: 			none;	
			
			background-color: 	white;	
			border-radius:		2px;
			box-shadow:			0 0 15px;
			font-size:			14px;
			font-weight:		bold;
			background-color: 	#EEEEEE;
			z-index: 			1000000;
		}
		
	</style>
	
	</head>
	<body>
<div id="pageInit" class="pages">
	<h1>DigiByte Core - MultiSig</h1>
	
	<h3>Wallet Access Info:</h3>
	<div class="flex-container">
		<label>RPC User:&nbsp;</label><input type="text" id="rpc_user" value="rpc_user" class="fill-width">
	</div>
	<div class="flex-container">
		<label>RPC Password:&nbsp;</label><input type="text" id="rpc_pass" value="rpc_pass" class="fill-width">
	</div>
	<div class="flex-container">
		<label>RPC Port:&nbsp;</label><input type="text" id="rpc_port" value="14022" class="fill-width">
	</div>
	<input type="button" id="rpc_connect" value="Log in to wallet"><br>

	<b>To setup your core wallet</b><br>
	Press Settings->Options->Open Configuration File<br>
	Add the following lines:<br>
	<div class="code">
		whitelist=127.0.0.1<br>
		rpcallowip=127.0.0.1<br>
		rpcbind=127.0.0.1<br>
		rpcuser=rpc_user<br>
		rpcpassword=rpc_pass<br>
		rpcport=14022<br>
	</div>
	Then save and reboot your wallet.
</div>
<div id="pageMenu" class="pages">
	<h1>DigiByte Core - MultiSig</h1>
	<input type="button" id="menuCreateAddress" value="Create Address"><br>
	<input type="button" id="menuCreateTX" value="Create Transaction"><br>
	<input type="button" id="menuSendTX" value="Send Transaction"><br>
</div>
<div id="pageNew" class="pages">
	<h1>DigiByte Core - MultiSig</h1>
	
	<h3>Create MultiSig Address:</h3>
	<div class="flex-container">
		<label>Pubkey 1:&nbsp;</label><input type="text" id="newPubkey1" class="fill-width"><input type="button" id="newGetPubkey1" line="1" class="newGetPubkey" value="Get from this wallet">
	</div>
	<div class="flex-container">
		<label>Pubkey 2:&nbsp;</label><input type="text" id="newPubkey2" class="fill-width"><input type="button" id="newGetPubkey2" line="2" class="newGetPubkey" value="Get from this wallet">
	</div>
	<div class="flex-container">
		<label>Pubkey 3:&nbsp;</label><input type="text" id="newPubkey3" class="fill-width"><input type="button" id="newGetPubkey3" line="3" class="newGetPubkey" value="Get from this wallet">
	</div>
	<div class="flex-container">
		<label>Address label:&nbsp;</label><input type="text" id="newLabel" class="fill-width">
	</div>
	<input type="button" id="newGenerate" value="Generate Address">&nbsp;<input type="button" class="toMenu" page="pageNew" value="Back To Menu">
</div>
<div id="pageCreateTX" class="pages">
	<h1>DigiByte Core - MultiSig</h1>
	
	<h3>Create Transaction:</h3>
	<div class="flex-container">
		<label>Address to send from:&nbsp;</label>
		<select id="createFromAddress" class="fill-width"></select>
	</div>
	<div class="flex-container">
		<label>Address to send to:&nbsp;</label><input type="text" id="createToAddress" class="fill-width">
	</div>
	<div class="flex-container">
		<label>Balance:&nbsp;</label><input type="text" id="createBalance" class="fill-width" disabled>
	</div>
	<div class="flex-container">
		<label>Amount:&nbsp;</label><input type="number" id="createTXAmount" class="fill-width" min="0">
	</div>
	<div class="flex-container">
		<label>Wallet Password:&nbsp;</label><input type="password" id="createPass" class="fill-width" min="0">
	</div>
	<input type="button" id="createTX" value="Create Transaction">
	<br>
	Transaction:<br>
	<div class="flex-container">
		<textarea type="text" id="createTXRaw" class="fill-width" disabled></textarea>
	</div><br>
	<input type="button" class="toMenu" page="pageCreateTX" value="Back To Menu">
</div>
<div id="pageSendTX" class="pages">
	<h1>DigiByte Core - MultiSig</h1>
	
	<h3>Send Transaction:</h3>
	<div class="flex-container">
		<label>TX Code:&nbsp;</label><input type="text" id="sendTXCode" class="fill-width">
	</div>	
	<div class="flex-container">
		<label>Content:&nbsp;</label><textarea type="text" id="sendTXContent" class="fill-width" disabled></textarea>
	</div>
	<div class="flex-container">
		<label>Wallet Password:&nbsp;</label><input type="password" id="sendPass" class="fill-width" min="0">
	</div>
	<input type="button" id="sendTX" value="Send">&nbsp;<input type="button" class="toMenu" page="pageSendTX" value="Back To Menu">
</div>



<div id="shadow"></div>
<div id="window_wait" class="window">
<h1>Processing</h1>
</div>
<div id="window_failed" class="window">
<h1>Failed</h1>
<input type="button" class="close" value="Close">
</div>
<div id="window_done" class="window">
<h1>Funds Sent</h1>
<div id="done_txid"></div>
<input type="button" class="close" value="Close">
</div>



	<script src="xmr.js"></script>
	<script>
		/* **************************************
		*
		*
		*					Login page
		*
		*
		*************************************** */
		var config;
		
		//try to connect to wallet
		document.getElementById("rpc_connect").addEventListener('click', function() {
			var rpc_user=encodeURIComponent(document.getElementById("rpc_user").value);
			var rpc_pass=encodeURIComponent(document.getElementById("rpc_pass").value);
			var rpc_port=encodeURIComponent(document.getElementById("rpc_port").value);
			xmr.getJSON('set_config.php?rpc_user='+rpc_user+'&rpc_pass='+rpc_pass+'&rpc_port='+rpc_port).then(function(data) {
				if (data==false) {
					alert("Could not connect to wallet");
				} else {
					config=data;
					
					//show next page
					document.getElementById("pageInit").style.display="none";
					document.getElementById("pageNew").style.display="block";
				}
			});
		});
		
		
		
		
		/* **************************************
		*
		*
		*					Windows
		*
		*
		*************************************** */
		var closeWindow=function() {
			document.getElementById("shadow").style.display="none";
			var domWindow=document.getElementsByClassName("window");
			for (var i=0; i<domWindow.length; i++) {
				domWindow[i].style.display="none";
			}
		}
		var showWindow=function(page) {
			closeWindow();
			document.getElementById("shadow").style.display="block";
			document.getElementById("window_"+page).style.display="block";			
		}
		var domClose=document.getElementsByClassName("close");
		for (var i=0; i<domClose.length; i++) {
			domClose[i].addEventListener('click', closeWindow, false);
		}
		
		
		
		/* **************************************
		*
		*
		*					Menu
		*
		*
		*************************************** */
		document.getElementById('menuCreateAddress').addEventListener('click',function() {
			document.getElementById("pageMenu").style.display="none";
			document.getElementById("pageNew").style.display="block";
		});
		document.getElementById('menuCreateTX').addEventListener('click',function() {
			//build list of addresses
			var html=''
			for (var address in config['addresses']) {
				var label=address;
				if (config['addresses'][address]['label']!='') label+='('+config['addresses'][address]['label']+')';
				html+='<option value="'+address+'">'+label+'</option>';
			}
			document.getElementById('createFromAddress').innerHTML=html;
			
			//get balance of current
			var address=document.getElementById('createFromAddress').value;
			xmr.getJSON('get_balance.php?address='+address).then(function(data) {
				document.getElementById('createBalance').value=data;
			},function() {
				document.getElementById('createBalance').value='error';
			});
					
			//show page
			document.getElementById("pageMenu").style.display="none";
			document.getElementById("pageCreateTX").style.display="block";
		});
		document.getElementById('menuSendTX').addEventListener('click',function() {
			document.getElementById("pageMenu").style.display="none";
			document.getElementById("pageSendTX").style.display="block";
		});
		
		//back to menu button
		var toMenu=function() {
			var closePage=this.getAttribute('page');
			document.getElementById(closePage).style.display="none";
			document.getElementById("pageMenu").style.display="block";
		}
		var domToMenu=document.getElementsByClassName("toMenu");				//get all dom items using class next
		for (var i=0; i<domToMenu.length; i++) {								//go through each dom element with class "next"
			domToMenu[i].addEventListener('click', toMenu, false);			//attach click listener to execute closeWindows function
		}
		
		
		
		
		/* **************************************
		*
		*
		*					Create Address
		*
		*
		*************************************** */
		//get new public key button
		var getPubkey=function() {
			showWindow('wait');
			var line=this.getAttribute('line');
			xmr.getJSON('get_pubkey.php').then(function(data) {
				if (data==false) {
					alert("Could not connect to wallet");
				} else {
					document.getElementById('newPubkey'+line).value=data;
				}
				closeWindow();
			});			
		}
		var domNewGetPubkey=document.getElementsByClassName("newGetPubkey");				//get all dom items using class next
		for (var i=0; i<domNewGetPubkey.length; i++) {								//go through each dom element with class "next"
			domNewGetPubkey[i].addEventListener('click', getPubkey, false);			//attach click listener to execute closeWindows function
		}
		
		//create new address
		document.getElementById('newGenerate').addEventListener('click',function() {
			showWindow('wait');
			var key1=document.getElementById('newPubkey1').value;
			var key2=document.getElementById('newPubkey2').value;
			var key3=document.getElementById('newPubkey3').value;
			var label=document.getElementById('newLabel').value;
			xmr.getJSON('set_createaddress.php?key1='+key1+'&key2='+key2+'&key3='+key3+'&label='+label).then(function(data) {
				if (data==false) {
					alert("Could not connect to wallet");
				} else {
					config=data;
					
					//show next page
					document.getElementById("pageNew").style.display="none";
					document.getElementById("pageMenu").style.display="block";
				}
				closeWindow();
			});			
		});
		
		
		
		
		/* **************************************
		*
		*
		*					CreateTX
		*
		*
		*************************************** */
		document.getElementById('createFromAddress').addEventListener('change',function() {
			//update balance
			var address=document.getElementById('createFromAddress').value;
			xmr.getJSON('get_balance.php?address='+address).then(function(data) {
				document.getElementById('createBalance').value=data;
			},function() {
				document.getElementById('createBalance').value='error';
			});			
		});
		document.getElementById('createTX').addEventListener('click',function() {
			showWindow('wait');
			var addressFrom=document.getElementById('createFromAddress').value;
			var addressTo=document.getElementById('createToAddress').value;
			var amount=document.getElementById('createTXAmount').value;
			var pass=document.getElementById('createPass').value;
			xmr.getJSON('set_createTX.php?from='+addressFrom+'&to='+addressTo+'&amount='+amount+'&pass='+pass).then(function(data) {
				document.getElementById('createTXRaw').value=data;
				closeWindow();
			});
		});
		
		
		
		
		
		/* **************************************
		*
		*
		*					SendTX
		*
		*
		*************************************** */
		document.getElementById('sendTXCode').addEventListener('change',function() {
			//update balance
			var hex=document.getElementById('sendTXCode').value;
			xmr.getJSON('get_txcontent.php?hex='+hex).then(function(data) {
				var funding={};
				for (var output of data['vout']) {
					var address=output["scriptPubKey"]["addresses"][0];
					funding[address]={
						"amount": output["value"],
						"internal": false
					};
				}
				for (var address in config['addresses']) {
					if (funding[address]!=undefined) funding[address]['internal']=true;
				}
				var html='';
				for (var address in funding) {
					html+=address+(funding[address]['internal']?'(Internal)':'')+': '+funding[address]['amount']+"\n";
				}
				document.getElementById('sendTXContent').value=html;
			},function() {
				document.getElementById('sendTXContent').value='Error';
			});			
		});
		document.getElementById('sendTX').addEventListener('click',function() {
			showWindow('wait');
			//update balance
			var hex=document.getElementById('sendTXCode').value;
			var pass=document.getElementById('sendPass').value;
			xmr.getJSON('set_sendTX.php?hex='+hex+'&pass='+pass).then(function(data) {
				document.getElementById('done_txid').innerHTML=data;
				showWindow('done');
			},function() {
				showWindow('failed');
			});			
		});
		
		
		
		
		
		
		
		
		
		/* **************************************
		*
		*
		*					Startup
		*
		*
		*************************************** */
		xmr.getJSON('get_config.php').then(function(data) {
			if (data==false) {
				//no valid config
				document.getElementById("pageInit").style.display="block";
			} else {
				config=data;
				if (data['addresses']!=undefined) {
					//at least one address included go to menu
					document.getElementById("pageMenu").style.display="block";
				} else {
					//no addresses go to new
					document.getElementById("pageNew").style.display="block";
				}
			}
		});
		
	
	</script>
	</body>
</html>