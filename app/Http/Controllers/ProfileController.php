<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Hash;
use md5;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function orders(Request $request)
    {
    	$customer_id = Session::get('customer_id');
    	$orders = DB::table('tbl_order')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->where('tbl_order.customer_id',$customer_id)
                        ->get();
         // echo "<pre>";
         // echo $orders;
         // echo "</pre>";
    	return view('pages.profile.order',compact('orders'));
    }
    public function password($id)
    {
    	$user = Session::get('customer_id');
        $user = Session::get('password');
    	return view('pages.profile.updatePassword',compact($user));
    }
    public function updatepassword(Request $request)
    {
        $user = Session::get('customer_id');
        $user = Session::get('password');
        $user->fill($request->all());
        $user->save();
        return redirect()->back();
        // $oldPassword = $request->oldPassword;
        // $newPassword = $request->newPassword;
        // $user = md5($request->password);
        // if ($request->get('password')!='') {
        //     $user->password = md5($request->get('password'));
        // }
        
        // $aks = $user->save();
        
        
    }
}
