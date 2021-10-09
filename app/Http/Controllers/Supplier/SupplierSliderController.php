<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\SupplierSlider;
use App\Models\SupplierUpgrade;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class SupplierSliderController extends Controller
{
    public function create()
    {
        $supplier = SupplierUpgrade::where('user_id',Auth::id())->first();
        return view('supplier.slider.create',compact('supplier'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:1024',
        ]);
        $blog_id = SupplierSlider::insertGetId([
            'supplier_id' => Auth::id(),
            'domain_url' => $request->domain_url,
            'title' => $request->title,
            'short_des' => $request->short_des,
            'button' => $request->button,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image'))
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $blog_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/supplier/slider/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            SupplierSlider::find($blog_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Slider Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_slider = SupplierSlider::where('supplier_id',Auth::id())->orderBy('id','desc')->get();
        return view('supplier.slider.view',compact('all_slider'));
    }
    public function status($id)
    {
        $data = SupplierSlider::find($id);
        if ($data->status == 0)
        {
            SupplierSlider::where('id',$id)->update([
                'status' => 1,
           ]);
        }
        else
        {
            SupplierSlider::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function delete($id)
    {
        $data = SupplierSlider::find($id);
        $image = base_path('public/uploads/supplier/slider/'.$data->image);

        if ($image) {
            unlink($image);
            $data->delete();
        }
        else
        {
            $data->delete();
        }
        Toastr::success('Slider Delete successfully :)','Success');
        return back();
    }
    public function edit($id)
    {
        $slider = SupplierSlider::find($id);
        return view('supplier.slider.edit',compact('slider'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg|max:1024'
        ]);
        $get_image = SupplierSlider::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/supplier/slider/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/supplier/slider/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        $get_image->title = $request->title;
        $get_image->short_des = $request->short_des;
        $get_image->button = $request->button;
        $get_image->created_at = Carbon::now();
        $get_image->save();

        Toastr::success('Slider Update successfully :)','Success');
        return back();
    }
}
