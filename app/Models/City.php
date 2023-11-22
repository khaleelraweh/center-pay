<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nicolaslopezj\Searchable\SearchableTrait;

class City extends Model
{
    use HasFactory, SearchableTrait;

    protected $guarded = [];
    
    public $timestamps = false;

    public $searchable =  [
        'columns' =>[
            'cities.name' => 10,
            'cities.name_native' => 10,
        ]
    ];

    public function status():string{
        return $this->status ?'مفعل' : 'غير مفعل';
    }

    public function state():BelongsTo{
        return $this->belongsTo(State::class);
    }

    public function addresses():HasMany {
        return $this->hasMany(UserAddress::class);
    }
}
