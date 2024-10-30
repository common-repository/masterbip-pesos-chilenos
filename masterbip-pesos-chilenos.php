<?php
/**
* Plugin Name: MasterBip Pesos Chilenos
* Plugin URI: https://www.masterbip.cl
* Description: Agrega PESOS CHILENOS a WOOCOMMERCE y su correcta compatibilidad con Paypal.
* Version: 1.0
*
* Author: MasterBip
* Author URI: https://www.masterbip.cl/
* Requires at least: 4.0 +
* Tested up to: 5.8
* WC requires at least: 3.0.x
* WC tested up to: 3.6.4
*
* Text Domain: masterbip
*
* License: GPLv3
*
* MasterBip Pesos Chilenos free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* any later version.
*
* MasterBip Pesos Chilenos is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*/
function mb_add_clp_currency($currencies) {

    $currencies['CLP'] = 'Pesos Chilenos';
    return $currencies;
}
add_filter('woocommerce_currencies', 'mb_add_clp_currency', 10, 1);


function mb_add_clp_currency_symbol($currency_symbol, $currency) {
    switch ($currency) {
        case 'CLP': $currency_symbol = '$';
            break;
    }
    return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'mb_add_clp_currency_symbol', 10, 2);


function mb_add_clp_paypal_valid_currency($currencies) {
    array_push($currencies, 'CLP');
    return $currencies;
}
add_filter('woocommerce_paypal_supported_currencies', 'mb_add_clp_paypal_valid_currency');