<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageRepository
{
    public function saveImage($image, $type, $id_owner, $size)
    {
        if (!is_null($image))
        {
            $file = $image;
            $relative_path = 'images/'.$type.'/'.$id_owner.'/';

            $fileName = time() . random_int(100, 999) .'.jpg';
            $destinationPath = public_path($relative_path);

            $fullPath = $destinationPath.$fileName;

            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }

            $image = Image::make($file)
                ->resize($size, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg');
            $image->save($fullPath, 100);

            return $relative_path.$fileName;

        } else {
            return '';
        }
    }

    public function remove($nomeimagem, $type, $id_owner) {
      $pathImagem = public_path('images/'.$type.'/'.$id_owner.'/').$nomeimagem;

      if(file_exists($pathImagem)) {
          File::delete($pathImagem);
      }
    }

    public function download($nomeimagem, $type, $id_owner) {
      $pathImagem = public_path('images/'.$type.'/'.$id_owner.'/').$nomeimagem;

      if (!file_exists($pathImagem)) {
          return null;
      }

      return response()->download($pathImagem);
    }
}
