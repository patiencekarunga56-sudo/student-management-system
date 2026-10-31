@extends('layouts.app')

@section('content')
<h2 class="mb-4">My Registered Courses</h2>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white fw-bold">Currently Registered Courses</div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Academic Year</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registeredCourses as $course)
                    <tr>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->pivot->academic_year }}</td>
                        <td>{{ $course->pivot->semester }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">You have not registered for any courses yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection