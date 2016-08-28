<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lesson;

class LessonController extends Controller
{
    public function __construct(Lesson $lesson)
    {
        $this->composeBreadcrumbs($lesson);
    }

    public function index()
    {
        $lessons = Lesson::all();

        return view('lessons.index',compact('lessons'));
    }

    public function create()
    {
        return view('lessons.create');
    }

    public function show(Lesson $lesson)
    {
        return view('lessons.show',compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        return view('lessons.edit',compact('lesson'));
    }
}
