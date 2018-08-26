<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public static $messages = [
            'name.required' => 'Debe ingresar un nombre para la categoría.',
            'name.min' => 'El nombre de la categoría debe tener al menos 3 caracteres.',            
            'descripcion.max' => 'El maximo de la descripcion debe ser de 250 caracteres.'

        ];

        public static $rules = [
            'name' => 'required|min:3',
            'descripcion' => 'max:250'            
        ];

	protected $fillable = ['name', 'descripcion'];
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url;
    }
}
