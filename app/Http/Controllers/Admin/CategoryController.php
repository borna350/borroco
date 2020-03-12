<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

class CategoryController extends Controller
{

    public $_moduleImagePath;
    public function __construct()
    {
        $this->_moduleImagePath = 'category/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::get();
        return  view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return  view('admin.category.create', compact('data'));
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
            'site_title' => 'sometimes|max:255',
            'site_subtitle' => 'sometimes|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'cover_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => Rule::in(['active', 'inactive']),
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if($request->hasFile('image')) {
            $fileName =  imageUpload($request->file('image'), $request->title , $this->_moduleImagePath , '800', '800');
            $data['image'] = $fileName;
        }

        if($request->hasFile('cover_image')) {
            $fileName =  imageUpload($request->file('cover_image'), "cover" , $this->_moduleImagePath , '1450', '450');
            $data['cover_image'] = $fileName;
        }
        Category::create($data);
        return  redirect()->back()->with('success', 'Category save successfully!');
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
        $data = Category::find($id);
        return  view('admin.category.edit', compact('data'));
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
            'site_title' => 'sometimes|max:255',
            'site_subtitle' => 'sometimes|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'cover_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('image')) {
            $checkImg = Category::find($id);
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

        if($request->hasFile('cover_image')) {
            $checkImg = Category::find($id);
            if ($checkImg->cover_image){
                if (!file_exists(public_path('media/'.$this->_moduleImagePath.$checkImg->cover_image))){
                    $checkImg->cover_image = null;
                }else{
                    imageUnlink($checkImg->cover_image, $this->_moduleImagePath);
                }
            }
            $fileName =  imageUpload($request->file('cover_image'), "cover" , $this->_moduleImagePath , '1450', '450');
            $data['cover_image'] = $fileName;
        }

        Category::find($id)->update($data);
        return  redirect()->back()->with('success', 'Category update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        if ($data->image){
            if (!file_exists(public_path('media/'.$this->_moduleImagePath.$data->image))){
                $data->image = null;
            }else{
                imageUnlink($data->image, $this->_moduleImagePath);
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'Category deleted');
    }
}
