<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Category $category)
    {
        return view('courses.index', [
            'category' => $category,
            'course' => $category->courses,
        ]);
    }
    public function create(Category $category)
    {
        return view('courses.create', compact('category'));
    }

    public function store(CourseRequest $request, Category $category)
    {
        $category->courses()->create($request->validated());
        return redirect()->route('courses.index', compact('category'));

    }

    public function list()
    {
        return view('courses.list', [
            'courses' => Course::query()->orderBy('id', 'DESC')->paginate(3),
        ]);
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }


}
