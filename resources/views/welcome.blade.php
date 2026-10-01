<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KASERALS - Sistem Pengelolaan Kas Kelas Digital | Tim Finora SMK Budi Bakti Ciwidey</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome 6 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            dark: '#0b1329'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .dark-glass {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }

        .gradient-text {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 50%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-brand-500 selection:text-white">

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <!-- TOP NAVIGATION BAR -->
    <header class="sticky top-0 z-40 w-full transition-all duration-300 glass-panel shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo & Name -->
                <div class="flex items-center gap-3">
                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-tr from-brand-700 to-emerald-500 flex items-center justify-center text-white shadow-md shadow-brand-500/20">
                        <i class="fa-solid font-bold text-xl fa-wallet"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xl font-extrabold tracking-tight text-slate-900">KASERALS</span>
                            <span
                                class="text-[10px] uppercase tracking-wider bg-brand-100 text-brand-700 font-bold px-2 py-0.5 rounded-full border border-brand-200">UKK
                                2026</span>
                        </div>
                        <p class="text-xs text-slate-500 font-medium hidden sm:block">by <span
                                class="font-bold text-brand-600">FINORA</span> • SMK Budi Bakti Ciwidey</p>
                    </div>
                </div>

                <!-- Navigation Links (Desktop) -->
                <nav class="hidden lg:flex items-center space-x-7 text-sm font-semibold text-slate-600">
                    <a href="#beranda" class="hover:text-brand-600 transition-colors">Beranda</a>
                    <a href="#masalah-solusi" class="hover:text-brand-600 transition-colors">Masalah & Solusi</a>
                    <a href="#fitur" class="hover:text-brand-600 transition-colors">Fitur Utama</a>
                    <a href="#demo-simulator"
                        class="hover:text-brand-600 transition-colors text-brand-600 font-bold flex items-center gap-1.5">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        Demo Kas
                    </a>
                    <a href="#stakeholder" class="hover:text-brand-600 transition-colors">Stakeholder</a>
                    <a href="#tim-finora" class="hover:text-brand-600 transition-colors">Tim Finora</a>
                </nav>

                <!-- Quick CTA Buttons -->
                <div class="flex items-center gap-3">
                    @auth
                        <!-- Jika Pengguna Sudah Login -->
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white font-semibold text-xs sm:text-sm px-4 py-2.5 rounded-xl transition-all shadow-md shadow-brand-500/25 active:scale-95">
                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs sm:text-sm px-4 py-2.5 rounded-xl transition-all active:scale-95">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <span>Keluar</span>
                            </button>
                        </form>
                    @else
                        <!-- Jika Pengguna Belum Login -->
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white font-semibold text-xs sm:text-sm px-4 py-2.5 rounded-xl transition-all shadow-md shadow-brand-500/25 active:scale-95">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <span>Portal Login</span>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Navigation Drawer -->
                <div id="mobile-menu"
                    class="hidden lg:hidden border-t border-slate-200 bg-white/95 backdrop-blur-md px-4 py-4 space-y-3">
                    <a href="#beranda" onclick="toggleMobileMenu()"
                        class="block text-slate-700 font-medium py-2 hover:text-brand-600">Beranda</a>
                    <a href="#masalah-solusi" onclick="toggleMobileMenu()"
                        class="block text-slate-700 font-medium py-2 hover:text-brand-600">Masalah & Solusi</a>
                    <a href="#fitur" onclick="toggleMobileMenu()"
                        class="block text-slate-700 font-medium py-2 hover:text-brand-600">Fitur Utama</a>
                    <a href="#demo-simulator" onclick="toggleMobileMenu()"
                        class="block text-brand-600 font-bold py-2">Demo Kas
                        Real-Time</a>
                    <a href="#stakeholder" onclick="toggleMobileMenu()"
                        class="block text-slate-700 font-medium py-2 hover:text-brand-600">Stakeholder & Persona</a>
                    <a href="#tim-finora" onclick="toggleMobileMenu()"
                        class="block text-slate-700 font-medium py-2 hover:text-brand-600">Tim Finora</a>
                </div>
    </header>

    <!-- HERO SECTION -->
    <section id="beranda" class="relative pt-8 pb-16 lg:pt-16 lg:pb-24 overflow-hidden">
        <!-- Decorative background blurs -->
        <div
            class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-tr from-brand-300/30 to-emerald-300/30 rounded-full blur-3xl pointer-events-none -z-10">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 items-center">

                <!-- Left Text Column -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-700 text-xs sm:text-sm font-semibold">
                        <i class="fa-solid fa-shield-halved text-brand-600"></i>
                        <span>Solusi Proyek UKK PPLG SMK Budi Bakti Ciwidey</span>
                    </div>

                    <h1
                        class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-slate-900 leading-[1.15]">
                        Pengelolaan Kas Kelas Digital: <br class="hidden sm:inline">
                        <span class="gradient-text">Transparan, Akurat, & Bebas Repot</span>
                    </h1>

                    <p
                        class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-medium">
                        <strong class="text-slate-800">KASERALS</strong> hadir sebagai aplikasi web terpusat dari
                        <strong class="text-brand-600">Tim Finora</strong> untuk menggantikan pembukuan kas manual.
                        Menghitung saldo otomatis, mencatat pembayaran & pengeluaran, serta menyediakan laporan keuangan
                        transparan real-time.
                    </p>

                    <div
                        class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-4 pt-2">
                        <a href="#demo-simulator"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-700 hover:to-brand-800 text-white font-bold text-base px-7 py-3.5 rounded-2xl shadow-lg shadow-brand-500/30 hover:shadow-xl hover:shadow-brand-500/40 transition-all hover:-translate-y-0.5">
                            <i class="fa-solid fa-calculator text-lg"></i>
                            <span>Coba Simulasi Real-Time</span>
                        </a>
                        <button onclick="openProposalModal()"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-100 text-slate-700 font-bold text-base px-6 py-3.5 rounded-2xl border border-slate-200 shadow-sm transition-all hover:-translate-y-0.5">
                            <i class="fa-solid fa-file-pdf text-red-500 text-lg"></i>
                            <span>Ringkasan Proposal UKK</span>
                        </button>
                    </div>

                    <!-- Key highlights badges -->
                    <div class="pt-6 grid grid-cols-3 gap-2 sm:gap-4 border-t border-slate-200/80">
                        <div class="flex flex-col items-center lg:items-start">
                            <span class="text-xl sm:text-2xl font-black text-slate-900 flex items-center gap-1">
                                100% <i class="fa-solid fa-bolt text-amber-500 text-sm"></i>
                            </span>
                            <span class="text-xs text-slate-500 font-medium">Otomatisasi Saldo</span>
                        </div>
                        <div class="flex flex-col items-center lg:items-start">
                            <span class="text-xl sm:text-2xl font-black text-slate-900 flex items-center gap-1">
                                Real-Time <i class="fa-solid fa-eye text-emerald-500 text-sm"></i>
                            </span>
                            <span class="text-xs text-slate-500 font-medium">Transparansi Siswa</span>
                        </div>
                        <div class="flex flex-col items-center lg:items-start">
                            <span class="text-xl sm:text-2xl font-black text-slate-900 flex items-center gap-1">
                                Multi-Role <i class="fa-solid fa-users text-brand-500 text-sm"></i>
                            </span>
                            <span class="text-xs text-slate-500 font-medium">Bendahara, Siswa, Wali</span>
                        </div>
                    </div>
                </div>

                <!-- Right Visual Column: Live Interactive Mini Dashboard -->
                <div class="lg:col-span-5">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        <!-- Background Card Glow -->
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-brand-600 to-emerald-500 rounded-3xl blur opacity-30 animate-pulse">
                        </div>

                        <div
                            class="relative bg-slate-900 text-white rounded-3xl p-6 sm:p-7 shadow-2xl border border-slate-800 space-y-6">
                            <!-- Widget Header -->
                            <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                                <div class="flex items-center gap-3">
                                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                                    <span class="text-xs font-mono text-slate-400 ml-2">kaserals-dashboard v1.0</span>
                                </div>
                                <span
                                    class="text-xs bg-emerald-500/10 text-emerald-400 font-medium px-2.5 py-1 rounded-full border border-emerald-500/20 flex items-center gap-1">
                                    <i class="fa-solid fa-circle text-[8px]"></i> System Active
                                </span>
                            </div>

                            <!-- Live Balance Box -->
                            <div
                                class="bg-gradient-to-br from-slate-800 to-slate-900 p-5 rounded-2xl border border-slate-700/60 shadow-inner">
                                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider mb-1">Saldo Kas
                                    Kelas X PPLG 1</p>
                                <div class="flex items-baseline justify-between">
                                    <span id="hero-live-balance"
                                        class="text-3xl sm:text-4xl font-extrabold text-emerald-400 tracking-tight">Rp
                                        845.000</span>
                                    <span
                                        class="text-xs bg-brand-500/20 text-brand-300 px-2 py-1 rounded-md font-mono">FR-008</span>
                                </div>
                            </div>

                            <!-- Income & Expense Grid -->
                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-slate-800/80 p-4 rounded-2xl border border-slate-700/50">
                                    <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
                                        <span>Total Pemasukan</span>
                                        <i class="fa-solid fa-arrow-down-left text-emerald-400"></i>
                                    </div>
                                    <p id="hero-live-income" class="text-lg font-bold text-slate-100">Rp 1.120.000</p>
                                </div>
                                <div class="bg-slate-800/80 p-4 rounded-2xl border border-slate-700/50">
                                    <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
                                        <span>Total Pengeluaran</span>
                                        <i class="fa-solid fa-arrow-up-right text-rose-400"></i>
                                    </div>
                                    <p id="hero-live-expense" class="text-lg font-bold text-slate-100">Rp 275.000</p>
                                </div>
                            </div>

                            <!-- Quick Stat Mini Progress -->
                            <div class="bg-slate-800/50 p-4 rounded-2xl border border-slate-700/40 space-y-2">
                                <div class="flex justify-between text-xs font-medium">
                                    <span class="text-slate-300">Status Pembayaran Kas Minggu Ini</span>
                                    <span id="hero-paid-percentage" class="text-emerald-400 font-bold">85%
                                        Lunas</span>
                                </div>
                                <div class="w-full bg-slate-700 rounded-full h-2 overflow-hidden">
                                    <div id="hero-progress-bar"
                                        class="bg-gradient-to-r from-brand-500 to-emerald-400 h-2 rounded-full transition-all duration-500"
                                        style="width: 85%"></div>
                                </div>
                                <div class="flex justify-between text-[11px] text-slate-400 pt-1">
                                    <span id="hero-paid-count">29 Siswa Lunas</span>
                                    <span id="hero-unpaid-count">5 Siswa Belum</span>
                                </div>
                            </div>

                            <!-- Live Activity Ticker -->
                            <div
                                class="text-xs text-slate-400 bg-slate-950/60 p-3 rounded-xl border border-slate-800 flex items-center justify-between">
                                <span class="flex items-center gap-2 truncate">
                                    <i class="fa-solid fa-bolt text-amber-400 animate-bounce"></i>
                                    <span id="hero-latest-activity">Transaksi Terakhir: Pembayaran kas oleh Iis
                                        Karlina</span>
                                </span>
                                <span class="text-[10px] text-slate-500 font-mono">Baru saja</span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION PROBLEM STATEMENT VS SOLUTION -->
    <section id="masalah-solusi" class="py-16 bg-white border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
                <h2 class="text-xs font-bold text-brand-600 uppercase tracking-widest">S0-01: Problem Statement &
                    Solution</h2>
                <p class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Mengapa Kelas Membutuhkan KASERALS?
                </p>
                <p class="text-slate-600 text-sm sm:text-base">
                    Perbandingan langsung antara kondisi eksisting (As-Is) pengelolaan kas manual dengan solusi digital
                    KASERALS (To-Be) karya Tim Finora.
                </p>
            </div>

            <!-- Problem Statement Quote Box -->
            <div class="mb-12 bg-amber-50/80 border-l-4 border-amber-500 p-5 sm:p-6 rounded-r-2xl shadow-sm">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-amber-500 text-white rounded-xl text-xl hidden sm:block">
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold uppercase text-amber-900 tracking-wide mb-1">Pernyataan Masalah
                            Utama (Problem Statement UKK)</h4>
                        <p class="text-xs sm:text-sm text-amber-950 leading-relaxed font-medium italic">
                            "Pengelolaan kas kelas yang masih dilakukan secara manual menyebabkan pencatatan pembayaran,
                            pemasukan, dan pengeluaran tidak terpusat serta meningkatkan risiko kesalahan dalam
                            perhitungan saldo dan pembuatan laporan. Kondisi tersebut menyulitkan bendahara dalam
                            mengelola dan memantau keuangan kelas serta membatasi akses siswa dan pihak terkait terhadap
                            informasi kas yang akurat dan transparan."
                        </p>
                    </div>
                </div>
            </div>

            <!-- Comparison Grid -->
            <div class="grid md:grid-cols-2 gap-8">

                <!-- Existing Condition (As-Is) -->
                <div class="bg-slate-50 p-6 sm:p-8 rounded-3xl border border-slate-200 space-y-6">
                    <div class="flex items-center justify-between">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-rose-100 text-rose-700 text-xs font-bold">
                            <i class="fa-solid fa-xmark"></i> Kondisi Eksisting (Manual)
                        </div>
                        <span class="text-xs text-slate-400 font-mono">1.1 Kondisi As-Is</span>
                    </div>

                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-minus text-rose-500 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-800">Pencatatan Tercecer</h5>
                                <p class="text-xs text-slate-600">Pencatatan kas di buku tulis, spreadsheet terpisah,
                                    atau grup WhatsApp yang rentan hilang.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-minus text-rose-500 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-800">Perhitungan Saldo Manual</h5>
                                <p class="text-xs text-slate-600">Tinggi risiko kesalahan hitung saldo dan
                                    ketidaksesuaian uang fisik dengan catatan.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-minus text-rose-500 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-800">Sulit Melacak Siswa Menunggak</h5>
                                <p class="text-xs text-slate-600">Bendahara kesulitan memantau dengan cepat siapa siswa
                                    yang sudah/belum membayar kas.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-minus text-rose-500 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-800">Minim Transparansi</h5>
                                <p class="text-xs text-slate-600">Siswa dan Wali Kelas harus bertanya berulang kali
                                    untuk mengetahui riwayat penggunaan kas.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-minus text-rose-500 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-800">Rekapitulasi Laporan Lama</h5>
                                <p class="text-xs text-slate-600">Menyusun laporan bulanan memakan waktu lama karena
                                    harus merekap satu per satu.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- KASERALS Solution (To-Be) -->
                <div
                    class="bg-gradient-to-br from-brand-900 to-slate-900 text-white p-6 sm:p-8 rounded-3xl border border-brand-800 shadow-xl space-y-6">
                    <div class="flex items-center justify-between">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-500/30">
                            <i class="fa-solid fa-check"></i> Solusi Digital KASERALS
                        </div>
                        <span class="text-xs text-brand-300 font-mono">1.4 Project Goals</span>
                    </div>

                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-400 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-100">Database Terpusat (FR-003, FR-004)</h5>
                                <p class="text-xs text-slate-300">Seluruh data siswa, transaksi kas, dan pengeluaran
                                    tersimpan aman dalam satu sistem web.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-400 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-100">Perhitungan Saldo Otomatis (FR-008)</h5>
                                <p class="text-xs text-slate-300">Saldo dihitung realtime dari (Total Pemasukan Kas -
                                    Total Pengeluaran), 100% presisi.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-400 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-100">Monitoring Status Siswa Instant (FR-005)
                                </h5>
                                <p class="text-xs text-slate-300">Badge status "Sudah Bayar" / "Belum Bayar" terupdate
                                    otomatis tiap kali pembayaran dicatat.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-400 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-100">Portal Informasi & Transparansi (FR-013,
                                    FR-015)</h5>
                                <p class="text-xs text-slate-300">Siswa, Ketua Kelas, dan Wali Kelas dapat mengecek
                                    penggunaan dana kas kapan saja.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-400 mt-1"></i>
                            <div>
                                <h5 class="text-sm font-bold text-slate-100">Ekspor Laporan PDF & Excel (FR-011,
                                    FR-012)</h5>
                                <p class="text-xs text-slate-300">Cetak dan unduh rekapitulasi keuangan periodik hanya
                                    dalam satu klik tombol.</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION FITUR UTAMA (REQUIREMENTS SPECIFICATION) -->
    <section id="fitur" class="py-16 sm:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <h2 class="text-xs font-bold text-brand-600 uppercase tracking-widest">S0-03: Functional Requirements
                </h2>
                <p class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Fitur Lengkap Sesuai Spesifikasi UKK
                </p>
                <p class="text-slate-600 text-sm sm:text-base">
                    Dirancang secara matang mencakup seluruh kebutuhan fungsional (FR-001 s.d FR-017) dan NFR.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Card 1: Dashboard Real-Time -->
                <div
                    class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl mb-4 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                    <span
                        class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">FR-002</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2 mb-1">Dashboard Real-Time</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Ringkasan total pemasukan, total pengeluaran,
                        saldo otomatis, dan statistik pembayaran siswa.</p>
                </div>

                <!-- Card 2: Pencatatan Pembayaran -->
                <div
                    class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl mb-4 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <span
                        class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">FR-004
                        & FR-005</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2 mb-1">Pencatatan Pembayaran</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Input pembayaran kas siswa mingguan dengan status
                        terupdate otomatis menjadi "Sudah Bayar".</p>
                </div>

                <!-- Card 3: Pemasukan & Pengeluaran -->
                <div
                    class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl mb-4 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <span
                        class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">FR-006
                        & FR-007</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2 mb-1">Manajemen Pengeluaran</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Catat pengeluaran kas berdasarkan kategori (Alat
                        tulis, Acara, Konsumsi) beserta tanggal & nominal.</p>
                </div>

                <!-- Card 4: Saldo Otomatis -->
                <div
                    class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl mb-4 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-calculator"></i>
                    </div>
                    <span
                        class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">FR-008</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2 mb-1">Kalkulasi Saldo Presisi</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Perhitungan otomatis saldo = (Total Pemasukan Kas
                        - Pengeluaran) mencegah ketidaksesuaian saldo.</p>
                </div>

                <!-- Card 5: Riwayat & Filter -->
                <div
                    class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl mb-4 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                    <span
                        class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">FR-009
                        & FR-010</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2 mb-1">Riwayat & Pencarian</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Pencarian transaksi cepat berdasarkan kata kunci,
                        tanggal, jenis transaksi, atau nama siswa.</p>
                </div>

                <!-- Card 6: Ekspor Laporan PDF/Excel -->
                <div
                    class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-xl mb-4 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-file-export"></i>
                    </div>
                    <span
                        class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">FR-011
                        & FR-012</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2 mb-1">Laporan & Ekspor PDF</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Hasilkan rekapitulasi keuangan kelas sesuai
                        periode dan ekspor ke PDF/Excel siap cetak.</p>
                </div>

                <!-- Card 7: Board Pengumuman Kas -->
                <div
                    class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl mb-4 group-hover:bg-sky-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <span
                        class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">FR-016</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2 mb-1">Pengumuman Kas</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Fitur publikasi pengumuman penting terkait
                        tagihan kas minggu ke-N atau penggunaan dana kelas.</p>
                </div>

                <!-- Card 8: Monitoring Wali Kelas -->
                <div
                    class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 group">
                    <div
                        class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl mb-4 group-hover:bg-teal-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <span
                        class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-semibold">FR-015</span>
                    <h3 class="text-base font-bold text-slate-900 mt-2 mb-1">Akses Wali Kelas</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Portal pengawasan khusus bagi Wali Kelas & Ketua
                        Kelas untuk mengecek transparansi saldo.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- INTERACTIVE LIVE KAS SIMULATOR / DEMO APPLICATION WIDGET -->
    <section id="demo-simulator" class="py-16 sm:py-24 bg-slate-900 text-slate-100 relative overflow-hidden">
        <!-- Glow accents -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-600/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-600/20 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-laptop-code"></i> Live Interactive Demo
                </div>
                <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight">
                    Simulasi Aplikasi KASERALS Real-Time
                </h2>
                <p class="text-slate-400 text-sm sm:text-base">
                    Coba langsung seluruh alur kerja KASERALS! Anda dapat mencatat pembayaran kas siswa, menambah
                    pengeluaran, mengecek status lunas, melihat riwayat, hingga simulasi ekspor laporan.
                </p>
            </div>

            <!-- SIMULATOR MAIN APP CONTAINER -->
            <div
                class="bg-slate-800/90 rounded-3xl border border-slate-700/80 shadow-2xl overflow-hidden backdrop-blur-xl">

                <!-- App Header Bar -->
                <div
                    class="bg-slate-900/90 px-6 py-4 border-b border-slate-700/80 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-brand-600 flex items-center justify-center text-white font-bold text-lg">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white flex items-center gap-2">
                                KASERALS App Simulator
                                <span
                                    class="text-[10px] bg-brand-500/20 text-brand-300 border border-brand-500/30 font-semibold px-2 py-0.5 rounded-full">Kelas
                                    X PPLG 1</span>
                            </h3>
                            <p class="text-xs text-slate-400">Tahun Ajaran 2026/2027 • Bendahara: Iis Karlina</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button onclick="resetSimulatorData()"
                            class="text-xs bg-slate-800 hover:bg-slate-700 text-slate-300 font-medium px-3 py-1.5 rounded-lg border border-slate-700 transition-colors flex items-center gap-1.5">
                            <i class="fa-solid fa-rotate-right text-amber-400"></i> Reset Data Dummy
                        </button>
                    </div>
                </div>

                <!-- Simulator Live Stat Cards -->
                <div class="p-6 grid grid-cols-2 lg:grid-cols-4 gap-4 bg-slate-900/40 border-b border-slate-700/60">

                    <!-- Card 1: Saldo -->
                    <div class="bg-slate-800/80 p-4 rounded-2xl border border-slate-700">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Saldo Kas Saat
                            Ini</p>
                        <h4 id="sim-balance" class="text-2xl sm:text-3xl font-black text-emerald-400">Rp 845.000</h4>
                        <span class="text-[10px] text-slate-400 mt-1 block">Calculated Automatically (FR-008)</span>
                    </div>

                    <!-- Card 2: Income -->
                    <div class="bg-slate-800/80 p-4 rounded-2xl border border-slate-700">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Total Pemasukan
                        </p>
                        <h4 id="sim-income" class="text-xl sm:text-2xl font-bold text-slate-100">Rp 1.120.000</h4>
                        <span class="text-[10px] text-emerald-400 mt-1 block"><i
                                class="fa-solid fa-arrow-down-left"></i> Kas Siswa & Pemasukan Lain</span>
                    </div>

                    <!-- Card 3: Expense -->
                    <div class="bg-slate-800/80 p-4 rounded-2xl border border-slate-700">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Total Pengeluaran
                        </p>
                        <h4 id="sim-expense" class="text-xl sm:text-2xl font-bold text-rose-400">Rp 275.000</h4>
                        <span class="text-[10px] text-rose-300 mt-1 block"><i class="fa-solid fa-arrow-up-right"></i>
                            Alat Tulis & Kegiatan Kelas</span>
                    </div>

                    <!-- Card 4: Paid Status % -->
                    <div class="bg-slate-800/80 p-4 rounded-2xl border border-slate-700">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Status Siswa
                            Lunas</p>
                        <h4 id="sim-paid-percent" class="text-xl sm:text-2xl font-bold text-amber-400">80% Lunas</h4>
                        <span id="sim-paid-summary" class="text-[10px] text-slate-300 mt-1 block">8 dari 10 Siswa
                            Terdata</span>
                    </div>

                </div>

                <!-- Simulator Navigation Tabs -->
                <div class="px-6 pt-4 bg-slate-900/60 border-b border-slate-700/80 overflow-x-auto custom-scrollbar">
                    <div class="flex space-x-2 text-xs sm:text-sm font-semibold min-w-max pb-2">
                        <button id="tab-btn-pay" onclick="switchSimTab('pay')"
                            class="sim-tab-btn active px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 bg-brand-600 text-white">
                            <i class="fa-solid fa-plus-circle"></i> Catat Kas Siswa
                        </button>
                        <button id="tab-btn-expense" onclick="switchSimTab('expense')"
                            class="sim-tab-btn px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 bg-slate-800 text-slate-300 hover:bg-slate-700">
                            <i class="fa-solid fa-minus-circle"></i> Catat Pengeluaran
                        </button>
                        <button id="tab-btn-students" onclick="switchSimTab('students')"
                            class="sim-tab-btn px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 bg-slate-800 text-slate-300 hover:bg-slate-700">
                            <i class="fa-solid fa-users"></i> Status Siswa
                        </button>
                        <button id="tab-btn-history" onclick="switchSimTab('history')"
                            class="sim-tab-btn px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 bg-slate-800 text-slate-300 hover:bg-slate-700">
                            <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Transaksi
                        </button>
                        <button id="tab-btn-report" onclick="switchSimTab('report')"
                            class="sim-tab-btn px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 bg-slate-800 text-slate-300 hover:bg-slate-700">
                            <i class="fa-solid fa-file-invoice"></i> Laporan Keuangan
                        </button>
                        <button id="tab-btn-announce" onclick="switchSimTab('announce')"
                            class="sim-tab-btn px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 bg-slate-800 text-slate-300 hover:bg-slate-700">
                            <i class="fa-solid fa-bullhorn"></i> Pengumuman Kas
                        </button>
                    </div>
                </div>

                <!-- Simulator Tab Content Views -->
                <div class="p-6 min-h-[380px]">

                    <!-- TAB 1: CATAT PEMBAYARAN KAS SISWA -->
                    <div id="sim-tab-pay" class="sim-content space-y-6">
                        <div class="grid lg:grid-cols-12 gap-8">
                            <div class="lg:col-span-6 space-y-4">
                                <h4 class="text-base font-bold text-white flex items-center gap-2">
                                    <i class="fa-solid fa-circle-plus text-emerald-400"></i> Form Catat Pembayaran
                                    Siswa (FR-004)
                                </h4>
                                <form id="form-add-payment" onsubmit="handleAddPayment(event)"
                                    class="space-y-4 bg-slate-800/50 p-5 rounded-2xl border border-slate-700">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-1">Pilih
                                            Siswa</label>
                                        <select id="pay-student-select"
                                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500"
                                            required>
                                            <!-- Dynamically populated -->
                                        </select>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-1">Nominal
                                                (Rp)</label>
                                            <input type="number" id="pay-amount" value="5000" min="1000"
                                                step="1000"
                                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500"
                                                required>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-1">Minggu Ke /
                                                Keterangan</label>
                                            <input type="text" id="pay-note" value="Kas Rutin Minggu Ke-4"
                                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500"
                                                required>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm py-3 rounded-xl transition-all shadow-lg shadow-emerald-600/20 flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-check-circle"></i> Simpan Pembayaran (Tambah Saldo)
                                    </button>
                                </form>
                            </div>

                            <!-- Helper Guide Box -->
                            <div
                                class="lg:col-span-6 bg-slate-900/60 p-5 rounded-2xl border border-slate-700/60 space-y-3">
                                <h5 class="text-xs font-bold uppercase tracking-wider text-brand-400">Panduan Penguji /
                                    Bendahara</h5>
                                <ul class="text-xs text-slate-300 space-y-2.5 leading-relaxed">
                                    <li class="flex items-start gap-2">
                                        <i class="fa-solid fa-circle-dot text-brand-400 mt-0.5"></i>
                                        <span>Memilih siswa yang berstatus <strong>"Belum Bayar"</strong> akan
                                            memperbarui status siswa tersebut menjadi <strong>"Lunas"</strong> secara
                                            otomatis.</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <i class="fa-solid fa-circle-dot text-brand-400 mt-0.5"></i>
                                        <span>Saldo Kas Kelas akan langsung bertambah realtime sesuai nominal yang
                                            diinputkan.</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <i class="fa-solid fa-circle-dot text-brand-400 mt-0.5"></i>
                                        <span>Transaksi ini akan tercatat otomatis di tab <strong>Riwayat
                                                Transaksi</strong>.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: CATAT PENGELUARAN -->
                    <div id="sim-tab-expense" class="sim-content hidden space-y-6">
                        <div class="grid lg:grid-cols-12 gap-8">
                            <div class="lg:col-span-6 space-y-4">
                                <h4 class="text-base font-bold text-white flex items-center gap-2">
                                    <i class="fa-solid fa-circle-minus text-rose-400"></i> Form Catat Pengeluaran Kas
                                    (FR-007)
                                </h4>
                                <form id="form-add-expense" onsubmit="handleAddExpense(event)"
                                    class="space-y-4 bg-slate-800/50 p-5 rounded-2xl border border-slate-700">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-1">Kategori
                                            Pengeluaran</label>
                                        <select id="exp-category"
                                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500"
                                            required>
                                            <option value="Alat Tulis & Kelas">Alat Tulis & Peralatan Kelas
                                                (Spidol/Penghapus)</option>
                                            <option value="Fotokopi & Print">Fotokopi & Print Tugas</option>
                                            <option value="Acara & Keberkahan">Acara Kelas & Kebersihan</option>
                                            <option value="Konsumsi & Kegiatan">Konsumsi Kegiatan Kelas</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-1">Nominal
                                                Pengeluaran (Rp)</label>
                                            <input type="number" id="exp-amount" placeholder="misal: 25000"
                                                min="1000" step="1000"
                                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500"
                                                required>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-300 mb-1">Keterangan
                                                Pengeluaran</label>
                                            <input type="text" id="exp-note"
                                                placeholder="Beli Spidol & Penghapus Whiteboard"
                                                class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-brand-500"
                                                required>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="w-full bg-rose-600 hover:bg-rose-500 text-white font-bold text-sm py-3 rounded-xl transition-all shadow-lg shadow-rose-600/20 flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-receipt"></i> Simpan Pengeluaran (Kurangi Saldo)
                                    </button>
                                </form>
                            </div>

                            <div
                                class="lg:col-span-6 bg-slate-900/60 p-5 rounded-2xl border border-slate-700/60 space-y-3">
                                <h5 class="text-xs font-bold uppercase tracking-wider text-rose-400">Validasi Saldo &
                                    Pengeluaran</h5>
                                <p class="text-xs text-slate-300 leading-relaxed">
                                    Sistem KASERALS secara otomatis akan memvalidasi saldo yang ada. Jika nominal
                                    pengeluaran melebihi saldo kas saat ini, sistem akan menolak transaksi untuk
                                    mencegah saldo minus.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: DAFTAR STATUS SISWA -->
                    <div id="sim-tab-students" class="sim-content hidden space-y-4">
                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <h4 class="text-base font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-users text-brand-400"></i> Status Pembayaran Siswa Kelas (FR-005)
                            </h4>
                            <span class="text-xs text-slate-400">Klik "Tandai Lunas" untuk mencatat pembayaran
                                cepat</span>
                        </div>

                        <div class="overflow-x-auto rounded-2xl border border-slate-700">
                            <table class="w-full text-left text-xs">
                                <thead
                                    class="bg-slate-900 text-slate-300 uppercase text-[10px] tracking-wider border-b border-slate-700">
                                    <tr>
                                        <th class="p-3">NISN</th>
                                        <th class="p-3">Nama Siswa</th>
                                        <th class="p-3">Status Minggu Ini</th>
                                        <th class="p-3">Total Kas Terbayar</th>
                                        <th class="p-3 text-right">Aksi Cepat</th>
                                    </tr>
                                </thead>
                                <tbody id="student-table-body" class="divide-y divide-slate-700/60 text-slate-200">
                                    <!-- Dynamic rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TAB 4: RIWAYAT TRANSAKSI & FILTER -->
                    <div id="sim-tab-history" class="sim-content hidden space-y-4">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                            <h4 class="text-base font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-history text-amber-400"></i> Riwayat Transaksi (FR-009 & FR-010)
                            </h4>
                            <div class="flex items-center gap-2 w-full sm:w-auto">
                                <input type="text" id="history-search" oninput="renderTransactions()"
                                    placeholder="Cari transaksi..."
                                    class="bg-slate-900 border border-slate-700 text-xs text-slate-200 px-3 py-2 rounded-xl focus:outline-none focus:border-brand-500 w-full sm:w-48">
                                <select id="history-filter-type" onchange="renderTransactions()"
                                    class="bg-slate-900 border border-slate-700 text-xs text-slate-200 px-3 py-2 rounded-xl focus:outline-none focus:border-brand-500">
                                    <option value="all">Semua Jenis</option>
                                    <option value="pemasukan">Pemasukan</option>
                                    <option value="pengeluaran">Pengeluaran</option>
                                </select>
                            </div>
                        </div>

                        <div
                            class="overflow-x-auto rounded-2xl border border-slate-700 max-h-[300px] custom-scrollbar">
                            <table class="w-full text-left text-xs">
                                <thead
                                    class="bg-slate-900 text-slate-300 uppercase text-[10px] tracking-wider border-b border-slate-700 sticky top-0">
                                    <tr>
                                        <th class="p-3">Tanggal & Waktu</th>
                                        <th class="p-3">Jenis</th>
                                        <th class="p-3">Keterangan / Siswa</th>
                                        <th class="p-3 text-right">Nominal</th>
                                    </tr>
                                </thead>
                                <tbody id="transaction-table-body"
                                    class="divide-y divide-slate-700/60 text-slate-200">
                                    <!-- Dynamic rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TAB 5: LAPORAN KEUANGAN & EKSPOR -->
                    <div id="sim-tab-report" class="sim-content hidden space-y-6">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div>
                                <h4 class="text-base font-bold text-white flex items-center gap-2">
                                    <i class="fa-solid fa-file-invoice text-purple-400"></i> Rekapitulasi Laporan
                                    Keuangan (FR-011)
                                </h4>
                                <p class="text-xs text-slate-400">Siap untuk ditinjau oleh Wali Kelas dan Ketua Kelas
                                    (FR-015)</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button onclick="triggerSimulatedExport('PDF')"
                                    class="bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition-all flex items-center gap-1.5 shadow-md">
                                    <i class="fa-solid fa-file-pdf"></i> Ekspor PDF
                                </button>
                                <button onclick="triggerSimulatedExport('Excel')"
                                    class="bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition-all flex items-center gap-1.5 shadow-md">
                                    <i class="fa-solid fa-file-excel"></i> Ekspor Excel
                                </button>
                            </div>
                        </div>

                        <!-- Report Document Preview Box -->
                        <div id="report-preview-box"
                            class="bg-white text-slate-900 p-6 sm:p-8 rounded-2xl shadow-xl space-y-6 font-sans">
                            <div class="border-b-2 border-slate-900 pb-4 flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-black uppercase tracking-tight text-slate-900">LAPORAN
                                        KEUANGAN KAS KELAS</h3>
                                    <p class="text-xs text-slate-600 font-bold">SMK BUDI BAKTI CIWIDEY - KELAS X PPLG 1
                                    </p>
                                    <p class="text-[11px] text-slate-500">Periode: September 2026</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-xs bg-brand-100 text-brand-800 font-extrabold px-2.5 py-1 rounded">SYSTEM
                                        KASERALS</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4 text-center">
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-200">
                                    <p class="text-[10px] uppercase font-bold text-slate-500">Total Pemasukan</p>
                                    <p id="report-income" class="text-base font-extrabold text-emerald-600">Rp
                                        1.120.000</p>
                                </div>
                                <div class="p-3 bg-slate-50 rounded-xl border border-slate-200">
                                    <p class="text-[10px] uppercase font-bold text-slate-500">Total Pengeluaran</p>
                                    <p id="report-expense" class="text-base font-extrabold text-rose-600">Rp 275.000
                                    </p>
                                </div>
                                <div class="p-3 bg-brand-50 rounded-xl border border-brand-200">
                                    <p class="text-[10px] uppercase font-bold text-brand-700">Saldo Akhir</p>
                                    <p id="report-balance" class="text-base font-extrabold text-brand-700">Rp 845.000
                                    </p>
                                </div>
                            </div>

                            <div
                                class="pt-4 border-t border-slate-200 text-xs text-slate-500 flex justify-between items-center">
                                <span>Disusun oleh Bendahara: <strong>Iis Karlina</strong></span>
                                <span>Disetujui Wali Kelas: <strong>Asep Baban Sobana S.T., M.Si.</strong></span>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 6: PENGUMUMAN KAS -->
                    <div id="sim-tab-announce" class="sim-content hidden space-y-6">
                        <div class="grid lg:grid-cols-12 gap-6">
                            <div class="lg:col-span-5 space-y-4">
                                <h4 class="text-base font-bold text-white flex items-center gap-2">
                                    <i class="fa-solid fa-bullhorn text-sky-400"></i> Buat Pengumuman Kas (FR-016)
                                </h4>
                                <form id="form-add-announce" onsubmit="handleAddAnnouncement(event)"
                                    class="space-y-3 bg-slate-800/50 p-4 rounded-2xl border border-slate-700">
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-1">Judul
                                            Pengumuman</label>
                                        <input type="text" id="ann-title"
                                            placeholder="misal: Tagihan Kas Minggu Ke-4"
                                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2 text-xs text-slate-100 focus:outline-none focus:border-brand-500"
                                            required>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-slate-300 mb-1">Isi
                                            Pengumuman</label>
                                        <textarea id="ann-content" rows="3" placeholder="Mohon disiapkan uang kas sebesar Rp 5.000..."
                                            class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2 text-xs text-slate-100 focus:outline-none focus:border-brand-500"
                                            required></textarea>
                                    </div>
                                    <button type="submit"
                                        class="w-full bg-sky-600 hover:bg-sky-500 text-white font-bold text-xs py-2.5 rounded-xl transition-all shadow-md">
                                        Publikasikan Pengumuman
                                    </button>
                                </form>
                            </div>

                            <div class="lg:col-span-7 space-y-3">
                                <h4 class="text-base font-bold text-white">Papan Pengumuman Kelas</h4>
                                <div id="announcement-list"
                                    class="space-y-3 max-h-[300px] overflow-y-auto custom-scrollbar">
                                    <!-- Dynamic announcements -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- SECTION STAKEHOLDER & USER PERSONA -->
    <section id="stakeholder" class="py-16 sm:py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <h2 class="text-xs font-bold text-brand-600 uppercase tracking-widest">S0-01 & S0-02: Stakeholder &
                    Persona</h2>
                <p class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Pengguna & Pemangku Kepentingan
                </p>
                <p class="text-slate-600 text-sm sm:text-base">
                    Sistem KASERALS dirancang berdasarkan pemetaan kebutuhan nyata dari seluruh pihak kelas.
                </p>
            </div>

            <!-- Stakeholder Cards Matrix -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">

                <!-- Bendahara Persona -->
                <div
                    class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4 hover:border-brand-500/50 transition-colors">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-2xl bg-brand-600 text-white flex items-center justify-center font-bold text-lg shadow-md shadow-brand-500/20">
                            IK
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-brand-600 uppercase tracking-wider">Primary
                                Persona</span>
                            <h4 class="text-base font-bold text-slate-900">Iis Karlina (17 th)</h4>
                            <p class="text-xs text-slate-500">Bendahara Kelas</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-xs text-slate-600">
                        <p><strong>Goal:</strong> Mencatat kas cepat, menghitung saldo otomatis tanpa rumus manual, dan
                            ekspor laporan instan.</p>
                        <p class="text-rose-600"><strong>Pain Point:</strong> Rekapitulasi manual memakan waktu lama &
                            berisiko salah hitung.</p>
                    </div>
                </div>

                <!-- Siswa Persona -->
                <div
                    class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4 hover:border-emerald-500/50 transition-colors">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center font-bold text-lg shadow-md shadow-emerald-500/20">
                            NS
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider">Secondary /
                                End User</span>
                            <h4 class="text-base font-bold text-slate-900">Nesya Shahira (17 th)</h4>
                            <p class="text-xs text-slate-500">Siswa / Anggota Kelas</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-xs text-slate-600">
                        <p><strong>Goal:</strong> Mengetahui status pembayaran kas secara mandiri tanpa perlu terus
                            bertanya ke bendahara.</p>
                        <p class="text-rose-600"><strong>Pain Point:</strong> Tidak memiliki akses langsung ke riwayat
                            kas kelas.</p>
                    </div>
                </div>

                <!-- Wali Kelas & Ketua -->
                <div
                    class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4 hover:border-amber-500/50 transition-colors">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-2xl bg-amber-500 text-white flex items-center justify-center font-bold text-lg shadow-md shadow-amber-500/20">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <div>
                            <span
                                class="text-[10px] font-bold text-amber-600 uppercase tracking-wider">Governance</span>
                            <h4 class="text-base font-bold text-slate-900">Ketua Kelas</h4>
                            <p class="text-xs text-slate-500">Supervisor & Info</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-xs text-slate-600">
                        <p><strong>Goal:</strong> Memantau transparansi dan saldo kas kelas untuk keperluan kegiatan
                            belajar mengajar.</p>
                        <p class="text-rose-600"><strong>Pain Point:</strong> Laporan sering terlambat diserahkan saat
                            dibutuhkan.</p>
                    </div>
                </div>

                <!-- Penguji & Pembimbing -->
                <div
                    class="bg-slate-50 rounded-3xl p-6 border border-slate-200/80 space-y-4 hover:border-indigo-500/50 transition-colors">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-bold text-lg shadow-md shadow-indigo-500/20">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-wider">Assessor /
                                Evaluator</span>
                            <h4 class="text-base font-bold text-slate-900">Wali Kelas/Guru Pembimbing</h4>
                            <p class="text-xs text-slate-500">Penguji Proyek UKK</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-xs text-slate-600">
                        <p><strong>Goal:</strong> Memastikan keamanan database, validasi relasi data, dan keakuratan
                            saldo kas.</p>
                        <p class="text-indigo-600"><strong>Catatan Gate 1:</strong> Memastikan tidak terjadi pencatatan
                            saldo ganda.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION TIM FINORA -->
    <section id="tim-finora" class="py-16 sm:py-24 bg-slate-900 text-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-500/20 text-brand-300 text-xs font-bold uppercase tracking-widest border border-brand-500/30">
                    S0-07: RACI & Team Profile
                </div>
                <h2 class="text-2xl sm:text-4xl font-black tracking-tight text-white">
                    Di balik KASERALS: TIM FINORA
                </h2>
                <p class="text-slate-400 text-sm sm:text-base">
                    Program Keahlian Pengembangan Perangkat Lunak dan Gim (PPLG) <br>
                    <strong>SMK Budi Bakti Ciwidey, Kabupaten Bandung</strong> • Tahun Ajaran 2026/2027
                </p>
            </div>

            <!-- Developers Cards Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">

                <!-- Developer 1: Iis Karlina -->
                <div
                    class="bg-slate-800/90 rounded-3xl p-6 sm:p-8 border border-slate-700/80 space-y-6 flex flex-col justify-between hover:border-brand-500/60 transition-all shadow-xl">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-brand-600 to-indigo-600 text-white flex items-center justify-center font-black text-2xl shadow-lg shadow-brand-500/30">
                                IK
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Iis Karlina</h3>
                                <p class="text-xs text-brand-400 font-medium">NISN 009533902</p>
                                <span
                                    class="inline-block mt-1 text-[10px] bg-brand-500/20 text-brand-300 font-bold px-2.5 py-0.5 rounded-full border border-brand-500/30">
                                    Backend Developer & Project Leader
                                </span>
                            </div>
                        </div>
                        <div class="text-xs text-slate-300 space-y-2 pt-2 border-t border-slate-700/60">
                            <p><strong>Tanggung Jawab RACI:</strong></p>
                            <ul class="list-disc list-inside space-y-1 text-slate-400">
                                <li>Pengembangan logika Backend & Database ERD</li>
                                <li>Sistem Autentikasi & Hashing Password</li>
                                <li>Kalkulasi Saldo Otomatis & Validasi Transaksi</li>
                            </ul>
                        </div>
                    </div>
                    <div
                        class="pt-4 border-t border-slate-700/60 flex items-center justify-between text-xs text-slate-400">
                        <span>Role UKK: Backend Lead</span>
                        <i class="fa-solid fa-code text-brand-400"></i>
                    </div>
                </div>

                <!-- Developer 2: Nesya Shahira -->
                <div
                    class="bg-slate-800/90 rounded-3xl p-6 sm:p-8 border border-slate-700/80 space-y-6 flex flex-col justify-between hover:border-emerald-500/60 transition-all shadow-xl">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-600 text-white flex items-center justify-center font-black text-2xl shadow-lg shadow-emerald-500/30">
                                NS
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Nesya Shahira Alzahra</h3>
                                <p class="text-xs text-emerald-400 font-medium">NISN 0085619367</p>
                                <span
                                    class="inline-block mt-1 text-[10px] bg-emerald-500/20 text-emerald-300 font-bold px-2.5 py-0.5 rounded-full border border-emerald-500/30">
                                    Frontend Developer & UI/UX Designer
                                </span>
                            </div>
                        </div>
                        <div class="text-xs text-slate-300 space-y-2 pt-2 border-t border-slate-700/60">
                            <p><strong>Tanggung Jawab RACI:</strong></p>
                            <ul class="list-disc list-inside space-y-1 text-slate-400">
                                <li>Perancangan Wireframe & Layout Responsive</li>
                                <li>Sistem Dashboard & Tampilan Aplikasi</li>
                                <li>Usability Testing & Interaksi Pengguna</li>
                            </ul>
                        </div>
                    </div>
                    <div
                        class="pt-4 border-t border-slate-700/60 flex items-center justify-between text-xs text-slate-400">
                        <span>Role UKK: Frontend Lead</span>
                        <i class="fa-solid fa-pen-nib text-emerald-400"></i>
                    </div>
                </div>

                <!-- Supervisor Card -->
                <div
                    class="bg-slate-800/90 rounded-3xl p-6 sm:p-8 border border-slate-700/80 space-y-6 flex flex-col justify-between lg:col-span-1 md:col-span-2 shadow-xl">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-amber-500 to-orange-600 text-white flex items-center justify-center font-black text-2xl shadow-lg shadow-amber-500/30">
                                AB
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Asep Baban Sobana S.T., GR, M.Si.</h3>
                                <p class="text-xs text-amber-400 font-medium">Guru Pembimbing Internal UKK</p>
                                <span
                                    class="inline-block mt-1 text-[10px] bg-amber-500/20 text-amber-300 font-bold px-2.5 py-0.5 rounded-full border border-amber-500/30">
                                    Supervisor & Assessor
                                </span>
                            </div>
                        </div>
                        <div class="text-xs text-slate-300 space-y-2 pt-2 border-t border-slate-700/60">
                            <p><strong>Status Gate 1 Review:</strong></p>
                            <p
                                class="text-emerald-400 font-bold bg-emerald-500/10 p-2.5 rounded-xl border border-emerald-500/20 flex items-center gap-2">
                                <i class="fa-solid fa-circle-check"></i> DISETUJUI (GO) - Sidang Gate 1
                            </p>
                            <p class="text-[11px] text-slate-400 italic">"Tim diizinkan melanjutkan pengembangan sistem
                                KASERALS."</p>
                        </div>
                    </div>
                    <div
                        class="pt-4 border-t border-slate-700/60 flex items-center justify-between text-xs text-slate-400">
                        <span>SMK Budi Bakti Ciwidey</span>
                        <i class="fa-solid fa-school text-amber-400"></i>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- LOGIN SIMULATION MODAL -->
    <div id="login-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/70 backdrop-blur-md p-4">
        <div
            class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 space-y-6 shadow-2xl border border-slate-200 relative animate-in fade-in zoom-in duration-200">
            <button onclick="closeLoginModal()"
                class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 p-2">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>

            <div class="text-center space-y-2">
                <div
                    class="w-12 h-12 rounded-2xl bg-brand-600 text-white flex items-center justify-center text-xl mx-auto shadow-md">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <h3 class="text-xl font-extrabold text-slate-900">Portal Login KASERALS</h3>
                <p class="text-xs text-slate-500">Pilih Role Pengguna untuk Memulai Simulasi</p>
            </div>

            <form onsubmit="handleSimulatedLogin(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Pilih Hak Akses (Role)</label>
                    <select id="login-role"
                        class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-semibold text-slate-800 focus:outline-none focus:border-brand-600">
                        <option value="Bendahara Kelas">Bendahara Kelas (Iis Karlina)</option>
                        <option value="Siswa">Siswa (Nesya Shahira)</option>
                        <option value="Wali Kelas">Wali Kelas / Ketua Kelas</option>
                        <option value="Admin System">Admin Sistem</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Username / NISN</label>
                    <input type="text" value="009533902"
                        class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-brand-600">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Password Hash (NFR-003)</label>
                    <input type="password" value="••••••••"
                        class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-brand-600">
                </div>

                <button type="submit"
                    class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 rounded-xl transition-all shadow-md">
                    Masuk ke Sistem Kas
                </button>
            </form>
        </div>
    </div>

    <!-- PROPOSAL SUMMARY MODAL -->
    <div id="proposal-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/70 backdrop-blur-md p-4">
        <div
            class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 space-y-6 shadow-2xl border border-slate-200 relative max-h-[90vh] overflow-y-auto custom-scrollbar">
            <button onclick="closeProposalModal()"
                class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 p-2">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>

            <div class="space-y-2 border-b border-slate-200 pb-4">
                <span class="text-[10px] font-bold text-brand-600 uppercase tracking-widest">Dokumen Proposal Proyek
                    UKK</span>
                <h3 class="text-xl font-black text-slate-900">KASERALS - PPLG SMK Budi Bakti Ciwidey</h3>
                <p class="text-xs text-slate-500">Tahun Ajaran 2026/2027 • Tim FINORA</p>
            </div>

            <div class="space-y-4 text-xs text-slate-600 leading-relaxed">
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-slate-800 mb-1">1. Ruang Lingkup Sistem (Scope In)</h4>
                    <p>Autentikasi role, pengelolaan data siswa, pencatatan pembayaran kas, pencatatan pengeluaran,
                        perhitungan saldo otomatis (FR-008), ekspor laporan PDF/Excel, dan board pengumuman.</p>
                </div>

                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-slate-800 mb-1">2. Target Kualitas (Non-Functional)</h4>
                    <p>Halaman memuat &lt; 3 detik, 100% responsif di HP Android, password di-hash aman, serta data
                        transaksi konsisten tanpa ganda.</p>
                </div>

                <div class="bg-emerald-50 p-4 rounded-2xl border border-emerald-200 text-emerald-950">
                    <h4 class="font-bold text-emerald-900 mb-1">3. Status Pengesahan Gate 1 Review</h4>
                    <p>Disetujui pada tanggal 9 September 2026 di Ciwidey oleh Ketua Kelompok (Iis Karlina), Anggota
                        (Nesya Shahira), dan Guru Pembimbing (Asep Baban Sobana S.T., M.Si.).</p>
                </div>
            </div>

            <div class="pt-2 text-right">
                <button onclick="closeProposalModal()"
                    class="bg-slate-900 text-white font-bold text-xs px-5 py-2.5 rounded-xl">
                    Tutup Ringkasan
                </button>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div
                class="flex flex-col md:flex-row items-center justify-between gap-6 pb-8 border-b border-slate-800/80">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-600 to-emerald-500 flex items-center justify-center text-white font-bold">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div>
                        <span class="text-lg font-black text-white">KASERALS</span>
                        <p class="text-xs text-slate-500">Sistem Pengelolaan Kas Kelas Berbasis Web</p>
                    </div>
                </div>

                <p class="text-xs font-medium text-slate-400 text-center md:text-right">
                    "Kas Kelas Transparan, Hubungan Kelas Harmonis"
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>© 2026 KASERALS by <strong>Tim Finora</strong>. SMK Budi Bakti Ciwidey, Kabupaten Bandung.</p>
                <p>Pengembangan Perangkat Lunak dan Gim (PPLG)</p>
            </div>
        </div>
    </footer>

    <script>
        // APP STATE (STORED IN MEMORY FOR SIMULATION)
        let state = {
            students: [{
                    id: 1,
                    nisn: '009533902',
                    name: 'Iis Karlina',
                    status: 'Lunas',
                    totalPaid: 20000
                },
                {
                    id: 2,
                    nisn: '0085619367',
                    name: 'Nesya Shahira Alzahra',
                    status: 'Lunas',
                    totalPaid: 20000
                },
                {
                    id: 3,
                    nisn: '0081234001',
                    name: 'Nabila Putri',
                    status: 'Lunas',
                    totalPaid: 20000
                },
                {
                    id: 4,
                    nisn: '0081234002',
                    name: 'Aulia Rahman',
                    status: 'Lunas',
                    totalPaid: 20000
                },
                {
                    id: 5,
                    nisn: '0081234003',
                    name: 'Rizky Pratama',
                    status: 'Lunas',
                    totalPaid: 20000
                },
                {
                    id: 6,
                    nisn: '0081234004',
                    name: 'Siti Nurhaliza',
                    status: 'Lunas',
                    totalPaid: 20000
                },
                {
                    id: 7,
                    nisn: '0081234005',
                    name: 'Budi Santoso',
                    status: 'Lunas',
                    totalPaid: 20000
                },
                {
                    id: 8,
                    nisn: '0081234006',
                    name: 'Maya Indah',
                    status: 'Lunas',
                    totalPaid: 20000
                },
                {
                    id: 9,
                    nisn: '0081234007',
                    name: 'Farhan Septian',
                    status: 'Belum Bayar',
                    totalPaid: 15000
                },
                {
                    id: 10,
                    nisn: '0081234008',
                    name: 'Dewi Lestari',
                    status: 'Belum Bayar',
                    totalPaid: 15000
                }
            ],
            transactions: [{
                    id: 101,
                    date: '2026-09-01 08:30',
                    type: 'pemasukan',
                    desc: 'Kas Rutin Minggu 1 - 10 Siswa',
                    amount: 200000
                },
                {
                    id: 102,
                    date: '2026-09-08 09:00',
                    type: 'pemasukan',
                    desc: 'Kas Rutin Minggu 2 - 10 Siswa',
                    amount: 200000
                },
                {
                    id: 103,
                    date: '2026-09-12 10:15',
                    type: 'pengeluaran',
                    desc: 'Beli Spidol Whiteboard & Penghapus',
                    amount: 35000
                },
                {
                    id: 104,
                    date: '2026-09-15 08:45',
                    type: 'pemasukan',
                    desc: 'Kas Rutin Minggu 3 - 10 Siswa',
                    amount: 200000
                },
                {
                    id: 105,
                    date: '2026-09-18 11:30',
                    type: 'pengeluaran',
                    desc: 'Print & Fotokopi Tugas Kelompok PPLG',
                    amount: 40000
                },
                {
                    id: 106,
                    date: '2026-09-22 08:15',
                    type: 'pemasukan',
                    desc: 'Kas Rutin Minggu 4 - 8 Siswa',
                    amount: 160000
                },
                {
                    id: 107,
                    date: '2026-09-25 14:00',
                    type: 'pengeluaran',
                    desc: 'Konsumsi Acara Kebersihan Kelas',
                    amount: 200000
                },
                {
                    id: 108,
                    date: '2026-09-29 09:10',
                    type: 'pemasukan',
                    desc: 'Infaq Suka Volunter Kelas',
                    amount: 360000
                }
            ],
            announcements: [{
                    id: 1,
                    title: 'Tagihan Kas Minggu Ke-4',
                    content: 'Mohon seluruh siswa melunasi kas rutin sebesar Rp 5.000 sebelum hari Jumat.',
                    date: '2026-09-20',
                    author: 'Bendahara (Iis Karlina)'
                },
                {
                    id: 2,
                    title: 'Pembelian Spidol & Alat Tulis',
                    content: 'Uang kas sebesar Rp 35.000 telah digunakan untuk membeli spidol dan penghapus baru.',
                    date: '2026-09-12',
                    author: 'Bendahara (Iis Karlina)'
                }
            ]
        };

        // CALCULATIONS (FR-008)
        function calculateTotals() {
            const income = state.transactions
                .filter(t => t.type === 'pemasukan')
                .reduce((sum, t) => sum + t.amount, 0);

            const expense = state.transactions
                .filter(t => t.type === 'pengeluaran')
                .reduce((sum, t) => sum + t.amount, 0);

            const balance = income - expense;

            const paidCount = state.students.filter(s => s.status === 'Lunas').length;
            const totalStudents = state.students.length;
            const paidPercent = Math.round((paidCount / totalStudents) * 100);

            return {
                income,
                expense,
                balance,
                paidCount,
                totalStudents,
                paidPercent
            };
        }

        function formatRp(num) {
            return 'Rp ' + num.toLocaleString('id-ID');
        }

        // RENDER SIMULATOR DASHBOARD STATS
        function renderStats() {
            const totals = calculateTotals();

            // Update Hero Visual Cards
            document.getElementById('hero-live-balance').innerText = formatRp(totals.balance);
            document.getElementById('hero-live-income').innerText = formatRp(totals.income);
            document.getElementById('hero-live-expense').innerText = formatRp(totals.expense);
            document.getElementById('hero-paid-percentage').innerText = totals.paidPercent + '% Lunas';
            document.getElementById('hero-progress-bar').style.width = totals.paidPercent + '%';
            document.getElementById('hero-paid-count').innerText = `${totals.paidCount} Siswa Lunas`;
            document.getElementById('hero-unpaid-count').innerText =
                `${totals.totalStudents - totals.paidCount} Siswa Belum`;

            // Update Simulator Stat Cards
            document.getElementById('sim-balance').innerText = formatRp(totals.balance);
            document.getElementById('sim-income').innerText = formatRp(totals.income);
            document.getElementById('sim-expense').innerText = formatRp(totals.expense);
            document.getElementById('sim-paid-percent').innerText = `${totals.paidPercent}% Lunas`;
            document.getElementById('sim-paid-summary').innerText =
                `${totals.paidCount} dari ${totals.totalStudents} Siswa Lunas`;

            // Update Report Preview
            document.getElementById('report-income').innerText = formatRp(totals.income);
            document.getElementById('report-expense').innerText = formatRp(totals.expense);
            document.getElementById('report-balance').innerText = formatRp(totals.balance);
        }

        // POPULATE STUDENT SELECTOR IN PAYMENT FORM
        function renderStudentSelect() {
            const select = document.getElementById('pay-student-select');
            select.innerHTML = '';
            state.students.forEach(s => {
                const opt = document.createElement('option');
                opt.value = s.id;
                opt.innerText = `${s.name} (${s.status === 'Lunas' ? 'Lunas' : 'Belum Bayar'})`;
                select.appendChild(opt);
            });
        }

        // RENDER STUDENT STATUS TABLE
        function renderStudents() {
            const tbody = document.getElementById('student-table-body');
            tbody.innerHTML = '';

            state.students.forEach(s => {
                const isPaid = s.status === 'Lunas';
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-800/50 transition-colors';
                tr.innerHTML = `
                    <td class="p-3 font-mono text-slate-400">${s.nisn}</td>
                    <td class="p-3 font-semibold text-slate-100">${s.name}</td>
                    <td class="p-3">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold ${isPaid ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : 'bg-rose-500/20 text-rose-400 border border-rose-500/30'}">
                            <i class="fa-solid ${isPaid ? 'fa-check' : 'fa-clock'}"></i>
                            ${s.status}
                        </span>
                    </td>
                    <td class="p-3 font-mono">${formatRp(s.totalPaid)}</td>
                    <td class="p-3 text-right">
                        ${!isPaid ?
                            `<button onclick="quickMarkPaid(${s.id})" class="bg-emerald-600 hover:bg-emerald-500 text-white px-2.5 py-1 rounded-lg text-[10px] font-bold shadow">Tandai Lunas</button>` :
                            `<span class="text-slate-500 text-[10px]"><i class="fa-solid fa-circle-check text-emerald-400"></i> Terverifikasi</span>`
                        }
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // RENDER TRANSACTIONS TABLE WITH FILTERS
        function renderTransactions() {
            const tbody = document.getElementById('transaction-table-body');
            const search = document.getElementById('history-search').value.toLowerCase();
            const filterType = document.getElementById('history-filter-type').value;

            tbody.innerHTML = '';

            let filtered = state.transactions.filter(t => {
                const matchesSearch = t.desc.toLowerCase().includes(search);
                const matchesType = filterType === 'all' || t.type === filterType;
                return matchesSearch && matchesType;
            });

            if (filtered.length === 0) {
                tbody.innerHTML =
                    `<tr><td colspan="4" class="p-4 text-center text-slate-500 text-xs">Tidak ada transaksi ditemukan.</td></tr>`;
                return;
            }

            filtered.sort((a, b) => b.id - a.id).forEach(t => {
                const isIncome = t.type === 'pemasukan';
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-800/50 transition-colors';
                tr.innerHTML = `
                    <td class="p-3 text-slate-400 font-mono text-[11px]">${t.date}</td>
                    <td class="p-3">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold ${isIncome ? 'bg-emerald-500/20 text-emerald-300' : 'bg-rose-500/20 text-rose-300'}">
                            ${isIncome ? 'PEMASUKAN' : 'PENGELUARAN'}
                        </span>
                    </td>
                    <td class="p-3 font-medium text-slate-200">${t.desc}</td>
                    <td class="p-3 text-right font-bold font-mono ${isIncome ? 'text-emerald-400' : 'text-rose-400'}">
                        ${isIncome ? '+' : '-'}${formatRp(t.amount)}
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // RENDER ANNOUNCEMENTS
        function renderAnnouncements() {
            const list = document.getElementById('announcement-list');
            list.innerHTML = '';

            state.announcements.forEach(a => {
                const div = document.createElement('div');
                div.className = 'bg-slate-800 p-4 rounded-2xl border border-slate-700 space-y-1';
                div.innerHTML = `
                    <div class="flex items-center justify-between">
                        <h5 class="text-xs font-bold text-white">${a.title}</h5>
                        <span class="text-[10px] text-slate-400 font-mono">${a.date}</span>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">${a.content}</p>
                    <span class="text-[10px] text-brand-400 block pt-1">Oleh: ${a.author}</span>
                `;
                list.appendChild(div);
            });
        }

        // HANDLERS FOR USER ACTIONS
        function handleAddPayment(e) {
            e.preventDefault();
            const studentId = parseInt(document.getElementById('pay-student-select').value);
            const amount = parseInt(document.getElementById('pay-amount').value);
            const note = document.getElementById('pay-note').value;

            const student = state.students.find(s => s.id === studentId);
            if (!student) return;

            student.status = 'Lunas';
            student.totalPaid += amount;

            const now = new Date();
            const timeStr = now.toISOString().split('T')[0] + ' ' + now.toTimeString().split(' ')[0].substring(0, 5);

            state.transactions.unshift({
                id: Date.now(),
                date: timeStr,
                type: 'pemasukan',
                desc: `Kas (${student.name}) - ${note}`,
                amount: amount
            });

            document.getElementById('hero-latest-activity').innerText =
                `Pembayaran Kas oleh ${student.name} (${formatRp(amount)})`;

            refreshAllViews();
            showToast(`Pembayaran Rp ${amount.toLocaleString()} untuk ${student.name} berhasil dicatat!`, 'success');
        }

        function handleAddExpense(e) {
            e.preventDefault();
            const category = document.getElementById('exp-category').value;
            const amount = parseInt(document.getElementById('exp-amount').value);
            const note = document.getElementById('exp-note').value;

            const totals = calculateTotals();
            if (amount > totals.balance) {
                showToast(`Pengeluaran gagal! Saldo tidak mencukupi (Saldo: ${formatRp(totals.balance)})`, 'error');
                return;
            }

            const now = new Date();
            const timeStr = now.toISOString().split('T')[0] + ' ' + now.toTimeString().split(' ')[0].substring(0, 5);

            state.transactions.unshift({
                id: Date.now(),
                date: timeStr,
                type: 'pengeluaran',
                desc: `[${category}] ${note}`,
                amount: amount
            });

            document.getElementById('exp-amount').value = '';
            document.getElementById('exp-note').value = '';

            document.getElementById('hero-latest-activity').innerText = `Pengeluaran Kas: ${note} (${formatRp(amount)})`;

            refreshAllViews();
            showToast(`Pengeluaran ${formatRp(amount)} berhasil dicatat!`, 'info');
        }

        function quickMarkPaid(studentId) {
            const student = state.students.find(s => s.id === studentId);
            if (!student) return;

            student.status = 'Lunas';
            student.totalPaid += 5000;

            const now = new Date();
            const timeStr = now.toISOString().split('T')[0] + ' ' + now.toTimeString().split(' ')[0].substring(0, 5);

            state.transactions.unshift({
                id: Date.now(),
                date: timeStr,
                type: 'pemasukan',
                desc: `Kas Rutin (${student.name})`,
                amount: 5000
            });

            refreshAllViews();
            showToast(`${student.name} ditandai LUNAS (+Rp 5.000)`, 'success');
        }

        function handleAddAnnouncement(e) {
            e.preventDefault();
            const title = document.getElementById('ann-title').value;
            const content = document.getElementById('ann-content').value;

            const now = new Date().toISOString().split('T')[0];

            state.announcements.unshift({
                id: Date.now(),
                title: title,
                content: content,
                date: now,
                author: 'Bendahara Kelas (Iis Karlina)'
            });

            document.getElementById('ann-title').value = '';
            document.getElementById('ann-content').value = '';

            renderAnnouncements();
            showToast('Pengumuman baru telah dipublikasikan!', 'info');
        }

        function resetSimulatorData() {
            state.students.forEach((s, idx) => {
                s.status = idx < 8 ? 'Lunas' : 'Belum Bayar';
                s.totalPaid = idx < 8 ? 20000 : 15000;
            });
            refreshAllViews();
            showToast('Data simulator telah dikembalikan ke kondisi awal.', 'info');
        }

        function refreshAllViews() {
            renderStats();
            renderStudentSelect();
            renderStudents();
            renderTransactions();
            renderAnnouncements();
        }

        // TAB SWITCHER FOR SIMULATOR
        function switchSimTab(tabKey) {
            // Hide all tab content
            document.querySelectorAll('.sim-content').forEach(el => el.classList.add('hidden'));

            // Remove active classes on buttons
            document.querySelectorAll('.sim-tab-btn').forEach(btn => {
                btn.className =
                    'sim-tab-btn px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 bg-slate-800 text-slate-300 hover:bg-slate-700';
            });

            // Active clicked tab
            document.getElementById(`sim-tab-${tabKey}`).classList.remove('hidden');
            const activeBtn = document.getElementById(`tab-btn-${tabKey}`);
            if (activeBtn) {
                activeBtn.className =
                    'sim-tab-btn active px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 bg-brand-600 text-white shadow-md';
            }
        }

        // SIMULATED PDF / EXCEL EXPORT
        function triggerSimulatedExport(type) {
            showToast(`Menyiapkan Dokumen Laporan Format ${type}...`, 'info');
            setTimeout(() => {
                showToast(`Laporan Kas Kelas berhasil di-generate! (Format ${type})`, 'success');
            }, 1000);
        }

        // TOAST NOTIFICATION UTILITY
        function showToast(msg, type = 'info') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');

            let bgColor = 'bg-slate-900 border-slate-700 text-slate-100';
            let icon = 'fa-circle-info text-sky-400';

            if (type === 'success') {
                bgColor = 'bg-slate-900 border-emerald-500/50 text-white';
                icon = 'fa-circle-check text-emerald-400';
            } else if (type === 'error') {
                bgColor = 'bg-slate-900 border-rose-500/50 text-white';
                icon = 'fa-triangle-exclamation text-rose-400';
            }

            toast.className =
                `pointer-events-auto flex items-center gap-3 px-4 py-3 rounded-2xl border ${bgColor} shadow-2xl text-xs font-semibold animate-in slide-in-from-bottom duration-200`;
            toast.innerHTML = `<i class="fa-solid ${icon} text-base"></i> <span>${msg}</span>`;

            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // MODAL TOGGLES & MOBILE MENU
        function openLoginModal() {
            document.getElementById('login-modal').classList.remove('hidden');
            document.getElementById('login-modal').classList.add('flex');
        }

        function closeLoginModal() {
            document.getElementById('login-modal').classList.add('hidden');
            document.getElementById('login-modal').classList.remove('flex');
        }

        function openProposalModal() {
            document.getElementById('proposal-modal').classList.remove('hidden');
            document.getElementById('proposal-modal').classList.add('flex');
        }

        function closeProposalModal() {
            document.getElementById('proposal-modal').classList.add('hidden');
            document.getElementById('proposal-modal').classList.remove('flex');
        }

        function handleSimulatedLogin(e) {
            e.preventDefault();
            const role = document.getElementById('login-role').value;
            closeLoginModal();
            showToast(`Berhasil Login sebagai [${role}]. Mengarahkan ke Dashboard...`, 'success');
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // INITIALIZE APP ON LOAD
        window.onload = function() {
            refreshAllViews();
        };
    </script>
</body>

</html>
