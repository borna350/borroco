<?php

namespace App\Http\Controllers\Admin;
use App\Models\HomeVideo;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

class HomeVideoController extends Controller
{
    public $_moduleImagePath;
    public function __construct()
    {
        $this->_moduleImagePath = 'home-video/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HomeVideo::all();
        return  view('admin.home-video.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        $craftsman = Admin::where('role', 'craftsman')->get();
        //$admins = Admin::all();
        return  view('admin.home-video.create', compact('data','craftsman'));
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
            'title' => 'required|max:255',
            'subtitle' => 'required|max:455',
            'link' => 'required|url',
            'status' => Rule::in(['active', 'inactive']),
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if($request->hasFile('image')) {
            $fileName =  imageUpload($request->file('image'), $request->title , $this->_moduleImagePath , '1050', '590');
            $data['image'] = $fileName;
        }
        HomeVideo::create($data);
        return  redirect()->back()->with('success', 'Home video save successfully!');
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
        $craftsman = Admin::where('role', 'craftsman')->get();
        $data = HomeVideo::find($id);
        return  view('admin.home-video.edit', compact('data','craftsman'));
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
            'title' => 'required|max:255',
            'subtitle' => 'required|max:455',
            'status' => Rule::in(['active', 'inactive']),
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('image')) {
            $checkImg = HomeVideo::find($id);
            if ($checkImg->image){
                if (!file_exists(public_path('media/'.$this->_moduleImagePath.$checkImg->image))){
                    $checkImg->image = null;
                }else{
                    imageUnlink($checkImg->image, $this->_moduleImagePath);
                }
            }
            $fileName =  imageUpload($request->file('image'), $request->title , $this->_moduleImagePath , '800', '800');
            $data['image'] = $fileName;
        }
        HomeVideo::find($id)->update($data);
        return  redirect()->back()->with('success', 'Home video update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = HomeVideo::find($id);
        if ($data->image){
            if (!file_exists(public_path('media/'.$this->_moduleImagePath.$data->image))){
                $data->image = null;
            }else{
                imageUnlink($data->image, $this->_moduleImagePath);
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'Home video deleted');
    }
}
