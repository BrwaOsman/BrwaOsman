<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Redirect,Response;
use DataTables;

class DoctorColl extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
    if ($request->ajax()) {
    $data = Doctor::latest()->get();
    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', function($row){
    
    $action ='
    <a class="btn btn-success" id="edit-user" data-toggle="modal" data-id='.$row->id.'>Edit </a>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <a id="delete-user" data-id='.$row->id.' class="btn btn-danger delete-user">Delete</a>';
    
    return $action;
    
    })
    ->rawColumns(['action'])
    ->make(true);
    }
    
    return view('Doctors.Doctors');
    }
    
    public function store(Request $request)
    {
    
    // $r=$request->validate([
    // 'name' => 'required',
    // 'email' => 'required',
    
    // ]);
    
    $uId = $request->user_id;
    Doctor::updateOrCreate(['id' => $uId],['name' => $request->name, 
    'Address' => $request->Address,'Phone'=>$request->Phone,
    'percentage'=>$request->percentage
   
    ]);
    if(empty($request->user_id))
    $msg = 'User created successfully.';
    else
    $msg = 'User data is updated successfully';
    return redirect()->route('Doctors.index')->with('success',$msg);
    }
    
    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    
    public function show($id)
    {
    $where = array('id' => $id);
    $user = Doctor::where($where)->first();
    return Response::json($user);
    //return view('users.show',compact('user'));
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    
    public function edit($id)
    {
    $where = array('id' => $id);
    $user = Doctor::where($where)->first();
    return Response::json($user);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    
    public function destroy($id)
    {
    $user = Doctor::where('id',$id)->delete();
    return Response::json($user);
    //return redirect()->route('users.index');
    }
}
