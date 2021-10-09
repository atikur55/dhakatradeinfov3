<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\SupplierBlog;
use App\Models\SupplierUpgrade;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class SupplierBlogController extends Controller
{
    public function create()
    {
        $supplier = SupplierUpgrade::where('user_id',Auth::id())->first();
        return view('supplier.blog.create',compact('supplier'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:1024',
        ]);
        $blog_id = SupplierBlog::insertGetId([
            'supplier_id' => Auth::id(),
            'domain_url' => $request->domain_url,
            'blog_title' => $request->blog_title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image'))
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $blog_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/supplier/blog/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            SupplierBlog::find($blog_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Blog Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_blogs = SupplierBlog::where('supplier_id',Auth::id())->orderBy('id','desc')->get();
        return view('supplier.blog.view',compact('all_blogs'));
    }
    public function status($id)
    {
        $data = SupplierBlog::find($id);
        if ($data->status == 0)
        {
            SupplierBlog::where('id',$id)->update([
                'status' => 1,
           ]);
        }
        else
        {
            SupplierBlog::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function edit($id)
    {
        $blog = SupplierBlog::find($id);
        return view('supplier.blog.edit',compact('blog'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg|max:1024'
        ]);
        $get_image = SupplierBlog::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/supplier/blog/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/supplier/blog/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        $get_image->blog_title = $request->blog_title;
        $get_image->short_description = $request->short_description;
        $get_image->description = $request->description;
        $get_image->created_at = Carbon::now();
        $get_image->save();

        Toastr::success('Blog Update successfully :)','Success');
        return back();
    }
}
