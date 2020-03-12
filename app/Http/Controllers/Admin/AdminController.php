<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Image;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $_moduleImagePath;
    public function __construct()
    {
        $this->_moduleImagePath = 'admin/';
    }

    public function index()
    {
        $data = Admin::where('role', '!=', 'super_admin' )
            ->where('status', 'active')
            ->where('craft_request', 'accept')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.administrator.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return  view('admin.administrator.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'role' => Rule::in(['super_admin', 'admin', 'craftsman']),
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:191|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => Rule::in(['active', 'deactivated']),
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('avatar')) {
            if ($request->role == 'craftsman'){
                $fileName =  imageUpload($request->file('avatar'), $request->name , $this->_moduleImagePath , '760', '876');
            }else{
                $fileName =  imageUpload($request->file('avatar'), $request->name , $this->_moduleImagePath , '300', '300');
            }
            $data['avatar'] = $fileName;
        }
        $data['password'] = bcrypt($request->password);

        if (auth()->guard('admin')->role == 'super_admin' || auth()->guard('admin')->role == 'admin'){
            $data['craft_request'] = 'accept';
        }
        Admin::create($data);
        return  redirect()->back()->with('success', "Admin ($request->role) save successfully!");
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
        $data = Admin::find($id);
        return  view('admin.administrator.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:191|unique:admins,email,' . $id,
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => Rule::in(['active', 'inactive']),
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('avatar')) {
            $checkImg = Admin::find($id);
            if ($checkImg->avatar){
                if (!file_exists(public_path('admin/'.$this->_moduleImagePath.$checkImg->avatar))){
                    $checkImg->avatar = null;
                }else{
                    imageUnlink($checkImg->avatar, $this->_moduleImagePath);
                }
            }
            if ($request->role == 'craftsman'){
                $fileName =  imageUpload($request->file('avatar'), $request->name , $this->_moduleImagePath , '760', '876');
            }else{
                $fileName =  imageUpload($request->file('avatar'), $request->name , $this->_moduleImagePath , '300', '300');
            }
            $data['avatar'] = $fileName;
        }

        Admin::find($id)->update($data);
        return  redirect()->back()->with('success', "Admin ($request->role) update successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Admin::find($id);
        if ($data->avatar){
            if (!file_exists(public_path('media/'.$this->_moduleImagePath.$data->avatar))){
                $data->avatar = null;
            }else{
                imageUnlink($data->avatar, $this->_moduleImagePath);
            }
        }
        $data->delete();
        return  redirect()->back()->with('success', 'Admin delete successfully!');
    }


    /**
     * For all admin password reset
     * @param  int  $id
     *
     */
    public function resetPassword(Request $request, $id){
        $data = $request->all();
        $validator = Validator::make($data, [
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data['password'] = bcrypt($request->password);
        Admin::find($id)->update($data);
        return  redirect()->back()->with('success', "Password reset successfully!");
    }

    public function artisanRequest(){
        $data = Admin::where('role', 'craftsman' )->where('craft_request', '!=', 'accept')->orderBy('id', 'desc')->get();
        return view('admin.administrator.request_artisan', compact('data'));
    }

    public function artisanAccept($id){
        $data = Admin::find($id);
        $data->craft_request = 'accept';
        $data->save();
        return  redirect()->back()->with('success', "Artisan request accept successfully!");
    }

    public function artisanReject($id){
        $data = Admin::find($id);
        $data->craft_request = 'reject';
        $data->save();
        return  redirect()->back()->with('warning', "This artisan request rejected!");
    }

    public function artisanPending($id){
        $data = Admin::find($id);
        $data->craft_request = 'pending';
        $data->save();
        return  redirect()->back()->with('warning', "This artisan request move to pending!");
    }
}
