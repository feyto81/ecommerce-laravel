<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
use App\Order;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_login');
        $this->validate($request, [
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            'confirmation' => 'required|same:password',
        ]);
    }
    public function dashboard(Request $request)
    {
        // $Order = Order::count();
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();
                
            if ($result) {
                Session::put('admin_name',$result->admin_name);
                Session::put('admin_id',$result->admin_id);
                toastr()->success('Selamat Datang Di Dewangga Store Panel','Berhasil');
                return Redirect::to('/dashboard');
            } else {
                toastr()->error('Harap Cek Email Dan Password Anda','Gagal');
                return Redirect::to('/admin');
            }
    }
    public function admin_data()
    {
        $all_admin_info = DB::table('tbl_admin')->get();
        return view('admin.admin',compact('all_admin_info'));
    }
    public function delete_admin($admin_id)
    {
        DB::table('tbl_admin')
            ->where('admin_id', $admin_id)
            ->delete();
        alert()->success('Data Admin Dihapus','Berhasil');
        return back();
    }
    public function add_admin()
    {
        return view('admin.add_admin');
    }
    public function save_admin(Request $request)
    {
        $data = array();
        $data['admin_email'] = $request->admin_email;
        $data['admin_password'] = md5($request->admin_password);
        $data['admin_name'] = $request->admin_name;
        $data['admin_phone'] = $request->admin_phone;

        $admin_id = DB::table('tbl_admin')
                    ->insertGetId($data);
         alert()->success('Admin Successfully Added','Berhasil');
         return back();

    }
    public function subcriber_data()
    {
        $all_subcriber_info = DB::table('tbl_subcriber')->get();
        return view('admin.subcriber',compact('all_subcriber_info'));
    }
    public function delete_subcriber($id)
    {
        DB::table('tbl_subcriber')
            ->where('id', $id)
            ->delete();
        alert()->success('Data Subcriber Dihapus','Berhasil');
        return back();
    }
    public function edit_subcriber($id)
    {
        $subcriber_info = DB::table('tbl_subcriber')
            ->where('id',$id)
            ->first();

        $subcriber_info = view('admin.edit_subcriber')
            ->with('subcriber_info',$subcriber_info);

        return view('admin_layout')
            ->with('admin.edit_subcriber',$subcriber_info);
        // return view('admin.edit_category');
    }
    public function update_subcriber(Request $request, $id)
    {
        $data = array();
        $data['email'] = $request->email;
        DB::table('tbl_subcriber')
            ->where('id',$id)
            ->update($data);

            Session::get('messdege','Category Update successfully');
            toastr()->success('Kategory Berhasil Di Ubah','Berhasil');            
            return Redirect::to('/subcriber-data');
    }
    public function edit_setting($setting_id)
    {
        $setting_info = DB::table('tbl_setting')
            ->where('setting_id',$setting_id)
            ->first();

        $setting_info = view('admin.edit_setting')
            ->with('setting_info',$setting_info);

        return view('admin_layout')
            ->with('admin.edit_setting',$setting_info);
    }
    public function update_setting(Request $request,$id)
    {
        $row = array();
        $row['title_admin'] = $request->title_admin;
        

        DB::table('tbl_setting')
            ->where('id',$id)
            ->update($row);
         Session::get('messdege','Category Update successfully');
            toastr()->success('Kategory Berhasil Di Ubah','Berhasil');            
            return Redirect::to('/setting');
    }

}
