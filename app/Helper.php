<?php

if (!function_exists('exampleFunction')) {
    function exampleFunction()
    {
        #code...
    }
}

// for Image upload
if (!function_exists('imageUpload')) {
    function imageUpload($image, $name = false, $filePath = false, $width = false, $height = false){
        $imageName = $image->getClientOriginalExtension();
        if ($imageName == 'svg'){
            $fileName = time().'_'.uniqid(). "_$name." . $imageName;
            $image->move('media/'.$filePath, $fileName);
            return  $fileName;
        }else{
            $fileName = time().'_'.uniqid(). "_$name." . $imageName;
            $directory = 'media/'.$filePath;
            $imageUrl = $directory.$fileName;
            if ($width && $height){
                \Image::make($image)->resize($width, $height)->save($imageUrl);
            }else {
                \Image::make($image)->save($imageUrl);
            }
        }
        return $fileName;
    }
}

// for image unlink
if (!function_exists('imageUnlink')) {
    function imageUnlink($name, $filePath){
        unlink('media/'.$filePath. $name);
        return true;
    }
}

// get category for website
if (!function_exists('getAllCategories')) {
    function getAllCategories(){
       $categories =  \App\Models\Category::where('status', 'active')->get();
       return $categories;
    }
}

