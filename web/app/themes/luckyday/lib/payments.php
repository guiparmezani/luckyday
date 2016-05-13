<?php

add_filter( 'sc_payment_details', 'sc_payment_details_example_1', 20, 2 );
function sc_payment_details_example_1( $html, $charge_response ) {
	// This is copied from the original output so that we can just add in our own details.
	$html = '<div class="sc-payment-details-wrap">' . "\n";
	$html .= '<p>' . __( 'Congratulations. Your payment went through!', 'stripe' ) . '</p>' . "\n";
	$html .= '<p>' . "\n";
	if ( ! empty( $charge_response->description ) ) {
		$html .= __( "The game should be downloaded automatically", 'stripe' ) . '<br/>' . "\n";
		// $html .= $charge_response->description . '<br/>' . "\n";
	}
	// if ( isset( $_GET['store_name'] ) && ! empty( $_GET['store_name'] ) ) {
	// 	$html .= 'From: ' . stripslashes( stripslashes( esc_html( $_GET['store_name'] ) ) ) . '<br/>' . "\n";
	// }
	$html .= '<br/>' . "\n";
	$html .= '<strong>' . __( 'Total Paid: ', 'stripe' ) . Stripe_Checkout_Misc::to_formatted_amount( $charge_response->amount, $charge_response->currency ) . ' ' . strtoupper( $charge_response->currency ) . '</strong>' . "\n";
	$html .= '</p>' . "\n";
	$html .= '<p>' . sprintf( __( 'Your transaction ID is: %s', 'stripe' ), $charge_response->id ) . '</p>' . "\n";
	// Our added details here.
	// Add the last four digits of the credit card they used plus the expiration date.
	$html .= '<p>Card: ****-****-****-' . $charge_response->source->last4 . '<br/>' . "\n";
	$html .= 'Expiration: ' . $charge_response->source->exp_month . '/' . $charge_response->source->exp_year . '</p>' . "\n";
	$html .= '</div>' . "\n";
	return $html;
}

