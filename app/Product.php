<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function images(){
    	return $this->hasMany('App\ProductImage');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function coverImage(){
    	return $this->images()->where('is_cover_image', true)->firstOrFail();
    }
}
