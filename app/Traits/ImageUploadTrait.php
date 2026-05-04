<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait ImageUploadTrait
{
    public function uploadImage($file, $path)
    {
        $name = uniqid() . ".webp";

        $driver = new Driver();
        $manager = new ImageManager($driver);

        $image = $manager->read($file)->toWebp(90);

        Storage::disk('public')->put("$path/$name", (string) $image);

        return $name;
    }
}
