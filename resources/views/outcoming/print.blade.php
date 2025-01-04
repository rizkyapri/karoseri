<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order</title>
    <style>
        body {
            font-family: Times New Roman, Times, serif;
            padding: 20px;
            border: solid 3px #000;
            font-size: 10px;
        }

        /* Mengatur border dan layout secara keseluruhan */
        .header {
            display: flex;
            justify-content: space-between;
            /* Menyusun elemen kiri dan kanan */
            align-items: center;
            /* Menyusun elemen agar sejajar secara vertikal */
            border: 2px solid black;
            /* Menambahkan border di sekitar header */
            padding: 10px;
            /* Memberikan ruang di dalam header */
        }

        /* Gaya untuk elemen kiri (logo) */
        .header .left img {
            max-width: 100px;
            /* Ukuran gambar logo yang sesuai */
            height: auto;
            /* Menjaga rasio aspek gambar */
            margin-right: 20px;
            /* Memberikan jarak antara logo dan teks */
        }

        /* Gaya untuk elemen tengah (teks) */
        .header .center {
            text-align: center;
            /* Menyusun teks di tengah */
            flex-grow: 0;
            /* Mencegah teks mengisi ruang yang tersisa */
            margin-left: 20px;
        }

        /* Gaya untuk setiap elemen heading di bagian tengah */
        .header .center h1,
        .header .center h2,
        .header .center h3 {
            margin: 0;
            /* Menghapus margin default untuk heading */
        }

        .address {
            color: #504f4f;
        }

        .purchase {
            text-align: center;
            text-decoration: underline;
            border-top: solid 4px;
            background-color: #adabab;
        }

        .border {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 20px;
        }

        .th-3 {
            background-color: #adabab;
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            font-size: 12px;
        }

        .table-3 {
            width: 100%;
            border: 4px solid black;
            border-collapse: collapse;
            border-top: none;
        }

        .line-2 {
            width: 100%;
            border-collapse: collapse;
            /* margin-top: 20px; */
            border: 4px solid #000;
            border-top: none;
        }

        .line-3 {
            border: 1px solid #000;
            /* padding: 8px; */
            text-align: left;
            font-size: 12px;
        }

        .line-4 {
            border: 1px solid #000;
            /* padding: 8px; */
            text-align: center;
            font-size: 12px;
        }

        .table-4 {
            border-collapse: collapse;
            border: 3px solid black;
            border-top: none;
            margin-left: auto;
            font-weight: bold
                /* Mendorong tabel ke kanan */
        }

        .td-4 {
            border: 3px solid #000;
            border-top: none;
            text-align: center;
            font-size: 12px;
            width: 70%;
            padding-right: 30px;
            padding-left: 28px;
        }

        .td-right {
            border: 3px solid #000;
            border-top: none;
            text-align: left;
            font-size: 12px;
            padding-right: 40px;
            padding-left: 31px;
            /* Untuk merapikan teks di kanan */
        }

        .total {
            font-weight: bold;
            margin-top: 10px;
        }

        .note {
            margin-top: 20px;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .signature-table td {
            vertical-align: top;
            text-align: center;
            width: 50%;
            padding: 10px;
        }

        .signature-table .left {
            text-align: center;
        }

        .signature-table .right {
            text-align: center;
            padding-left: 50px;
            /* Tambahkan space di bagian kanan */
        }

        .signature-table img {
            max-width: 100px;
            /* Sesuaikan ukuran gambar */
            display: block;
            margin-bottom: 10px;
        }

        .signature-table p {
            margin: 5px 0;
        }

        .signature-table .right p {
            margin-top: 20px;
            /* Tambahkan jarak antar paragraf */
        }

        footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <table style="border: solid 4px; border-collapse: collapse;">
        <tr>
            <td style="border-right: none; padding: 10px;" colspan="1">
                <img src="{{ $path_img }}" alt="Logo Perusahaan" style="max-width: 90px; height: auto;">
            </td>
            <td style="text-align: center; padding: 10px;" colspan="5">
                <h1 style="color: #0054a4; font-size: 30px; margin: 0; padding: 0;">PT. TRI RESTU BERSAMA</h1>
                <p class="address" style="margin: 0;">Specialist Body Builder Vehicle, Dump Truck, Tank and Other
                    Special Purpose Vehicle
                    Kp. Bungaok, Desa Caringin, Kec. Legok, Tangerang Banten, 15820</p>
                <div class="contact-info">
                    <a href="https://wa.me/6285283951109" style="color: black;"> No. HP (WA) : +62 852-8395-1109 |</a>
                    <a href="mailto:trirestubersama@gmail.com" style="color: red;">Email : trirestubersama@gmail.com</a>
                </div>
            </td>
        </tr>
        <tr class="purchase">
            <td colspan="6">
                <h1 style="text-align: center;"><b>PURCHASE ORDER</b></h1>
            </td>
        </tr>
    </table>
    <table class="line-2">
        <tr>
            <td class="line-3" style="width:10%">
                <b>Kepada :</b>
            </td>
            <td class="line-3" style="width:40%">
                <b>Damar Bayu</b>
            </td>
            <td class="line-3" style="width:12%">
                <b> No. PO :</b>
            </td>
            <td class="line-3" style="width:30%">
                <b>320/PO-TRB/X/2024</b>
            </td>
        </tr>
        <tr>
            <td class="line-3">
                <b>PIC :</b>
            </td>
            <td class="line-3" style="width:40%">
                <b>BPK. FAHMI </b>
            </td>
            <td class="line-3">
                <b>Tanggal PO :</b>
            </td>
            <td class="line-3" style="width:30%">
                <b>22 Oktober 2024</b>
            </td>
        </tr>
    </table>

    <table class="table-3">
        <thead>
            <tr>
                <th colspan="1" class="th-3">NO.</th>
                <th colspan="3" class="th-3">NAMA BARANG</th>
                <th colspan="1" class="th-3">QTY</th>
                <th colspan="1" class="th-3">UNIT</th>
                <th colspan="3" class="th-3">UNIT PRICE</th>
                <th colspan="3" class="th-3">TOTAL PRICE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="1" class="line-4">1</td>
                <td colspan="3" style="border: 1px solid black;">MECHANISM DDH 201 KIT</td>
                <td colspan="1" class="line-4">3</td>
                <td colspan="1" class="line-4">SET</td>
                <td colspan="3" class="line-4">Rp. 27.250.000</td>
                <td colspan="3" class="line-4">Rp. 81.750.000</td>
            </tr>
            <tr>
                <td colspan="1" class="line-4">1</td>
                <td colspan="3" style="border: 1px solid black;">MECHANISM DDH 201 KIT</td>
                <td colspan="1" class="line-4">3</td>
                <td colspan="1" class="line-4">SET</td>
                <td colspan="3" class="line-4">Rp. 27.250.000</td>
                <td colspan="3" class="line-4">Rp. 81.750.000</td>
            </tr>
            <tr>
                <td colspan="1" class="line-4">1</td>
                <td colspan="3" style="border: 1px solid black;">MECHANISM DDH 201 KIT</td>
                <td colspan="1" class="line-4">3</td>
                <td colspan="1" class="line-4">SET</td>
                <td colspan="3" class="line-4">Rp. 27.250.000</td>
                <td colspan="3" class="line-4">Rp. 81.750.000</td>
            </tr>
            <tr>
                <td colspan="1" class="line-4">1</td>
                <td colspan="3" style="border: 1px solid black;">MECHANISM DDH 201 KIT</td>
                <td colspan="1" class="line-4">3</td>
                <td colspan="1" class="line-4">SET</td>
                <td colspan="3" class="line-4">Rp. 27.250.000</td>
                <td colspan="3" class="line-4">Rp. 81.750.000</td>
            </tr>
            <tr>
                <td colspan="1" class="line-4">1</td>
                <td colspan="3" style="border: 1px solid black;">MECHANISM DDH 201 KIT</td>
                <td colspan="1" class="line-4">3</td>
                <td colspan="1" class="line-4">SET</td>
                <td colspan="3" class="line-4">Rp. 27.250.000</td>
                <td colspan="3" class="line-4">Rp. 81.750.000</td>
            </tr>
            <tr>
                <td colspan="1" class="line-4">1</td>
                <td colspan="3" style="border: 1px solid black;">MECHANISM DDH 201 KIT</td>
                <td colspan="1" class="line-4">3</td>
                <td colspan="1" class="line-4">SET</td>
                <td colspan="3" class="line-4">Rp. 27.250.000</td>
                <td colspan="3" class="line-4">Rp. 81.750.000</td>
            </tr>
            <tr>
                <td colspan="1" class="line-4">1</td>
                <td colspan="3" style="border: 1px solid black;">MECHANISM DDH 201 KIT</td>
                <td colspan="1" class="line-4">3</td>
                <td colspan="1" class="line-4">SET</td>
                <td colspan="3" class="line-4">Rp. 27.250.000</td>
                <td colspan="3" class="line-4">Rp. 81.750.000</td>
            </tr>
        </tbody>
    </table>
    <table class="table-4">
        <tr>
            <td class="td-4">SUB TOTAL</td>
            <td class="td-right">Rp. 81.750.000</td>
        </tr>
        <tr>
            <td class="td-4">PPN 11%</td>
            <td class="td-right">Rp. 8.992.500</td>
        </tr>
        <tr>
            <td class="td-4">TOTAL</td>
            <td class="td-right">Rp. 90.742.500</td>
        </tr>
    </table>

    <div class="note">
        <p>*Note:</p>
        <ul style="list-style-type: none; margin: 0px;">
            <li>- PAYMENT: 60 HARI, DARI SETELAH TUKAR FAKTUR</li>
            <li>- JIKA BARANG TIDAK SESUAI MAKA AKAN DIKEMBALIKAN / DITOLAK</li>
            <li>- <b>NPWP: 39.551.728.7-451.000</b></li>
            <li>- <b>Kirim ke Alamat:</b></li>
            <ul>
                <li style="list-style-type: none; margin: 0px;">PT. TRI RESTU BERSAMA</li>
                <li style="list-style-type: none; margin: 0px;">Kp. Bungaok, Desa Caringin, Kec. Legok</li>
                <li style="list-style-type: none; margin: 0px;">Kab. Tangerang Banten, 15820</li>
            </ul>
        </ul>
    </div>


    <table class="signature-table">
        <tr>
            <td class="left">
                <p><b>Purchase by:</b></p>
                <img src="{{ $path_img1 }}" alt="Signature">
                <p style="text-decoration: underline;"><b>Annisa</b></p>
                <p><b>Purchasing</b></p>
            </td>
            <td class="right">
                <p><b>Approval Vendor:</b></p>
                <p style="margin-top: 60px;"><b>____________________</b></p> <!-- Jarak lebih lebar -->
                <p style="margin-top: 10px;"><b>Name, Sign, Stamp</b></p>
            </td>
        </tr>
    </table>

    {{-- <tr>
        <td style="border: 1px solid black; ">2</td>
        <td style="border: 1px solid black; ">MECHANISM DDH 201L</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">PCS</td>
        <td style="border: 1px solid black; ">12.500.000 Rp</td>
        <td style="border: 1px solid black; ">12.500.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">3</td>
        <td style="border: 1px solid black; ">GEAR PUMP KP1505A + BOLT</td>
        <td style="border: 1px solid black; ">2</td>
        <td style="border: 1px solid black; ">PCS</td>
        <td style="border: 1px solid black; ">11.500.000 Rp</td>
        <td style="border: 1px solid black; ">23.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">4</td>
        <td style="border: 1px solid black; ">DRIVE SHAFT LARGE + PIPE + BOLT</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">SET</td>
        <td style="border: 1px solid black; ">15.000.000 Rp</td>
        <td style="border: 1px solid black; ">15.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">5</td>
        <td style="border: 1px solid black; ">HANDLE CONTROL H200 + BOLT</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">SET</td>
        <td style="border: 1px solid black; ">5.000.000 Rp</td>
        <td style="border: 1px solid black; ">5.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; "> 6</td>
        <td style="border: 1px solid black; ">KABEL CONTROL 6MTR</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">SET</td>
        <td style="border: 1px solid black; ">2.000.000 Rp</td>
        <td style="border: 1px solid black; ">2.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">7</td>
        <td style="border: 1px solid black; ">BODY HINGE 200</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">SET</td>
        <td style="border: 1px solid black; ">3.000.000 Rp</td>
        <td style="border: 1px solid black; ">3.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">8</td>
        <td style="border: 1px solid black; ">HOSE PRESSURE 200</td>
        <td style="border: 1px solid black; ">2</td>
        <td style="border: 1px solid black; ">PCS</td>
        <td style="border: 1px solid black; ">1.500.000 Rp</td>
        <td style="border: 1px solid black; ">3.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">9</td>
        <td style="border: 1px solid black; ">HOSE INLET 200 + CLAMP</td>
        <td style="border: 1px solid black; ">2</td>
        <td style="border: 1px solid black; ">PCS</td>
        <td style="border: 1px solid black; ">1.000.000 Rp</td>
        <td style="border: 1px solid black; ">2.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">10</td>
        <td style="border: 1px solid black; ">PIPE KIT 200 + BOLT</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">SET</td>
        <td style="border: 1px solid black; ">4.000.000 Rp</td>
        <td style="border: 1px solid black; ">4.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">11</td>
        <td style="border: 1px solid black; ">OIL TANK KOTAK BESAR + OIL LEVEL</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">SET</td>
        <td style="border: 1px solid black; ">10.000.000 Rp</td>
        <td style="border: 1px solid black; ">10.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">12</td>
        <td style="border: 1px solid black; ">HINGE GATE 200</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">SET</td>
        <td style="border: 1px solid black; ">6.000.000 Rp</td>
        <td style="border: 1px solid black; ">6.000.000 Rp</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; ">13</td>
        <td style="border: 1px solid black; ">UBOLT 558 (8PCS)</td>
        <td style="border: 1px solid black; ">1</td>
        <td style="border: 1px solid black; ">SET</td>
        <td style="border: 1px solid black; ">1.000.000 Rp</td>
        <td style="border: 1px solid black; ">1.000.000 Rp</td>
    </tr> --}}
    {{-- <footer>
        <p>PT. TRI RESTU BERSAMA</p>
        <p>Specialist Body Builder Vehicle, Dump Truck, Tank and Other Special Purpose Vehicle</p>
        <p>Kp. Bungaok, Desa Caringin, Kec. Legok, Tangerang Banten, 15820</p>
        <p>No. HP (WA): +62 852-8395-1109 | Email: trirestubersama@gmail.com</p>
    </footer> --}}
</body>

</html>
