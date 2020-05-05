<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;


class CheckoutController extends Controller
{
     function __construct () {
       $options['secret_api_key']='xnd_development_P4qDfOss0OCpl8RtKrROHjaQYNCk9dN5lSfk+R1l9Wbe+rSiCwZ3jw==';
       $this->server_domain = 'https://api.xendit.co';
       $this->secret_api_key = $options['secret_api_key'];
     }
     function getBalance () {
         $curl = curl_init();
         $headers = array();
         $headers[] = 'Content-Type: application/json';
         $end_point = $this->server_domain.'/balance';
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
         curl_setopt($curl, CURLOPT_URL, $end_point);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         $response = curl_exec($curl);
         curl_close($curl);
         $responseObject = json_decode($response, true);
         return $responseObject;
     }
    public function login_check()
    {
    	return view('pages.login');
    }
    public function customer_registration(Request $request)
    {
    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['password'] = $request->password;
    	$data['mobile_number'] = $request->mobile_number;

    	$customer_id = DB::table('tbl_customer')
    				->insertGetId($data);

    			Session::put('customer_id',$customer_id);
    			Session::put('customer_name',$request->customer_name);
                Session::put('customer_email',$request->customer_email);
                Session::put('password',$request->password);
    			return Redirect('/');
    }
    public function checkout()
    {
    
        return view('pages.checkout');
    }
    public function save_shipping_details(Request $request)
    {
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_first_name'] = $request->shipping_first_name;
        $data['shipping_last_name'] = $request->shipping_last_name;
        $data['shipping_mobile_number'] = $request->shipping_mobile_number;
        $data['provinsi'] = $request->provinsi;
        $data['kota'] = $request->kota;
        $data['kecamatan'] = $request->kecamatan;

        $data['desa'] = $request->desa;
        $data['jalan'] = $request->jalan;

        $data['expedisi'] = $request->expedisi;

        $shipping_id = DB::table('tbl_shipping')
            ->insertGetId($data);
            Session::put('shipping_id',$shipping_id);
            return Redirect::to('/payment');
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

    }
    public function customer_login(Request $request)
    {
        $customer_email = $request->customer_email;
        $password = $request->password;
        $result = DB::table('tbl_customer')
                ->where('customer_email',$customer_email)
                ->where('password',$password)
                ->first();

                if ($result) {
                    Session::put('customer_id',$result->customer_id);
                    Session::put('customer_name',$result->customer_name);
                    Session::put('customer_email',$result->customer_email);
                    Session::put('password',$result->password);

                    return Redirect::to('/');
                } else {
                    return Redirect::to('/login-check');
                }
                // echo "<pre>";
                // print_r($result);
                // exit();
    }
    public function payment()
    {
        return view('pages.payment');
    }
    public function order_place(Request $request)
    {
        $payment_gateway = $request->payment_method;  
        $pdata = array();
        $pdata['payment_method'] = $payment_gateway;
        $pdata['payment_status'] = 'pending';
        $payment_id = DB::table('tbl_payment')
                ->insertGetId($pdata);
        $odata = array();
        $odata['customer_id'] = Session::get('customer_id');
        $odata['shipping_id'] = Session::get('shipping_id');
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::total();
        $odata['order_status'] = 'pending';
        $image = $request->file('img_payment');

        if($image) {
            $image_name = str::random(10);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if ($success) {
                $odata['img_payment'] = $image_url;

                    $order_id = DB::table('tbl_order')
            ->insertGetId($odata);
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // exit();
            }
        }
        

        $contents = Cart::content();
        $oddata = array();
        foreach ($contents as $v_content) 
        {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $v_content->id;
            $oddata['product_name'] = $v_content->name;
            $oddata['product_price'] = $v_content->price;
            $oddata['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')
                ->insert($oddata);    
        }
        if ($payment_gateway=='CASH') {
            Cart::destroy();
            return view('pages.handcash');
            
        } elseif ($payment_gateway=='OVO') {
            Cart::destroy();
            return view('pages.handcash');
            
        } elseif ($payment_gateway=='BRI') {
            Cart::destroy();
            return view('pages.handcash');
        } elseif ($payment_gateway=='BCA') {
            Cart::destroy();
            return view('pages.handcash');
        } else {
            echo "not selected";
        }
    }
    public function success_order($order_id)
    {
        DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->update(['order_status' => 'success']);
            Session::put('messegse','product Actived successfully!!');
            return Redirect::to('/manage-order');
    }
    public function pending_order($order_id)
    {
        DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->update(['order_status' => 1]);
            Session::put('messegse','product Actived successfully!!');
            return Redirect::to('/manage-order');
    }
    public function manage_order()
    {
        $all_order_info = DB::table('tbl_order')
                        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                        ->select('tbl_order.*','tbl_customer.customer_name')
                        ->get();
        $manage_order = view('admin.manage_order')
            ->with('all_order_info',$all_order_info);

        return view('admin_layout')
            ->with('admin.manage_order',$manage_order);
    }
    public function view_order($order_id)
    {
        
        $order_by_id = DB::table('tbl_order')
                        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
                        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
                        ->select('tbl_order.*','tbl_payment.*','tbl_order_details.*','tbl_shipping.*','tbl_customer.*')
                        ->where('tbl_order.order_id',$order_id)
                        ->get();
                        
        $view_order = view('admin.view_order')
            ->with('order_by_id',$order_by_id);

        return view('admin_layout')
            ->with('admin.view_order',$view_order);

    }
    public function customer_logout()
    {
        Session::flush();
        return Redirect::to('/');
    }

}
