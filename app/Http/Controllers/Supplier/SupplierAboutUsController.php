<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierUpgrade;
use App\Models\SupplierAboutus;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;


class SupplierAboutUsController extends Controller
{
    public function create()
    {
        $supplier = SupplierUpgrade::where('user_id',Auth::id())->first();
        $all_abouts =SupplierAboutus::where('supplier_id',Auth::id())->orderBy('id','desc')->get();
        return view('supplier.aboutus.create',compact('supplier','all_abouts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);
        SupplierAboutus::insert([
            'supplier_id' => Auth::id(),
            'domain_url' => $request->domain_url,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('About Us Add Successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = SupplierAboutus::find($id);
        if ($data)
        {
            SupplierAboutus::where('id',$id)->update([
                'status' => 1,
           ]);

           SupplierAboutus::where('id','!=',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function delete($id)
    {
        $data = SupplierAboutus::find($id);
        $data->delete();
        Toastr::success('About Us Delete successfully :)','Success');
        return back();
    }
    public function edit($id)
    {
        $about = SupplierAboutus::find($id);
        return view('supplier.aboutus.edit',compact('about'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);
        SupplierAboutus::where('id',$request->id)->update([
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('About Us Update Successfully :)','Success');
        return back();
    }
}
