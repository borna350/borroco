<?php

namespace App\Http\Controllers\Admin;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

class HomeBannerController extends Controller
{
    public $_moduleImagePath;
    public function __construct()
    {
        $this->_moduleImagePath = 'home-banner/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HomeBanner::get();
        return  view('admin.home-banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = HomeBanner::first();
        return  view('admin.home-banner.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bannerData = HomeBanner::first();
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'subtitle' => 'required|max:455',

        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        if (!empty($bannerData)){
            if($request->hasFile('logo')) {
                if ($bannerData->logo){
                    if (!file_exists(public_path('media/'.$this->_moduleImagePath.$bannerData->logo))){
                        $bannerData->image = null;
                    }else{
                        imageUnlink($bannerData->logo, $this->_moduleImagePath);
                    }
                }
                $fileName =  imageUpload($request->file('logo'), "logo", $this->_moduleImagePath , '400', '400');
                $data['logo'] = $fileName;
            }else{
                $data['logo'] = $bannerData->logo;
            }
        }else{
            if($request->hasFile('logo')) {
                $fileName =  imageUpload($request->file('logo'), "logo", $this->_moduleImagePath , '400', '400');
                $data['logo'] = $fileName;
            }
        }
        if (!empty($bannerData)){
            if($request->hasFile('banner_image')) {
                if ($bannerData->banner_image){
                    if (!file_exists(public_path('media/'.$this->_moduleImagePath.$bannerData->banner_image))){
                        $bannerData->image = null;
                    }else{
                        imageUnlink($bannerData->banner_image, $this->_moduleImagePath);
                    }
                }
                $fileNameBn =  imageUpload($request->file('banner_image'),"banner", $this->_moduleImagePath , '1266', '570');
                $data['banner_image'] = $fileNameBn;
            }else{
                $data['banner_image'] = $bannerData->banner_image;
            }
        }else{
            if($request->hasFile('banner_image')) {
                $fileNameBn =  imageUpload($request->file('banner_image'),"banner", $this->_moduleImagePath , '1266', '570');
                $data['banner_image'] = $fileNameBn;
        }


        HomeBanner::updateOrCreate(
            ['type' => '1'],
            [
                'logo'         => isset($data['logo']) ? $data['logo'] : '',
                'title'        => isset($data['title']) ? $data['title'] : '',
                'subtitle'     => isset($data['subtitle']) ? $data['subtitle'] : '',
                'banner_image' => isset($data['banner_image']) ? $data['banner_image'] : '',
            ]
        );

        return  redirect()->back()->with('success', 'Home banner save successfully!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
