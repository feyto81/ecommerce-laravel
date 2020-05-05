<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.add_category');
    }
    public function all_category()
    {
        $this->AdminAuthCheck();
        $all_category_info = DB::table('tbl_category')->get();
        $manage_categroy = view('admin.all_category')
            ->with('all_category_info',$all_category_info);

        return view('admin_layout')
            ->with('admin.all_category',$manage_categroy);
        // return view('admin.all_category');
    }
    public function save_category(Request $request)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        DB::table('tbl_category')->insert($data);
        Session::put('messsege','Category added successfully!!');
        toastr()->success('Category Berhasil Ditambahkan','Berhasil');
        return Redirect::to('/add-category');
        // echo "<pre>";
        //     print_r($data);
        // echo "</pre>";
    }
    public function unactive_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 0]);
            Session::put('medssesge','Category unactive successfully!!');
            toastr()->success('Kategory Di Diunaktifkan','Berhasil');
            return Redirect::to('/all-category');
    }
    public function active_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status' => 1]);
            Session::put('messsege','Category Actived successfully!!');
            toastr()->success('Kategory Di Diaktifkan','Berhasil');            
            return Redirect::to('/all-category');
    }
    public function edit_category($category_id)
    {
        $category_info = DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->first();

        $category_info = view('admin.edit_category')
            ->with('category_info',$category_info);

        return view('admin_layout')
            ->with('admin.edit_category',$category_info);
        // return view('admin.edit_category');
    }
    public function update_category(Request $request, $category_id)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update($data);

            Session::get('messdege','Category Update successfully');
            toastr()->success('Kategory Berhasil Di Ubah','Berhasil');            
            return Redirect::to('/all-category');
    }
    public function delete_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->delete();

        Session::get('maessege','Category Delete successfully');
        toastr()->success('Kategory Berhasil Di Hapus','Berhasil');
        return Redirect::to('/all-category');
    }
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
