<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use Conekta\Conekta as Conekta;
use Conekta\Customer;

class PaymentController extends Controller {

    public function pay() {
        $conekta_conf = \Config::get('conekta');

        Conekta::setApiKey($conekta_conf['apikey']);

        try {
            Customer::create(
                [
                    'name' => 'Fulanito Perez',
                    'email' => 'paulsoberanes@gmail.com',
                    'phone' => '52181818181',
                    'payment_sources' => [
                        [
                            'type' => 'card',
                            'token_id' => 'tok_test_visa_4242',
                        ]
                    ] //payment_sources
                ] //customer
            );
        } catch (\Conekta\ProcessingError $error) {
            echo $error->getMessage();
        } catch (\Conekta\ParameterValidationError $error) {
            echo $error->getMessage();
        } catch (\Conekta\Handler $error) {
            echo $error->getMessage();
        }
    }

}
