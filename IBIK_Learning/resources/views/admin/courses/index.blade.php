@extends('layouts.app') 
 
@section('Admin - Courses') 
 
@section('content') 
    <div class="container py-5"> 
        <div class="d-flex justify-content-between align-items-center mb-4"> 
            <h2 class="mb-0">All Courses</h2> 
            <a href="{{ route('admin.courses.create') }}" class="btn btn-success">+ Create New</a> 
        </div> 
 
        @if (session('success')) 
            <div class="alert alert-success"> 
                {{ session('success') }} 
            </div> 
        @endif 
 
        <table class="table table-hover align-middle"> 
            <thead> 
                <tr> 
                    <th>#</th> 
                    <th>Title</th> 
                    <th>Instructor</th> 
                    <th>Category</th> 
                    <th>Students</th> 
                    <th>Rating</th> 
                    <th>Action</th> 
                </tr> 
            </thead> 
            <tbody> 
                @forelse ($courses as $course) 
                    <tr> 
                        <td>{{ $loop->iteration }}</td> 
                        <td>{{ $course->title }}</td> 
                        <td>{{ $course->instructor }}</td> 
                        <td>{{ $course->category }}</td> 
                        <td>{{ $course->students }}</td> 
                        <td>{{ $course->rating }}</td> 
                        <td> 
                            <a 
                                href="{{ route('admin.courses.edit', $course->id) }}" 
                                class="btn btn-sm btn-warning">Edit</a> 
                            <form 
                                action="{{ route('admin.courses.destroy', $course->id) }}" 
                                method="POST" 
                                class="d-inline" 
                                onsubmit="return confirm('Are you sure?');"> 
                                @csrf 
                                @method('DELETE') 
                                <button class="btn btn-sm btn-danger">Delete</button> 
                            </form> 
                        </td> 
                    </tr> 
                @empty 
                    <tr> 
                        <td colspan="7" class="text-center">No courses found.</td> 
                    </tr> 
                @endforelse 
            </tbody> 
        </table> 
    </div> 
@endsection 