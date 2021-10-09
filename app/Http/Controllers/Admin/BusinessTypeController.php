<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessType;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class BusinessTypeController extends Controller
{
    public function view()
    {
        $all_business =  BusinessType::orderBy('id','desc')->get();
        return view('admin.business.create',compact('all_business'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|unique:business_types',
            'image' => 'mimes:jpg,jpeg,png|required|max:1024',
            'orderData' => 'unique:business_types',
        ]);

        $logo_id = BusinessType::insertGetId([
            'user_id' => Auth::id(),
            'business_name' => $request->business_name,
            'orderData' => $request->orderData,
            'homeStatus' => $request->homeStatus,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('icon'))
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/business/icon/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            BusinessType::find($logo_id)->update([
                'icon' => $new_upload_logo_photo_name,
            ]);
        }

        if ($request->hasFile('image'))
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/business/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            BusinessType::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('BusinessType Add successfully :)','Success');
        return back();

    }

    public function delete($id)
    {
        $data = BusinessType::find($id);
        if (file_exists( public_path().'/uploads/category/'.$data->image)) {
            $location = public_path().'/uploads/category/'.$data->image;
            unlink($location);
            $data->delete();
        }
        else
        {
            $data->delete();
        }
        Toastr::success('BusinessType Delete successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = BusinessType::find($id);
        if ($data->status == 0)
        {
            BusinessType::where('id',$id)->update([
                'status' => 1,
           ]);
        }
        else
        {
            BusinessType::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();

    }
    public function update(Request $request)
    {
        // $request->validate([
        //     'business_name' => 'nullable|unique:business_types',
        //     'image' => 'nullable|mimes:jpg,jpeg,png|max:1024',
        //     'orderData' => 'nullable|unique:business_types',
        // ]);

        $get_image = BusinessType::find($request->id);

        if(isset($request->orderData))
        {
            BusinessType::where('orderData',$request->orderData)->update([
                'orderData' => $get_image->orderData,
            ]);
        }


        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/business/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/business/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        if ($request->hasFile('icon')) {
            if ($get_image->icon != 'photo.jpg') {
              $delete_location = base_path('public/uploads/business/icon/'.$get_image->icon);
              unlink($delete_location);
            }
          $uploaded_product_photo = $request->file('icon');
          $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
          $new_product_photo_location = base_path('public/uploads/business/icon/'.$new_product_photo_name);
          Image::make($uploaded_product_photo)->save($new_product_photo_location);
          $get_image->icon = $new_product_photo_name;
        }
        $get_image->business_name = $request->business_name;
        $get_image->orderData = $request->orderData;
        $get_image->homeStatus = $request->homeStatus;
        $get_image->user_id = Auth::id();
        $get_image->created_at = Carbon::now();
        $get_image->save();


        Toastr::success('Business Update successfully :)','Success');
        return back();
    }
}
