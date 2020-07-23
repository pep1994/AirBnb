<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsor;

use DB;

class PaymentsController extends Controller
{
  // FUNZIONE DI PAGAMENTO
  public function process(Request $request) {
    $this->checkSponsor();
    $payload = $request-> payload;
    $sponsor_type = $request -> val;
    $id = $request -> id;
    $now = date('Y-m-d H:i:s');
    $addtime;
    $expire_sponsor;

    $nonce = $payload['nonce'];

    if ($sponsor_type == 1) {
      $price = 2.99;
      $addtime = strtotime('+24 hours');
      $expire_sponsor = date('Y-m-d H:i:s', $addtime);
    } elseif ($sponsor_type == 2) {
      $price = 5.99;
      $addtime = strtotime('+72 hours');
      $expire_sponsor = date('Y-m-d H:i:s', $addtime);
    } elseif ($sponsor_type == 3) {
      $price = 9.99;
      $addtime = strtotime('+144 hours');
      $expire_sponsor = date('Y-m-d H:i:s', $addtime);
    }


    $status = \Braintree\Transaction::sale([
                                   'amount' => $price,
                                  	'paymentMethodNonce' => $nonce,
                                  	'options' => [
                                   'submitForSettlement' => True
	                                   ]
    ]);
    $sponsor = Sponsor::findOrFail($sponsor_type);
    $apartment = Apartment::findOrFail($id);
    DB::table('apartment_sponsor')->insert([
      'created_at' => $now,
      'apartment_id' => $id,
      'sponsor_id' => $sponsor_type,
      'expire_data' => $expire_sponsor
    ]);
    return response()->json($status);

  }

  // FUNZIONI DA RICHIAMARE
  public function checkSponsor() {
    DB::table('apartment_sponsor')->where('expire_data', '<=', date('Y-m-d H:i:s'))->delete();
  }
}
