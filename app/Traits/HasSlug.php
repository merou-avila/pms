<?php

namespace App\Traits;

trait HasSlug
{
    protected function sluggableField()
    {
        return 'name';
    }

    public static function bootHasSlug()
    {
        static::creating(function ($model) {
            $slug = empty($model->slug) ?
                str_slug($model->{$model->sluggableField()}) :
                $model->slug;

            $model->slug = $slug;
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
