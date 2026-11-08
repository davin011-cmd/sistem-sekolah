 
@extends('layouts.app')

@section('title', $title)

@section('content')

    <div class="mb-8 border-b border-[#E5E3DB] pb-5">

        <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">
            Tahun Ajaran 2025/2026
        </p>

        <h1 class="font-display text-3xl font-semibold text-[#16213A]">
            Edit Guru
        </h1>

    </div>

    <div class="border border-[#E5E3DB] bg-white p-6">

        <form action="{{ route('teachers.update', ['id' => $teacher['id']]) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="space-y-6">

                <div>
                    <label for="nip"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        NIP
                    </label>

                    <input
                        type="text"
                        id="nip"
                        name="nip"
                        value="{{ $teacher['nip'] }}"
                        class="w-full border border-[#E5E3DB] px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                </div>

                <div>
                    <label for="name"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ $teacher['name'] }}"
                        class="w-full border border-[#E5E3DB] px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                </div>

                <div>
                    <label for="gender"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Jenis Kelamin
                    </label>

                    <select
                        id="gender"
                        name="gender"
                        class="w-full border border-[#E5E3DB] bg-white px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                        <option value="Laki-Laki"
                            {{ $teacher['gender'] === 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>

                        <option value="Perempuan"
                            {{ $teacher['gender'] === 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

                <div>
                    <label for="subject"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Mata Pelajaran
                    </label>

                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        value="{{ $teacher['subject'] }}"
                        class="w-full border border-[#E5E3DB] px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                </div>

                <div>
                    <label for="phone_number"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        No. Telepon
                    </label>

                    <input
                        type="text"
                        id="phone_number"
                        name="phone_number"
                        value="{{ $teacher['phone_number'] }}"
                        class="w-full border border-[#E5E3DB] px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                </div>

                <div>
                    <label for="status"
                        class="mb-2 block text-sm font-medium text-[#16213A]">
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="w-full border border-[#E5E3DB] bg-white px-4 py-2.5 text-sm outline-none focus:border-[#16213A]"
                    >
                        <option value="Aktif"
                            {{ $teacher['status'] === 'Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="Tidak Aktif"
                            {{ $teacher['status'] === 'Tidak Aktif' ? 'selected' : '' }}>
                            Tidak Aktif
                        </option>
                    </select>
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-4 border-t border-[#E5E3DB] pt-5">

                <a href="{{ route('teachers.show', ['id' => $teacher['id']]) }}"
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