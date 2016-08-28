<?php

namespace App\Breadcrumbs;

use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class BreadcrumbComposer
{
    protected $breadcrumbs = ['Home' => 'home'];

    protected $model;

    /**
     * Instantiate Breadcrumb formation and pass $breadcrumbs to View Composer
     *
     * @param  View  $view
     * @param  $model_type The general model class
     * @return void
     */
    public function compose(View $view, $model_type)
    {
        $this->model = $this->get_model($model_type);

        $this->addBreadcrumbsFor($this->get_action());

        $view->with('breadcrumbs', $this->breadcrumbs);
    }

    private function addBreadcrumbsFor($method)
    {
        if (method_exists($this, $method)) {

            $breadcrumbs = $this->$method();
            
            if ($breadcrumbs) {
                foreach ($breadcrumbs as $name => $slug) {
                    $this->push($name, $slug);
                }
            }
        }
    }

    private function get_model($model)
    {
        $r = request()->route();
        
        if (count($r->parameters()) > 0) {
            return $r->parameters()[strtolower(class_basename($model))];
        }
    }

    private function get_action()
    {
        $action_name = class_basename(Route::getCurrentRoute()->getActionName());
        return explode('@', $action_name)[1];
    }

    private function push($name, $slug)
    {
        $this->breadcrumbs[$name] = $slug;
    }
}
