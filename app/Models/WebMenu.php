<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class WebMenu extends Model
{
    use HasFactory, HasTranslations, Sluggable, SearchableTrait;

    protected $guarded = [];
    public $translatable = ['title', 'slug'];


    public function sluggable():array
    {
        return [
            'slug->en' => [
                'source' => 'titleen',
            ],
            'slug->ar' => [
                'source' => 'titlear',
            ],
            'slug->ca' => [
                'source' => 'titleca',
            ]
        ];
    }

    protected $searchable = [
        'columns' => [
            'title' => 10,
            'link' => 10,
        ]
    ];

    
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getTitleenAttribute()
    {
        return $this->getTranslation('title', 'en');
    }

    public function getTitlearAttribute()
    {
        return $this->getTranslation('title', 'ar');
    }

    public function getTitlecaAttribute()
    {
        return $this->getTranslation('title', 'ca');
    }


    public function status(){
        return $this->status ? __('panel.status_active') : __('panel.status_inactive');
    }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }

    public function scopeRootCategory($query){
        return $query->whereNull('parent_id');
        
    }

    public function scopeMainMenu($query){
        return $query->whereSection(1);  
    }
  


    // Get Parent of This Element in the same table inner Relationship
    public function parent():HasOne
    {       
        return $this->hasOne(webMenu::class, 'id'       ,  'parent_id');
    }

    // Get All Childreen of This Element in the same table inner Relationship
    public function children()
    {
        return $this->hasMany(webMenu::class, 'parent_id', 'id');
    }

    // Get The children that allowed to be appeared and used
    public function appearedChildren()
    {
        return $this->hasMany(webMenu::class, 'parent_id', 'id')->where('status',true);
    }

     //This will get all route categories and its childreen under route categories
    public static function tree( $level = 1 )
    {
        return static::with(implode('.', array_fill(0, $level, 'children')))
            ->whereNull('parent_id')
            ->whereStatus(true)
            ->where('section' , 1)
            ->orderBy('id', 'asc')
            ->get();
    } 

    // for calling help menu in the footer 
    public static function helpTree( $level = 1 )
    {
        return static::with(implode('.', array_fill(0, $level, 'children')))
            ->whereNull('parent_id')
            ->whereStatus(true)
            ->where('section' , 2)
            ->orderBy('id', 'asc')
            ->get();
    } 



}
