<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
</head>
<style>
    .line-title{
        border: 0;
        border-style: inset;
        border-top: 4px solid #000;
    }
    img{
        position: absolute;
        width: 80px;
        height: auto;
    }
    table{
        width: 100%;
    }
    .highlight{
        line-height: 1.6;
        font-weight: bold;
    }
    .italic{
        font-weight: normal;
        line-height: 1.6;
    }
    .normal{
        font-weight: normal;
        line-height: 1.6;
    }
    /* Style untuk tabel */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}
.kepala{
    background-color: #C7C8CC;
}

</style>
<body>
    <img src="<?= base_url();?>assets/template/assets/images/faces/bartim2.jpg" alt="LOGO">
    <table>
        <tr>
            <td align="center">
                <span class="highlight">
                    PEMERINTAH KABUPATEN BARITO TIMUR
                    <br>KECAMATAN RAREN BATUAH
                    <br>
                    <span class="italic">Jl.Ampah-MuaraTeweh Km.14 Kode Pos;73652 Email:<u>rarenbatuah2023@gmail.com</u></span>                    
                    <br>
                    <span class="normal">U N S U M</span>
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <p align="center">
        LAPORAN DATA SURAT MASUK
    </p>       

                <table class="table" border="2" cellspacing="0">
                    <thead class="kepala">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Terima</th>
                            <th>Tanggal Arsipkan</th>
                            <th>Nomor Surat</th>
                            <th>Ke Bagian</th>
                            <th>Perihal</th>
                            <th>Instansi</th>
                            <th>Alamat Pengirim</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                    <?php $no = 1;
                    foreach($surat_masuk as $sm) : ?>
                        <tr>
                        <td><?= $no++; ?></td>
                            <td><?= $sm['tgl_diterima'] ?></td>
                            <td><?= $sm['tgl_diarsipkan'] ?></td>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['ke_bagian'] ?></td>
                            <td><?= $sm['perihal_suratmasuk'] ?></td>
                            <td><?= $sm['instansi'] ?></td>
                            <td><?= $sm['alamat_pengirim'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
</body>
</html>