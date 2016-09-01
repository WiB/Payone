/**
 * Copyright (c) 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

'use strict';

var $ = require('jquery');
var paymentMethod = require('./payment-method');

$(document).ready(function() {
    paymentMethod.init({
        formSelector: '[name="paymentForm"]',
        paymentMethodSelector: 'input[type="radio"][name="paymentForm[paymentSelection]"]',
        currentPaymentMethodSelector: 'input[type="radio"][name="paymentForm[paymentSelection]"]:checked',
        cardholderInput: '#paymentForm_Payone_credit_card_cardholder',
        cardpanInput: '#Payone_credit_card_cardpan',
        cardtypeInput: '#paymentForm_payoneCreditCard_cardtype',
        cardexpiremonthInput: '#paymentForm_payoneCreditCard_cardexpiredate_month',
        cardexpireyearInput: '#paymentForm_payoneCreditCard_cardexpiredate_year',
        cardcvc2Input: '#Payone_credit_card_cardcvc2',
        clientApiConfigInput: '#paymentForm_payoneCreditCard_payone_client_api_config',
        pseudocardpanInput: '#paymentForm_payoneCreditCard_pseudocardpan',
        languageInput: '#Payone_credit_card_payone_client_lang_code'
    });
});