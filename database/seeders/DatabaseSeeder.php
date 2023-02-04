<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(100)->create();
        Teacher::factory(50)->create();
        Grade::factory(50)->create();
        Course::factory(5)->create();

        $this->dummyCourseStudentsDataInsert();
        $this->dummyCourseTeachersDataInsert();
    }

    private function dummyCourseStudentsDataInsert()
    {
        // TODO - find better way to do this
        // does insert into course_student table
        for ($i = 1; $i < 30; $i++) {
            $course = Course::find(1);
            $course->students()->attach($i);
        }

        for ($x = 10; $x < 20; $x++) {
            $course = Course::find(2);
            $course->students()->attach($x);
        }

        for ($x = 15; $x < 20; $x++) {
            $course = Course::find(3);
            $course->students()->attach($x);
        }
    }

    private function dummyCourseTeachersDataInsert()
    {
        // TODO - find better way to do this
        // does insert into course_student table
        for ($i = 1; $i < 3; $i++) {
            $course = Course::find(1);
            $course->teachers()->attach($i);
        }

        for ($x = 5; $x < 7; $x++) {
            $course = Course::find(2);
            $course->teachers()->attach($x);
        }

        for ($x = 15; $x < 20; $x++) {
            $course = Course::find(3);
            $course->teachers()->attach($x);
        }
    }
}
