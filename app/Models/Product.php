<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;
    protected $translatable = ['name', 'slug', 'description', 'content'];
    protected $guarded = [];

    /**
     * Cette méthode retourne les catégories lié à un article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany(Category::class, 'product_category');
    }

    /**
     * Cette méthode retourne le poster d'un article
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function poster(){
        return $this->morphOne(Attachment::class, 'attachable');
    }

    /**
     * Cette méthode permet de recuperer tous les articles pouvant être afficher en ligne
     * @param Builder $builder
     * @return Builder
     */
    public function scopeOnline(Builder $builder){
        return $builder
            ->where('state', '=', 1)
            ->where('confirmed', '=', 1);
    }

    /**
     * Cette méthode permet de recuperer tous les articles hors ligne
     * @param Builder $builder
     * @return Builder
     */
    public function scopeOffline(Builder $builder){
        return $builder
            ->where('confirmed', '=', 0);
    }

    /**
     * Cette méthode permet de recuperer tous les articles pouvant être afficher en ligne
     * @param Builder $builder
     * @return Builder
     */
    public function scopeDrafts(Builder $builder){
        return $builder
            ->where('state', '=', 0);
    }

    public function isCommentable(){
        return $this->commentable === 1;
    }
}
