<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kas - KASERALS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7fa;
            color: #182230;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            width: 350px;
            height: 100vh;
            background: #10192d;
            color: white;
            padding: 30px 22px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 50px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: #0ca99d;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
        }

        .logo-text h2 {
            font-size: 23px;
        }

        .logo-text p {
            color: #8993a6;
            font-size: 15px;
            margin-top: 4px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu-title {
            color: #7f899d;
            font-size: 14px;
            font-weight: bold;
            margin: 22px 12px 8px;
            letter-spacing: 1px;
        }

        .menu a {
            text-decoration: none;
            color: #b7bfce;
            padding: 15px 18px;
            border-radius: 10px;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #17233c;
            color: white;
        }

        .menu a.active {
            background: #0ca99d;
            color: white;
            font-weight: bold;
        }

        /* MAIN */
        .main {
            margin-left: 350px;
            min-height: 100vh;
        }

        /* HEADER */
        .header {
            height: 100px;
            background: white;
            border-bottom: 1px solid #d8dde5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 38px;
        }

        .header h2 {
            font-size: 23px;
        }

        .profile {
            width: 55px;
            height: 55px;
            background: #d4faf3;
            color: #099c91;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 17px;
            font-weight: bold;
        }

        /* CONTENT */
        .content {
            padding: 40px;
        }

        .content-header {
            margin-bottom: 35px;
        }

        .content-header h1 {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .content-header p {
            color: #8791a1;
            font-size: 18px;
        }

        /* GRID */
        .payment-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .card {
            background: white;
            border: 1px solid #d8dde5;
            border-radius: 17px;
            padding: 28px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
        }

        .card h2 {
            font-size: 23px;
            margin-bottom: 28px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input,
        select {
            width: 100%;
            height: 55px;
            border: 2px solid #dce1e7;
            border-radius: 12px;
            padding: 0 18px;
            font-size: 17px;
            color: #202938;
            outline: none;
            background: white;
        }

        input:focus,
        select:focus {
            border-color: #0ca99d;
            box-shadow: 0 0 0 3px rgba(12,169,157,0.12);
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        /* BUTTON */
        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 25px;
        }

        button {
            height: 58px;
            padding: 0 25px;
            border-radius: 12px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .reset {
            background: white;
            border: 2px solid #d8dde5;
            color: #202938;
        }

        .reset:hover {
            background: #f2f4f7;
        }

        .save {
            background: #0ca99d;
            color: white;
            border: none;
        }

        .save:hover {
            background: #078e84;
        }

        /* PAYMENT LIST */
        .payment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .payment-header h2 {
            margin: 0;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
        }

        .table-head {
            display: grid;
            grid-template-columns: 1fr 120px 100px;
            padding: 0 15px 15px;
            color: #929dac;
            font-weight: bold;
            border-bottom: 2px solid #e2e5e9;
        }

        .payment-item {
            display: grid;
            grid-template-columns: 1fr 120px 100px;
            align-items: center;
            padding: 20px 15px;
            border-bottom: 1px solid #e4e7eb;
        }

        .student {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .student-icon {
            width: 43px;
            height: 43px;
            background: #d5faf3;
            color: #0aa093;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .student-name {
            font-size: 17px;
            line-height: 1.4;
        }

        .nominal {
            font-weight: bold;
            font-size: 17px;
        }

        .delete {
            height: 48px;
            background: white;
            border: 2px solid #f0b5b5;
            color: #c44343;
            padding: 0 15px;
        }

        .delete:hover {
            background: #fff1f1;
        }

        /* ALERT */
        .alert {
            display: none;
            margin-top: 22px;
            padding: 17px;
            border: 2px solid #a9e9c4;
            background: #effff5;
            color: #39885c;
            border-radius: 12px;
            font-size: 17px;
            line-height: 1.5;
        }

        .alert.show {
            display: block;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .sidebar {
                width: 230px;
            }

            .main {
                margin-left: 230px;
            }

            .payment-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .row {
                grid-template-columns: 1fr;
            }

            .table-head,
            .payment-item {
                grid-template-columns: 1fr 100px;
            }

            .table-head div:last-child {
                display: none;
            }

            .delete {
                margin-top: 8px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="logo">
        <div class="logo-icon">K</div>

        <div class="logo-text">
            <h2>KASERALS</h2>
            <p>Kas Kelas Digital</p>
        </div>
    </div>

    <nav class="menu">

        <a href="#">▢ Dashboard</a>

        <a href="#">◉ Data Siswa</a>

        <div class="menu-title">TRANSAKSI</div>

        <a href="#" class="active">✓ Pembayaran Kas</a>

        <a href="#">≡ Status Pembayaran</a>

        <a href="#">↓ Pemasukan</a>

        <a href="#">↑ Pengeluaran</a>

        <div class="menu-title">CATATAN</div>

        <a href="#">↻ Riwayat Transaksi</a>

        <a href="#">▤ Laporan Keuangan</a>

    </nav>

</aside>


<!-- MAIN -->
<main class="main">

    <!-- HEADER -->
    <header class="header">

        <h2>Pembayaran Kas</h2>

        <div class="profile">
            NS
        </div>

    </header>


    <!-- CONTENT -->
    <section class="content">

        <div class="content-header">

            <h1>Catat Pembayaran Kas</h1>

            <p>
                Pembayaran akan menambah saldo kas secara otomatis
            </p>

        </div>


        <div class="payment-grid">

            <!-- FORM -->
            <div class="card">

                <h2>Form Pembayaran</h2>

                <form id="paymentForm">

                    <div class="form-group">

                        <label>
                            Pilih Siswa *
                        </label>

                        <select id="student" required>

                            <option value="">
                                Pilih siswa
                            </option>

                            <option value="Nesya Shahira">
                                Nesya Shahira — 0085619367
                            </option>

                            <option value="Rizky Ananda">
                                Rizky Ananda — 0085619368
                            </option>

                            <option value="Melisa Novita">
                                Melisa Novita — 0085619369
                            </option>

                            <option value="Alif Guntoro">
                                Alif Guntoro — 0085619370
                            </option>

                        </select>

                    </div>


                    <div class="row">

                        <div class="form-group">

                            <label>
                                Tanggal *
                            </label>

                            <input
                                type="date"
                                id="date"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Nominal *
                            </label>

                            <input
                                type="number"
                                id="amount"
                                placeholder="20000"
                                min="1"
                                required
                            >

                        </div>

                    </div>


                    <div class="form-group">

                        <label>
                            Periode
                        </label>

                        <select id="period">

                            <option>November 2026</option>
                            <option>Desember 2026</option>
                            <option>Januari 2027</option>
                            <option>Februari 2027</option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            Keterangan
                        </label>

                        <input
                            type="text"
                            id="description"
                            placeholder="Opsional"
                        >

                    </div>


                    <div class="buttons">

                        <button
                            type="button"
                            class="reset"
                            onclick="resetForm()"
                        >
                            Reset
                        </button>

                        <button
                            type="submit"
                            class="save"
                        >
                            Simpan Pembayaran
                        </button>

                    </div>

                </form>

            </div>


            <!-- LIST PEMBAYARAN -->
            <div class="card">

                <div class="payment-header">

                    <h2>Pembayaran Hari Ini</h2>

                    <div class="total" id="total">
                        Rp 340.000
                    </div>

                </div>


                <div class="table-head">

                    <div>NAMA</div>
                    <div>NOMINAL</div>
                    <div></div>

                </div>


                <div id="paymentList">

                    <div
                        class="payment-item"
                        data-amount="20000"
                    >

                        <div class="student">

                            <div class="student-icon">
                                NS
                            </div>

                            <div class="student-name">
                                Nesya<br>
                                Shahira
                            </div>

                        </div>

                        <div class="nominal">
                            Rp 20.000
                        </div>

                        <button
                            class="delete"
                            onclick="deletePayment(this)"
                        >
                            Hapus
                        </button>

                    </div>


                    <div
                        class="payment-item"
                        data-amount="20000"
                    >

                        <div class="student">

                            <div class="student-icon">
                                RA
                            </div>

                            <div class="student-name">
                                Rizky Ananda
                            </div>

                        </div>

                        <div class="nominal">
                            Rp 20.000
                        </div>

                        <button
                            class="delete"
                            onclick="deletePayment(this)"
                        >
                            Hapus
                        </button>

                    </div>

                </div>


                <div
                    class="alert"
                    id="alert"
                >
                    ✓ Pembayaran tersimpan.
                    Status siswa diperbarui menjadi Lunas.
                </div>

            </div>

        </div>

    </section>

</main>


<script>

    const form = document.getElementById("paymentForm");
    const paymentList = document.getElementById("paymentList");
    const totalElement = document.getElementById("total");
    const alertBox = document.getElementById("alert");


    // Format Rupiah
    function rupiah(number) {

        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0
        }).format(number);

    }


    // Hitung total
    function calculateTotal() {

        let total = 0;

        const payments =
            document.querySelectorAll(".payment-item");

        payments.forEach(payment => {

            total += Number(
                payment.dataset.amount
            );

        });

        totalElement.textContent = rupiah(total);

    }


    // Simpan pembayaran
    form.addEventListener("submit", function(event) {

        event.preventDefault();

        const student =
            document.getElementById("student").value;

        const amount =
            Number(document.getElementById("amount").value);

        if (!student || !amount) {
            alert("Lengkapi data pembayaran!");
            return;
        }


        // Ambil nama
        const initials = student
            .split(" ")
            .map(word => word[0])
            .join("")
            .substring(0, 2)
            .toUpperCase();


        // Buat item baru
        const item =
            document.createElement("div");

        item.className = "payment-item";

        item.dataset.amount = amount;


        item.innerHTML = `

            <div class="student">

                <div class="student-icon">
                    ${initials}
                </div>

                <div class="student-name">
                    ${student}
                </div>

            </div>

            <div class="nominal">
                ${rupiah(amount)}
            </div>

            <button
                class="delete"
                onclick="deletePayment(this)"
            >
                Hapus
            </button>

        `;


        paymentList.appendChild(item);


        // Update total
        calculateTotal();


        // Tampilkan notifikasi
        alertBox.classList.add("show");

        alertBox.innerHTML =
            `✓ Pembayaran tersimpan. Status ${student} diperbarui menjadi Lunas.`;


        // Reset form
        form.reset();


        // Hilangkan notifikasi setelah 4 detik
        setTimeout(() => {

            alertBox.classList.remove("show");

        }, 4000);

    });


    // Hapus pembayaran
    function deletePayment(button) {

        const item =
            button.closest(".payment-item");

        if (
            confirm(
                "Yakin ingin menghapus pembayaran ini?"
            )
        ) {

            item.remove();

            calculateTotal();

        }

    }


    // Reset form
    function resetForm() {

        form.reset();

    }


    // Set tanggal hari ini
    const dateInput =
        document.getElementById("date");

    const today =
        new Date().toISOString().split("T")[0];

    dateInput.value = today;


    // Hitung total saat halaman dibuka
    calculateTotal();

</script>

</body>
</html>