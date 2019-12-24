<?php

namespace App\Helpers;

use Storage;
use Image;

/* 
Aplikasi ini didedikasikan penuh kepada kesayangan saya Ratih Galuh Pradewi
Core helper untuk aplikasi RAA (Rencana Aksi Asma)

ditulis oleh Adeardo Dora Harnanda
Tgl 18 Agustus 2019 (14:21 WIB)
*/

class RGP {
  public static function fractal($data, $fractalClass, $isCollection = true, $serialize = true) {
    if ($isCollection == true) {
      if ($serialize == true)
        return fractal()
        ->collection($data)
        ->transformWith(new $fractalClass)
        ->serializeWith(new \Spatie\Fractalistic\ArraySerializer())
        ->toArray();
      else
        return fractal()
        ->collection($data)
        ->transformWith(new $fractalClass)
        ->toArray();
    }
    else {
      if ($serialize == true)
        return fractal()
        ->item($data)
        ->transformWith(new $fractalClass)
        ->serializeWith(new \Spatie\Fractalistic\ArraySerializer())
        ->toArray();
      else
        return fractal()
        ->item($data)
        ->transformWith(new $fractalClass)
        ->toArray();
    }
  }

  public static function slug($str, $delimiter = '-') {
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;
  }

  public static function arrayToPage($current_page,$per_page,$data) {
    $total = count($data); // total data
    $last = ceil($total/$per_page); // round up last page

    // get data by page
    $datas = array_slice($data,($current_page-1)*$per_page,$per_page);
    // $datas = array_slice($data,0*$per_page,$per_page);

    $res = collect([
      'current_page' => (int)$current_page,
      'last_page' => $last,
      'per_page' => $per_page,
      'total' => $total,
      'data' => $datas
    ]);

    return $res;
  }

  public static function uploadProductPhotos($datas) {
    foreach ($datas as $index => $photo) {
      // compress image size
      // $image = Image::make($photo)->fit(500)->encode('jpg',80);
      $image = Image::make($photo)->encode('jpg',50);
      // naming image file
      $hash = md5($image->__toString().date('Y-m-d H:i:s'));
      $image_name = "{$hash}.jpg";
      // store image to public file
      Storage::disk('public_uploads')->put("product_photos/$image_name", $image);
      // insert all image name into comma delimiter
      if ($index == 0) {
        $photos = $image_name;
      }
      else {
        $photos = $photos.','.$image_name;
      }
    }
    
    return $photos;
  }
}