<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Major;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Sistem Sekolah - Daftar Siswa';

        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        // Ubah simplePaginate() menjadi paginate(10) di sini
        $students = Student::query()
            ->with(['major', 'schoolClass'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($class, fn ($query, $class) => $query->whereHas('schoolClass', fn ($query) => $query->where('name', $class)))
            ->when($major, fn ($query, $major) => $query->whereHas('major', fn ($query) => $query->where('name', $major)))
            ->paginate(10)
            ->withQueryString(); // Menambahkan withQueryString() untuk mempertahankan query string saat melakukan pagination

        $schoolClasses = SchoolClass::query()->orderBy('name')->pluck('name');
        $majors = Major::query()->orderBy('name')->pluck('name');

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'schoolClasses' => $schoolClasses,
            'majors' => $majors,
        ]);
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
        $description = 'Menampilkan daftar siswa yang terdaftar';
        $student->load(['major', 'schoolClass']);

        return view('students.show', [
            'title' => $title,
            'description' => $description,
            'student' => $student,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Menambahkan Siswa';
        $description = 'Menampilkan daftar siswa yang terdaftar';

        return view('students.create', [
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
        $description = 'Menampilkan daftar siswa yang terdaftar';

        return view('students.edit', [
            'title' => $title,
            'description' => $description,
            'student' => $student,
        ]);
    }

    public function store(StoreRequest $request)
    {
        Student::create($this->studentAttributes($request->validated()));

        return redirect()->route('students.index');
    }

    public function update(Student $student, UpdateRequest $request)
    {
        $student->update($this->studentAttributes($request->validated()));

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }

    /**
     * @param  array<string, string>  $validated
     * @return array<string, int|string>
     */
    private function studentAttributes(array $validated): array
    {
        $schoolClass = SchoolClass::firstOrCreate(['name' => $validated['class']]);
        $major = Major::firstOrCreate(['name' => $validated['major']]);

        return [
            'nis' => $validated['nis'],
            'name' => $validated['name'],
            'gender' => match ($validated['gender']) {
                'L', 'Laki-laki' => 'L',
                'P', 'Perempuan' => 'P',
            },
            'class_id' => $schoolClass->id,
            'major_id' => $major->id,
        ];
    }
}
