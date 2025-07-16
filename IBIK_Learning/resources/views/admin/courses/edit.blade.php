@extends('layouts.app') 
 
@section('title', 'Admin - Courses') 
 
@section('content') 
    <div class="container py-5"> 
        <h2 class="mb-4">Edit Course</h2> 
 
        @if ($errors->any()) 
            <div class="alert alert-danger"> 
                <strong>Whoops!</strong> Ada kesalahan saat mengisi form.<br><br> 
                <ul class="mb-0"> 
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach 
                </ul> 
            </div> 
        @endif 
 
        <form 
            action="{{ route('admin.courses.update', $course->id) }}" 
            method="POST" 
            enctype="multipart/form-data"> 
            @csrf 
            @method('PUT') 
            @include('admin.courses.form', ['course' => $course]) 
        </form> 
    </div> 
@endsection