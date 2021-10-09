<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\SupplierUpgrade;
use App\Models\Supplier;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Response;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;


class ApiSupplierProductController extends Controller
{
    public function view()
    {
        $products = Product::where('status',0)->with('productImage')->orderBy('id','desc')->get();
        return response()->json($products, 200);

    }
    public function view_details($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return response()->json($product,200);
    }

    public function categoryProduct()
    {
        $categories = Category::where('status',0)->orderBy('id','desc')->get();
        return response()->json($categories,200);
    }

    public function supplier()
    {
        $supplier = SupplierUpgrade::orderBy('id','desc')->get();
        return response()->json($supplier,200);
    }
    
     public function order(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'final_quantity' => 'required',
            'payment' => 'required',
            'send_account_number' => 'required',
            'transactionid' => 'required',
            ];

            $input     = $request->only('name','email','phone','address','final_quantity','payment','send_account_number','transactionid');
            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->messages()]);
            }

            $track_no = 'DT'.'-'.date("Y").date("m").rand(100,999999);

            $order = Order::create([
                'email' => $request->email,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'add_require' => $request->add_require,
                'country' => $request->country,
                'state' => $request->state,
                'policeStation' => $request->policeStation,
                'payment' => $request->payment,
                'send_account_number' => $request->send_account_number,
                'transactionid' => $request->transactionid,
                'product_name' => $request->product_name,
                'product_id' => $request->product_id,
                'supplier_id' => $request->supplier_id,
                'track_no' => $track_no,
                'final_quantity' => $request->final_quantity,
                'final_checkout_price' => $request->final_checkout_price,
                'confirm_total_price' => $request->confirm_total_price,
                'created_at' => Carbon::now(),
            ]);
            
            $supplierinfo = Supplier::where('id',$request->supplier_id)->exists();
            if ($supplierinfo == 1) {
                $supplierinfo = Supplier::where('id',$request->supplier_id)->first();
                $supplier_email = $supplierinfo->email;
            } else {
                $supplier_email = 'uithelps@gmail.com';
            }

            \Mail::send('email.orderInfo', array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'subject' => 'Order Information',
                'user_query' => 'Congratulation! Your order purchased has been successfully.',
            ), function($message) use ($request,$supplier_email){
                $message->from('uitdeveloper2021@gmail.com');
                $message->to(['uitdeveloper2021@gmail.com',$request->email,$supplier_email])->subject('Order Information');
            });

            if($order)
            {
                $d=array();
                $d=['status'=>'Order Purchase  Successfully '];
                return response()->json($d, 201);
            }
            else
            {
                $d=array();
                $d=['status'=>'Order Failed'];
                return response()->json($d, 201);
            }

    }
    public function sendContact(Request $request)
    {
        $rules = [
            'name' => 'required',
            'fromEmail' => 'required',
            'phone' => 'required',
            'message' => 'required',
            ];

            $input     = $request->only('name','fromEmail','phone','message');
            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->messages()]);
            }

        \Mail::send('email.contactinfo', array(
            'name' => $request->get('name'),
            'toEmail' => $request->get('toEmail'),
            'fromEmail' => $request->get('fromEmail'),
            'phone' => $request->get('phone'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->fromEmail);
            $message->to([$request->toEmail])->subject('Customer Message');
        });
        $d=array();
        $d=['status'=>'Message Sent  Successfully '];
        return response()->json($d, 201);
    }
    public function productImage($id)
    {        
        $productImage = ProductDetails::where('product_id',$id)->first();
        return response()->json($productImage,200);
    }


}