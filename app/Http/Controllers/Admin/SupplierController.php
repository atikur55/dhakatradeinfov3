<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierUpgrade;
use App\Models\User;
use App\Models\TemplateCategory;
use App\Models\Template;
use App\Models\Order;
use Hash;
use Auth;
use Image;
use Mail;
use Carbon\Carbon;
use App\Mail\ApproveSupplier;
use App\Mail\PendingSupplier;
use App\Models\Membership;
use App\Models\MembershipProduct;
use App\Models\MembershipOrder;
use Brian2694\Toastr\Facades\Toastr;
use PDF;

class SupplierController extends Controller
{
    public function supplier_create()
    {
        return view('admin.supplier.create');
    }
    public function supplier_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:suppliers',
            'phone' => 'required',
            'password' => 'required',
            'status' => 'required',
            'company_name' => 'required',
            'company_logo' => 'mimes:jpeg,jpg,png,gif|required|max:1024',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:1024',
        ]);

        $supplier_id = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'user_type' => 'supplier',
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image'))
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $supplier_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/profile/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            User::find($supplier_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        $supplier_id = Supplier::insertGetId([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('company_logo'))
        {
            $upload_logo_photo = $request->file('company_logo');
            $new_upload_logo_photo_name = $supplier_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/company/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Supplier::find($supplier_id)->update([
                'company_logo' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Supplier Add successfully :)','Success');
        return back();

    }
    public function supplier_list()
    {
        $suppliers = Supplier::orderBy('id','desc')->get();
        $supplierStatus = 'all';
        // $suppliers = User::where('user_type','supplier')->orderBy('id','desc')->get();
        return view('admin.supplier.view',compact('suppliers','supplierStatus'));
    }
    public function supplier_pending_list()
    {
        $suppliers = Supplier::where('status',0)->orderBy('id','desc')->get();
        $supplierStatus = 'pending';
        return view('admin.supplier.view',compact('suppliers','supplierStatus'));
    }
    public function supplier_status($id)
    {
        $data = Supplier::find($id);
        if ($data->status == 0)
        {
           Supplier::where('id',$id)->update([
                'status' => 1,
           ]);
           User::where('email',$data->email)->update([
                'role' => 1,
           ]);
           \Mail::send('email.supplier_register', array(
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'subject' => 'Supplier Approval',
                'user_query' => 'Congratulation! Your are now approve by Dhaka Trade-Info.',
            ), function($message) use ($data){
                $message->from('uitdeveloper2021@gmail.com');
                $message->to(['uitdeveloper2021@gmail.com','dhakatradeinfobd@gmail.com',$data->email])->subject('Supplier Approval');
            });
        }
        else
        {
            Supplier::where('id',$id)->update([
                'status' => 0,
            ]);
            User::where('email',$data->email)->update([
                'role' => 0,
           ]);
           \Mail::send('email.supplier_register', array(
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'subject' => 'Supplier Disapproval',
                'user_query' => 'Sorry! Your are now Disapprove by Dhaka Trade-Info.',
            ), function($message) use ($data){
                $message->from('uitdeveloper2021@gmail.com');
                $message->to(['uitdeveloper2021@gmail.com','dhakatradeinfobd@gmail.com',$data->email])->subject('Supplier Disapproval');
            });
        }

        Toastr::success('Supplier Status Change successfully :)','Success');
        return back();
    }
    public function supplier_delete($id)
    {
        $data = Supplier::find($id);
        $image = base_path('public/uploads/company/'.$data->company_logo);;

        if ($image) {
            unlink($image);
            $data->delete();
        }
        else
        {
            $data->delete();
        }
        Toastr::success('Supplier Delete successfully :)','Success');
        return back();
    }
    public function supplier_edit($id)
    {
        $supplier = Supplier::where('id',$id)->first();
        return view('admin.supplier.edit',compact('supplier'));
    }

    public function supplier_update(Request $request)
    {
        $get_image = Supplier::find($request->id);
        $request->all();
        if ($request->hasFile('company_logo')) {
          if ($get_image->company_logo != 'photo.jpg') {
            $delete_location = base_path('public/uploads/company/'.$get_image->company_logo);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('company_logo');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/company/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->company_logo = $new_product_photo_name;
        }
        $get_image->name = $request->name;
        $get_image->email = $request->email;
        $get_image->phone = $request->phone;
        $get_image->status = $request->status;
        $get_image->company_name = $request->company_name;
        $get_image->user_id = Auth::id();
        $get_image->created_at = Carbon::now();
        $get_image->save();
        Toastr::success('Supplier Update successfully :)','Success');
        return back();
    }

    public function supplier_upgrade()
    {
        $data = Supplier::where('email',Auth::user()->email)->first();
        $tems = TemplateCategory::where('status',0)->get();
        return view('admin.supplier.upgrade',compact('data','tems'));
    }

    // public function supplier_id($id)
    // {
    //     $data = Template::where('template_category_id',$id)->get();
    //     return response()->json($data);
    // }
    public function getStateList($id)
    {

        $states = Template::where('template_category_id',$id)->get();
        return response()->json($states);
    }
    public function supplier_upgrade_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_name' => 'required',
            'payment' => 'required',
            'send_account_number' => 'required',
            'transactionid' => 'required',
            'reference' => 'required',
            'template_category_id' => 'required',
            // 'temp_id' => 'required',
        ]);

        SupplierUpgrade::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'payment' => $request->payment,
            'send_account_number' => $request->send_account_number,
            'transactionid' => $request->transactionid,
            'reference' => $request->reference,
            'template_category_id' => $request->template_category_id,
            'temp_id' => $request->temp_id,
            'user_domain' => $request->user_domain,
        ]);

        Toastr::success('Supplier Upgardation successfully. Please Waiting for Mail :)','Success');
        return back();

    }
    public function supplier_upgrade_view()
    {
        $suppliers = SupplierUpgrade::orderBy('id','desc')->get();
        return view('admin.supplier.upgrade_list',compact('suppliers'));
    }
    public function supplier_upgrade_status($id)
    {
        $data = SupplierUpgrade::find($id);
        $current_date = $data->created_at->format('m/d/Y');
        $result = Carbon::createFromFormat('m/d/Y', $current_date)->diffInDays();
        if ($data->status == 0)
        {
            SupplierUpgrade::where('id',$data->id)->update([
                'status' => 1,
            ]);
            User::where('id',$data->user_id)->update([
                'upgrade' => 1,
            ]);
            Mail::to($data->email)->send(new ApproveSupplier);
            Toastr::success('Supplier Are Now Approved :)','Success');
            return back();
        }
        elseif($result == 366)
        {
            SupplierUpgrade::where('id',$data->id)->update([
                'status' => 0,
            ]);
            User::where('id',$data->user_id)->update([
                'upgrade' => 0,
            ]);

            Mail::to($data->email)->send(new PendingSupplier);
            Toastr::success('Supplier Are Now Pending :)','Success');
            return back();
        }
        else
        {
            SupplierUpgrade::where('id',$data->id)->update([
                'status' => 0,
            ]);
            User::where('id',$data->user_id)->update([
                'upgrade' => 0,
            ]);

            Mail::to($data->email)->send(new PendingSupplier);
            Toastr::success('Supplier Are Now Pending :)','Success');
            return back();
        }


    }
    public function supplier_upgrade_update(Request $request)
    {
        SupplierUpgrade::where('id',$request->id)->update([
            'temp_id' => $request->temp_id,
        ]);
        Toastr::success('Supplier Template Update Successfully :)','Success');
        return back();
    }

    public function supplier_export_data(Request $request,$supplierStatus)
    {
        if($supplierStatus==='pending'){
            $fileName = 'supplierPendingList.csv';
            $suppliers = Supplier::where('status',0)->orderBy('id','desc')->get();
        }

        if($supplierStatus==='active'){
            $fileName = 'supplierActiveList.csv';
            $suppliers = Supplier::where('status',1)->orderBy('id','desc')->get();
        }

        if($supplierStatus==='all'){
            $fileName = 'SupplierList.csv';
            $suppliers = Supplier::orderBy('id','desc')->get();
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Name', 'Email','Phone', 'Company Name', 'Status', 'Joined Date');

        $callback = function() use($suppliers, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($suppliers as $supplier) {
                $row['Name']  = $supplier->name;
                $row['Email']    = $supplier->email;
                $row['Phone']    = $supplier->phone;
                $row['Company Name']  = $supplier->company_name;
                $row['Status']  = $supplier->status===0 ? 'Pending' : 'Active' ;
                $row['Joined Date']  = $supplier->created_at;

                fputcsv($file, array($row['Name'], $row['Email'], $row['Phone'], $row['Company Name'], $row['Status'], $row['Joined Date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function buy_product_membership (Request $request) {
        //dd($request->all());
        $membershipPackageName = Membership::where('id',$request->membershipID)->get()->first()->name;
        $membershipPackagePrice = Membership::where('id',$request->membershipID)->get()->first()->price;
        $membershipProductAmmount = MembershipProduct::where('id',$request->selectedProductID)->get()->first()->ammount;
        $membershipProductPrice = MembershipProduct::where('id',$request->selectedProductID)->get()->first()->price;
        $username = User::where('id',Auth::id())->get()->first()->name;

        $email = User::where('id',Auth::id())->get()->first()->email;
        
        

        //Calculate Total
        $totalPrice = $membershipPackagePrice + $membershipProductPrice;



        MembershipOrder::create([
            'user_id' => Auth::id(),
            'membership_id' => $request->membershipID,
            'membership_product_id' => $request->selectedProductID,
            'payment_method' => $request->paymentMethod,
            'payment_type' => $request->paymentType,
            'sender_account_number' => $request->senderAccountNumber,
            'transection_id' => $request->transectionID,
            'paid' => '1',
        ]);

        //Send Email
        \Mail::send('email.membership_order_confirmed', array(
            'membership_id' => $request->membershipID,
            'membership_product_id' => $request->selectedProductID,
            'payment_method' => $request->paymentMethod,
            'payment_type' => $request->paymentType,

            'name' => $username,
            'email' => $email,
            'subject' => 'Membership Product Purchased',
            'membershipPackageName' => $membershipPackageName,
            'membershipPackagePrice' => $membershipPackagePrice,
            'membershipProductAmmount' => $membershipProductAmmount,
            'membershipProductPrice' => $membershipProductPrice,
            'totalPrice' => $totalPrice,
            'date'=>Carbon::now(),
        ), function($message) use ($email){
            $message->from('uitdeveloper2021@gmail.com');
            $message->to(['uitdeveloper2021@gmail.com','dhakatradeinfobd@gmail.com',$email])->subject('Membership Product Purchased');
        });

        return response()->json([
            'success' => 'true',
            'message' => 'Payment Successfully Done',

        ]);



    }

    public function get_product_membership_pdf ($membershipID,$selectedProductID,$paymentMethod,$paymentType) {
        $membershipPackageName = Membership::where('id',$membershipID)->get()->first()->name;
        $membershipPackagePrice = Membership::where('id',$membershipID)->get()->first()->price;
        $membershipProductAmmount = MembershipProduct::where('id',$selectedProductID)->get()->first()->ammount;
        $membershipProductPrice = MembershipProduct::where('id',$selectedProductID)->get()->first()->price;
        $username = User::where('id',Auth::id())->get()->first()->name;
        $email = User::where('id',Auth::id())->get()->first()->email;
        $subject = 'Membership Product Purchased';

        //Calculate Total
        $totalPrice = $membershipPackagePrice + $membershipProductPrice;
        $date= Carbon::now();

        // retreive all records from db
        $data = MembershipOrder::all();

        // share data to view
        // view()->share('MembershipOrder',$data);
        $pdf = PDF::loadView('download.membership_product', compact(
            'date',
            'membershipPackageName',
            'membershipPackagePrice',
            'membershipProductAmmount',
            'membershipProductPrice',
            'totalPrice',
            'username',
            'email',
            'subject',
        ));

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }






}
