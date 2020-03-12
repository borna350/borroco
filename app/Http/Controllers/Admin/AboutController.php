<?php

namespace App\Http\Controllers\Admin;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

class AboutController extends Controller
{
    public $_moduleImagePath;
    public function __construct()
    {
        $this->_moduleImagePath = 'about/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::get();
        return  view('admin.about.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = About::first();
        return  view('admin.about.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aboutData = About::first();
        $data = $request->all();
        $validator = Validator::make($data, [
            'about_description' => 'required|max:455',
            'banner_title' => 'required|max:255',
            'banner_description' => 'required|max:455',
            'email' => 'required|max:191',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (!empty($aboutData)){
            if($request->hasFile('about_logo')) {
                if ($aboutData->about_logo){
                    if (!file_exists(public_path('media/'.$this->_moduleImagePath.$aboutData->about_logo))){
                        $aboutData->about_logo = null;
                    }else{
                        imageUnlink($aboutData->about_logo, $this->_moduleImagePath);
                    }
                }
                $fileName =  imageUpload($request->file('about_logo'), "logo", $this->_moduleImagePath , '1000', '1000');
                $data['about_logo'] = $fileName;
            }else{
                $data['about_logo'] = $aboutData->about_logo;
            }
        }else{
            if($request->hasFile('about_logo')) {
                $fileName =  imageUpload($request->file('about_logo'), "logo", $this->_moduleImagePath , '1000', '1000');
                $data['about_logo'] = $fileName;
            }
        }

        if (!empty($aboutData)){
            if($request->hasFile('about_banner_image')) {
                if ($aboutData->about_banner_image){
                    if (!file_exists(public_path('media/'.$this->_moduleImagePath.$aboutData->about_banner_image))){
                        $aboutData->about_banner_image = null;
                    }else{
                        imageUnlink($aboutData->about_banner_image, $this->_moduleImagePath);
                    }
                }
                $fileNameBn =  imageUpload($request->file('about_banner_image'),"banner", $this->_moduleImagePath , '1266', '570');
                $data['about_banner_image'] = $fileNameBn;
            }else{
                $data['about_banner_image'] = $aboutData->about_banner_image;
            }
        }else{
            if($request->hasFile('about_logo')) {
                $fileNameBn =  imageUpload($request->file('about_banner_image'),"banner", $this->_moduleImagePath , '1266', '570');
                $data['about_banner_image'] = $fileNameBn;
            }
        }

        About::updateOrCreate(
            ['type' => '1'],
            [
                'about_logo'          => isset($data['about_logo']) ? $data['about_logo'] : '',
                'about_description'   => isset($data['about_description']) ? $data['about_description'] : '',
                'based_in'            => isset($data['based_in']) ? $data['based_in'] : '',
                'founded'             => isset($data['founded']) ? $data['founded'] : '',
                'about_banner_image'  => isset($data['about_banner_image']) ? $data['about_banner_image'] : '',
                'banner_title'        => isset($data['banner_title']) ? $data['banner_title'] : '',
                'banner_description'  => isset($data['banner_description']) ? $data['banner_description'] : '',
                'address'             => isset($data['address']) ? $data['address'] : '',
                'email'               => isset($data['email']) ? $data['email'] : '',
            ]
        );

        return  redirect()->back()->with('success', 'about save successfully!');
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
