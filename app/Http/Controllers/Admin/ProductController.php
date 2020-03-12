<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductShippingReturn;
use App\Models\ProductSize;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
class ProductController extends Controller
{

    public $_moduleImagePath;
    public function __construct()
    {
        $this->_moduleImagePath = 'product/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id', 'desc')->paginate(15);
        return  view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        $categories = Category::where('status', 'active')->get();
        $subcategories = Subcategory::where('status', 'active')->get();
        $materials = Material::where('status', 'active')->get();
        return  view('admin.product.create', compact('data', 'categories', 'subcategories', 'materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin =  auth()->guard('admin')->user();

        $data = $request->all();

        $validator = Validator::make($data, [
            'category_id'     => 'required|numeric',
            'subcategory_id'  => 'required|numeric',
            'name'            => 'required|max:255',
            'code'            => 'required|max:255',
            'price'           => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description'     => 'required',
            'thum_image_1'    => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status'          => 'required',
            'in_stock'        => 'required|numeric',
        ],[
            'category_id.required'    => 'Please select a category',
            'category_id.numeric'     => 'Please select a category',
            'subcategory_id.required' => 'Please select a subcategory',
            'subcategory_id.numeric'  => 'Please select a subcategory',
            'in_stock.required'       => 'The stock field is required.',
            'in_stock.numeric'        => 'Please insert number value (1 to 100...)',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('thum_image_1')) {
            $fileName =  imageUpload($request->file('thum_image_1'), "thum1_$request->name", $this->_moduleImagePath.'/thum/', '400', '400');
            $data['thum_image_1'] = $fileName;
        }
        if($request->hasFile('thum_image_2')) {
            $fileName =  imageUpload($request->file('thum_image_2'), "thum2_$request->name" , $this->_moduleImagePath.'/thum/', '400', '400');
            $data['thum_image_2'] = $fileName;
        }
        $data['admin_id'] = $admin->id;

        if($admin->role == 'craftsman'){
            $data['craftsman_id'] = $admin->id;
        }
        
        $productData = Product::create($data);
        if ($productData->id){
            // ########### After Product Insert ##############
            if (isset($data['check_color'])){
                if (!empty($data['product_color'])) {
                    //array filter for zero empty value check
                    $productColors = $data['product_color'];
                    $productColors = !empty($productColors) ? array_values(array_filter($productColors)) : array();
                    $colorData = [];
                    foreach ($productColors as $k => $color) {
                        $colorData[] = [
                            'product_id'   => $productData->id, // Product ID
                            'colors' => $color,
                        ];
                    }
                    if (!empty($colorData)) {
                        ProductColor::insert($colorData);
                    }else{
                        return redirect()->back()->with('error', 'Product color insert failed!');
                    }
                }
            }

            if (isset($data['check_size'])){
                if (!empty($data['product_size'])) {
                    //array filter for zero empty value check
                    $productSizes = $data['product_size'];
                    $productSizes = !empty($productSizes) ? array_values(array_filter($productSizes)) : array();
                    $sizeData = [];
                    foreach ($productSizes as $k => $size) {
                        $sizeData[] = [
                            'product_id'   => $productData->id, // Product ID
                            'size' => $size,
                        ];
                    }
                    if (!empty($sizeData)) {
                        ProductSize::insert($sizeData);
                    }else{
                        return redirect()->back()->with('error', 'Product size insert failed!');
                    }
                }
            }

            if (isset($data['check_image'])){
                if ($request->hasFile('product_image')) {
                    $images = [];
                    foreach($request->file('product_image') as $key => $image)
                    {
                        $fileNameMt =  imageUpload($image, "_$request->name", "$this->_moduleImagePath", '1200', '1200');
                        $images[] = [
                            'product_id' => $productData->id,
                            'image' => $fileNameMt,
                        ];
                    }
                    if (!empty($images)) {
                        ProductImage::insert($images);
                    }
                }
            }

            if (isset($data['check_shipping_return'])){
                $shipping = new ProductShippingReturn();
                $shipping->product_id        = $productData->id;
                $shipping->shipping_ue       = $data['shipping_ue'];
                $shipping->shipping_extra_ue = $data['shipping_extra_ue'];
                $shipping->delivery_time     = $data['delivery_time'];
                $shipping->return_policy     = $data['return_policy'];
                $shipping->save();
            }
            return redirect()->back()->with('success', 'Product save successfully!');
        }else{
            return redirect()->back()->with('error', 'Product insert failed!');
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
        $data = Product::with('ShippingReturn')->find($id);
        return view('admin.product.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data          = Product::with('ShippingReturn')->find($id);
        $materials     = Material::where('status', 'active')->get();
        $categories    = Category::where('status', 'active')->get();
        $subcategories = Category::where('id', $data->category_id)->with('subcategories')->first();
        return  view('admin.product.edit', compact('data', 'categories', 'subcategories', 'materials'));
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
            'category_id'    => 'required|numeric',
            'material_id'    => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'name'           => 'required|max:255',
            'title'          => 'required|max:255',
            'code'           => 'required|max:255',
            'price'          => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description'    => 'required',
            'thum_image_1'   => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'status'         => 'required',
            'in_stock'       => 'required|numeric',
        ],[
            'material.required'       => 'Please select a material',
            'category_id.required'    => 'Please select a category',
            'category_id.numeric'     => 'Please select a category',
            'subcategory_id.required' => 'Please select a subcategory',
            'subcategory_id.numeric'  => 'Please select a subcategory',
            'in_stock.required'       => 'The stock field is required.',
            'in_stock.numeric'        => 'Please insert number value (1 to 100...)',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('thum_image_1')) {
            $checkImg = Product::find($id);
            if ($checkImg->thum_image_1){
                if (!file_exists(public_path('media/'.$this->_moduleImagePath.'thum/'.$checkImg->thum_image_1))){
                    $checkImg->thum_image_1 = null;
                }else{
                    imageUnlink($checkImg->thum_image_1, $this->_moduleImagePath.'thum/');
                }
            }
            $fileName =  imageUpload($request->file('thum_image_1'), "thum1_$request->name", $this->_moduleImagePath.'/thum/', '400', '400');
            $data['thum_image_1'] = $fileName;
        }
        if($request->hasFile('thum_image_2')) {
            $checkImg = Product::find($id);
            if ($checkImg->thum_image_2){
                if (!file_exists(public_path('media/'.$this->_moduleImagePath.'thum/'.$checkImg->thum_image_2))){
                    $checkImg->thum_image_2 = null;
                }else{
                    imageUnlink($checkImg->thum_image_2, $this->_moduleImagePath.'thum/');
                }
            }
            $fileName =  imageUpload($request->file('thum_image_2'), "thum2_$request->name" , $this->_moduleImagePath.'/thum/', '400', '400');
            $data['thum_image_2'] = $fileName;
        }
        if (Product::find($id)->update($data)){
            if (isset($data['check_color'])){
                if (!empty($data['product_color'])) {
                    // delete all pre data
                    ProductColor::where('product_id', $id)->delete();
                    //array filter for zero empty value check
                    $productColors = $data['product_color'];
                    $productColors = !empty($productColors) ? array_values(array_filter($productColors)) : array();
                    $colorData = [];
                    foreach ($productColors as $k => $color) {
                        $colorData[] = [
                            'product_id'   => $id, // Product ID
                            'colors' => $color,
                        ];
                    }
                    if (!empty($colorData)) {
                        ProductColor::insert($colorData);
                    }else{
                        return redirect()->back()->with('error', 'Product color insert failed!');
                    }
                }
            }

            if (isset($data['check_size'])){
                if (!empty($data['product_size'])) {
                    // delete all pre data
                    ProductSize::where('product_id', $id)->delete();
                    //array filter for zero empty value check
                    $productSizes = $data['product_size'];
                    $productSizes = !empty($productSizes) ? array_values(array_filter($productSizes)) : array();
                    $sizeData = [];
                    foreach ($productSizes as $k => $size) {
                        $sizeData[] = [
                            'product_id'   => $id, // Product ID
                            'size' => $size,
                        ];
                    }
                    if (!empty($sizeData)) {
                        ProductSize::insert($sizeData);
                    }else{
                        return redirect()->back()->with('error', 'Product size insert failed!');
                    }
                }
            }

            if (isset($data['check_image'])){
                if ($request->hasFile('product_image')) {
                    $images = [];
                    foreach($request->file('product_image') as $key => $image)
                    {
                        $fileNameMt =  imageUpload($image, "_$request->name", "$this->_moduleImagePath", '1200', '1200');
                        $images[] = [
                            'product_id' => $id,
                            'image' => $fileNameMt,
                        ];
                    }
                    if (!empty($images)) {
                        ProductImage::insert($images);
                    }
                }
            }

            if (isset($data['check_shipping_return'])){
                if (ProductShippingReturn::where('product_id', $id)->first()){
                    $shipping = ProductShippingReturn::where('product_id', $id)->first();
                }else{
                    $shipping = new ProductShippingReturn();
                    $shipping->product_id = $id;
                }
                $shipping->shipping_ue       = $data['shipping_ue'];
                $shipping->shipping_extra_ue = $data['shipping_extra_ue'];
                $shipping->delivery_time     = $data['delivery_time'];
                $shipping->return_policy     = $data['return_policy'];
                $shipping->save();
            }
            return redirect()->back()->with('success', 'Product update successfully!');
        }else{
            return redirect()->back()->with('error', 'Product update failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        if ($data->thum_image_1){
            if (!file_exists(public_path('media/'.$this->_moduleImagePath.'thum/'.$data->thum_image_1))){
                $data->thum_image_1 = null;
            }else{
                imageUnlink($data->thum_image_1, $this->_moduleImagePath.'thum/');
            }
        }
        if ($data->thum_image_2){
            if (!file_exists(public_path('media/'.$this->_moduleImagePath.'thum/'.$data->thum_image_2))){
                $data->thum_image_2 = null;
            }else{
                imageUnlink($data->thum_image_2, $this->_moduleImagePath.'thum/');
            }
        }
        $productImgs = ProductImage::where('product_id', $id)->get();
        if (!empty($productImgs)){
            foreach ($productImgs as $img){
                if ($img->image){
                    if (!file_exists(public_path('media/'.$this->_moduleImagePath.$img->image))){
                        $img->image = null;
                    }else{
                        imageUnlink($img->image, $this->_moduleImagePath);
                    }
                }
            }
        }

        ProductSize::where('product_id', $id)->delete();
        ProductColor::where('product_id', $id)->delete();
        ProductImage::where('product_id', $id)->delete();
        ProductShippingReturn::where('product_id', $id)->delete();

        if ($data->delete()){
            return redirect()->back()->with('success', 'Product delete successfully!');
        }else{
            return redirect()->back()->with('error', 'Product delete failed!');
        }
    }

    // get category wise subcategory
    public function categoryWiseSubcategory($id){
        $subcategories = Subcategory::where('category_id', $id)->get();
        return view('admin.includes._subcategory', compact('subcategories'));
    }

    // Delete relation product Image
    public function imageDelete($id){
        $data = ProductImage::find($id);
        if ($data->image){
            if (!file_exists(public_path('media/'.$this->_moduleImagePath.$data->image))){
                $data->image = null;
            }else{
                imageUnlink($data->image, $this->_moduleImagePath);
            }
        }
        $data->delete();
        return redirect()->back()->with('success', 'This image deleted!');
    }
   
}
