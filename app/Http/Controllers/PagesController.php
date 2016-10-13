<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
 	// Zaif Last API
	static $zaif_url = "https://api.zaif.jp/api/1/ticker/btc_jpy";  	
	// bitFlyer API
	static $bitflyer_url = "https://bitflyer.jp/api/echo/price";
	// conincheck
	static $coincheck_url = "https://coincheck.com/api/ticker";
	// coinbase
	static $coinbase_url = "https://api.coinbase.com/v2/exchange-rates?currency=BTC";
	// BITSTAMP
	static $bitstamp_url = "https://www.bitstamp.net/api/v2/ticker/btcusd/";
	// BLOCKCHSIN info - Exchange Rates API
	static $blockchain_info_url = "https://blockchain.info/ticker";


	public function about()
	{
		// $api = new api_get_contents();
		$zaif_json = $this -> api_get_contents(self::$zaif_url);
		$bitflyer_json = $this -> api_get_contents(self::$bitflyer_url);
		$coincheck_json = $this -> api_get_contents(self::$coincheck_url);
		$coinbase_json = $this -> api_get_contents(self::$coinbase_url);
		$bitstamp_json = $this -> api_get_contents(self::$bitstamp_url);
		$blockchain_info_json = $this -> api_get_contents(self::$blockchain_info_url);

		$zaif["buy"] = Catch_Zaif_ExchangeRates::match_buy();
		$zaif["sell"] = Catch_Zaif_ExchangeRates::match_sell();
		$zaif["json"] = $this -> get_array_from_json($zaif_json);
		
		// $bitflyer["buy"] = Catch_bitFlyer_ExchangeRates::match_buy();
		// $bitflyer["sell"] = Catch_bitFlyer_ExchangeRates::match_sell();
		$bitflyer["json"] = $this -> get_array_from_json($bitflyer_json);


		$coincheck = $this -> get_array_from_json($coincheck_json);
		$coinbase  = $this -> get_array_from_json($coinbase_json);
		$bitstamp = $this -> get_array_from_json($bitstamp_json);
		$blockchain_info = $this -> get_array_from_json($blockchain_info_json);
		$usd_rates = NationalCurruncy::show_usd_rates();

		return view('pages.about', compact('zaif', 'bitflyer', 'coincheck', 'coinbase', 'bitstamp', 'usd_rates', 'blockchain_info'));
	}


	/**
 	* @param $url 
 	* @return $json 取得したJSONデータを返す
 	*/
	public static function api_get_contents($url)
	{
		$json = file_get_contents($url); 

		if (!isset($json)) {
			$json = '';
		}

		return $json;
	}


	public static function get_array_from_json($json)
	{
		return json_decode($json, true);
	}


}


/**
 * The static class which provides the national currency rate between USD and JPY 
 */
class NationalCurruncy extends PagesController
{
	static $usd_currency_url = "http://api.aoikujira.com/kawase/json/usd";

	public static function show_usd_rates()
	{
		$usd_rates_json = PagesController::api_get_contents(self::$usd_currency_url);

		$usd_rates = PagesController::get_array_from_json($usd_rates_json); 

		return $usd_rates;
	}

}


/**
 *  The rxchange rate prices scraped From 'Zaif' 
 */
Class Catch_Zaif_ExchangeRates
{
	static $html_url = "https://zaif.jp/instant_exchange_btc_jpy/1"; 
	static $buy_price_match = '/<span id="btc_ask" style="display: inline;">(.*?)<\/span>/u';
	static $sell_price_match = '/<span id="btc_bid" style="display: inline;">(.*?)<\/span>/u';

	public static function match_buy()
	{
		$matched_price = Catch_exchangeRates_Controller::match_buy_string( self::$html_url, self::$buy_price_match);

		return $matched_price;
	}

	public static function match_sell()
	{
		$matched_price = Catch_exchangeRates_Controller::match_sell_string( self::$html_url, self::$sell_price_match);

		return $matched_price;
	}
}


/**
 *  The rxchange rate prices scraped From 'bitFlyer' 
 */
Class Catch_bitFlyer_ExchangeRates
{
	static $html_url = "https://bitflyer.jp/ex/Price";
	static $buy_price_match = '/<div id="bfPriceAsk_0" style="display: block;">(.*?)<\/div>/u';
	static $sell_price_match = '/<div id="bfPriceBid_0" style="display: block;">(.*?)<\/div>/u';

	public static function match_buy()
	{
		$matched_price = Catch_exchangeRates_Controller::match_buy_string( self::$html_url, self::$buy_price_match);

		return $matched_price;
	}

	public static function match_sell()
	{
		$matched_price = Catch_exchangeRates_Controller::match_sell_string( self::$html_url, self::$sell_price_match);

		return $matched_price;
	}
}



/**
 * Parent class about the collection data scraped from the specific webapege
 */
Class Catch_exchangeRates_Controller 
{
	static $html_url = ''; 
	static $buy_price_match = '';
	static $sell_price_match = '';

	public static function match_buy_string( $url, $match_string)
	{
		$html = self::catch_html($url);
	
		preg_match( $match_string, $html, $string);
		
		return $string[1];
	}

	public static function match_sell_string( $url, $match_string)
	{
		$html = self::catch_html($url);
		
		preg_match( $match_string, $html, $string);
	
		return $string[1];
	}

	private static function catch_html($url)
	{
		$html = file_get_contents($url);

		return self::convert_html($html); 
	}

	private static function convert_html($file_contents)
	{
		return mb_convert_encoding($file_contents, mb_internal_encoding(), "auto");
	}

}




/**
 * 
 */
class JPYBTCRateModel {

	private $exchange_JPY_BTC_rate = "";

	private $exchange_bid = "";

	private $exchange_ask = "";

	private $exchange_mid = "";

	private $last_price = "";

	private $currancy_buy = "";

	private $currancy_sell = "";
	
}





