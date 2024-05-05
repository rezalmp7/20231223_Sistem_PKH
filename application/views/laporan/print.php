<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@media print{@page {size: landscape}}</style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Penerimaan PKH <?php echo date("d M Y"); ?></title>
  </head>
  <body>
    <h1 class="text-center">Laporan Penerimaan PKH</h1>
    <p class="text-center"><?php echo date("d M Y"); ?></p>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Data</th>
                <th>Status</th>
                <th>Tgl Pendataan</th>
                <th>Konfirmasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($bantuan as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value->nama; ?></td>
                <td><?php echo $value->alamat; ?></td>
                <td>
                    Gaji : <?php echo "Rp ".number_format($value->gaji); ?></br>
                    Balita : <?php echo $value->hasBalita == '0' ? "Tidak Punya" : "Punya"; ?></br>
                    Usia : <?php echo $value->umur == 1 ? "Diatas 45 Tahun" : "Dibawah 45 tahun"; ?></br>
                    Sekolah : <?php echo $value->sekolah == 1 ? "Sekolah" : "Lulus/Belum"; ?></br>
                    PNS : <?php echo $value->is_pns == '0' ? "Non PNS" : "PNS"; ?></br>
                </td>
                <td>
                    <?php
                    if($value->status == 1) {
                    ?>
                    <span class="badge bg-primary text-light fs-6"><i class="ri-cash-line"></i> Dapat Bantuan</span>
                    <?php
                    } else {
                    ?>
                    <span class="badge bg-danger text-light fs-6"><i class="ri-close-line"></i> Tidak Dapat Bantuan</span>
                    <?php
                    }
                    ?>
                </td>
                <td><?php echo date("H:i:s d-m-Y", strtotime($value->tgl_pendataan)); ?></td>
                
                <td>
                    <?php
                        if($value->status_konfirmasi == 1) {
                            echo "Terkonfirmasi";
                        } else {
                            echo "Belum Terkonfirmasi";
                        }
                    ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
        window.print()
    </script>
  </body>
</html>