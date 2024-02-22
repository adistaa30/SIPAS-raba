<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Surat Keluar</title>
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
    <img src="<?= base_url ();?>assets/template/assets/images/faces/bartim2.jpg">
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
        LAPORAN DATA SURAT KELUAR
    </p>       

                <table class="table" border="2" cellspacing="0">
                    <thead class="kepala">
                        <tr>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>No Klasifikasi</th>
                            <th>No Urut</th>
                            <th>Kd Urusan</th>
                            <th>Kd Bulan</th>
                            <th>Tgl surat</th>
                            <th>Dari Bagian</th>
                            <th>Perihal</th>
                            <th>Kepada</th>
                            <th>Alamat Penerima</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                    <?php $no = 1;
                        foreach($surat_keluar as $sk) :?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $sk['no_surat'] ?></td>
                            <td><?= $sk['no_klasifikasi'] ?></td>
                            <td><?= $sk['no_urut'] ?></td>
                            <td><?= $sk['kd_urusan'] ?></td>
                            <td><?= $sk['kd_bulan'] ?></td>
                            <td><?= $sk['tgl_suratkeluar'] ?></td>
                            <td><?= $sk['dari_bagian'] ?></td>
                            <td><?= $sk['perihal_suratkeluar'] ?></td>
                            <td><?= $sk['kepada'] ?></td>
                            <td><?= $sk['alamat_penerima'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
</body>
</html>