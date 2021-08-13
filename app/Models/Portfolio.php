<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use Sluggable,SluggableScopeHelpers;

    protected $table = 'portfolio';

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'portfolio_category_group')->withPivot('created_at');
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class,'portfolio_category_group')->withPivot('created_at');
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
