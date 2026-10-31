@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Student Management</h2>
    <!-- Question 5d: Display actions according to user permissions -->
</div>
<div>
    <div>
        <table>
            <thead>
                @foreach($students as $student)
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>password</th>
                    
                        <th>Actions</th>
                        <td>
                                <a href="">Edit</a>
                                <form action="{{ route('destroy', $student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  >Delete</button>
                                </form>
                            </td>
                  
                  </tr>
                @endforeach
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->Role }}</td>
                        <td>{{ $student->password }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No students found.</td>
                    </tr>
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection