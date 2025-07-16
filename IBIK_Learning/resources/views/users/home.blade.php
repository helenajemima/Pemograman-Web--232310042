@extends('layouts.app')

@section('content')

@php
    $data = include resource_path('data/dummy.php');
    $instructors = $data['instructors'];
    $testimonials = $data['testimonials'];
@endphp

{{-- Hero Section --}}
<section class="py-5" style="background-color: #0F193E;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6 text-center text-md-start">
                <h1 class="fw-bold display-5 mb-3 text-light">
                    Upgrade Your <span style="color: var(--secondary);">Tech Skills</span><br>
                    with Top Online Courses
                </h1>
                <p class="small mb-4 text-light">
                    Learn from industry experts, boost your career, and join a community of passionate learners.
                </p>
                <a href="{{ url('/product') }}" class="btn px-4 py-2 fw-semibold"
                    style="background-color: var(--secondary); color: #fff;">
                    Get Started
                </a>
            </div>
            <div class="col-md-6 text-center">
                <img 
                    src="{{ asset('assets/images/hero.png') }}" 
                    alt="Hero"
                    class="img-fluid"
                    style="max-height: 220px; height: auto; width: auto;">
            </div>
        </div>
    </div>
</section>

{{-- Partners --}}
<section style="background-color: #1F2281;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between px-4 py-3 rounded-3">
            <span class="fw-semibold small text-light">
                Our Course Partners :
            </span>
            <div class="d-flex align-items-center gap-4 flex-wrap justify-content-center flex-grow-1">
                <img src="{{ asset('assets/images/patner-02.png') }}" alt="partner" height="80">
                <img src="{{ asset('assets/images/patner-03.png') }}" alt="partner" height="80">
                <img src="{{ asset('assets/images/patner-04.png') }}" alt="partner" height="80">
                <img src="{{ asset('assets/images/patner-05.png') }}" alt="partner" height="80">
                <img src="{{ asset('assets/images/patner-06.png') }}" alt="partner" height="80">
            </div>
        </div>
    </div>
</section>

{{-- Featured Courses --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">
                Featured <span style="color: var(--secondary);">Courses</span>
            </h2>
            <p class="text-light small">
                Discover, collect, and enroll in extraordinary tech courses on our platform.
            </p>
        </div>

        <div class="row g-4">
            @if (isset($courses) && count($courses))
                @foreach ($courses as $course) 
                    <div class="col-md-4"> 
                        <div 
                            class="card border-0 rounded-4 overflow-hidden" 
                            style="background-color: var(--card-bg);"> 
                            <img 
                                src="{{ asset('storage/' . $course->image) }}" 
                                class="card-img-top" 
                                alt="{{ $course->title }}"> 
                            <div class="card-body p-4"> 
                                <div 
                                    class="d-flex justify-content-between  
                                           align-items-center mb-2"> 
                                    <span class="text-light small"> 
                                        <i class="bi bi-play-circle"></i> {{ $course->lessons }} 
                                    </span> 
                                    <span class="badge bg-secondary"> 
                                        {{ $course->category }} 
                                    </span> 
                                </div> 
 
                                <h5 class="text-light fw-semibold"> 
                                    {{ $course->title }} 
                                </h5> 
 
                                <div 
                                    class="d-flex align-items-center gap-3  
                                           border-top border-secondary-subtle pt-3 mt-3"> 
                                    <img 
                                        src="{{ asset('storage/' . $course->avatar) }}" 
                                        class="rounded-circle" 
                                        width="40" 
                                        height="40" 
                                        alt="{{ $course->instructor }}"> 
                                    <div class="flex-grow-1"> 
                                        <div class="fw-semibold text-light"> 
                                            {{ $course->instructor }} 
                                        </div> 
                                        <small class="text-light"> 
                                            {{ $course->role }} 
                                        </small> 
                                    </div> 
                                    <div class="text-end small text-light"> 
                                        {{ $course->students }} 
                                    </div> 
                                </div> 
 
                                <div 
                                    class="d-flex justify-content-between  
                                           align-items-center mt-3"> 
                                    <div class="text-warning"> 
                                        @for ($i = 0; $i < $course->rating; $i++) 
                                            ★ 
                                        @endfor 
                                    </div> 
                                    <a 
                                        href="#" 
                                        class="btn btn-outline-light btn-sm"> 
                                        Enroll Now 
                                    </a> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                @endforeach 
            @else
                <p class="text-light text-center">
                    No courses available at the moment.
                </p>
            @endif
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('/product') }}" class="btn btn-outline-light px-4 py-2 fw-semibold">
                View All Courses
            </a>
        </div>
    </div>
</section>

{{-- Instructors --}}
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-2">
            Meet Our best <span style="color: var(--secondary);">Instructors</span>
        </h2>
        <p class="text-light small mb-4">
            Learn from the experts who are passionate about your success.
        </p>
        <div class="row justify-content-center g-3">
            @foreach ($instructors as $instructor)
                <div class="col-md-4 col-lg-3">
                    <div class="d-flex align-items-center justify-content-between px-3 py-2 rounded-3"
                        style="background-color: var(--bg-secondary);">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('assets/images/' . $instructor['avatar']) }}" class="rounded-circle"
                                width="40" height="40" alt="{{ $instructor['name'] }}">
                            <div class="text-start">
                                <div class="fw-semibold text-light small">
                                    {{ $instructor['name'] }}
                                </div>
                                <small class="text-light small">
                                    {{ $instructor['role'] }}
                                </small>
                            </div>
                        </div>
                        <i class="bi bi-box-arrow-up-right text-light"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold">
                What <span style="color: var(--secondary);">People Say</span>
            </h3>
        </div>
        <div class="row justify-content-center g-4">
            @foreach ($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="p-4 rounded-4 text-center h-100" style="background-color: var(--bg-secondary);">
                        <img src="{{ asset('assets/images/' . $testimonial['avatar']) }}" width="80"
                            class="mb-3 rounded-circle" alt="{{ $testimonial['name'] }}">
                        <h5 class="text-light mb-0">
                            {{ $testimonial['name'] }}
                        </h5>
                        <p class="text-light small mb-2">
                            {{ $testimonial['role'] }}
                        </p>
                        <p class="text-light small mb-3">
                            "{{ $testimonial['message'] }}"
                        </p>
                        <div class="text-warning">
                            @for ($i = 0; $i < $testimonial['rating']; $i++)
                                ★
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
