<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierLogo;
use App\Models\SupplierFooter;
use App\Models\SupplierGallery;
use App\Models\SupplierBlog;
use App\Models\SupplierAboutus;
use App\Models\SupplierSlider;

class SupplierLogoController extends Controller
{
    public function logo()
    {
        $logos = SupplierLogo::orderBy('id','desc')->get();
        return response()->json($logos,200);
    }
    public function footer()
    {
        $footers = SupplierFooter::orderBy('id','desc')->get();
        return response()->json($footers,200);
    }
    public function gallery()
    {
        $galleries = SupplierGallery::orderBy('id','desc')->get();
        return response()->json($galleries,200);
    }
    public function blog()
    {
        $blogs = SupplierBlog::orderBy('id','desc')->get();
        return response()->json($blogs,200);
    }
    public function blog_Details($id)
    {
        $blog = SupplierBlog::where('id',$id)->first();
        return response()->json($blog,200);
    }
    public function aboutus()
    {
        $blogs = SupplierAboutus::orderBy('id','desc')->get();
        return response()->json($blogs,200);
    }
    public function slider()
    {
        $sliders = SupplierSlider::orderBy('id','desc')->get();
        return response()->json($sliders,200);
    }
}
