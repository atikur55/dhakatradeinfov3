<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierUpgrade;
use App\Models\SupplierGallery;
use Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;

class SupplierGalleryController extends Controller
{
    public function create()
    {
        $supplier = SupplierUpgrade::where('user_id',Auth::id())->first();
        $galleries = SupplierGallery::where('supplier_id',Auth::id())->orderBy('id','desc')->get();
        return view('supplier.gallery.create',compact('supplier','galleries'));
    }
    public function store(Request $request)
    {
        $all_multiple_image = $request->file('image');
        $flag = 1;
        foreach($all_multiple_image as $single_image)
        {
            $new_product_multiple_photo_name = rand(1000,99999).'-'.$flag.'.'.$single_image->extension();
            $new_product_photo_location = base_path('public/uploads/supplier/gallery/'.$new_product_multiple_photo_name);
            Image::make($single_image)->resize(600,622)->save($new_product_photo_location);

            SupplierGallery::insert([
                'supplier_id' => Auth::id(),
                'domain_url' => $request->domain_url,
                'image' => $new_product_multiple_photo_name,
                'created_at' => Carbon::now(),
            ]);

            $flag++;

        }
        Toastr::success('Gallery Add Successfully :)','Success');
        return back();
        

    }
    public function delete($id)
    {
        $data = SupplierGallery::find($id);
        $image = base_path('public/uploads/supplier/gallery/'.$data->image);;

        if ($image) {
            unlink($image);
            $data->delete();
        }
        else
        {
            $data->delete();
        }
        Toastr::success('Photo Delete successfully :)','Success');
        return back();
    }

}
