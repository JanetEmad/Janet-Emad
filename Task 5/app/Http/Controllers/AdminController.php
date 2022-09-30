<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Services\HasMedia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateAdminRequest;


class AdminController extends Controller
{
    public function getadmin($id)
   {
        $admin =  Admin::findOrFail($id);
        return view('profile',compact('admin'));
   }

   public function edit($id)
   {
        $admin = Admin::findOrFail($id);
        return view('update',compact('admin'));
   }

   public function update(UpdateAdminRequest $request,$id)
   {
        $admin = Admin::findOrFail($id);
        $data = $request->except('_token','image','_method');
        if($request->hasFile('image')){
            $imageName = HasMedia::upload($request->file('image'),public_path('images\admins'));
            HasMedia::delete(public_path("images\admins\\{$admin->image}"));
            $data['image'] = $imageName;
        }

        $admin->update($data);
        return redirect()->route('dashboard.profile',$admin->id)->with('success','Profile Updated Successfully');

   }
}
