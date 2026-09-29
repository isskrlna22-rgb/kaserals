```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Status Pembayaran - KASERALS</title>

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

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .nav-item {
            transition: all .2s ease;
        }

        .nav-item:hover {
            transform: translateX(3px);
        }
    </style>
</head>

<body class="bg-[#F6F8FB] text-slate-900">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden w-[270px] shrink-0 bg-navy text-white lg:flex lg:flex-col">

        <!-- LOGO -->
        <div class="px-7 pt-8 pb-7">

            <div class="flex items-center gap-4">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-kaserals text-2xl font-black">
                    K
                </div>

                <div>
                    <h1 class="text-xl font-black tracking-wide">
                        KASERALS
                    </h1>

                    <p class="mt-1 text-xs text-slate-400">
                        Kas Kelas Digital
                    </p>
                </div>

            </div>

        </div>

        <!-- NAVIGATION -->
        <nav class="flex-1 px-4">

            <p class="mb-3 px-4 text-[11px] font-bold uppercase tracking-[0.18em] text-slate-500">
                Utama
            </p>

            <a href="{{ route('dashboard') }}"
               class="nav-item mb-2 flex items-center gap-3 rounded-2xl px-4 py-3.5 text-sm font-semibold text-slate-300 hover:bg-white/5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">
                    ◫
                </span>
                Dashboard
            </a>

            <a href="{{ route('data-siswa.index') }}"
               class="nav-item mb-6 flex items-center gap-3 rounded-2xl px-4 py-3.5 text-sm font-semibold text-slate-300 hover:bg-white/5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">
                    ◉
                </span>
                Data Siswa
            </a>


            <p class="mb-3 px-4 text-[11px] font-bold uppercase tracking-[0.18em] text-slate-500">
                Transaksi
            </p>

            <a href="{{ route('pembayaran-kas.index') }}"
               class="nav-item mb-2 flex items-center gap-3 rounded-2xl px-4 py-3.5 text-sm font-semibold text-slate-300 hover:bg-white/5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">
                    ✓
                </span>
                Pembayaran Kas
            </a>

            <!-- ACTIVE -->
            <a href="{{ route('status-pembayaran.index') }}"
               class="mb-2 flex items-center gap-3 rounded-2xl bg-kaserals px-4 py-3.5 text-sm font-bold text-white">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15">
                    ≡
                </span>
                Status Pembayaran
            </a>

            <a href="{{ route('pemasukan.web.index') }}"
               class="nav-item mb-2 flex items-center gap-3 rounded-2xl px-4 py-3.5 text-sm font-semibold text-slate-300 hover:bg-white/5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">
                    ↓
                </span>
                Pemasukan
            </a>

            <a href="{{ route('pengeluaran.web.index') }}"
               class="nav-item mb-6 flex items-center gap-3 rounded-2xl px-4 py-3.5 text-sm font-semibold text-slate-300 hover:bg-white/5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">
                    ↑
                </span>
                Pengeluaran
            </a>


            <p class="mb-3 px-4 text-[11px] font-bold uppercase tracking-[0.18em] text-slate-500">
                Catatan
            </p>

            <a href="#"
               class="nav-item mb-2 flex items-center gap-3 rounded-2xl px-4 py-3.5 text-sm font-semibold text-slate-300 hover:bg-white/5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">
                    ↻
                </span>
                Riwayat Transaksi
            </a>

            <a href="#"
               class="nav-item flex items-center gap-3 rounded-2xl px-4 py-3.5 text-sm font-semibold text-slate-300 hover:bg-white/5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/5">
                    ▤
                </span>
                Laporan Keuangan
            </a>

        </nav>

        <!-- USER -->
        <div class="border-t border-white/10 p-5">

            <div class="flex items-center gap-3 rounded-2xl bg-white/5 p-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-teal-100 font-bold text-kaserals">
                    IK
                </div>

                <div>
                    <p class="text-sm font-bold">
                        Iis Karlina
                    </p>

                    <p class="text-xs text-slate-400">
                        Bendahara
                    </p>
                </div>

            </div>

        </div>

    </aside>


    <!-- MAIN -->
    <main class="min-w-0 flex-1">

        <!-- TOPBAR -->
        <header class="flex h-[78px] items-center justify-between border-b border-slate-200 bg-white px-6 lg:px-10">

            <div>

                <p class="text-xs font-semibold text-slate-400">
                    TRANSAKSI / PEMBAYARAN
                </p>

                <h2 class="mt-1 text-lg font-bold">
                    Status Pembayaran
                </h2>

            </div>

            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">
                    <p class="text-sm font-bold">
                        Iis Karlina
                    </p>

                    <p class="text-xs text-slate-400">
                        Bendahara
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-teal-50 font-bold text-kaserals">
                    IK
                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="px-6 py-8 lg:px-10 lg:py-10">

            <!-- TITLE -->
            <div class="mb-8">

                <div class="mb-3 inline-flex items-center gap-2 rounded-full bg-teal-50 px-3 py-1.5 text-xs font-bold text-kaserals">

                    <span class="h-2 w-2 rounded-full bg-kaserals"></span>

                    Monitoring Pembayaran

                </div>

                <h1 class="text-3xl font-black tracking-tight lg:text-4xl">
                    Status Pembayaran Siswa
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Pantau siswa yang sudah melakukan pembayaran kas
                    dan siswa yang belum melakukan pembayaran.
                </p>

            </div>


            <!-- HITUNGAN -->
            @php
                $totalSiswa = $siswa->count();

                $sudahBayar = $siswa->filter(function ($item) {
                    return $item->pembayaranKas->count() > 0;
                })->count();

                $belumBayar = $totalSiswa - $sudahBayar;

                $persentase =
                    $totalSiswa > 0
                        ? round(($sudahBayar / $totalSiswa) * 100)
                        : 0;

                $totalPembayaran = $siswa->sum(function ($item) {
                    return $item->pembayaranKas->sum('nominal');
                });
            @endphp


            <!-- SUMMARY CARDS -->
            <div class="mb-8 grid gap-5 md:grid-cols-2 xl:grid-cols-4">


                <!-- TOTAL SISWA -->
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-semibold text-slate-500">
                                Total Siswa
                            </p>

                            <p class="mt-3 text-3xl font-black">
                                {{ $totalSiswa }}
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-lg">
                            ◉
                        </div>

                    </div>

                    <p class="mt-3 text-xs text-slate-400">
                        Siswa terdaftar
                    </p>

                </div>


                <!-- SUDAH BAYAR -->
                <div class="rounded-3xl border border-green-100 bg-green-50 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-semibold text-green-700">
                                Sudah Bayar
                            </p>

                            <p class="mt-3 text-3xl font-black text-green-700">
                                {{ $sudahBayar }}
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-green-600">
                            ✓
                        </div>

                    </div>

                    <p class="mt-3 text-xs text-green-600">
                        {{ $persentase }}% dari seluruh siswa
                    </p>

                </div>


                <!-- BELUM BAYAR -->
                <div class="rounded-3xl border border-red-100 bg-red-50 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-semibold text-red-700">
                                Belum Bayar
                            </p>

                            <p class="mt-3 text-3xl font-black text-red-700">
                                {{ $belumBayar }}
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-red-600">
                            !
                        </div>

                    </div>

                    <p class="mt-3 text-xs text-red-600">
                        Perlu dipantau
                    </p>

                </div>


                <!-- TOTAL NOMINAL -->
                <div class="rounded-3xl bg-navy p-6 text-white">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-400">
                                Total Pembayaran
                            </p>

                            <p class="mt-3 text-2xl font-black">
                                Rp {{ number_format($totalPembayaran, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10">
                            Rp
                        </div>

                    </div>

                    <p class="mt-3 text-xs text-slate-400">
                        Dari seluruh siswa
                    </p>

                </div>

            </div>


            <!-- PROGRESS -->
            <div class="mb-8 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:p-7">

                <div class="mb-4 flex items-center justify-between gap-4">

                    <div>
                        <h2 class="text-lg font-black">
                            Ringkasan Pembayaran
                        </h2>

                        <p class="mt-1 text-sm text-slate-400">
                            Persentase siswa yang sudah membayar.
                        </p>
                    </div>

                    <span class="text-2xl font-black text-kaserals">
                        {{ $persentase }}%
                    </span>

                </div>

                <div class="h-3 overflow-hidden rounded-full bg-slate-100">

                    <div
                        class="h-full rounded-full bg-kaserals transition-all duration-500"
                        style="width: {{ $persentase }}%;">
                    </div>

                </div>

                <div class="mt-3 flex justify-between text-xs text-slate-400">

                    <span>
                        {{ $sudahBayar }} siswa sudah bayar
                    </span>

                    <span>
                        {{ $belumBayar }} siswa belum bayar
                    </span>

                </div>

            </div>


            <!-- TABLE -->
            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                <!-- TABLE HEADER -->
                <div class="border-b border-slate-100 p-6 lg:p-7">

                    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

                        <div>

                            <p class="text-xs font-bold uppercase tracking-wider text-kaserals">
                                Data pembayaran
                            </p>

                            <h2 class="mt-1 text-xl font-black">
                                Daftar Status Siswa
                            </h2>

                        </div>

                        <div class="rounded-xl bg-slate-100 px-3 py-2 text-xs font-bold text-slate-500">
                            {{ $totalSiswa }} siswa
                        </div>

                    </div>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full min-w-[760px]">

                        <thead class="border-b border-slate-100 bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400">
                                    Siswa
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400">
                                    NIS
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400">
                                    Kelas
                                </th>

                                <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-400">
                                    Total Bayar
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-400">
                                    Transaksi
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-400">
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse($siswa as $index => $item)

                                @php
                                    $jumlahTransaksi = $item->pembayaranKas->count();
                                    $totalBayar = $item->pembayaranKas->sum('nominal');
                                    $sudah = $jumlahTransaksi > 0;
                                @endphp

                                <tr class="transition hover:bg-slate-50">

                                    <!-- NO -->
                                    <td class="px-6 py-5 text-sm font-bold text-slate-400">
                                        {{ $index + 1 }}
                                    </td>


                                    <!-- NAMA -->
                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-teal-50 text-sm font-black text-kaserals">
                                                {{ strtoupper(substr($item->nama, 0, 1)) }}
                                            </div>

                                            <div>

                                                <p class="text-sm font-bold text-slate-800">
                                                    {{ $item->nama }}
                                                </p>

                                                <p class="mt-1 text-xs text-slate-400">
                                                    ID Siswa #{{ $item->id }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <!-- NIS -->
                                    <td class="px-6 py-5 text-sm font-medium text-slate-600">
                                        {{ $item->nis }}
                                    </td>


                                    <!-- KELAS -->
                                    <td class="px-6 py-5 text-sm font-medium text-slate-600">
                                        {{ $item->kelas }}
                                    </td>


                                    <!-- TOTAL -->
                                    <td class="px-6 py-5 text-right">

                                        <p class="text-sm font-black text-slate-800">
                                            Rp {{ number_format($totalBayar, 0, ',', '.') }}
                                        </p>

                                    </td>


                                    <!-- JUMLAH -->
                                    <td class="px-6 py-5 text-center">

                                        <span class="inline-flex min-w-9 justify-center rounded-xl bg-slate-100 px-3 py-2 text-xs font-bold text-slate-600">
                                            {{ $jumlahTransaksi }}
                                        </span>

                                    </td>


                                    <!-- STATUS -->
                                    <td class="px-6 py-5 text-center">

                                        @if($sudah)

                                            <span class="inline-flex items-center gap-2 rounded-full bg-green-50 px-3 py-2 text-xs font-bold text-green-700">

                                                <span class="h-2 w-2 rounded-full bg-green-500"></span>

                                                SUDAH BAYAR

                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-2 text-xs font-bold text-red-700">

                                                <span class="h-2 w-2 rounded-full bg-red-500"></span>

                                                BELUM BAYAR

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="px-6 py-16 text-center">

                                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-2xl text-slate-400">
                                            ◉
                                        </div>

                                        <h3 class="mt-4 text-base font-bold text-slate-700">
                                            Belum ada data siswa
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-400">
                                            Tambahkan data siswa terlebih dahulu.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>
```
