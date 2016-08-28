<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function composeBreadcrumbs($model_type)
    {
        View::composer('*', function( $view ) use ($model_type){
            $path = "App\Breadcrumbs\\".class_basename($model_type);
            \App::make($path)->compose($view, $model_type);
        });
    }
}
