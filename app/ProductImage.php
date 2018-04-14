<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }


    //metodo para obtner la url de la imagen en caso de ser una imagen de la web o una imagen del servidor local
    public function getUrlAttribute()
    {
    	if(substr($this->image, 0, 4) == "http")
    	{
    		return $this->image;
    	}

    	else
    	{

    	return "/images/products/". $this->image;
    	}
    }
}
