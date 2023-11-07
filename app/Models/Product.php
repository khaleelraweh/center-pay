<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{
    use HasFactory ,Sluggable ;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category(){
                                                    //   foreign_key_of this , primary key of productCategory
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    // one product may have more than one photo
    public function photos():MorphMany
    {
        return $this->morphMany(photo::class, 'imageable');
    }

    public function tags():MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
