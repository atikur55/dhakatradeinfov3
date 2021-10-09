<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\MembershipDetail;
use App\Models\MembershipProduct;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Membership::orderBy('id','desc')->get();
        return view('admin.membership.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $membershipID = Membership::create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        // dd();

        foreach ($request->details as $detail) {
            MembershipDetail::create([
                'membership_id' => $membershipID->id,
                'details' => $detail,
            ]);

        }

        $count = 0;
        foreach ($request->product_ammount as $ammount) {
            MembershipProduct::create([
                'membership_id' => $membershipID->id,
                'ammount' => $ammount,
                'price' => $request->product_price[$count],
            ]);
            $count++;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership = Membership::where('id',$id)->get()->first();
        return view('admin.membership.edit',compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Membership::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        MembershipDetail::where('membership_id',$request->id)->delete();
        MembershipProduct::where('membership_id',$request->id)->delete();

        foreach ($request->details as $detail) {
            MembershipDetail::create([
                'membership_id' => $request->id,
                'details' => $detail,
            ]);

        }

        $count = 0;
        foreach ($request->product_ammount as $ammount) {
            MembershipProduct::create([
                'membership_id' => $request->id,
                'ammount' => $ammount,
                'price' => $request->product_price[$count],
            ]);
            $count++;
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
        Membership::find($id)->delete();
        MembershipDetail::where('membership_id',$id)->delete();
        MembershipProduct::where('membership_id',$id)->delete();

        Toastr::success('Membership Deleted successfully :)','Success');
        return back();
    }

    public function status($id)
    {
        $membershipStatus = Membership::find($id)->status;
        Membership::where('id', $id)->update([
            'status' => $membershipStatus === 0 ? 1 : 0,
        ]);

        Toastr::success('Membership Status changed :)','Success');
        return back();
    }

    public function buyMembership(Request $request)
    {
        dd('buy membership');

        // Toastr::success('Membership Status changed :)','Success');
        // return back();
    }
}
