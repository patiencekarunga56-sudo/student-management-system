@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <h1 class="text-2xl font-bold mb-2">Admin Dashboard</h1>
    <p class="text-gray-600">Welcome back, {{ auth()->user()->name }}. You can manage students, courses, and user roles here.</p>
</div>
@endsection