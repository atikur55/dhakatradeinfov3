<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierUpgrade;
use App\Models\SupplierLogo;
use Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;

class SupplierLogoController extends Controller
{
    public function create()
    {
        $supplier = SupplierUpgrade::where('user_id',Auth::id())->first();
        $logos = SupplierLogo::where('supplier_id',Auth::id())->orderBy('id','desc')->get();
        return view('supplier.logo.create',compact('supplier','logos'));
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg|max:1024',
        ]);
        if($validator->fails())
        {
            Toastr::error('Image Required with max Size 1MB:)','Error');
            return back();
        }
        else
        {
            $logo_id = SupplierLogo::insertGetId([
                'supplier_id' => Auth::id(),
                'domain_url' => $request->domain_url,
                'created_at' => Carbon::now(),
            ]);
    
            if ($request->hasFile('image')) 
            {
                $upload_logo_photo = $request->file('image');
                $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
                $new_logo_photo_location = base_path('public/uploads/supplier/logo/').$new_upload_logo_photo_name;
                Image::make($upload_logo_photo)->save($new_logo_photo_location);
                SupplierLogo::find($logo_id)->update([
                    'image' => $new_upload_logo_photo_name,
                ]);
            }
            Toastr::success('Logo Add Successfully :)','Success');
            return back();
        }
        

    }
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg|max:1024',
        ]);

        $get_image = SupplierLogo::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/supplier/logo/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/supplier/logo/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        $get_image->created_at = Carbon::now();
        $get_image->save();
        
        Toastr::success('Logo Update successfully :)','Success');
        return back();
    }
    public function delete($id)
    {
        $data = SupplierLogo::find($id);
        $image = base_path('public/uploads/supplier/logo/'.$data->image);;

        if ($image) {
            unlink($image);
            $data->delete();
        }
        else
        {
            $data->delete();
        }
        Toastr::success('Logo Delete successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = SupplierLogo::find($id);
        if ($data) 
        {
            SupplierLogo::where('id',$id)->update([
                'status' => 1,
           ]);

            SupplierLogo::where('id','!=',$id)->update([
                            'status' => 0,
                    ]);
        } 

        Toastr::success('Status Change successfully :)','Success');
        return back();
        
    }
    
}
