@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f8fafc] flex">

    {{-- SIDEBAR --}}
    <aside class="w-[365px] min-h-screen bg-[#0d172d] text-white px-6 py-8">

        {{-- Logo --}}
        <div class="flex items-center gap-4 px-1 mb-12">
            <div class="w-14 h-14 rounded-2xl bg-[#0f9f95]
                        flex items-center justify-center text-2xl font-bold">
                K
            </div>

            <div>
                <h1 class="text-[27px] font-bold tracking-tight">
                    KASERALS
                </h1>
                <p class="text-gray-400 text-[16px]">
                    Kas Kelas Digital
                </p>
            </div>
        </div>

        {{-- MENU --}}
        <nav class="space-y-3">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-5 px-5 py-4 rounded-xl
                      text-[19px] text-gray-300 hover:bg-white/5">
                <span class="text-xl">□</span>
                Dashboard
            </a>

            <a href="{{ route('siswa.index') }}"
               class="flex items-center gap-5 px-5 py-4 rounded-xl
                      text-[19px] text-gray-300 hover:bg-white/5">
                <span class="text-xl">◉</span>
                Data Siswa
            </a>

            <div class="pt-7 pb-2 px-3">
                <span class="text-gray-500 font-semibold tracking-widest text-sm">
                    TRANSAKSI
                </span>
            </div>

            <a href="{{ route('pembayaran.index') }}"
               class="flex items-center gap-5 px-5 py-4 rounded-xl
                      text-[19px] text-gray-300 hover:bg-white/5">
                <span>✓</span>
                Pembayaran Kas
            </a>

            <a href="#"
               class="flex items-center gap-5 px-5 py-4 rounded-xl
                      text-[19px] text-gray-300 hover:bg-white/5">
                <span>≡</span>
                Status Pembayaran
            </a>

            <a href="{{ route('pemasukan.index') }}"
               class="flex items-center gap-5 px-5 py-4 rounded-xl
                      text-[19px] text-gray-300 hover:bg-white/5">
                <span>↓</span>
                Pemasukan
            </a>

            <a href="{{ route('pengeluaran.index') }}"
               class="flex items-center gap-5 px-5 py-4 rounded-xl
                      text-[19px] text-gray-300 hover:bg-white/5">
                <span>↑</span>
                Pengeluaran
            </a>

            <div class="pt-7 pb-2 px-3">
                <span class="text-gray-500 font-semibold tracking-widest text-sm">
                    CATATAN
                </span>
            </div>

            {{-- ACTIVE --}}
            <a href="{{ route('riwayat.index') }}"
               class="flex items-center gap-5 px-5 py-4 rounded-xl
                      bg-[#0f9f95] text-white text-[19px] font-semibold">
                <span>↻</span>
                Riwayat Transaksi
            </a>

            <a href="#"
               class="flex items-center gap-5 px-5 py-4 rounded-xl
                      text-[19px] text-gray-300 hover:bg-white/5">
                <span>▤</span>
                Laporan Keuangan
            </a>

        </nav>
    </aside>


    {{-- MAIN --}}
    <main class="flex-1">

        {{-- TOP HEADER --}}
        <header class="h-[107px] bg-white border-b border-gray-300
                       flex items-center justify-between px-10">

            <h2 class="text-[27px] font-bold">
                Riwayat Transaksi
            </h2>

            <div class="w-14 h-14 rounded-full bg-[#d9faf5]
                        text-[#0f9f95] flex items-center justify-center
                        text-lg font-bold">
                NS
            </div>
        </header>


        {{-- CONTENT --}}
        <section class="px-10 py-12">

            {{-- TITLE --}}
            <div class="flex justify-between items-start mb-8">

                <div>
                    <h1 class="text-[35px] font-bold text-[#101827]">
                        Riwayat Transaksi
                    </h1>

                    <p class="text-[21px] text-gray-500 mt-2">
                        {{ $jumlahDitampilkan ?? 0 }}
                        dari
                        {{ $jumlahTotal ?? 0 }}
                        transaksi ditampilkan
                    </p>
                </div>

                <a href="{{ route('riwayat.export') }}"
                   class="border border-gray-300 bg-white
                          rounded-2xl px-7 py-4
                          text-[20px] font-semibold
                          hover:bg-gray-50">
                    ↓ &nbsp; Ekspor Hasil Filter
                </a>

            </div>


            {{-- FILTER BOX --}}
            <form action="{{ route('riwayat.index') }}"
                  method="GET"
                  class="bg-[#effdfb] border border-[#c8f5ee]
                         rounded-2xl p-7 mb-10">

                {{-- BARIS PERTAMA --}}
                <div class="grid grid-cols-[2fr_1fr] gap-7 mb-5">

                    {{-- SEARCH --}}
                    <div class="relative">

                        <span class="absolute left-6 top-1/2
                                     -translate-y-1/2 text-xl">
                            🔍
                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama, keterangan, atau nominal..."
                            class="w-full h-[75px] bg-white
                                   border border-gray-300 rounded-2xl
                                   pl-14 pr-5 text-[20px]
                                   outline-none
                                   focus:border-[#0f9f95]">

                    </div>

                    {{-- JENIS --}}
                    <select
                        name="jenis"
                        class="h-[75px] bg-white border border-gray-300
                               rounded-2xl px-5 text-[20px]
                               outline-none">

                        <option value="">Jenis: Semua</option>
                        <option value="pembayaran"
                            {{ request('jenis') == 'pembayaran' ? 'selected' : '' }}>
                            Pembayaran
                        </option>
                        <option value="pemasukan"
                            {{ request('jenis') == 'pemasukan' ? 'selected' : '' }}>
                            Pemasukan
                        </option>
                        <option value="pengeluaran"
                            {{ request('jenis') == 'pengeluaran' ? 'selected' : '' }}>
                            Pengeluaran
                        </option>

                    </select>

                </div>


                {{-- BARIS KEDUA --}}
                <div class="grid grid-cols-[1fr_1fr_1fr_auto_auto]
                            gap-6">

                    {{-- DARI --}}
                    <input
                        type="date"
                        name="dari"
                        value="{{ request('dari') }}"
                        class="h-[108px] bg-white
                               border border-gray-300 rounded-2xl
                               px-5 text-[20px]">

                    {{-- SAMPAI --}}
                    <input
                        type="date"
                        name="sampai"
                        value="{{ request('sampai') }}"
                        class="h-[108px] bg-white
                               border border-gray-300 rounded-2xl
                               px-5 text-[20px]">

                    {{-- KATEGORI --}}
                    <select
                        name="kategori"
                        class="h-[108px] bg-white
                               border border-gray-300 rounded-2xl
                               px-5 text-[20px]">

                        <option value="">Kategori: Semua</option>
                        <option value="Kebutuhan Kelas">
                            Kebutuhan Kelas
                        </option>
                        <option value="Kegiatan">
                            Kegiatan
                        </option>
                        <option value="Lainnya">
                            Lainnya
                        </option>

                    </select>

                    {{-- TERAPKAN --}}
                    <button
                        type="submit"
                        class="h-[108px] px-8
                               bg-[#0f9f95] text-white
                               rounded-2xl text-[20px]
                               font-bold hover:bg-[#0b8b82]">
                        Terapkan
                    </button>

                    {{-- RESET --}}
                    <a href="{{ route('riwayat.index') }}"
                       class="h-[108px] px-6
                              flex items-center justify-center
                              text-[#0f9f95] text-[20px]
                              font-semibold">
                        Reset
                    </a>

                </div>

            </form>


            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full border-collapse">

                    <thead>
                        <tr class="border-b-2 border-gray-300">

                            <th class="text-left px-5 py-5
                                       text-gray-400 text-[18px]">
                                TANGGAL
                            </th>

                            <th class="text-left px-5 py-5
                                       text-gray-400 text-[18px]">
                                JENIS
                            </th>

                            <th class="text-left px-5 py-5
                                       text-gray-400 text-[18px]">
                                NAMA / SUMBER
                            </th>

                            <th class="text-right px-5 py-5
                                       text-gray-400 text-[18px]">
                                MASUK
                            </th>

                            <th class="text-right px-5 py-5
                                       text-gray-400 text-[18px]">
                                KELUAR
                            </th>

                            <th class="text-right px-5 py-5
                                       text-gray-400 text-[18px]">
                                SALDO
                            </th>

                        </tr>
                    </thead>


                    <tbody>

                        @forelse($transaksi as $item)

                            <tr class="border-b border-gray-200">

                                {{-- TANGGAL --}}
                                <td class="px-5 py-6 text-[20px]">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M') }}
                                </td>


                                {{-- JENIS --}}
                                <td class="px-5 py-6">

                                    @if($item->jenis == 'pembayaran')

                                        <span class="inline-block
                                                     px-5 py-2 rounded-full
                                                     bg-green-50
                                                     text-green-700
                                                     font-bold">
                                            Pembayaran
                                        </span>

                                    @elseif($item->jenis == 'pemasukan')

                                        <span class="inline-block
                                                     px-5 py-2 rounded-full
                                                     bg-green-50
                                                     text-green-700
                                                     font-bold">
                                            Pemasukan
                                        </span>

                                    @else

                                        <span class="inline-block
                                                     px-5 py-2 rounded-full
                                                     bg-red-50
                                                     text-red-600
                                                     font-bold">
                                            Pengeluaran
                                        </span>

                                    @endif

                                </td>


                                {{-- SUMBER --}}
                                <td class="px-5 py-6 text-[20px]">
                                    {{ $item->nama_sumber }}
                                </td>


                                {{-- MASUK --}}
                                <td class="px-5 py-6 text-right
                                           text-green-600
                                           font-bold text-[20px]">

                                    @if($item->masuk > 0)
                                        Rp {{ number_format($item->masuk, 0, ',', '.') }}
                                    @else
                                        —
                                    @endif

                                </td>


                                {{-- KELUAR --}}
                                <td class="px-5 py-6 text-right
                                           text-[20px] font-bold">

                                    @if($item->keluar > 0)

                                        <span class="text-red-500">
                                            Rp {{ number_format($item->keluar, 0, ',', '.') }}
                                        </span>

                                    @else
                                        —
                                    @endif

                                </td>


                                {{-- SALDO --}}
                                <td class="px-5 py-6 text-right
                                           text-[20px] font-bold">

                                    Rp {{ number_format($item->saldo, 0, ',', '.') }}

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center py-12
                                           text-gray-400 text-lg">
                                    Belum ada transaksi.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            <div class="flex justify-end items-center gap-3 mt-8">

                {{-- PREVIOUS --}}
                @if($transaksi->onFirstPage())

                    <span class="w-12 h-12 border border-gray-300
                                 rounded-xl flex items-center
                                 justify-center text-gray-400">
                        ‹
                    </span>

                @else

                    <a href="{{ $transaksi->previousPageUrl() }}"
                       class="w-12 h-12 border border-gray-300
                              rounded-xl flex items-center
                              justify-center hover:bg-gray-100">
                        ‹
                    </a>

                @endif


                {{-- PAGES --}}
                @foreach($transaksi->getUrlRange(1, $transaksi->lastPage()) as $page => $url)

                    @if($page == $transaksi->currentPage())

                        <span class="w-12 h-12 rounded-xl
                                     bg-[#0f9f95] text-white
                                     flex items-center justify-center
                                     font-semibold">
                            {{ $page }}
                        </span>

                    @else

                        <a href="{{ $url }}"
                           class="w-12 h-12 border border-gray-300
                                  rounded-xl flex items-center
                                  justify-center hover:bg-gray-100">
                            {{ $page }}
                        </a>

                    @endif

                @endforeach


                {{-- NEXT --}}
                @if($transaksi->hasMorePages())

                    <a href="{{ $transaksi->nextPageUrl() }}"
                       class="w-12 h-12 border border-gray-300
                              rounded-xl flex items-center
                              justify-center hover:bg-gray-100">
                        ›
                    </a>

                @else

                    <span class="w-12 h-12 border border-gray-300
                                 rounded-xl flex items-center
                                 justify-center text-gray-400">
                        ›
                    </span>

                @endif

            </div>

        </section>

    </main>

</div>
@endsection