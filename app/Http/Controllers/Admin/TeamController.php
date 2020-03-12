<?php

namespace App\Http\Controllers\Admin;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

class TeamController extends Controller
{
    public $_moduleImagePath;
    public function __construct()
    {
        $this->_moduleImagePath = 'team/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Team::get();
        return  view('admin.team.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return  view('admin.team.create', compact('data'));
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
            'name' => 'required|max:255',
            'status' => Rule::in(['active', 'inactive']),
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if($request->hasFile('image')) {
            $fileName =  imageUpload($request->file('image'), $request->name , $this->_moduleImagePath , '400', '400');
            $data['image'] = $fileName;
        }
        Team::create($data);
        return  redirect()->back()->with('success', 'Team save successfully!');
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
        $data = Team::find($id);
        return  view('admin.team.edit', compact('data'));
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
            'status' => Rule::in(['active', 'inactive']),
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('image')) {
            $checkImg = Team::find($id);
            if ($checkImg->image){
                if (!file_exists(public_path('media/'.$this->_moduleImagePath.$checkImg->image))){
                    $checkImg->image = null;
                }else{
                    imageUnlink($checkImg->image, $this->_moduleImagePath);
                }
            }
            $fileName =  imageUpload($request->file('image'), $request->name , $this->_moduleImagePath , '400', '400');
            $data['image'] = $fileName;
        }
        Team::find($id)->update($data);
        return  redirect()->back()->with('success', 'Team update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Team::find($id);
        if ($data->image){
            if (!file_exists(public_path('media/'.$this->_moduleImagePath.$data->image))){
                $data->image = null;
            }else{
                imageUnlink($data->image, $this->_moduleImagePath);
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'Team deleted');
    }
}
