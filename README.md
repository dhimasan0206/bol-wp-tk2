Binus Online Learning

Web Programming

Tugas Kelompok 2

Kelompok 4

2301968254 - Muhammad Ikhsan Pahdian

2301970460 - Dewi Joanne Suhandeniputri

2301968090 - Alvenia Nur Primadana

2301968191 - Dhimas Anugrah Dwi Yunidar

2301929392 - Noval Parinusa

Langkah-langkah menjalankan aplikasi web di lokal:

1. Jalankan `docker-compose up -d`.
2. Jalankan `docker-compose exec myapp php artisan migrate:fresh --seed` untuk melakukan migrasi skema basis data.
3. Kunjungi `http://localhost:8000`
4. Jika `http://localhost:8000` belum bisa dikunjungi jalankan `docker-compose restart myapp`.

Langkah pengerjaan:

1. Jalankan `docker-compose up`
2. Jalankan `docker-compose exec myapp composer require jeroennoten/laravel-adminlte` untuk untuk framework laravel-adminlte
3. Jalankan `docker-compose exec myapp php artisan adminlte:install` untuk install framework laravel-adminlte
4. Jalankan `docker-compose exec myapp php artisan adminlte:plugins install --plugin=datatables --plugin=datatablesPlugins --plugin=chartJs` enable adminlte datatables
5. Jalankan `docker-compose exec myapp php artisan make:migration create_student_table` untuk membuat migrasi basis data mahasiswa dan tambahkan field yang dibutuhkan
6. Jalankan `docker-compose exec myapp php artisan make:factory StudentFactory` untuk membuat StudentFactory
7. Jalankan `docker-compose exec myapp php artisan make:model Student` untuk membuat model Student
8. Jalankan `docker-compose exec myapp php artisan make:seeder StudentSeeder` untuk membantu mengisi data dummy Student
9. Jalankan `docker-compose exec myapp php artisan migrate:fresh --seed` untuk melakukan migrasi skema basis data.
10. Jalankan `docker-compose exec myapp php artisan make:controller StudentController` untuk membuat controller dengan nama StudentController dan tambah metode CRUD
11. Jalankan `docker-compose exec myapp php artisan make:migration create_course_table` untuk membuat migrasi basis data course dan tambahkan field yang dibutuhkan
12. Jalankan `docker-compose exec myapp php artisan make:model Course` untuk membuat model Course
13. Jalankan `docker-compose exec myapp php artisan migrate` untuk melakukan migrasi skema basis data.
14. Jalankan `docker-compose exec myapp php artisan make:controller CourseController` untuk membuat controller dengan nama CourseController dan tambah metode CRUD
15. Jalankan `docker-compose exec myapp php artisan make:migration create_score_table` untuk membuat migrasi basis data score dan tambahkan field yang dibutuhkan
16. Jalankan `docker-compose exec myapp php artisan make:model Score` untuk membuat model Score
17. Jalankan `docker-compose exec myapp php artisan migrate` untuk melakukan migrasi skema basis data.
18. Jalankan `docker-compose exec myapp php artisan make:controller ScoreController` untuk membuat controller dengan nama ScoreController dan tambah metode CRUD

Terima kasih
