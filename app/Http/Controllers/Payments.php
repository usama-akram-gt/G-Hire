<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment\Cashier;
use DB;

class Payments extends Controller
{
    //Make Payment
    public function makePayment(Request $request,$card_name,$card_email,$card_address,$card_number,$card_cvv,$card_month,$card_year,$dev_id,$project_id,$token,$amount){
    	//dd($token);

		$phoneNumber = '555-555-5555';
		$addrLine1 = '123 Test St';
	    $city = 'Columbus';
	    $state = 'OH';
	    $zipCode = '43123';
	    $country = 'USA';
    
        $info = [
            "sellerId" => env('2CHECKOUT_SELLER_ID'),
            "merchantOrderId" => rand(1000,100000),
            "token" => $token,
            "currency" => 'USD',
            "total" => $amount,
            'billingAddr' => array(
                "name" => $card_name,
                "addrLine1" => $addrLine1,
                "city" => $city,
                "state" => $state,
                "zipCode" => $zipCode,
                "country" => $country,
                "email" => $card_email,
                "phoneNumber" => $phoneNumber
            ),
            'shippingAddr' => array(
                "name" => $card_name,
                "addrLine1" => $addrLine1,
                "city" => $city,
                "state" => $state,
                "zipCode" => $zipCode,
                "country" => $country,
                "email" => $card_email,
                "phoneNumber" => $phoneNumber
            )
        ];

        $res = Cashier::pay($info);

        if(!$res['success']){
            return response(['message'=>$res],400);
            //return response(['message'=>$res['message']],400);
        }

        $product_owner_id = DB::table('projects')->where('id','=',$project_id)->get('userid_fk');
        DB::table('payments')->insert([
            [ 'card_name' => $card_name,
            'card_email' => $card_email,
            'card_num' => $card_number,
            'card_cvv' => $card_cvv,
            'card_month' => $card_month,
            'card_year' => $card_year,
            'paid_amount' => $amount,
            'payment_status' => 'Paid',
            'prodOid_fk' => $product_owner_id[0]->userid_fk,
            'dev_id' => $dev_id,
            'proj_id' => $project_id]
        ]);
        DB::table('ongoingprojects')->insert([
            [ 'status' => 'OnGoing',
            'project_id' => $project_id,
            'dev_id' => $dev_id,
            'prodO_id' => $product_owner_id[0]->userid_fk]
        ]);

        return ['message'=>'Paid Successfully'];
    }
}
