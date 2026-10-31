<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCourse; 

class AddCourseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code'   => 'required|string|max:20|unique:add_courses,course_code',
            'course_name'   => 'required|string|max:150',
            'department'    => 'required|string|max:150',
            'credit_units'  => 'required|integer|min:1|max:10',
            'semester'      => 'required|string|max:20',
            'year_of_study' => 'required|string|max:20',
        ]);

        AddCourse::create($validated);

        return redirect()->back()->with('success', 'Course added successfully!');
    }

    public function update(Request $request, $id)
    {
        $course = AddCourse::findOrFail($id);

        $validated = $request->validate([
            'course_code'   => 'required|string|max:20|unique:add_courses,course_code,' . $course->id,
            'course_name'   => 'required|string|max:150',
            'department'    => 'required|string|max:150',
            'credit_units'  => 'required|integer|min:1|max:10',
            'semester'      => 'required|string|max:20',
            'year_of_study' => 'required|string|max:20',
        ]);

        $course->update($validated);

        return redirect()->back()->with('success', 'Course updated successfully!');
    }

    public function destroy($id)
    {
        $course = AddCourse::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Course deleted successfully!');
    }
}