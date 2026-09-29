<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pemasukan - KASERALS</title>

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


                <!-- ACTIVE PEMASUKAN -->
                <a href="#"
                    class="mb-2 flex items-center gap-4 rounded-2xl bg-kaserals px-5 py-4 text-lg font-bold">
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
            <header class="flex h-28 items-center justify-between border-b border-slate-300 bg-white px-6 lg:px-10">

                <h2 class="text-2xl font-bold">
                    Pemasukan
                </h2>

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-full bg-teal-100 font-bold text-kaserals">
                    NS
                </div>

            </header>


            <!-- CONTENT -->
            <section class="flex-1 p-6 lg:p-10">


                <!-- TITLE -->
                <div class="mb-8">

                    <h1 class="text-3xl font-bold lg:text-4xl">
                        Pemasukan Kas
                    </h1>

                    <p class="mt-2 text-xl text-slate-500">
                        Total pemasukan bulan ini:
                        <span class="font-bold text-green-600">
                            Rp {{ number_format($pemasukan->sum('nominal'), 0, ',', '.') }}
                        </span>
                    </p>

                </div>


                <!-- CONTENT GRID -->
                <div class="grid gap-6 xl:grid-cols-2">


                    <!-- FORM TAMBAH PEMASUKAN -->
                    <div class="rounded-2xl border-2 border-slate-300 bg-white p-7">

                        <h2 class="mb-7 text-2xl font-bold">
                            Tambah Pemasukan
                        </h2>

                        <form action="{{ route('pemasukan.web.store') }}" method="POST">
                            @csrf


                            <!-- TANGGAL -->
                            <div class="mb-5">

                                <label class="mb-3 block text-lg font-bold">
                                    Tanggal *
                                </label>

                                <input type="date" name="tanggal"value="{{ old('tanggal', date('Y-m-d')) }}"
                                    class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals">

                            </div>


                            <!-- SUMBER DANA -->
                            <div class="mb-5">

                                <label class="mb-3 block text-lg font-bold">
                                    Sumber Dana *
                                </label>

                                <select name="sumber"
                                    class="h-16 w-full rounded-2xl border-2 border-slate-300 bg-white px-5 text-lg outline-none focus:border-kaserals">
                                    <option value="Sisa Dana Kegiatan">Sisa Dana Kegiatan</option>
                                    <option value="Donasi Wali Murid">Donasi Wali Murid</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>

                            </div>


                            <!-- NOMINAL -->
                            <div class="mb-5">

                                <label class="mb-3 block text-lg font-bold">
                                    Nominal *
                                </label>

                                <input type="number" name="nominal" value="{{ old('nominal') }}" min="1"
                                    placeholder="150000"
                                    class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals">

                            </div>


                            <!-- KETERANGAN -->
                            <div class="mb-6">

                                <label class="mb-3 block text-lg font-bold">
                                    Keterangan
                                </label>
                                <input type="text" name="keterangan" value="{{ old('keterangan') }}"
                                    placeholder="Penjelasan singkat"
                                    class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals">

                            </div>


                            <!-- BUTTON -->
                            <button type="submit"
                                class="h-16 w-full rounded-2xl bg-kaserals text-lg font-bold text-white transition hover:bg-teal-700">

                                Simpan Pemasukan

                            </button>

                        </form>

                    </div>



                    <!-- DAFTAR PEMASUKAN -->
                    <div class="rounded-2xl border-2 border-slate-300 bg-white p-7">

                        <h2 class="mb-7 text-2xl font-bold">
                            Daftar Pemasukan — Bulan Ini
                        </h2>


                        <!-- TABLE HEADER -->
                        <div
                            class="grid grid-cols-[1fr_1.2fr_1fr_auto] border-b-2 border-slate-300 pb-5 text-sm font-bold uppercase tracking-wide text-slate-400">

                            <span>Tanggal</span>

                            <span>Sumber</span>

                            <span class="text-right">
                                Nominal
                            </span>

                            <span></span>

                        </div>

                        @forelse($pemasukan as $item)
                            <div
                                class="grid grid-cols-[1fr_1.2fr_1fr_auto] items-center gap-3 border-b border-slate-200 py-6">

                                <span class="text-lg">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M') }}
                                </span>

                                <span class="text-lg">
                                    {{ $item->sumber }}
                                </span>

                                <span class="text-right text-lg font-bold text-green-600">
                                    Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                </span>

                                <button type="button"
                                    class="rounded-xl border-2 border-slate-300 px-4 py-3 font-bold hover:bg-slate-100">
                                    Ubah
                                </button>

                            </div>

                        @empty

                            <div class="py-10 text-center text-slate-400">
                                Belum ada data pemasukan.
                            </div>
                        @endforelse
                        <!-- TOTAL -->
                        <div class="flex items-center justify-end gap-10 pt-7">

                            <span class="text-xl font-bold">
                                Total
                            </span>

                            <span class="text-xl font-bold text-green-600">
                               Rp {{ number_format($pemasukan->sum('nominal'), 0, ',', '.') }}
                            </span>

                        </div>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>

</html>
