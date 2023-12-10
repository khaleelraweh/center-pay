<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class PaymentCategory extends Model
{
    use HasFactory ,Sluggable , SearchableTrait , SoftDeletes;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_ar'
            ]
        ];
    }

    protected $searchable = [
        'columns' => [
            'payment_categories.name_ar' => 10,
            'payment_categories.name_en' => 10,
        ]
    ];

    public function status(){
        return $this->status ? 'مفعل' : "غير مفعل";
    }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }

    // product category has only one photo in photo table so relationship is morphone
    // to get only first one media elemet
    public function firstMedia(): MorphOne{
        return $this->MorphOne(Photo::class, 'imageable')->orderBy('file_sort','asc');
    }

    public function lastMedia(): MorphOne{
        return $this->MorphOne(Photo::class, 'imageable')->orderBy('file_sort','desc');
    }
    
    // one product may have more than one photo
    public function photos():MorphMany
    {
        return $this->morphMany(Photo::class, 'imageable');
    }
    
}
