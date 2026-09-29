<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran Kas - KASERALS</title>

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


            <!-- ACTIVE -->
            <a href="#"
               class="mb-2 flex items-center gap-4 rounded-2xl bg-kaserals px-5 py-4 text-lg font-bold">
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
        <header class="flex h-24 items-center justify-between border-b border-slate-300 bg-white px-6 lg:px-9">

            <h2 class="text-2xl font-bold">
                Pembayaran Kas
            </h2>

            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-teal-100 font-bold text-kaserals">
                NS
            </div>

        </header>


        <!-- CONTENT -->
        <section class="flex-1 p-6 lg:p-9">


            <!-- TITLE -->
            <div class="mb-7">

                <h1 class="text-3xl font-bold lg:text-4xl">
                    Catat Pembayaran Kas
                </h1>

                <p class="mt-2 text-xl text-slate-500">
                    Pembayaran akan menambah saldo kas secara otomatis
                </p>

            </div>


            <!-- TWO COLUMNS -->
            <div class="grid gap-6 xl:grid-cols-2">


                <!-- FORM -->
                <div class="rounded-2xl border-2 border-slate-300 bg-white p-7">

                    <h2 class="mb-6 text-2xl font-bold">
                        Form Pembayaran
                    </h2>


                    <form action="#" method="POST">

                        @csrf


                        <!-- PILIH SISWA -->
                        <div class="mb-5">

                            <label class="mb-3 block text-lg font-bold">
                                Pilih Siswa *
                            </label>

                            <select
                                name="siswa_id"
                                class="h-16 w-full rounded-2xl border-2 border-kaserals bg-white px-5 text-lg outline-none ring-4 ring-teal-100">

                                <option value="1">
                                    Nesya Shahira — 0085619367
                                </option>

                                <option value="2">
                                    Rizky Ananda — 0093451820
                                </option>

                                <option value="3">
                                    Dea Putri — 0071129384
                                </option>

                            </select>

                        </div>


                        <!-- TANGGAL + NOMINAL -->
                        <div class="mb-5 grid gap-5 sm:grid-cols-2">


                            <!-- TANGGAL -->
                            <div>

                                <label class="mb-3 block text-lg font-bold">
                                    Tanggal *
                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    value="2026-11-16"
                                    class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals"
                                >

                            </div>


                            <!-- NOMINAL -->
                            <div>

                                <label class="mb-3 block text-lg font-bold">
                                    Nominal *
                                </label>

                                <input
                                    type="number"
                                    name="nominal"
                                    placeholder="20000"
                                    class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals"
                                >

                            </div>

                        </div>


                        <!-- PERIODE -->
                        <div class="mb-5">

                            <label class="mb-3 block text-lg font-bold">
                                Periode
                            </label>

                            <select
                                name="periode"
                                class="h-16 w-full rounded-2xl border-2 border-slate-300 bg-white px-5 text-lg outline-none focus:border-kaserals">

                                <option>
                                    November 2026
                                </option>

                                <option>
                                    Oktober 2026
                                </option>

                                <option>
                                    September 2026
                                </option>

                            </select>

                        </div>


                        <!-- KETERANGAN -->
                        <div class="mb-6">

                            <label class="mb-3 block text-lg font-bold">
                                Keterangan
                            </label>

                            <input
                                type="text"
                                name="keterangan"
                                placeholder="Opsional"
                                class="h-16 w-full rounded-2xl border-2 border-slate-300 px-5 text-lg outline-none focus:border-kaserals"
                            >

                        </div>


                        <!-- BUTTONS -->
                        <div class="flex justify-end gap-4">

                            <button
                                type="reset"
                                class="rounded-2xl border-2 border-slate-300 bg-white px-7 py-4 text-lg font-bold hover:bg-slate-100">

                                Reset

                            </button>


                            <button
                                type="submit"
                                class="rounded-2xl bg-kaserals px-8 py-4 text-lg font-bold text-white hover:bg-teal-700">

                                Simpan Pembayaran

                            </button>

                        </div>

                    </form>

                </div>


                <!-- PEMBAYARAN HARI INI -->
                <div class="rounded-2xl border-2 border-slate-300 bg-white p-7">

                    <!-- TITLE -->
                    <div class="mb-6 flex items-center justify-between">

                        <h2 class="text-2xl font-bold">
                            Pembayaran Hari Ini
                        </h2>

                        <span class="text-xl font-bold">
                            Rp 340.000
                        </span>

                    </div>


                    <!-- TABLE HEADER -->
                    <div class="grid grid-cols-[1.5fr_1fr_auto] border-b-2 border-slate-300 pb-5 text-sm font-bold uppercase tracking-wide text-slate-400">

                        <span>
                            Nama
                        </span>

                        <span>
                            Nominal
                        </span>

                        <span>
                        </span>

                    </div>


                    <!-- SISWA 1 -->
                    <div class="grid grid-cols-[1.5fr_1fr_auto] items-center gap-4 border-b border-slate-200 py-6">

                        <div class="flex items-center gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-teal-100 font-bold text-kaserals">
                                NS
                            </div>

                            <span class="text-lg font-medium">
                                Nesya Shahira
                            </span>

                        </div>

                        <span class="text-right text-lg font-bold">
                            Rp 20.000
                        </span>

                        <button
                            class="rounded-xl border-2 border-red-300 px-5 py-3 font-bold text-red-600 hover:bg-red-50">

                            Hapus

                        </button>

                    </div>


                    <!-- SISWA 2 -->
                    <div class="grid grid-cols-[1.5fr_1fr_auto] items-center gap-4 border-b border-slate-200 py-6">

                        <div class="flex items-center gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-teal-100 font-bold text-kaserals">
                                RA
                            </div>

                            <span class="text-lg font-medium">
                                Rizky Ananda
                            </span>

                        </div>

                        <span class="text-right text-lg font-bold">
                            Rp 20.000
                        </span>

                        <button
                            class="rounded-xl border-2 border-red-300 px-5 py-3 font-bold text-red-600 hover:bg-red-50">

                            Hapus

                        </button>

                    </div>


                    <!-- SUCCESS MESSAGE -->
                    <div class="mt-7 rounded-2xl border-2 border-green-400 bg-green-50 p-4 text-lg text-green-700">

                        <span class="font-bold">
                            ✓
                        </span>

                        Pembayaran tersimpan. Status Nesya diperbarui menjadi Lunas.

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>
