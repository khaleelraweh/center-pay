<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Currency extends Model 
{
    use HasFactory ,Sluggable , SearchableTrait , SoftDeletes;

    protected $guarded = [];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'currency_name'
            ]
        ];
    }

    protected $searchable = [
        'columns' => [
            'currencies.currency_name' => 10,
        ]
    ];
    
    public function status(){
        return $this->status ? 'مفعل' : "غير مفعل";
    }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }
}
