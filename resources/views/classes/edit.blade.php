 
@extends('layouts.app')

@section('title', $title)

@section('content')

    <div class="mb-8 border-b border-[#E5E3DB] pb-5">

        <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">
            Tahun Ajaran 2025/2026
        </p>

        <h1 class="font-display text-3xl font-semibold text-[#16213A]">
            Edit Kelas
        </h1>

    </div>

    <div class="border border-[#E5E3DB] bg-white p-6">

        <form action="{{ route('classes.update', ['id' => $class['id']]) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="space-y-6">

                <div>
                    <label for="name"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Nama Kelas
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ $class['name'] }}"
                        class="w-full border border-[#E5E3DB] px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                </div>

                <div>
                    <label for="grade"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Tingkat
                    </label>

                    <select
                        id="grade"
                        name="grade"
                        class="w-full border border-[#E5E3DB] bg-white px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                        <option value="X" {{ $class['grade'] === 'X' ? 'selected' : '' }}>
                            X
                        </option>

                        <option value="XI" {{ $class['grade'] === 'XI' ? 'selected' : '' }}>
                            XI
                        </option>

                        <option value="XII" {{ $class['grade'] === 'XII' ? 'selected' : '' }}>
                            XII
                        </option>
                    </select>
                </div>

                <div>
                    <label for="major_id"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Jurusan
                    </label>

                    <select
                        id="major_id"
                        name="major_id"
                        class="w-full border border-[#E5E3DB] bg-white px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >

                        @foreach ($majors as $major)

                            <option
                                value="{{ $major['id'] }}"
                                {{ $class['major_id'] == $major['id'] ? 'selected' : '' }}
                            >
                                {{ $major['code'] }} - {{ $major['name'] }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div>
                    <label for="teacher_id"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Wali Kelas
                    </label>

                    <select
                        id="teacher_id"
                        name="teacher_id"
                        class="w-full border border-[#E5E3DB] bg-white px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >

                        @foreach ($teachers as $teacher)

                            <option
                                value="{{ $teacher['id'] }}"
                                {{ $class['teacher_id'] == $teacher['id'] ? 'selected' : '' }}
                            >
                                {{ $teacher['name'] }}
                            </option>

                        @endforeach

                    </select>
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-4 border-t border-[#E5E3DB] pt-5">

                <a href="{{ route('classes.show', ['id' => $class['id']]) }}"
                    class="px-5 py-2.5 text-sm font-medium text-[#16213A] hover:text-[#A16207]">
                    Batal
                </a>

                <button
                    type="submit"
                    class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

@endsection