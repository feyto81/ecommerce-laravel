<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Session;
session_start();
use App\Product;

class ProductController extends Controller
{
	
	public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    public function index()
    {
    	 $this->AdminAuthCheck();
    	return view('admin.add_product');
    }
    public function cari(Request $request)
      {
        // menangkap data pencarian

        $query = $request->q;
        $product = DB::table('tbl_products')
        ->where('product_name','like',"%".$query."%")
        ->orwhere('product_name','like',"%".$query."%");
        $all_published_product = DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->limit(10)
                        ->where('tbl_products.publication_status',1)
                        ->where('product_name','like',"%".$query."%")
                        ->orwhere('product_id','like',"%".$query."%")
                        ->get();
     
            // mengambil data dari table pegawai sesuai pencarian data
        
     
            // mengirim data pegawai ke view index
        return view('pages.search_result',compact('product','all_published_product','query'));
     
      }
    public function all_product()
    {
    	$this->AdminAuthCheck();
        $all_product_info = DB::table('tbl_products')
        				->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
        				->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
        				->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
        				->get();
        $manage_product = view('admin.all_product')
            ->with('all_product_info',$all_product_info);

        return view('admin_layout')
            ->with('admin.all_product',$manage_product);
        // return view('admin.all_category');
    }
    public function save_product(Request $request)
    {
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['category_id'] = $request->category_id;
    	$data['manufacture_id'] = $request->manufacture_id;
    	$data['product_short_description'] = $request->product_short_description;
    	$data['product_long_description'] = $request->product_long_description;
    	$data['product_price'] = $request->product_price;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$data['publication_status'] = $request->publication_status;
    	$image = $request->file('product_image');

    	if($image) {
    		$image_name = str::random(10);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['product_image'] = $image_url;

    				DB::table('tbl_products')->insert($data);
    				Session::put('messe]age','Product Added Successfully');
                    toastr()->success('Product Ditambahkan','Berhasil');
    				return Redirect::to('/add-product');
    			// echo "<pre>";
    			// print_r($data);
    			// echo "</pre>";
    			// exit();
    		}
    	}
    	$data['product_image'] = '';
    			DB::table('tbl_products')->insert($data);
				Session::put('messege','Product Added Successfully without image');
				return Redirect::to('/add-product');
    }
    public function unactive_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 0]);
            Session::put('msessege','product unactive successfully!!');
            toastr()->success('Product unactive Successfully','Berhasil');
            return Redirect::to('/all-product');
    }
    public function active_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 1]);
            Session::put('messegse','product Actived successfully!!');
            toastr()->success('Product Actived Successfully','Berhasil');
            return Redirect::to('/all-product');
    }
    public function delete_product($product_id)
    {
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->delete();

        Session::get('messeage','product Delete successfully');
        toastr()->success('Product Berhasil DiHapus','Berhasil');        
        return Redirect::to('/all-product');
    }
}
