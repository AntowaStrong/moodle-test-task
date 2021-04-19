@extends('layouts.layout')

@section('content')
    <div>
        <h1 style="text-align: center"> Test Task </h1>
        <a href="{{ route('moodle.users') }}" class="text-lg px-6 text-gray-700 underline">Users</a>
        <a href="{{ route('moodle.courses') }}" class="text-lg px-6 text-gray-700 underline">Courses</a>
        <a href="{{ route('moodle.grades') }}" class="text-lg px-6 text-gray-700 underline">Grades</a>
    </div>
@endsection