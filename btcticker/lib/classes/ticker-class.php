<?php
	
	class ticker {
		
		public $api;
		
		function call()
		{
			
			switch ($this->api) {
			    case "btcchina":
			        	
			        	$url = "https://vip.btcchina.com/bc/ticker";
			        				        	
				    	$curl = curl_init($url);
				    	
				    	if (is_resource($curl) === true)
						{
							curl_setopt($curl, CURLOPT_FAILONERROR, true);
							curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					
							$result = curl_exec($curl);
							curl_close($curl);
						}
										
						$json = json_decode($result);
												
						$btcchinaObj = new stdClass;
						
						$btcchinaObj->ident = "btcchina";
						$btcchinaObj->name = "BTC China";
						$btcchinaObj->high = $json->ticker->high;
						$btcchinaObj->low = $json->ticker->low;
						$btcchinaObj->buy = $json->ticker->buy;
						$btcchinaObj->sell = $json->ticker->sell;
						$btcchinaObj->last = $json->ticker->last;
						$btcchinaObj->vol = $json->ticker->vol;
						
						return $btcchinaObj;
						
			        break;
			    case "mtgox":
			    		
			    		$url = "http://data.mtgox.com/api/1/BTCUSD/ticker";
			    		
			    		$curl = curl_init($url);
				    	
				    	if (is_resource($curl) === true)
						{
							curl_setopt($curl, CURLOPT_FAILONERROR, true);
							curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					
							$result = curl_exec($curl);
							curl_close($curl);
						}
						
						$json = json_decode($result);
			    		
			    		$mtgoxObj = new stdClass;
						
						$mtgoxObj->ident = "mtgox";
						$mtgoxObj->name = "MT Gox";
						$mtgoxObj->high = $json->return->high->value;
						$mtgoxObj->low = $json->return->low->value;
						$mtgoxObj->buy = $json->return->buy->value;
						$mtgoxObj->sell = $json->return->sell->value;
						$mtgoxObj->last = $json->return->last->value;
						$mtgoxObj->vol = $json->return->vol->value;

			    		
			    		return $mtgoxObj;
			    		
			        break;
			    case "btce":
			    	
			    		$url = "https://btc-e.com/api/2/btc_usd/ticker";
			    		
			    		$curl = curl_init($url);
				    	
				    	if (is_resource($curl) === true)
						{
							curl_setopt($curl, CURLOPT_FAILONERROR, true);
							curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					
							$result = curl_exec($curl);
							curl_close($curl);
						}
						
						$json = json_decode($result);
			    					    		
			    		$btceObj = new stdClass;
						
						$btceObj->ident = "btce";
						$btceObj->name = "BTC-e";
						$btceObj->high = $json->ticker->high;
						$btceObj->low = $json->ticker->low;
						$btceObj->buy = $json->ticker->buy;
						$btceObj->sell = $json->ticker->sell;
						$btceObj->last = $json->ticker->last;
						$btceObj->vol = $json->ticker->vol;	
						
						return $btceObj;
			    	
			        break;
			   case "bitstamp":
			    		
			    		$url = "https://www.bitstamp.net/api/ticker/";
			    		
			    		$curl = curl_init($url);
				    	
				    	if (is_resource($curl) === true)
						{
							curl_setopt($curl, CURLOPT_FAILONERROR, true);
							curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					
							$result = curl_exec($curl);
							curl_close($curl);
						}
						
						$json = json_decode($result);
			    					    		
			    		$bitstampObj = new stdClass;
						
						$bitstampObj->ident = "bitstamp";
						$bitstampObj->name = "Bitstamp";
						$bitstampObj->high = $json->high;
						$bitstampObj->low = $json->low;
						$bitstampObj->buy = $json->bid;
						$bitstampObj->sell = $json->ask;
						$bitstampObj->last = $json->last;
						$bitstampObj->vol = $json->volume;	
						
						return $bitstampObj;
			    	
			        break;
	
			}
		}
	}
	
?>