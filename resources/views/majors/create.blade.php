 
@extends('layouts.app')

@section('title', $title)

@section('content')

    <div class="mb-8 border-b border-[#E5E3DB] pb-5">

        <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">
            Tahun Ajaran 2025/2026
        </p>

        <h1 class="font-display text-3xl font-semibold text-[#16213A]">
            Tambah Jurusan
        </h1>

    </div>

    <div class="border border-[#E5E3DB] bg-white p-6">

        <form action="{{ route('majors.store') }}" method="POST">

            @csrf

            <div class="space-y-6">

                <div>
                    <label for="code"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Kode Jurusan
                    </label>

                    <input
                        type="text"
                        id="code"
                        name="code"
                        placeholder="Contoh: TKJ"
                        class="w-full border border-[#E5E3DB] px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                </div>

                <div>
                    <label for="name"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Nama Jurusan
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Contoh: Teknik Komputer dan Jaringan"
                        class="w-full border border-[#E5E3DB] px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                </div>

                <div>
                    <label for="description"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Masukkan deskripsi jurusan"
                        class="w-full border border-[#E5E3DB] px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    ></textarea>
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-4 border-t border-[#E5E3DB] pt-5">

                <a href="{{ route('majors.index') }}"
                    class="px-5 py-2.5 text-sm font-medium text-[#16213A] hover:text-[#A16207]">
                    Batal
                </a>

                <button
                    type="submit"
                    class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
                    Simpan
                </button>

            </div>

        </form>

    </div>

@endsection