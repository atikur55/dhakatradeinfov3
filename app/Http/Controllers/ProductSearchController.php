<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class ProductSearchController extends Controller
{
    public function searchResponse(Request $request)
    {
        $query = $request->get('term','');
        $countries=\DB::table('products');
        if($request->type=='product_name'){
            $countries->where('product_name','LIKE','%'.$query.'%');
        }
        $countries=$countries->get();
        $data=array();
        foreach ($countries as $country) {
                $data[]=array('product_name'=>$country->product_name);
        }
        if(count($data) != 0)
            return $data;
        else
            return ['product_name'=>'No Result Found','short_description'=>'No Result Found'];
    }
    public function search(Request $request)
    {
        $productName = $request->product_name;

        $products = Product::where('product_name', 'LIKE',"%$request->product_name%")->get();
        $categories = Category::where('status',0)->orderBy('category_name')->get();

        return view('frontend.searchProduct',compact('products','categories','productName'));

    }
    public function lowtohigh($dataID)
    {
        // $products = DB::table('products')
        //             ->where('product_name', 'LIKE',"%$dataID%")
        //             ->addSelect(DB::raw('price AS current_price'))
        //             ->orderBy('current_price','asc')->get()->dd();
        $products = Product::where('product_name', 'LIKE',"%$dataID%")->orderBy('price','asc')->get();
        return response()->json($products,200);
    }
    public function hightolow($dataID)
    {
        $products = Product::where('product_name', 'LIKE',"%$dataID%")->orderBy('price','desc')->get();
        return response()->json($products,200);
    }
    public function minMaxPrice(Request $request)
    {
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;
        $products = Product::where('product_name', 'LIKE',"%$request->searchName%")->whereBetween('price',[$minPrice,$maxPrice])->orderBy('price','asc')->get();
        return response()->json($products,200);
    }
    public function megamenuData($id)
    {
        $businessId = BusinessType::where('id',$id)->first();
        $categories = Category::where('business_id',$businessId->id)->get();

        $d = array();
        foreach($categories as $category)
        {
            $subcategories = SubCategory::where('category_id',$category->id)->get();
            array_push($d,$subcategories);
        }


        // dd($mainData);

        return response()->json([
            'categories' => $categories,
            'mainData' => $d,
        ]);
    }

}
