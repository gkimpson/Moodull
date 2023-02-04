## Useful commands
php artisan db:seed - :: run the factory classes to populate faker data
php artisan db:seed --class=SqlFileSeeder :: run to generate the custom sql file 

https://github.com/laracasts/Laravel-5-Generators-Extended (pivot tables simplified)
php artisan make:migration:pivot courses students (this will create course_student pivot table)
php artisan make:migration:pivot courses teachers

# many-to-many (does db insert for student it 10 on course 1)
$studentId = 10;
$course = Course::find(1); $course->students()->attach($studentId);P

shift-option-command cursor click - edit multiple cursors
