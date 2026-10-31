@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Available Courses</h2>
    @hasrole('Administrator')
        <a href="{{ route('courses.create') }}" class="btn btn-primary">+ Add New Course</a>
    @endhasrole
</div>

<div class="row">
    @forelse($courses as $course)
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <span class="badge bg-secondary mb-2">{{ $course->course_code }}</span>
                    <h5 class="card-title">{{ $course->course_name }}</h5>
                    <p class="card-text text-muted">
                        Lecturer: {{ $course->lecturer ? $course->lecturer->name : 'Unassigned' }}
                    </p>
                </div>
                <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center">
                    @hasrole('Student')
                        <form action="{{ route('registrations.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_name" value="{{ $course->course_code }}">
                            <input type="hidden" name="course_id" value="{{ $course->course_code }}">
                            <input type="hidden" name="Academic_year" value="{{ $course->Academic_year }}">
                            <input type="hidden" name="semester" value="{{ $course->semester }}">
                            <button type="submit" class="btn btn-sm btn-success">Register for Course</button>
                        </form>
                    @endhasrole

                    @hasrole('Administrator')
                        <div>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete course?')">Delete</button>
                            </form>
                        </div>
                    @endhasrole
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><div class="alert alert-info">No courses available.</div></div>
    @endforelse
</div>
@endsection