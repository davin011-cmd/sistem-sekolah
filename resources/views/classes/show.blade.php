 
@extends('layouts.app')

@section('title', $title)

@section('content')

    <div class="mb-8 flex items-end justify-between border-b border-[#E5E3DB] pb-5">

        <div>
            <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">
                Tahun Ajaran 2025/2026
            </p>

            <h1 class="font-display text-3xl font-semibold text-[#16213A]">
                Detail Kelas
            </h1>
        </div>

        <div class="flex gap-4">

            <a href="{{ route('classes.edit', ['id' => $class['id']]) }}"
                class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
                Ubah
            </a>

            <a href="{{ route('classes.index') }}"
                class="px-5 py-2.5 text-sm font-medium text-[#16213A] hover:text-[#A16207]">
                Kembali
            </a>

        </div>

    </div>

    <div class="border border-[#E5E3DB] bg-white">

        <div class="divide-y divide-[#EFEDE6]">

            <div class="flex px-6 py-5">
                <div class="w-1/3 text-sm text-slate-500">
                    Nama Kelas
                </div>

                <div class="font-medium text-[#16213A]">
                    {{ $class['name'] }}
                </div>
            </div>

            <div class="flex px-6 py-5">
                <div class="w-1/3 text-sm text-slate-500">
                    Tingkat
                </div>

                <div class="text-sm text-slate-700">
                    {{ $class['grade'] }}
                </div>
            </div>

            <div class="flex px-6 py-5">
                <div class="w-1/3 text-sm text-slate-500">
                    Jurusan
                </div>

                <div class="text-sm text-slate-700">
                    {{ $class['major'] }}
                </div>
            </div>

            <div class="flex px-6 py-5">
                <div class="w-1/3 text-sm text-slate-500">
                    Wali Kelas
                </div>

                <div class="text-sm text-slate-700">
                    {{ $class['homeroom_teacher'] }}
                </div>
            </div>

        </div>

    </div>

@endsection