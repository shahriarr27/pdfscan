<?php

namespace App\Http\Controllers\backend;

use App\Mail\NewOrderMail;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NewOrderCustomerEmail;
use Exception;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function payment(Request $request) {
      $customer = Customer::create([
        'first_name' => $request->fname,
        'last_name' => $request->lname,
        'company' => $request->company,
        'email' => $request->email,
        'address' => $request->address,
        'phone' => $request->phone,
        'vat' => $request->fname,
      ]);

      $order = Order::create([
        'customer_id' => $customer->id,
        'price' => app_setting('product_price'),
        'payment' => 'paypal',
        'status' => 'pending'
      ]);

      try{
        $details = ['customer' => $customer, 'order' => $order];
        Mail::to(app_setting('admin_receiver_email'))->send(new NewOrderMail($details));
        Mail::to($customer->email)->send(new NewOrderCustomerEmail($details));
      } catch(Exception $e){

      }
      return response()->json([
        'success' => true,
        'message' => 'Order placed successfully'
      ]);
    }

}
