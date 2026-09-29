<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - KASERALS</title>

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

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="hidden w-64 shrink-0 bg-navy text-white lg:block">

            <!-- Logo -->
            <div class="flex items-center gap-4 px-8 py-7">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-kaserals text-2xl font-bold">
                    K
                </div>

                <div>
                    <h1 class="text-2xl font-bold tracking-wide">
                        KASERALS
                    </h1>

                    <p class="mt-1 text-sm text-slate-400">
                        Kas Kelas Digital
                    </p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-8 px-4">

                <a href="#"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>□</span>
                    Dashboard
                </a>

                <!-- Active -->
                <a href="#"
                    class="mb-7 flex items-center gap-4 rounded-2xl bg-kaserals px-5 py-4 text-lg font-bold">
                    <span>◉</span>
                    Data Siswa
                </a>

                <!-- TRANSAKSI -->
                <p class="mb-3 px-6 text-sm font-bold tracking-widest text-slate-500">
                    TRANSAKSI
                </p>

                <a href="#"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>✓</span>
                    Pembayaran Kas
                </a>

                <a href="#"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>≡</span>
                    Status Pembayaran
                </a>

                <a href="#"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>↓</span>
                    Pemasukan
                </a>

                <a href="#"
                    class="mb-7 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>↑</span>
                    Pengeluaran
                </a>

                <!-- CATATAN -->
                <p class="mb-3 px-6 text-sm font-bold tracking-widest text-slate-500">
                    CATATAN
                </p>

                <a href="#"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>↻</span>
                    Riwayat Transaksi
                </a>

                <a href="#"
                    class="flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>▤</span>
                    Laporan Keuangan
                </a>

            </nav>
        </aside>


        <!-- MAIN -->
        <main class="flex min-w-0 flex-1 flex-col">

            <!-- TOPBAR -->
            <header class="flex h-28 items-center justify-between border-b border-slate-300 bg-white px-6 lg:px-11">

                <h2 class="text-2xl font-bold">
                    Data Siswa
                </h2>

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-full bg-teal-100 text-xl font-bold text-kaserals">
                    NS
                </div>

            </header>


            <!-- CONTENT -->
            <section class="flex-1 p-6 lg:p-11">

                <!-- TITLE -->
                <div class="mb-8 flex flex-col justify-between gap-5 lg:flex-row lg:items-center">

                    <div>
                        <h1 class="text-3xl font-bold lg:text-4xl">
                            Data Siswa
                        </h1>

                        <p class="mt-2 text-lg text-slate-500">
                            {{ $siswa->count() }} siswa terdaftar
                        </p>
                    </div>

                    <a href="{{ route('data-siswa.create') }}"
                        class="rounded-2xl bg-kaserals px-8 py-4 text-lg font-bold text-white shadow-sm transition hover:bg-teal-700">

                        + Tambah Siswa

                    </a>

                </div>


                <!-- SEARCH + FILTER -->
                <div class="mb-7 grid gap-4 lg:grid-cols-[1fr_380px]">

                    <!-- Search -->
                    <div class="relative">

                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-2xl">
                            🔍
                        </span>

                        <input type="text" placeholder="Cari nama atau NIS..."
                            class="h-20 w-full rounded-2xl border-2 border-slate-300 bg-white pl-16 pr-5 text-lg outline-none transition focus:border-kaserals">

                    </div>


                    <!-- Filter -->
                    <select
                        class="h-20 rounded-2xl border-2 border-slate-300 bg-white px-6 text-lg text-slate-500 outline-none focus:border-kaserals">

                        <option>Kelas: Semua</option>
                        <option>XII PPLG 1</option>
                        <option>XII PPLG 2</option>
                        <option>XI PPLG 1</option>

                    </select>

                </div>


                <!-- TABLE -->
                <div class="overflow-hidden rounded-2xl border-2 border-slate-300 bg-white">

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px]">

                            <!-- HEADER -->
                            <thead>
                                <tr
                                    class="border-b-2 border-slate-300 text-left text-sm font-bold uppercase tracking-wide text-slate-400">

                                    <th class="px-8 py-5">
                                        Nama Siswa
                                    </th>

                                    <th class="px-6 py-5">
                                        NIS
                                    </th>

                                    <th class="px-6 py-5">
                                        Kelas
                                    </th>

                                    <th class="px-6 py-5">
                                        No. HP
                                    </th>

                                    <th class="px-6 py-5">
                                        Aksi
                                    </th>

                                </tr>
                            </thead>


                            <!-- BODY -->
                            <!-- BODY -->
                            <tbody>

                                @forelse($siswa as $item)
                                    <tr class="border-b border-slate-200">

                                        <td class="px-8 py-5">
                                            <div class="flex items-center gap-4">

                                                <div
                                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-teal-100 font-bold text-kaserals">
                                                    {{ strtoupper(substr($item->nama, 0, 2)) }}
                                                </div>

                                                <span class="text-lg font-medium">
                                                    {{ $item->nama }}
                                                </span>

                                            </div>
                                        </td>

                                        <td class="px-6 py-5 text-lg">
                                            {{ $item->nis }}
                                        </td>

                                        <td class="px-6 py-5 text-lg">
                                            {{ $item->kelas }}
                                        </td>

                                        <td class="px-6 py-5 text-lg">
                                            {{ $item->no_hp ?? '-' }}
                                        </td>

                                        <td class="px-6 py-5">

                                            <div class="flex gap-2">

                                                <button type="button"
                                                    class="rounded-xl border-2 border-slate-300 px-5 py-3 font-bold hover:bg-slate-100">
                                                    Ubah
                                                </button>

                                                <button type="button"
                                                    class="rounded-xl border-2 border-red-300 px-5 py-3 font-bold text-red-600 hover:bg-red-50">
                                                    Hapus
                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="px-8 py-10 text-center text-lg text-slate-500">
                                            Belum ada data siswa.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

</html>
