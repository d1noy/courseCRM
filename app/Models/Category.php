<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'start_date',
        'end_date',
        'images'
    ];
    protected $casts = [
        'images' => 'array',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }

    public function defaultImage() :Attribute
    {
        return Attribute::get(function () {
            if(isset($this->images[0]) && is_string($this->images[0])){
                return asset($this->images[0]);
            }
            return '';
        });
    }

    public function imageUrls() :Attribute
    {
        return Attribute::get(function () {
            if(isset($this->images[0]) && is_string($this->images[0])){
                $images = [];

                foreach ($this->images as $image){
                    $images[] = asset($image);
                }
                return $images;
            }
            return [];
        });
    }

    public function updateImage(array|UploadedFile|null $files): void
    {
        if(!$files){
            return;
        }
        if($files instanceof UploadedFile) {
            $files = [$files];
        }
            $images = [];

            foreach ($files as $image){
                if($image instanceof UploadedFile){
                $imageName = uniqid().'.'.$image->getClientOriginalExtension();
                $outputPath = public_path('images/') . '/' . $imageName;
                if(file_exists($image->getRealPath())){
                    $this->createThumbinalWatermark($image->getRealPath(), $outputPath);
                    $images[] = 'images/' . $imageName;
                    }
                }
            }
            $this->images = $images;
            $this->save();
        }


    private function createThumbinalWatermark($sourcePath, $outputPath): void
    {
        [$originalWidth, $originalHeight, $imageType] = getimagesize($sourcePath);

        $srcImage = match($imageType) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($sourcePath),
            IMAGETYPE_PNG => imagecreatefrompng($sourcePath),
        };
        $maxWidth =300;
        $maxHeight = 300;

        if($originalWidth > $originalHeight){
            $newWidth = $originalWidth;
            $newHeight = $originalHeight * $newWidth / $originalWidth;
        } else {
            $newHeight = $maxHeight;
            $newWidth = $originalWidth * $newHeight / $originalHeight;
        } if($newWidth > $maxWidth){
        $newWidth = $maxWidth * $newHeight / $originalWidth;
        $newHeight = $maxWidth;
    } if ($newHeight > $maxHeight){
        $newWidth = $maxHeight * $newHeight / $newHeight;
        $newHeight = $maxHeight;
    }
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresized($newImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
        $text = 'SEVENTY';
        $fontSize = 10;
        $fontColor = imagecolorallocate($newImage, 100, 100, 100);
        imagestring($newImage, $fontSize, $newWidth -40, $newHeight - 40, $text, $fontColor);
        imagejpeg($newImage, $outputPath, 90);
        imagedestroy($newImage);
        imagedestroy($srcImage);
    }


}

