<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function images(){
        return $this->hasMany(Image::class,'product_id','id');
        //vì 1 sản phẩm có thể có nhiều hình ảnh nên dùng hasMany
    }
}
