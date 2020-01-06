<?php

/* 
 * Copyright (C) 2019 ChristmanMichael
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

function mcs_setup(){
    add_shortcode('mcs_pay_rent_form','mcs_pay_rent_form');
}
add_action( 'init', 'mcs_setup' );

/**********************************************************************
 *
 * Add Rent Payment form shordcode
 * 
 ***********************************************************************/
function mcs_pay_rent_form(){
    
    $error_message  = '<div class="mcs-error-msg">';
    $error_message .= '<span id="error_message"></span>';
    $error_message .= '</div><!--.mcs-error-msg-->';
    
    $transaction_amount  = '<div class="mcs-trans-amount">';
    $transaction_amount .= '<label for="formtransamount">RENT PRICE</label>';
    $transaction_amount .= '<input type="number" name="formtransamount" min="0.01" step="0.01">';
    $transaction_amount .= '</div><!--.mcs-trans-amount-->';
    
    $card_holder_name  = '<div class="mcs-card-holder">';
    $card_holder_name .= '<label for="formcardholder">'.__('Name on Card','rpm-custom-post-types').'</label>';
    $card_holder_name .= '<input type="text" name="formcardholder">';
    $card_holder_name .= '</div><!--.mcs-card-holder-->';
    
    $card_number  = '<div class="mcs-card-num">';
    $card_number .= '<label for="formcardnumber">'.__('Card Number','rpm-custom-post-types').'</label>';
    $card_number .= '<input type="text" name="formcardnumber" data-cayan="cardnumber">';
    $card_number .= '</div><!--.mcs-card-num-->';
    
    $card_cvv  = '<div class="mcs-card-cvv">';
    $card_cvv .= '<label for="formcvv">'.__('Card CVV','rpm-custom-post-types').'</label>';
    $card_cvv .= '<input type="text" size="4" name="formcvv" data-cayan="cvv">';
    $card_cvv .= '</div><!--.mcs-card-cvv-->';
    
    $card_expire_month  = '<div class="mcs-expire-month">';
    $card_expire_month .= '<label for="formexpiremonth">'.__('Expiration Month','rpm-custom-post-types').'</label>';
    $card_expire_month .= '<input type="text" size="2" name="formexpiremonth" data-cayan="expirationmonth" title="MM">';
    $card_expire_month .= '</div><!--.mcs-expire-month-->';
    
    $card_expire_year  = '<div class="mcs-expire-year">';
    $card_expire_year .= '<label for="formexpireyear">'.__('Expiration Year','rpm-custom-post-types').'</label>';
    $card_expire_year .= '<input type="text" size="2" name="formexpireyear" data-cayan="expirationyear" title="YY">';
    $card_expire_year .= '</div><!--.mcs-expire-year-->';
    
    $card_billing_address  = '<div class="mcs-billing-address">';
    $card_billing_address .= '<h2>'.__('Billing Address','rpm-custom-post-types').'</h2>';
    $card_billing_address .= '<div class="mcs-street-address">';
    $card_billing_address .= '<label for="formstreetaddress">'.__('Street Address','rpm-custom-post-types').'</label>';
    $card_billing_address .= '<input type="text" name="formstreetaddress">';
    $card_billing_address .= '<label for="formzipcode">'.__('Zip Code','rpm-custom-post-types').'</label>';
    $card_billing_address .= '<input type="text" name="formzipcode">';
    $card_billing_address .= '</div><!--.mcs-street-address-->';
    $card_billing_address .= '</div><!--.mcs-billing-address-->';
    
    $submit_button  = '<div class="mcs-submit">';
    $submit_button .= '<input type="hidden" name="paymentToken" value="">';
    $submit_button .= '<button type="button" id="submitPayment">'.__('Submit','rpm-custom-post-types').'</button>';
    $submit_button .= '</div><!--.mcs-submit-->';
       
    $output  = '<form method="POST" id="rentPaymentForm" class="mcs-payment-form">';
    $output .= $error_message;
    $output .= $transaction_amount;
    $output .= '<h2>'.__('Card Details','rpm-custom-post-types').'</h2>';
    $output .= $card_holder_name;
    $output .= $card_number;
    $output .= $card_cvv;
    $output .= $card_expire_month;
    $output .= $card_expire_year;
    $output .= $card_billing_address;
    $output .= $submit_button;
    $output .= '</form><!--#rentPaymentForm-->';
    
    return $output;
}


function isPost($server){
        
        return (strtoupper($server['REQUEST_METHOD']) == 'POST');
}
	
function requestSale($token, $amount){
        echo "REQUEST SALE HAS BEEN INVOKED!";
        global $referenceNumber, $responseMessage;
        $client = new SoapClient('https://ps1.merchantware.net/Merchantware/ws/retailTransaction/v4/credit.asmx?WSDL', array('trace' => true));
        $response = $client->SaleVault(
                array(
                        'merchantName'           => 'Test bzrezcom',
                        'merchantSiteId'         => 'YM1J7IQT',
                        'merchantKey'            => 'W3862-R4YA1-D01SV-JPP6U-31EVU',
                        'invoiceNumber'          => '123',
                        'amount'                 => $amount,
                        'vaultToken'             => $token,
                        'forceDuplicate'         => 'true',
                        'registerNumber'         => '123',
                        'merchantTransactionId'  => '1234'
                )
        );
        $result = $response->SaleVaultResult;
        $responseMessage = $result->ApprovalStatus;
        $amount = $result->Amount;
        $referenceNumber = $result->Token;
}
