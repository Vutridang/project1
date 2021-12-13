<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categorys';

    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(){
       return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive(){
        return $this->children()->with('childrenRecursive');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}

