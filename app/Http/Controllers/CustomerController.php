<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

class CustomerController extends Controller
{
    public function customer()
    {
    	$all_customer_info = DB::table('tbl_customer')->get();
    	return view('admin.customer',compact('all_customer_info'));
    }
     public function delete_customer($customer_id)
    {
    	DB::table('tbl_customer')
            ->where('customer_id', $customer_id)
            ->delete();
        alert()->success('Data Customer Dihapus','Berhasil');
        return back();
    }
}
