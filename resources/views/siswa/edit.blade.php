<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Siswa - KASERALS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        kaserals: '#0D9488',
                        navy: '#0F172A',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 text-slate-900">

    <div class="min-h-screen p-6 lg:p-11">

        <div class="mx-auto max-w-3xl">

            <!-- HEADER -->
            <div class="mb-8">
                <a href="{{ route('data-siswa.index') }}"
                    class="text-kaserals font-bold hover:underline">
                    ← Kembali ke Data Siswa
                </a>

                <h1 class="mt-5 text-3xl font-bold lg:text-4xl">
                    Edit Data Siswa
                </h1>

                <p class="mt-2 text-lg text-slate-500">
                    Perbarui informasi data siswa.
                </p>
            </div>

            <!-- FORM -->
            <div class="rounded-3xl border-2 border-slate-200 bg-white p-6 shadow-sm lg:p-9">

                <form action="{{ route('data-siswa.update', $siswa->id_siswa) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- NISN -->
                    <div class="mb-6">
                        <label for="nisn" class="mb-2 block text-lg font-bold">
                            NISN
                        </label>

                        <input
                            type="text"
                            id="nisn"
                            name="nisn"
                            value="{{ old('nisn', $siswa->nisn) }}"
                            class="w-full rounded-2xl border-2 border-slate-300 px-5 py-4 text-lg outline-none focus:border-kaserals"
                            required>

                        @error('nisn')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- NAMA -->
                    <div class="mb-6">
                        <label for="nama_lengkap" class="mb-2 block text-lg font-bold">
                            Nama Siswa
                        </label>

                        <input
                            type="text"
                            id="nama_lengkap"
                            name="nama_lengkap"
                            value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}"
                            class="w-full rounded-2xl border-2 border-slate-300 px-5 py-4 text-lg outline-none focus:border-kaserals"
                            required>

                        @error('nama_lengkap')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- KELAS -->
                    <div class="mb-6">
                        <label for="kelas" class="mb-2 block text-lg font-bold">
                            Kelas
                        </label>

                        <input
                            type="text"
                            id="kelas"
                            name="kelas"
                            value="{{ old('kelas', $siswa->kelas) }}"
                            class="w-full rounded-2xl border-2 border-slate-300 px-5 py-4 text-lg outline-none focus:border-kaserals"
                            required>

                        @error('kelas')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- NO HP -->
                    <div class="mb-8">
                        <label for="no_hp" class="mb-2 block text-lg font-bold">
                            No. HP
                        </label>

                        <input
                            type="text"
                            id="no_hp"
                            name="no_hp"
                            value="{{ old('no_hp', $siswa->no_hp) }}"
                            class="w-full rounded-2xl border-2 border-slate-300 px-5 py-4 text-lg outline-none focus:border-kaserals">

                        @error('no_hp')
                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- BUTTON -->
                    <div class="flex flex-col gap-3 sm:flex-row">

                        <a href="{{ route('data-siswa.index') }}"
                            class="rounded-2xl border-2 border-slate-300 px-7 py-4 text-center font-bold hover:bg-slate-100">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="rounded-2xl bg-kaserals px-7 py-4 font-bold text-white hover:bg-teal-700">
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
