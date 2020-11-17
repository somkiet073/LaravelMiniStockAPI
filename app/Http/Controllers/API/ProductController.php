<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\APIBaseController as APIBaseController;
use Illuminate\Http\Request;

// Load Model
use App\Models\API\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = DB::table('products')
                ->join('categories','products.category_id', '=', 'categories.id')
                ->select('products.id','products.product_name','products.product_detail',
                        'products.product_price','categories.category_name')
                ->get();
        // $product = Product::all();
        // dd($product);
        return $this->sendResponse($product->toArray(), "Product retrived successfully.");
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
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_detail' => 'required',
            'product_price' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        } else {
            $product_data = array(
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_price' => $request->product_price,
                'category_id' => $request->category_id,
                'created_at' => NOW()
            );

            $products = Product::create($product_data);
            return $this->sendResponse($products->toArray(), "Product create successfully.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')
        ->join('categories','products.category_id', '=', 'categories.id')
        ->select('products.id','products.product_name','products.product_detail',
                'products.product_price','categories.category_name')
        ->where('products.id',"=",$id)
        ->get();
        // $product = Product::all();
        // dd($product);
        return $this->sendResponse($product->toArray(), "Product retrived successfully.");
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
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_detail' => 'required',
            'product_price' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        } else {
            $product_data = array(
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_price' => $request->product_price,
                'category_id' => $request->category_id,
                'updated_at' => NOW()
            );

            $products = Product::where('id', $id)->update($product_data);
            return $this->sendResponse($products, "Product update successfully.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::where('id', $id)->delete();
        return $this->sendResponse($products, "Product delete successfully.");
    }
}
