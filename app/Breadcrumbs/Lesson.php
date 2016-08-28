<?php

namespace App\Breadcrumbs;

use App\Breadcrumbs\BreadcrumbComposer;

class Lesson extends BreadcrumbComposer
{
    public function index()
    {
        return ['Lessons' => 'lessons'];
    }

    public function create()
    {
        return $this->index() + ['Create' => 'create'];
    }

    public function show()
    {
        return $this->index() + [$this->model->title => $this->model->id];
    }

    public function edit()
    {
        return $this->show($model) + ['Edit' => $this->model->id . '/edit'];
    }
}