<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'gform_currencies', 'update_currency' );
function update_currency( $currencies ) {
	$currencies['USD'] = array(
	'name' => __( 'U.S. Dollar', 'gravityforms' ),
	'symbol_left' => '$',
	'symbol_right' => '',
	'symbol_padding' => ' ',
	'thousand_separator' => ',',
	'decimal_separator' => '.',
	'decimals' => 0
);

return $currencies;
}