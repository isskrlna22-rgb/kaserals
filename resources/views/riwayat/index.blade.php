<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Transaksi - KASERALS</title>

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

            <!-- LOGO -->
            <div class="flex items-center gap-4 px-7 py-7">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-kaserals text-2xl font-bold">
                    K
                </div>

                <div>
                    <h1 class="text-2xl font-bold">
                        KASERALS
                    </h1>

                    <p class="text-sm text-slate-400">
                        Kas Kelas Digital
                    </p>
                </div>

            </div>


            <!-- NAVIGATION -->
            <nav class="mt-7 px-4">

                <a href="#"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>□</span>
                    Dashboard
                </a>

                <a href="#"
                    class="mb-7 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>◉</span>
                    Data Siswa
                </a>


                <!-- TRANSAKSI -->
                <p class="mb-3 px-6 text-sm font-bold tracking-widest text-slate-500">
                    TRANSAKSI
                </p>
                <a href="{{ route('pembayaran-kas.index') }}"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>✓</span>
                    Pembayaran Kas
                </a>
                <a href="{{ route('status-pembayaran.index') }}"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>≡</span>
                    Status Pembayaran
                </a>

                <a href="{{ route('pemasukan.web.index') }}"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>↓</span>
                    Pemasukan
                </a>

                <a href="{{ route('pengeluaran.web.index') }}"
                    class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                    <span>↑</span>
                    Pengeluaran
                </a>

                <!-- CATATAN -->
                <p class="mb-3 px-6 text-sm font-bold tracking-widest text-slate-500">
                    CATATAN
                </p>


                <!-- ACTIVE -->
                <a href="#"
                    class="mb-2 flex items-center gap-4 rounded-2xl bg-kaserals px-5 py-4 text-lg font-bold">
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
            <header class="flex h-24 items-center justify-between border-b border-slate-300 bg-white px-6 lg:px-9">

                <h2 class="text-2xl font-bold">
                    Riwayat Transaksi
                </h2>

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-full bg-teal-100 font-bold text-kaserals">
                    NS
                </div>

            </header>


            <!-- CONTENT -->
            <section class="flex-1 p-6 lg:p-9">


                <!-- TITLE + EXPORT -->
                <div class="mb-7 flex flex-col justify-between gap-5 md:flex-row md:items-center">

                    <div>

                        <h1 class="text-3xl font-bold lg:text-4xl">
                            Riwayat Transaksi
                        </h1>

                        <p class="mt-2 text-xl text-slate-500">
                            128 dari 312 transaksi ditampilkan
                        </p>

                    </div>


                    <button
                        class="rounded-2xl border-2 border-slate-300 bg-white px-7 py-4 text-lg font-bold hover:bg-slate-100">

                        ↓
                        Ekspor Hasil Filter

                    </button>

                </div>

                <form action="{{ route('riwayat.index') }}" method="GET">
                    <!-- FILTER BOX -->
                    <div class="mb-8 rounded-2xl border-2 border-teal-100 bg-teal-50/50 p-7">



                        <!-- BARIS 1 -->
                        <div class="grid gap-5 lg:grid-cols-[2fr_1fr]">


                            <!-- SEARCH -->
                            <div class="relative">

                                <span class="absolute left-5 top-1/2 -translate-y-1/2 text-2xl">
                                    🔍
                                </span>

                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari nama, keterangan, atau nominal..."
                                    class="h-16 w-full rounded-2xl border-2 border-slate-300 bg-white pl-14 pr-5 text-lg outline-none focus:border-kaserals">

                            </div>


                            <!-- JENIS -->
                            <select name="jenis"
                                class="h-16 rounded-2xl border-2 border-slate-300 bg-white px-5 text-lg outline-none focus:border-kaserals">

                                <option value="">
                                    Jenis: Semua
                                </option>

                                <option value="Pembayaran Kas"
                                    {{ request('jenis') == 'Pembayaran Kas' ? 'selected' : '' }}>
                                    Pembayaran
                                </option>

                                <option value="Pemasukan" {{ request('jenis') == 'Pemasukan' ? 'selected' : '' }}>
                                    Pemasukan
                                </option>

                                <option value="Pengeluaran" {{ request('jenis') == 'Pengeluaran' ? 'selected' : '' }}>
                                    Pengeluaran
                                </option>

                            </select>

                        </div>


                        <!-- BARIS 2 -->
                        <div class="mt-5 grid gap-5 lg:grid-cols-[1fr_1fr_1.1fr_auto_auto]">


                            <!-- DARI -->
                            <input type="date" name="dari" value="{{ request('dari') }}"
                                class="h-16 rounded-2xl border-2 border-slate-300 bg-white px-5 text-lg outline-none focus:border-kaserals">


                            <!-- SAMPAI -->
                            <input type="date" name="sampai" value="{{ request('sampai') }}"
                                class="h-16 rounded-2xl border-2 border-slate-300 bg-white px-5 text-lg outline-none focus:border-kaserals">

                            <!-- KATEGORI -->
                            <select
                                class="h-16 rounded-2xl border-2 border-slate-300 bg-white px-5 text-lg text-slate-500 outline-none focus:border-kaserals">

                                <option>
                                    Kategori: Semua
                                </option>

                                <option>
                                    Kebutuhan Kelas
                                </option>

                                <option>
                                    Kegiatan
                                </option>

                                <option>
                                    Konsumsi
                                </option>

                            </select>


                            <!-- TERAPKAN -->
                            <button
                                class="h-16 rounded-2xl bg-kaserals px-8 text-lg font-bold text-white hover:bg-teal-700">

                                Terapkan

                            </button>


                            <!-- RESET -->
                            <a href="{{ route('riwayat.index') }}"
                                class="px-4 text-lg font-bold text-kaserals hover:underline">
                                Reset
                            </a>
                        </div>

                    </div>


                    <!-- TABLE -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px] border-collapse">


                            <!-- HEADER -->
                            <thead>

                                <tr
                                    class="border-b-2 border-slate-300 text-left text-sm font-bold uppercase tracking-wide text-slate-400">

                                    <th class="px-5 py-5">
                                        Tanggal
                                    </th>

                                    <th class="px-5 py-5">
                                        Jenis
                                    </th>

                                    <th class="px-5 py-5">
                                        Nama / Sumber
                                    </th>

                                    <th class="px-5 py-5 text-right">
                                        Masuk
                                    </th>

                                    <th class="px-5 py-5 text-right">
                                        Keluar
                                    </th>

                                    <th class="px-5 py-5 text-right">
                                        Saldo
                                    </th>

                                </tr>

                            </thead>


                            <tbody>
                                @forelse($riwayat as $item)
                                    <tr class="border-b border-slate-200">

                                        <!-- TANGGAL -->
                                        <td class="px-5 py-6 text-lg">
                                            {{ \Carbon\Carbon::parse($item['tanggal'])->format('d/m/Y') }}
                                        </td>

                                        <!-- JENIS -->
                                        <td class="px-5 py-6">
                                            @if ($item['tipe'] === 'masuk')
                                                <span
                                                    class="rounded-full bg-green-50 px-5 py-2 font-bold text-green-700">
                                                    {{ $item['jenis'] }}
                                                </span>
                                            @else
                                                <span class="rounded-full bg-red-50 px-5 py-2 font-bold text-red-600">
                                                    {{ $item['jenis'] }}
                                                </span>
                                            @endif
                                        </td>

                                        <!-- NAMA / SUMBER -->
                                        <td class="px-5 py-6 text-lg">
                                            {{ $item['nama_siswa'] ?? $item['keterangan'] }}
                                        </td>

                                        <!-- MASUK -->
                                        <td class="px-5 py-6 text-right text-lg font-bold text-green-600">
                                            @if ($item['tipe'] === 'masuk')
                                                Rp {{ number_format($item['nominal'], 0, ',', '.') }}
                                            @else
                                                —
                                            @endif
                                        </td>

                                        <!-- KELUAR -->
                                        <td class="px-5 py-6 text-right text-lg font-bold text-red-600">
                                            @if ($item['tipe'] === 'keluar')
                                                Rp {{ number_format($item['nominal'], 0, ',', '.') }}
                                            @else
                                                —
                                            @endif
                                        </td>

                                        <!-- SALDO -->
                                        <td class="px-5 py-6 text-right text-lg font-bold">
                                            Rp {{ number_format($item['saldo'], 0, ',', '.') }}
                                        </td>

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="px-5 py-10 text-center text-lg text-slate-500">
                                            Belum ada transaksi.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>
                    </form>

                    <!-- PAGINATION -->
                    <div class="mt-8 flex justify-end gap-2">

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-xl border-2 border-slate-300 bg-white text-lg">
                            ‹
                        </button>

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-kaserals text-lg font-bold text-white">
                            1
                        </button>

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-xl border-2 border-slate-300 bg-white text-lg">
                            2
                        </button>

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-xl border-2 border-slate-300 bg-white text-lg">
                            3
                        </button>

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-xl border-2 border-slate-300 bg-white text-lg">
                            ›
                        </button>

                    </div>

            </section>

        </main>

    </div>

</body>

</html>
