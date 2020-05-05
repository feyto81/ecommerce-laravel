<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $all_published_product = DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->limit(10)
                        ->where('tbl_products.publication_status',1)
                        ->paginate(6);
                        
        $manage_published_product = view('pages.home_content')
            ->with('all_published_product',$all_published_product);

        return view('layout')
            ->with('pages.home_content',$manage_published_product);

        //return view('pages.home_content');
    }
    public function show_product_by_category($category_id)
    {
        $product_by_category = DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        
                        ->select('tbl_products.*','tbl_category.category_name')
                        ->limit(18)
                        ->where('tbl_category.category_id',$category_id)
                        ->where('tbl_products.publication_status',1)
                        ->get();
        $product_by_details = DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->limit(18)
                        // ->where('tbl_products.product_id',$product_id)
                        ->where('tbl_products.publication_status',1)
                        ->first();
        $id_ = $category_id;
        $manage_product_by_category = view('pages.category_by_products',compact('product_by_category','product_by_details','id_'));


        return view('layout')
            ->with('pages.category_by_products',$manage_product_by_category);
    }
    public function show_product_by_manufacture($manufacture_id)
    {
        $id_ = $manufacture_id;
        $product_by_manufacture = DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->limit(18)
                        ->where('tbl_manufacture.manufacture_id',$manufacture_id)
                        ->where('tbl_products.publication_status',1)
                        ->get();
        $manage_product_by_manufacture = view('pages.manufacture_by_products',compact('product_by_manufacture','id_'));

        return view('layout')
            ->with('pages.manufacture_by_products',$manage_product_by_manufacture);
    }
    public function product_details_by_id($product_id)
    {
        $product_by_details = DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->limit(18)
                        ->where('tbl_products.product_id',$product_id)
                        ->where('tbl_products.publication_status',1)
                        ->first();
        $manage_product_by_details = view('pages.product_details')
            ->with('product_by_details',$product_by_details);

        return view('layout')
            ->with('pages.product_details',$manage_product_by_details);
    }
    public function contact_us()
    {
        return view('pages.contact-us');
    }
    public function save_contact(Request $request)
    {
        $data = array();
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        DB::table('tbl_contact')->insert($data);
        toastr()->success('Berhasil Di Kirim','Berhasil');
        return back();
        // echo "<pre>";
        //     print_r($data);
        // echo "</pre>";
    }
    public function save_subcriber(Request $request)
    {
        $data = array();
        $data['id'] = $request->id;
        $data['email'] = $request->email;
        alert()->success('Berhasil Dikirim','Berhasil');
        DB::table('tbl_subcriber')->insert($data);
        
        return back();
        
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
