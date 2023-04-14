<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        builder::macro('search', function ($field, $string){
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });
    }
}
