<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;

class ContactController extends Controller
{
    public function contactscustomer()
    {
    	$all_contact_info = DB::table('tbl_contact')->get();
    	return view('admin.contact',compact('all_contact_info'));
    }
    public function delete_contact($id)
    {
    	DB::table('tbl_contact')
            ->where('id', $id)
            ->delete();
        alert()->success('Data Services Dihapus','Berhasil');
        return back();
    }
}
