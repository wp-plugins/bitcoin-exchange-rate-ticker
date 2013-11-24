<?php

function bitcoin_settings_html ()
{		
?>

	<h2>
		Bitcion Ticker Settings Page
	</h2>
	
    <h3>
    	If you like this plugin please donate BTC: 1JokP92X916fbvdT9pVdegqrt7c8hCFXJ4
    </h3>
    
	<?php
		
		$tickObj = get_option('btc_ticker');
		
	?>
    
    <div>

    	<form action="options.php" method="post">
			<?php settings_fields('btc_ticker_options'); ?>
            <?php do_settings_sections('bitcion_ticker_settings_page'); ?>
            <p class="submit">
                <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
            </p>
        </form>
    	
    </div>
    
    <div>
    	<h3>Current Ticker Statistics</h3>
    </div>
    
    <div>

		<?php
                    
            foreach($tickObj as $key=>$value){
			
			if($value->ident == "btcchina")
			{
				$cur = "&#165;";
			}
			else
			{
				$cur = "$";
			}
        ?>
				
				
              <h4><?php echo $value->name; ?></h4>
              <div>
                <p>High - <?php echo $cur; ?><?php echo $value->high; ?></p>
              </div>
              <div>
                <p>Low - <?php echo $cur; ?><?php echo $value->low; ?></p>
              </div>
              <div>
                <p>Buy - <?php echo $cur; ?><?php echo $value->buy; ?></p>
              </div>
              <div>
                <p>Sel - <?php echo $cur; ?><?php echo $value->sell; ?></p>
              </div>
              <div>
                <p>Volume - <?php echo round($value->vol); ?> BTC</p>
              </div>
              <hr />
         <?php
         
            }
        ?>
        
    </div>

<?php
}
?>