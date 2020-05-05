<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
use App\Setting;

class SettingController extends Controller
{
	public function setting_data()
    {
        $all_setting_info = DB::table('tbl_setting')->get();
        return view('admin.setting',compact('all_setting_info'));
    }
    public function delete_setting($id)
    {
        DB::table('tbl_setting')
            ->where('id', $id)
            ->delete();
        alert()->success('Data Setting Dihapus','Berhasil');
        return back();
    }
    public function edit_setting($id)
    {
        $setting_info = DB::table('tbl_setting')
            ->where('id',$id)
            ->first();

        $setting_info = view('admin.edit_setting')
            ->with('setting_info',$setting_info);

        return view('admin_layout')
            ->with('admin.edit_setting',$setting_info);
        // return view('admin.edit_category');
    }
    public function update_setting(Request $request, $id)
    {
        $data = array();
        $data['title_admin'] = $request->title_admin;
        $data['facebook_link'] = $request->facebook_link;
        $data['email_link'] = $request->email_link;
        $data['twitter_link'] = $request->twitter_link;
        $data['whattapp'] = $request->whattapp;
        $data['whattapp_api'] = $request->whattapp_api;
        $data['rek_bri'] = $request->rek_bri;
        $data['rek_bca'] = $request->rek_bca;
        $data['ovo'] = $request->ovo;


        DB::table('tbl_setting')
            ->where('id',$id)
            ->update($data);

            Session::get('messdege','Category Update successfully');
            toastr()->success('Setting Berhasil DI ubah','Berhasil');            
            return back();
    }
}
