<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showForUser() 
    { 
        $courses     = Course::latest()->take(3)->get(); 
        $categories  = $courses->pluck('category')->unique()->sort()->values(); 
 
        return view('users.home', compact('courses', 'categories')); 
    } 

    public function list(Request $request) 
    { 
        $query = Course::query(); 
 
        // Filter berdasarkan pencarian 
        if ($request->filled('search')) { 
            $query->where('title', 'like', '%' . $request->search . '%'); 
        } 
 
        // Filter berdasarkan kategori 
        if ($request->filled('category')) { 
            $query->where('category', $request->category); 
        } 
 
        $courses = $query->latest()->paginate(9)->withQueryString(); 
 
        // Ambil semua kategori unik 
        $categories = Course::select('category')->distinct()->orderBy('category')->pluck('category'); 
 
        return view('users.product', compact('courses', 'categories')); 
    }

    /**
     * Display a listing of the resource.
     */
     public function index() 
    { 
        $courses = Course::latest()->get(); 
        return view('admin.courses.index', compact('courses')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    { 
        return view('admin.courses.create'); 
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    { 
        $request->validate([ 
            'title'      => 'required|string', 
            'category'   => 'required|string', 
            'lessons'    => 'required|integer', 
            'instructor' => 'required|string', 
            'role'       => 'required|string', 
            'students'   => 'required|integer', 
            'rating'     => 'required|integer|min:1|max:5', 
            'image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', 
            'avatar'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]); 
 
        $data = $request->except(['image', 'avatar']); 
 
        // Upload image & avatar 
        if ($request->hasFile('image')) { 
            $data['image'] = $request->file('image') 
                ->store('assets/images', 'public'); 
        } 
        if ($request->hasFile('avatar')) { 
            $data['avatar'] = $request->file('avatar') 
                ->store('assets/images', 'public'); 
        } 
 
        Course::create($data); 
 
        return redirect()->route('admin.courses.index') 
            ->with('success', 'Course created successfully.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Course $course) 
    { 
        return view('admin.courses.edit', compact('course')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course) 
    { 
        $request->validate([ 
            'title'      => 'required|string', 
            'category'   => 'required|string', 
            'lessons'    => 'required|integer', 
            'instructor' => 'required|string', 
            'role'       => 'required|string', 
            'students'   => 'required|integer', 
            'rating'     => 'required|integer|min:1|max:5', 
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
            'avatar'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]); 
 
        $data = $request->except(['image', 'avatar']); 
 
        // Ganti image jika ada upload baru 
        if ($request->hasFile('image')) { 
            if ($course->image) { 
                Storage::disk('public')->delete($course->image); 
            } 
            $data['image'] = $request->file('image') 
                ->store('assets/images', 'public'); 
        } 
 
        // Ganti avatar jika ada upload baru 
        if ($request->hasFile('avatar')) { 
            if ($course->avatar) { 
                Storage::disk('public')->delete($course->avatar); 
            } 
            $data['avatar'] = $request->file('avatar') 
                ->store('assets/images', 'public'); 
        } 
 
        $course->update($data); 
 
        return redirect()->route('admin.courses.index') 
            ->with('success', 'Course updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Course $course) 
    { 
        if ($course->image)  Storage::disk('public')->delete($course->image); 
        if ($course->avatar) Storage::disk('public')->delete($course->avatar); 
 
        $course->delete(); 
 
        return redirect()->route('admin.courses.index') 
            ->with('success', 'Course deleted successfully.'); 
    }
}
