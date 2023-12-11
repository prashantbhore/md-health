<?php

namespace App\Http\Controllers\admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;
use DataTables;
use Crypt;
use DB;
use App\Library\LogActivity;


class AdminController extends Controller
{
    public function index(){
        $admins = Admin::where('status', '!=', 'delete')->get();
       // dd($admins);
        return view('admin.admins.add-admins');
    }


    public function store(Request $request){
     $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'userType' => $request->adminRole,
            'privileges' => $request->adminRole,
        ];



        $admin = Admin::create($input);

        return redirect('admin/add-admins')->with('success', 'Admin added successfully');
    }


    
    public function data_table(Request $request)
    {
        $admins = Admin::where('status', '!=', 'delete')->get();
    
        if ($request->ajax()){
            return DataTables::of($admins)

                ->addColumn('email', function ($row){
                    if(!empty($row->email)){
                    return ucfirst($row->email);
                    }
                })
            


                ->addColumn('name', function ($row){
                    if(!empty($row->name)){
                    return ucfirst($row->name);
                    }
                })

                ->addColumn('userType', function ($row){
                    if(!empty($row->userType)){
                    return ucfirst($row->userType);
                    }
                })


                ->addColumn('action', function ($row){
                    $editUrl = url('admin/edit-admins/' . Crypt::encrypt($row->id) . '/edit');
                    $actionBtn = '<a href="' . $editUrl . '">
                        <button type="button" data-id="' . $row->id . '" class="btn btn-warning btn-xs Edit_button" title="Edit">
                            <img src="' . asset('admin/assets/img/editEntry.png') . '" alt="">
                        </button>
                    </a>
                    <a href="javascript:void(0)" data-id="' . $row->id . '" data-table="md_master_cities" data-flash="City Deleted Successfully!" class="btn btn-danger city-delete btn-xs" title="Delete">
                        <img src="' . asset('admin/assets/img/deleteEntry.png') . '" alt="">
                    </a>';
    
                    return $actionBtn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }
    }




    public function edit_admin(Request $request){
       
        $id=!empty($request->id)?Crypt::decrypt($request->id):'';
        $admin= Admin::where('id',$id)->first();
        
        return view('admin.admins.edit-admins',compact('admin'));

    }








}
