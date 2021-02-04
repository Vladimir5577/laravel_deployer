<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(100)
              ->height(100);
 		$this->addMediaConversion('preview')
              ->width(200)
              ->height(200);
       	$this->addMediaConversion('custom')
              ->width(300)
              ->height(300);         
    }

    public function setImageAttribute () {
    	// dd($this->image);
    	$this->addMedia($this->image)->toMediaCollection();
    }
}
