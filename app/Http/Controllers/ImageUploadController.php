<?php

namespace App\Http\Controllers;
use JD\Cloudder\Facades\Cloudder;
use App;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function home()
   {
        return view('home2');
   }

   public function uploadImages(Request $request)
   {
    //    return redirect()->back()->with('status', 'Image Uploaded Successfully');

    $this->validate($request,[
        'image_name1'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        'image_name2'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        'image_name3'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        'image_name4'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000'
    ]);

    $image1 = $request->file('image_name1');
    $image2 = $request->file('image_name2');
    $image3 = $request->file('image_name3');
    $image4 = $request->file('image_name4');

    $name1 = $request->file('image_name1')->getClientOriginalName();
    $name2 = $request->file('image_name2')->getClientOriginalName();
    $name3 = $request->file('image_name3')->getClientOriginalName();
    $name4 = $request->file('image_name4')->getClientOriginalName();

    $image_name1 = $request->file('image_name1')->getRealPath();
    $image_name2 = $request->file('image_name2')->getRealPath();
    $image_name3 = $request->file('image_name3')->getRealPath();
    $image_name4 = $request->file('image_name4')->getRealPath();
    
    //    Cloudder::upload($image_name, "Titulaoda");

    //Imagenes a Cloudinary
    Cloudder::upload($image_name1, null);
    list($width1, $height1) = getimagesize($image_name1);
    $image_url1= Cloudder::show(Cloudder::getPublicId(), ["width" => $width1, "height"=>$height1]);

    Cloudder::upload($image_name2, null);
    list($width2, $height2) = getimagesize($image_name2);
    $image_url2= Cloudder::show(Cloudder::getPublicId(), ["width" => $width2, "height"=>$height2]);

    Cloudder::upload($image_name3, null);
    list($width3, $height3) = getimagesize($image_name3);
    $image_url3= Cloudder::show(Cloudder::getPublicId(), ["width" => $width3, "height"=>$height3]);

    Cloudder::upload($image_name4, null);
    list($width4, $height4) = getimagesize($image_name4);
    $image_url4= Cloudder::show(Cloudder::getPublicId(), ["width" => $width4, "height"=>$height4]);    

    //Guardar imagenes en el directorio
    $image1->move(public_path("uploads"), $name1);
    $image2->move(public_path("uploads"), $name2);
    $image3->move(public_path("uploads"), $name3);
    $image4->move(public_path("uploads"), $name4);

    //Guardar imágenes En base de datos
    $this->saveImages($request, $image_url1,$image_url2,$image_url3,$image_url4);

    return view('home3')->with('datos', $image_url1);

   }

   public function saveImages(Request $request, $image_url1,$image_url2,$image_url3,$image_url4)
   {
       $image = new App\Models\Tablaimagen;

       $image->image_name1 = $image_url1;
       $image->image_name2 = $image_url2;
       $image->image_name3 = $image_url3;
       $image->image_name4 = $image_url4;

       $image->save();

   }

}