<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Payment;

use App\User;
use App\Wallet;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            //dd($e);
            return redirect()->back()->with('error', 'The token has expired. Please refresh the page and try again.');
        }
    }
    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

       // return $paymentDetails['data']['reference'];

        $payment = new Payment();
        $payment->payment_id = $paymentDetails['data']['id'];
        $payment->gateway_response = $paymentDetails['data']['gateway_response'];
        $payment->ip_address = $paymentDetails['data']['ip_address'];
        $payment->channel = $paymentDetails['data']['channel'];
        $payment->amount = $paymentDetails['data']['amount'];
        $payment->reference = $paymentDetails['data']['reference'];
        $payment->payment_type = $paymentDetails['data']['domain'];
        $payment->item = $paymentDetails['data']['metadata']['user_id'];
        $payment->user_id = Auth::user()->id;
        $payment->save();
        if($paymentDetails['data']['metadata']['type'] == 'verification'){

            $user = User::find($paymentDetails['data']['metadata']['user_id']);
            $user->verified = 1;
            $user->save();
            $total = 10000;
            //credit first referral
            if($user->referred_by_1 != null){
                $referral1 = User::find($user->referred_by_1);
                if($referral1){
                   $wallet1 = Wallet::where('user_id', $referral1->id)->first();
                    $wallet1->referral_bonus = $wallet1->referral_bonus + 5000;
                    $wallet1->save();
                    $total = $total - 5000;
                }
            }
            //credit second referral
            if($user->referred_by_2 != null){
                $referral2 = User::find($user->referred_by_2);
                if($referral2){
                    $wallet1 = Wallet::where('user_id', $referral2->id)->first();
                    $wallet1->referral_bonus = $wallet1->referral_bonus + 3000;
                    $wallet1->save();
                    $total = $total - 3000;
                }
            }
            //admin AYO
            $wallet1 = Wallet::where('user_id', 7)->first();
            $wallet1->referral_bonus = $wallet1->referral_bonus + 1000;
            $wallet1->save();
            $total = $total - 1000;

            //company gets balance
            $companyWallet = Wallet::find(1);
            $companyWallet->referral_bonus = $companyWallet->referral_bonus + $total;
            $companyWallet->save();

            $msg='Profile verified successfully.';
            return redirect()->to('/home')->with('success', $msg);
        }elseif($paymentDetails['data']['metadata']['type'] == 'cart'){

            $carts = Cart::where('user_id', $paymentDetails['data']['metadata']['user_id'])->update(['status'=> 'completed']);

            $msg='Payment completed!';
            return redirect()->to('/cart')->with('success', $msg);
        }else {
            return (new PostsController)->printLawWORD($paymentDetails['data']['metadata']['law_id']);
        }



    }

    public function marketResources(){
        $user = Auth::user();
        return view('payouts.resources')->with(['user' => $user]);
    }
}