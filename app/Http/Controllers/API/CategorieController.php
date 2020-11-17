<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\APIBaseController as APIBaseController;
use Illuminate\Http\Request;

// Load Model
use App\Models\API\Categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategorieController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->response_data(null);
        // var_dump($category->toArray()); 
        return $this->sendResponse($category, "Category retrived successfully.");
    }

    private function response_data($id = null)
    {
        $category = Categorie::all();
        if(isset($id)){
            $category = Categorie::where('id', $id)->get();
        }

        $result = array();
        foreach ($category->toArray() as $key => $value) {
            $arrProduct = $this->get_product($value['id']);
            if (count($arrProduct)<1){
                $arrProduct = array();
            }
            $set_data = array (
                "id" => $value['id'],
                "category_name" => $value['category_name'],
                "product" => $arrProduct,
                "created_at" => $value['created_at'],
                "updated_at" => $value['updated_at']
            );
            array_push($result,$set_data);
        }

        return $result;
    }

    private function get_product($pID){
        $product = DB::table('products')
        ->select('products.id','products.product_name','products.product_detail',
                'products.product_price')
        ->where('products.category_id',"=",$pID)
        ->get();
        return $product->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        } else {
            $category_data = array(
                'category_name' => $request->category_name,
                'created_at' => NOW()
            );

            $category = Categorie::create($category_data);
            return $this->sendResponse($category->toArray(), "category create successfully.");
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
        $category = $this->response_data($id);
        return $this->sendResponse($category, "Category update successfully.");
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
            'category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        } else {
            $category_data = array(
                'category_name' => $request->category_name,
                'created_at' => NOW()
            );

            $category = Categorie::where('id', $id)->update($category_data);
            return $this->sendResponse($category, "Category update successfully.");
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
        $category = Categorie::where('id', $id)->delete();
        return $this->sendResponse($category, "Category delete successfully.");
    }
}
