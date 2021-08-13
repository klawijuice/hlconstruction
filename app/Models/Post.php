<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = ['name', 'slug', 'description', 'content'];
    protected $guarded = [];

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
