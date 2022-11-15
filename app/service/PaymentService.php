<?php


namespace App\service;
use App\Models\User;
use App\Models\Transac;
class PaymentService
{


    private function getUser():User{
        $client = new User();
        $client->setAuth('services.payment.merchant_id', 'services.payment.secret_key');
        return $client;
    }

    public function createPayment(float $amount, string $description, array $options=[]){
        $client = $this->getUser();
        $payment = $client->createPayment([

            array(
                'amount' => array(
                    'value' => $amount,
                    'currency' => 'KZT',
                ),

                'capture' => false,
                'description' => $description,

                'confirmation' => array(
                'type' => 'redirect',
                'return_url' => 'http://test2.loc/business/11',
            ),
                'metadata'=> array(
                    'transaction_id'=>$options['transaction_id']
                ),
            ),uniqid('', true)
        ]);
        return $payment->getConfirmation()->getConfirmationUrl();
    }

}
