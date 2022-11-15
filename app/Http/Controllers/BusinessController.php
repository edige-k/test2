<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Transac;
use App\Models\User;
use App\service\PaymentService;
use Illuminate\Support\Facades\Http;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Auth;
class BusinessController extends Controller
{
    public function index()
    {

        $roles = DB::table('roles')->where('id', '=', 3)->get();
        return view('business.index',compact('roles'));
    }
      public function create(){
        $transactions = Transac::all();
             return view('business.topup',compact('transactions'));
    }
    public function store(Request $request, PaymentService $service){
        $reference_id = Random::generate(6, '0-9');
        $response = Http::accept('application/json')->post('https://api.tarlanpayments.kz/invoice/create',
        [
            "merchant_id" => 1,
            "amount" => $request->amount,
            "description" => "Top up balance",
            "back_url" => "http://test2.loc/",
            "request_url" => "http://test2.loc/business/topup/11",
            "reference_id" => $reference_id,
            "is_test" => true,
            "secret_key" => bcrypt($reference_id.'123456' )
        ])->json();
//        dd($response);
       if($response['success']) {
           return redirect($response['data']['redirect_url']);
       }
        $validated = $request->validate([
            'amount' => 'required',
        ]);
        $amount = (float)$request->input('amount');
        $description=(string)$request->input('description');


        $transaction =  Transac::create([
            'amount' => $request->amount,
            'description' => $description,

        ]);

        if($transaction){
          $link =  $service->createPayment($amount,$description,[
                'transaction_id'=>$transaction->id,
            ]);
        }

//        return redirect()->away($link);
        dd($link);
//        return to_route('business.topup')->with('success','Role created successfully');
    }

//    public function callback(Request $request,PaymentService $service){
//        $source = file_get_contents('php::/input');
//        $requestBody = json_decode($source,associative: true);
//        $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
//            ? new NotificationSucceeded($requestBody)
//            : new NotificationWaitingForCapture($requestBody);
//        $payment = $notification->getObject();
//        if((bool)$payment->status ===true){
//            $metadata = (object)$payment->metadata;
//            if(isset($metadata->transaction_id)){
//                 $transactionId = (int)$metadata->transaction_id;
//                 $transaction = Transac::find($transactionId);
//                 $transaction ->status =PaymentStatusEnum::CONFIRMED;
//                 $transaction->save();
//                 if(cache()->has('amount')){
//                     cache()->forever('balance',(float)cache()->get('balance')+(float)$payment->amount->value);
//                 }else{
//                     cache()->forever('balance',(float)$payment->amount->value);
//                 }
//            }
//
//        }
//    }


    public function send_bonus(){
        $users = User::whereNotIn('name', ['admin'])->where('role_id',[2])->get();
        return view('business.user_bonus',compact('users'));
//        return response()->json($users);
    }

    public function get_send_bonus($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('business.send_bonus',compact('user'));

    }
    public function post_send_bonus(Request $request, $id){
        $validate = $request->validate([
            'bonus'=>'required'
        ]);

        $check = (Auth::user()->check);

        $user = intval(DB::table('users')->where('id',$id)->pluck('balance')->first());
        $bonus= (float)($request->bonus);
        if($bonus>10) {
            if ($bonus > 0) {
                $data = array();
                $data['balance'] = (float)$user + $bonus;
                $user = DB::table('users')->where('id', $id)->update($data);
                $data2 = array();
                $data2['check'] = $check - $bonus;
                DB::table('users')->where('id', Auth::user()->id)->update($data2);
                $transacs = new Transac();
                $transacs->amount = $bonus;
                $transacs->description = 'bonus for client';
                $transacs->save();
            }
            return back()->with('success','Bonus sended successfully');
        }
        else{
            return back()->with('error','Bonus must be great than 10 tenge');

        }

    }
}
