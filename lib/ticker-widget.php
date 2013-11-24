<?php
	function tickerWidget()
	{
     	
		$tickObj = get_option('btc_ticker');
		$options = get_option('btc_ticker_options');
		$chosenArr = array();
		$url = plugins_url();
		
		foreach($options as $key=>$value)
		{
			if($value == "on")
			{
				$i++;
				array_push($chosenArr,$key);
			}
		}
				
		?>
        	<div class="ticker-widget">
				<div class="ticker-heading">
                	<img src="<?php echo $url."/btcticker/bitcoin.png"; ?>"/>&nbsp;&nbsp;Current Bitcoin Rates 
                </div>            
        <?php
		
		$c = 0;
		
		foreach($tickObj as $key=>$value)
		{
			if (in_array( $value->ident, $chosenArr)) 
			{
				
				if($value->ident == "btcchina")
				{
					$cur = "¥";
				}
				else
				{
					$cur = "$";
				}
				
				if($c == 0)
				{
					$class = "active-ticker";
				}
				else
				{
					$class = "";
				}
				
				$c++;
				
				?>
            
            	<div class="ticker-rates <?php echo $class; ?>" id="<?php echo $value->ident; ?>">
                    <h5 style="margin:7px 0px 7px 0px;">
                        <?php echo $value->name; ?>
                    </h5>
                    
                    <div class="ticker-row">
                        <span class="key">High:</span> <span class="value"><?php echo $cur . " "; ?><?php echo $value->high; ?></span>
                    </div>
                    
                    <div class="ticker-row">
                        <span class="key">Low:</span> <span class="value"> <?php echo $cur . " "; ?><?php echo $value->low; ?></span>
                    </div>
                    
                    <div class="ticker-row">
                        <span class="key">Buy:</span> <span class="value"> <?php echo $cur . " "; ?><?php echo $value->buy; ?></span>
                    </div>
                    
                    <div class="ticker-row">
                        <span class="key">Sell:</span> <span class="value"> <?php echo $cur . " "; ?><?php echo $value->sell; ?></span>
                    </div>
                    
                    <div class="ticker-row">
                        <span class="key">Volume:</span> <span class="value"> <?php echo round($value->vol); ?> BTC </span>
                    </div>
                    
            	</div>
            
            <?php
				
			}
		}
		?>
        		<div class="ticker-footer">
                    <div class="ticker-link">
                        <a href="http://wordpress.org/plugins/bitcoin-exchange-rate-ticker/screenshots/">
                            &#8250; Get the Bitcoin Ticker
                        </a>
                    </div>
                    <div class="ticker-bitcoin-address">
                        1JokP92X916fbvdT9pVdegqrt7c8hCFXJ4
                    </div>
            	</div>
        	</div>
            
        <?php
	}
	
?>