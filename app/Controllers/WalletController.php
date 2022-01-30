<?php

namespace App\Controllers;
use App\Models\WalletModel;

class WalletController extends BaseController
{
    public function index()
    {
        return view ('client/checkout');
    }

    public function topup()
    {
        $modelWallet = new WalletModel();

        $response = array(
            'status' => 0,
            'message' => '',
            'newBal' => 0
        );
        if ($_POST['amount'] < 100) {
            $response['status'] = 0;
            $response['message'] = "Amount must be at least Ksh. 100";
        } else if ($_POST['amount'] > 50000) {
            $response['status'] = 0;
            $response['message'] = "Amount cannot exceed Ksh. 50000";
        } else {
            $modelWallet->update($modelWallet->getWalletAtUser($_POST['uid'])['wallet_id'], [
                'amount_available' => $_POST['newBalance']
            ]);

            session()->set(['wallet' => $_POST['newBalance']]);

            $response=[
                'status'=>true,
                'message'=>'Top up successful.',
                'newBal' => $_POST['newBalance'],
                'url'=>'/summary'
            ];
        }
        echo json_encode($response);
    }

    public function wallet(){
        return view('client/ewallet');
    }

}

