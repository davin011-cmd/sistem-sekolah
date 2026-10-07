<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        return view('students.index', [
            'title' => 'Sistem Sekolah - Daftar Siswa',
            'students' => Student::query()
                ->select('id', 'nis', 'name', 'class', 'major')
                ->get(),
        ]);
    }

    public function show(Student $student): View
    {
        return view('students.show', [
            'title' => 'Sistem Sekolah - Detail Siswa',
            'student' => $student,
        ]);
    }

    public function create(): View
    {
        return view('students.create', [
            'title' => 'Sistem Sekolah - Tambah Siswa',
        ]);
    }

    public function edit(Student $student): View
    {
        return view('students.edit', [
            'title' => 'Sistem Sekolah - Ubah Siswa',
            'student' => $student,
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        Student::query()->create($request->validated());

        return redirect()->route('students.index');
    }

    public function update(UpdateRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());

        return redirect()->route('students.index');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
