<?php

	/* ------------------------------*/
	/* INSTALL/UNINSTALL */
	/* ------------------------------*/
	
	add_action( 'wp_head', 'head_css_jq' );
	
	function head_css_jq() 
	{
		$url = plugins_url();
	?>
		
        <link rel="stylesheet" type="text/css" href="<?php echo $url."/bitcoin-exchange-rate-ticker/css/ticker.css" ?>"/>
            
 	<?php
	
	}
	
	// Add settings on activate.
	
	add_action('admin_init', 'plugin_install');
	
	function plugin_install()
	{
		
		fn_update_ticker();
		add_option( "btc_ticker" , $value = $tickArr, '' , $autoload = 'yes' );
		register_setting('wp_ticker', 'wp_ticker_options');
		register_setting('btc_ticker_options', 'btc_ticker_options');
		
	}
	
	// Unregister settings on deactivate.
	
	add_action('admin_init', 'plugin_unininstall');
	
	function plugin_unininstall ()
	{
		unregister_setting('wp_ticker_options', 'wp_ticker_options');
		unregister_setting('btc_ticker_options', 'btc_ticker_options');
	}

	// Create admin page.
	
	add_action('admin_menu','create_bitcoin_ticker_admin');
	
	function create_bitcoin_ticker_admin ()
	{
		$mypage = add_options_page("Bitcoin Ticker Options", "Bitcoin Ticker Settings", 10, "bitcion_ticker_settings_page", "bitcoin_settings_html");
	}
	
	add_action('admin_init', 'add_ticker_options');
	
	function add_ticker_options()
	{
		// feed settings
		add_settings_section('ticker_section', 'Ticker Settings', 'sctn_ticker', 'bitcion_ticker_settings_page');
		add_settings_field('plugin_radio_btchina', 'BTC China', 'set_radio', 'bitcion_ticker_settings_page', 'ticker_section',$args=array("name"=>"btcchina"));
		add_settings_field('plugin_radio_btce', 'BTC-e', 'set_radio', 'bitcion_ticker_settings_page', 'ticker_section',$args=array("name"=>"btce"));
		add_settings_field('plugin_radio_bitstamp', 'Bitstamp', 'set_radio', 'bitcion_ticker_settings_page', 'ticker_section',$args=array("name"=>"bitstamp"));
				
	}
	
	function sctn_ticker ()
	{
		echo "<p>Choose which tickers to display on the widget.</p>";
	}
	
	function set_radio($args) {
		
		$options = get_option('btc_ticker_options');
		
		$items = array("on", "off");
		
		foreach($args as $thefield)
		{
			switch ($thefield) 
			{
				case 'btcchina':
					foreach($items as $item)
					{
						$checked = ($options['btcchina']==$item) ? ' checked="checked" ' : '';
						echo "<label><input ".$checked." value='$item' name='btc_ticker_options[btcchina]' type='radio' /> $item </label>";
					}
				break;
				case 'btce':
					foreach($items as $item)
					{
						$checked = ($options['btce']==$item) ? ' checked="checked" ' : '';
						echo "<label><input ".$checked." value='$item' name='btc_ticker_options[btce]' type='radio' /> $item </label>";
					}
				break;
				case 'bitstamp':
					foreach($items as $item)
					{
						$checked = ($options['bitstamp']==$item) ? ' checked="checked" ' : '';
						echo "<label><input ".$checked." value='$item' name='btc_ticker_options[bitstamp]' type='radio' /> $item </label>";
					}
				break;
			}
		}
	}
	
	function  set_dropdown() {
		$options = get_option('btc_ticker_options');
		$items = array("Vertical", "Horizontal");
		echo "<select id='layout' name='btc_ticker_options[layout]'>";
		foreach($items as $item) {
			$selected = ($options['btc_ticker_options']==$item) ? 'selected="selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
	}
	
	
	add_filter('cron_schedules', 'add_scheduled_scrape');
	
	function add_scheduled_scrape($schedules) 
	{
		$schedules['minutes_5'] = array('interval'=>64000, 'display'=>'Once 5 minutes');
		return $schedules;
	}
	
	if (!wp_next_scheduled('create_ticker')) 
	{
		wp_schedule_event(time(), 'minutes_5', 'create_ticker');
	}
		
	add_action('update_ticker', 'fn_update_ticker');
	
	function fn_update_ticker() 
	{
		// Gather Data...
		
		$tickArr = array();
		$api = new ticker();
		
		//BTC China

		$api->api = "btcchina";
		
		$btcchina = $api->call();
		
		//BTCE 
		
		$api->api = "btce";
				
		$btce = $api->call();
		
		//Bitstamp 
		
		$api->api = "bitstamp";
				
		$bitstamp = $api->call();
		
		// Push into array.
		
		array_push($tickArr, $btcchina, $mtgox, $btce, $bitstamp);
		
		update_option( "btc_ticker", $tickArr );
	}
	
	// Widgetise the plugin for sidebar.
		 
	function widget_tickerPlugin($args) {
		
		extract($args);
		echo $before_widget;
		echo $before_title; 
		echo $after_title;
		tickerWidget();
		echo $after_widget;
	}
	 
	function tickerWidget_init()
	{
	  register_sidebar_widget(__('Bitcion Ticker Widget'), 'widget_tickerPlugin');     
	}
	
	add_action("plugins_loaded", "tickerWidget_init");
	
?>