<?php
/**
 * Created by Héctor Vela
 * Date: 10/07/14
 * Time: 12:49 PM
 */

set_time_limit(0);

$BASE_URL =
    'http://download.finance.yahoo.com/d/quotes.csv?s=%s=X&f=sl1d1t1ba&e=.csv';

/**
 * Formats the base url with the given parameters, and calls the function
 * to download and read the quotes file
 * @param string $from two or three letters for the currency eg. "usd", "can"
 * @param string $to two or three letters for the currency eg. "usd", "can"
 * @return array associative array containing the buy and sell price
 */
function get_currencies($from, $to)
{
    global $BASE_URL;
    $conversion = strtoupper($from.$to);
    $url = sprintf($BASE_URL, $conversion);
    $currency_ratio = get_currency_quotes($url, $conversion);
    return $currency_ratio;
}


/*
 * Downloads a file from the yahoo finance API, reads it and returns the
 * buy and sell price
 * @param string $url the formatted url for the currency
 * @param string $currency the string for the currency rate to query
 */
function get_currency_quotes($url, $currency)
{
    // downloads the file and save it with the currency conversion name
    $csv_quote = download($url, $currency.".csv");
    if (!$csv_quote){
        throw new Exception('Download error...');
    }
    // opens the downloaded file
    $file_handle = fopen($currency.".csv", "r");
    $currency_obj = [];
    while (!feof($file_handle) )
    {
        $line_of_text = fgetcsv($file_handle, 1024);
        // eg.: USDMXN=X
        $currency_obj["currency"] = explode("=", $line_of_text[0])[0];
        $currency_obj["buy_price"] = $line_of_text[4];
        $currency_obj["sell_price"] = $line_of_text[5];
        //We just need the first line
        break;
    }
    fclose($file_handle);
    return $currency_obj;
}

/*
 * Downloads a file from a url and saves it to a location
 * @param string $file_source the url of the file to download
 * @param string $file_target the location to save the file
 */
function download($file_source, $file_target) {
    $rh = fopen($file_source, 'rb');
    $wh = fopen($file_target, 'w+b');
    if (!$rh || !$wh)
    {
        return false;
    }

    while (!feof($rh))
    {
        if (fwrite($wh, fread($rh, 4096)) === FALSE)
        {
            return false;
        }
        echo ' ';
        flush();
    }

    fclose($rh);
    fclose($wh);

    return true;
}


/*
 * Gets the currency quotes for an array of currencies
 * @param array $currencies_array array of arrays, each position must contain
 *      another array of two positions. The first, containing the 'from'
 *      currency abbreviation and the second, the 'to' currency abbreviation
 * @return a json string containing the currency quotes for all the given
 *      currencies
 */
function currency_quotes($currencies_array)
{
    $currencies = [];
    for($index=0; $index<count($currencies_array);$index++)
    {
        $from = $currencies_array[$index][0];
        $to = $currencies_array[$index][1];
        $currencies[] = get_currencies($from, $to);
    }
    return json_encode($currencies);
}

/*
 * Test function for currency_quotes
 * */
function test()
{
    $test_currencies = [['usd', 'mxn'],
        ['eur', 'mxn'],
        ['eur', 'usd']];
    echo currency_quotes($test_currencies);
}

test();