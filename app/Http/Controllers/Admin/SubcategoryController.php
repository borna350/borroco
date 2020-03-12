<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;
use Image;

class SubcategoryController extends Controller
{
    public $_moduleImagePath;
    public function __construct()
    {
        $this->_moduleImagePath = 'subcategory/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subcategory::orderBy('id', 'desc')->get();
        return  view('admin.subcategory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        $categories = Category::get();
        return  view('admin.subcategory.create', compact('data', 'categories'));
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
            'category_id' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => Rule::in(['active', 'inactive']),
        ]);
        if (isset($data['show_home_products'])){
            $validator = Validator::make($data, [
                'feature_title' => 'required|max:255',
                'feature_subtitle' => 'required',
                'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('image')) {
            $fileName =  imageUpload($request->file('image'), $request->title , $this->_moduleImagePath , '600', '600');
            $data['image'] = $fileName;
        }

        if($request->hasFile('feature_image')) {
            $fileNameFe =  imageUpload($request->file('feature_image'), "feature" , $this->_moduleImagePath , '770', '960');
            $data['feature_image'] = $fileNameFe;
        }
        $data['show_home_products'] = isset($data['show_home_products']) ? 1:0;
        Subcategory::create($data);
        return  redirect()->back()->with('success', 'Subcategory save successfully!');
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
        $data = Subcategory::find($id);
        $categories = Category::get();
        return  view('admin.subcategory.edit', compact('data', 'categories'));
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
            'category_id' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => Rule::in(['active', 'inactive']),
        ]);
        if (isset($data['show_home_products'])){
            $validator = Validator::make($data, [
                'feature_title' => 'required|max:255',
                'feature_subtitle' => 'required',
                'feature_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }



        if($request->hasFile('image')) {
            $checkImg = Subcategory::find($id);
            if ($checkImg->image){
                if (!file_exists(public_path('media/'.$this->_moduleImagePath.$checkImg->image))){
                    $checkImg->image = null;
                }else{
                    imageUnlink($checkImg->image, $this->_moduleImagePath);
                }
            }
            $fileName =  imageUpload($request->file('image'), $request->title , $this->_moduleImagePath , '600', '600');
            $data['image'] = $fileName;
        }
        if ($request->hasFile('feature_image')){
            $checkImg = Subcategory::find($id);
            if ($checkImg->feature_image){
                if (!file_exists(public_path('media/'.$this->_moduleImagePath.$checkImg->feature_image))){
                    $checkImg->feature_image = null;
                }else{
                    imageUnlink($checkImg->feature_image, $this->_moduleImagePath);
                }
            }
            $fileNameFe =  imageUpload($request->file('feature_image'), "feature" , $this->_moduleImagePath , '770', '960');
            $data['feature_image'] = $fileNameFe;
        }

        $data['show_home_products'] = isset($data['show_home_products']) ? 1:0;
        Subcategory::find($id)->update($data);
        return  redirect()->back()->with('success', 'Subcategory update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Subcategory::find($id);
        if ($data->image){
            if (!file_exists(public_path('media/'.$this->_moduleImagePath.$data->image))){
                $data->image = null;
            }else{
                imageUnlink($data->image, $this->_moduleImagePath);
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'Subcategory deleted!');
    }
}
