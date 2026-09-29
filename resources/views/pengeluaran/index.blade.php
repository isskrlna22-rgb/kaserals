<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengeluaran - KASERALS</title>

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
        <div class="flex items-center gap-4 px-8 py-7">

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
        <nav class="mt-8 px-4">

            <a href="{{ route('dashboard') }}"
               class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                <span>□</span>
                Dashboard
            </a>

            <a href="{{ route('data-siswa.index') }}"
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

            <a href="#"
               class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                <span>≡</span>
                Status Pembayaran
            </a>

            <a href="{{ route('pemasukan.web.index') }}"
               class="mb-2 flex items-center gap-4 rounded-2xl px-5 py-4 text-lg text-slate-300 hover:bg-slate-800">
                <span>↓</span>
                Pemasukan
            </a>

            <!-- ACTIVE -->
            <a href="{{ route('pengeluaran.web.index') }}"
               class="mb-7 flex items-center gap-4 rounded-2xl bg-kaserals px-5 py-4 text-lg font-bold">
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
        <header class="flex h-28 items-center justify-between border-b border-slate-300 bg-white px-6 lg:px-10">

            <h2 class="text-2xl font-bold">
                Pengeluaran
            </h2>

            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-teal-100 font-bold text-kaserals">
                IK
            </div>

        </header>

        <!-- CONTENT -->
        <section class="flex-1 p-6 lg:p-10">

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 font-semibold text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <!-- VALIDATION ERROR -->
            @if($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
                    <p class="mb-2 font-bold">
                        Data belum dapat disimpan:
                    </p>

                    <ul class="list-inside list-disc">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- TITLE -->
            <div class="mb-8">

                <h1 class="text-3xl font-bold lg:text-4xl">
                    Pengeluaran Kas
                </h1>

                <p class="mt-2 text-xl text-slate-500">
                    Total pengeluaran bulan ini:
                    <span class="font-bold text-red-600">
                        Rp {{ number_format($pengeluaran->sum('nominal'), 0, ',', '.') }}
                    </span>
                </p>

            </div>

            <!-- CONTENT GRID -->
            <div class="grid gap-6 xl:grid-cols-2">

                <!-- FORM -->
                <div class="rounded-2xl border-2 border-slate-300 bg-white p-7">

                    <h2 class="mb-7 text-2xl font-bold">
                        Tambah Pengeluaran
                    </h2>

                    <form action="{{ route('pengeluaran.web.store') }}" method="POST">

                        @csrf

                        <!-- TANGGAL -->
                        <div class="mb-5">

                            <label class="mb-3 block text-lg font-bold">
                                Tanggal *
                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                value="{{ old('tanggal', date('Y-m-d')) }}"
                                required
                                class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals"
                            >

                        </div>

                        <!-- KATEGORI -->
                        <div class="mb-5">

                            <label class="mb-3 block text-lg font-bold">
                                Kategori *
                            </label>

                            <select
                                name="kategori"
                                required
                                class="h-16 w-full rounded-2xl border-2 border-slate-300 bg-white px-5 text-lg outline-none focus:border-kaserals">

                                <option value="">Pilih kategori</option>
                                <option value="Kegiatan">Kegiatan</option>
                                <option value="Perlengkapan">Perlengkapan</option>
                                <option value="Konsumsi">Konsumsi</option>
                                <option value="Dokumentasi">Dokumentasi</option>
                                <option value="Lainnya">Lainnya</option>

                            </select>

                        </div>

                        <!-- NOMINAL -->
                        <div class="mb-5">

                            <label class="mb-3 block text-lg font-bold">
                                Nominal *
                            </label>

                            <input
                                type="number"
                                name="nominal"
                                value="{{ old('nominal') }}"
                                min="1"
                                required
                                placeholder="150000"
                                class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals"
                            >

                        </div>

                        <!-- KETERANGAN -->
                        <div class="mb-6">

                            <label class="mb-3 block text-lg font-bold">
                                Keterangan
                            </label>

                            <input
                                type="text"
                                name="keterangan"
                                value="{{ old('keterangan') }}"
                                placeholder="Penjelasan singkat"
                                class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals"
                            >

                        </div>

                        <!-- WARNING -->
                        <div class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4 text-sm text-amber-700">
                            Pastikan nominal pengeluaran sesuai dengan kondisi saldo kas.
                        </div>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="h-16 w-full rounded-2xl bg-kaserals text-lg font-bold text-white transition hover:bg-teal-700">

                            Simpan Pengeluaran

                        </button>

                    </form>

                </div>

                <!-- DAFTAR -->
                <div class="rounded-2xl border-2 border-slate-300 bg-white p-7">

                    <h2 class="mb-7 text-2xl font-bold">
                        Daftar Pengeluaran — Bulan Ini
                    </h2>

                    <!-- TABLE HEADER -->
                    <div class="grid grid-cols-[1fr_1.2fr_1fr_auto] border-b-2 border-slate-300 pb-5 text-sm font-bold uppercase tracking-wide text-slate-400">

                        <span>Tanggal</span>

                        <span>Kategori</span>

                        <span class="text-right">
                            Nominal
                        </span>

                        <span></span>

                    </div>

                    <!-- DATA -->
                    @forelse($pengeluaran as $item)

                        <div class="grid grid-cols-[1fr_1.2fr_1fr_auto] items-center gap-3 border-b border-slate-200 py-6">

                            <span class="text-lg">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M') }}
                            </span>

                            <div>

                                <span class="text-lg">
                                    {{ $item->kategori }}
                                </span>

                                @if($item->keterangan)
                                    <p class="mt-1 text-sm text-slate-400">
                                        {{ $item->keterangan }}
                                    </p>
                                @endif

                            </div>

                            <span class="text-right text-lg font-bold text-red-600">
                                Rp {{ number_format($item->nominal, 0, ',', '.') }}
                            </span>

                            <button
                                type="button"
                                class="rounded-xl border-2 border-slate-300 px-4 py-3 font-bold hover:bg-slate-100">
                                Ubah
                            </button>

                        </div>

                    @empty

                        <div class="py-10 text-center text-slate-400">
                            Belum ada data pengeluaran.
                        </div>

                    @endforelse

                    <!-- TOTAL -->
                    <div class="flex items-center justify-end gap-10 pt-7">

                        <span class="text-xl font-bold">
                            Total
                        </span>

                        <span class="text-xl font-bold text-red-600">
                            Rp {{ number_format($pengeluaran->sum('nominal'), 0, ',', '.') }}
                        </span>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>
