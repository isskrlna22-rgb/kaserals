<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-extrabold uppercase tracking-[0.25em] text-teal-600">
                    KASERALS · MY ACCOUNT
                </p>
                <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-800">
                    Profil Saya
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Kelola informasi dan keamanan akunmu.
                </p>
            </div>

            <a href="{{ url('/dashboard') }}"
               class="inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 shadow-sm transition hover:border-teal-300 hover:text-teal-700 hover:shadow-md">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="relative min-h-screen overflow-hidden bg-slate-50">
        <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-teal-100/70 blur-3xl"></div>
        <div class="pointer-events-none absolute -left-24 top-96 h-72 w-72 rounded-full bg-indigo-100/60 blur-3xl"></div>

        <main class="relative mx-auto max-w-6xl space-y-7 px-4 py-8 sm:px-6 sm:py-10 lg:px-8">

            {{-- Pesan sukses --}}
            @if (session('success'))
                <div class="flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800" role="status">
                    <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- Pesan error upload --}}
            @if ($errors->any())
                <div class="rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                    <p class="font-bold">Periksa kembali data yang kamu masukkan:</p>
                    <ul class="mt-2 list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Hero profil --}}
            <section class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-slate-950 via-slate-800 to-teal-950 p-6 text-white shadow-xl shadow-slate-900/10 sm:p-9">
                <div class="pointer-events-none absolute -right-12 -top-16 h-56 w-56 rounded-full border-[30px] border-teal-300/10"></div>
                <div class="pointer-events-none absolute -bottom-20 right-24 h-48 w-48 rounded-full bg-teal-400/20 blur-3xl"></div>

                <div class="relative flex flex-col items-center gap-6 sm:flex-row">
                    {{-- Form upload foto profil --}}
                    <form id="foto-profil-form"
                          action="{{ route('profile.photo.update') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="flex shrink-0 flex-col items-center gap-3">
                        @csrf
                        @method('PATCH')

                        <div class="group relative">
                            <div id="avatar-preview"
                                 class="flex h-28 w-28 items-center justify-center overflow-hidden rounded-full border-4 border-white/20 bg-gradient-to-br from-teal-300 to-teal-600 text-4xl font-black text-white shadow-lg shadow-teal-950/40 sm:h-32 sm:w-32">
                                @if (Auth::user()->foto_profil)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url(Auth::user()->foto_profil) }}"
                                         alt="Foto profil"
                                         class="h-full w-full object-cover">
                                @else
                                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                                @endif
                            </div>

                            <label for="foto_profil"
                                   title="Pilih foto profil"
                                   class="absolute bottom-0 right-0 flex h-10 w-10 cursor-pointer items-center justify-center rounded-full border-2 border-slate-800 bg-white text-teal-700 shadow-lg transition hover:scale-110 hover:bg-teal-50">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </label>

                            <input type="file"
                                   id="foto_profil"
                                   name="foto_profil"
                                   accept="image/jpeg,image/png,image/webp"
                                   class="sr-only">
                        </div>

                        <p class="text-center text-xs text-slate-300">JPG, PNG, atau WEBP · Maks. 2 MB</p>
                        <button id="simpan-foto"
                                type="submit"
                                class="hidden rounded-xl bg-teal-400 px-4 py-2 text-sm font-extrabold text-slate-950 shadow-md transition hover:bg-teal-300 focus:outline-none focus:ring-2 focus:ring-teal-200 focus:ring-offset-2 focus:ring-offset-slate-900">
                            Simpan Foto
                        </button>
                    </form>

                    <div class="min-w-0 flex-1 text-center sm:text-left">
                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-teal-300/20 bg-teal-300/10 px-3 py-1.5 text-xs font-bold text-teal-200">
                            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                            Akun Aktif
                        </div>

                        <h1 class="break-words text-2xl font-black tracking-tight sm:text-3xl">
                            Halo, {{ Auth::user()->name }}! 👋
                        </h1>
                        <p class="mt-2 text-sm leading-6 text-slate-300 sm:text-base">
                            Perbarui informasi akunmu agar tetap akurat.
                        </p>
                        <p class="mt-3 break-all text-sm font-semibold text-teal-200">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                    <div class="hidden rounded-2xl border border-white/10 bg-white/5 p-4 text-center backdrop-blur-sm sm:block">
                        <div class="text-3xl text-teal-300">✦</div>
                        <p class="mt-1 text-xs font-bold tracking-wider text-slate-300">MY PROFILE</p>
                    </div>
                </div>
            </section>

            {{-- Informasi pribadi --}}
            <section class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm transition hover:shadow-md">
                <div class="flex items-start gap-4 border-b border-slate-100 px-5 py-6 sm:px-8">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-teal-50 text-teal-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-extrabold text-slate-800">Informasi Pribadi</h3>
                        <p class="mt-1 text-sm leading-6 text-slate-500">Pastikan nama dan email akunmu selalu benar.</p>
                    </div>
                </div>
                <div class="p-5 sm:p-8">
                    <div class="max-w-3xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </section>

            {{-- Keamanan akun --}}
            <section class="overflow-hidden rounded-3xl border border-indigo-100 bg-white shadow-sm transition hover:shadow-md">
                <div class="flex items-start gap-4 border-b border-indigo-50 px-5 py-6 sm:px-8">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-extrabold text-slate-800">Keamanan Akun</h3>
                        <p class="mt-1 text-sm leading-6 text-slate-500">Gunakan password yang kuat untuk menjaga akunmu.</p>
                    </div>
                </div>
                <div class="p-5 sm:p-8">
                    <div class="max-w-3xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </section>

            {{-- Zona berbahaya --}}
            <section class="overflow-hidden rounded-3xl border border-rose-200 bg-rose-50 shadow-sm">
                <div class="flex items-start gap-4 border-b border-rose-100 px-5 py-6 sm:px-8">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-rose-100 text-rose-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-extrabold text-rose-700">Zona Berbahaya</h3>
                        <p class="mt-1 text-sm leading-6 text-rose-600">Penghapusan akun bersifat permanen. Periksa kembali sebelum melanjutkan.</p>
                    </div>
                </div>
                <div class="p-5 sm:p-8">
                    <div class="max-w-3xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </section>

            <footer class="pb-5 text-center">
                <p class="text-xs font-semibold tracking-wide text-slate-400">
                    Made with ♥ · KASERALS — Kas Kelas Digital
                </p>
            </footer>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('foto_profil');
            const preview = document.getElementById('avatar-preview');
            const saveButton = document.getElementById('simpan-foto');
            const form = document.getElementById('foto-profil-form');

            if (!input || !preview || !saveButton || !form) return;

            input.addEventListener('change', function (event) {
                const file = event.target.files && event.target.files[0];
                if (!file) {
                    saveButton.classList.add('hidden');
                    return;
                }

                const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Pilih foto dengan format JPG, PNG, atau WEBP.');
                    input.value = '';
                    saveButton.classList.add('hidden');
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran foto maksimal 2 MB.');
                    input.value = '';
                    saveButton.classList.add('hidden');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.innerHTML = '';
                    const image = document.createElement('img');
                    image.src = e.target.result;
                    image.alt = 'Preview foto profil';
                    image.className = 'h-full w-full object-cover';
                    preview.appendChild(image);
                    saveButton.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</x-app-layout>
