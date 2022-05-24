<?php
namespace App\Utils;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class Imag{
    public function url($path, $_directory = 'uploads'){
        if($path){
        $filename = time().'.jpg';
        $img = Image::make($path)->encode('jpg', 80);
        Storage::disk('public')->put($_directory.'/'.Auth::user()->id.'/'.$filename, $img);
        return $filename;
        } else {
            return false;
        }
    }
}
