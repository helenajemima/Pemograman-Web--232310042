<?php 
 
namespace Database\Seeders; 
 
use App\Models\Course; 
use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str; 
 
class CourseSeeder extends Seeder 
{ 
    public function run(): void 
    { 
        $courses = [ 
            [ 
                'title'      => 'Laravel for Beginners', 
                'category'   => 'Web Development', 
                'lessons'    => 12, 
                'instructor' => 'Jane Doe', 
                'role'       => 'Backend Developer', 
                'students'   => 1200, 
                'rating'     => 5, 
                'image'      => 'fullstack.png', 
                'avatar'     => 'Profile 1.png', 
            ], 
            [ 
                'title'      => 'Mastering Python', 
                'category'   => 'Programming', 
                'lessons'    => 18, 
                'instructor' => 'Adam Smith', 
                'role'       => 'Python Developer', 
                'students'   => 950, 
                'rating'     => 4, 
                'image'      => 'data-science.png', 
                'avatar'     => 'Profile 2.png', 
            ], 
            [ 
                'title'      => 'Intro to UI/UX Design', 
                'category'   => 'Design', 
                'lessons'    => 10, 
                'instructor' => 'Emily Johnson', 
                'role'       => 'UI Designer', 
                'students'   => 750, 
                'rating'     => 4, 
                'image'      => 'uiux-design.png', 
                'avatar'     => 'Profile 6.png', 
            ], 
            [ 
                'title'      => 'Mobile Apps with Flutter', 
                'category'   => 'Mobile Development', 
                'lessons'    => 15, 
                'instructor' => 'Michael Brown', 
                'role'       => 'Mobile Engineer', 
                'students'   => 680, 
                'rating'     => 5, 
                'image'      => 'mobile-apps.png', 
                'avatar'     => 'Profile 1.png', 
            ], 
            [ 
                'title'      => 'Fundamentals of DevOps', 
                'category'   => 'DevOps', 
                'lessons'    => 20, 
                'instructor' => 'Laura Wilson', 
                'role'       => 'DevOps Engineer', 
                'students'   => 840, 
                'rating'     => 4, 
                'image'      => 'devOps.png', 
                'avatar'     => 'Profile 2.png', 
            ], 
            [ 
                'title'      => 'Cyber Security Essentials', 
                'category'   => 'Security', 
                'lessons'    => 22, 
                'instructor' => 'Kevin Lee', 
                'role'       => 'Security Analyst', 
                'students'   => 1100, 
                'rating'     => 5, 
                'image'      => 'cyber-security.png', 
                'avatar'     => 'Profile 6.png', 
            ], 
        ]; 
 
        foreach ($courses as $data) { 
            $course = new Course(); 
            $course->fill($data); 
 
            $imagePath = public_path('assets/images/' . $data['image']); 
            $avatarPath = public_path('assets/images/' . $data['avatar']); 
 
            $imageName = 'courses/' . Str::random(20) . '.png'; 
            $avatarName = 'courses/' . Str::random(20) . '.png'; 
 
            // Simpan ke storage jika file ada 
            if (file_exists($imagePath)) { 
                Storage::disk('public')->put($imageName, file_get_contents($imagePath)); 
                $course->image = $imageName; 
            } else { 
                $course->image = 'https://via.placeholder.com/300x200.png?text=No+Image'; 
            } 
 
            if (file_exists($avatarPath)) { 
                Storage::disk('public')->put($avatarName, file_get_contents($avatarPath)); 
                $course->avatar = $avatarName; 
            } else { 
                $course->avatar = 'https://via.placeholder.com/80x80.png?text=No+Avatar'; 
            } 
 
            $course->save(); 
        } 
    } 
} 
 