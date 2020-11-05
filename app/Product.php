<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        }
    public function images() {
        return $this->hasMany(productImage::class, 'product_id');
    }
    public function tags() {
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id')->withTimestamps();
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function productImages() {
        return $this->hasMany( productImage::class, 'product_id');
    }
}
