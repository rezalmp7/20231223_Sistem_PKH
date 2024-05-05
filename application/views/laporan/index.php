
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Laporan</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Laporan Bantuan</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title d-inline">Laporan</h4>
                                    <a href="<?php echo base_url(); ?>laporan/print" target="_blank" class="btn mx-1 btn-sm btn-primary float-end">Print</a>
                                    <?php if($this->session->userdata('status') == 'login_kepala') { ?>
									<a href="<?php echo base_url(); ?>laporan/konfirmasi_all" class="btn btn-sm btn-success float-end">Konfirmasi All</a>
                                    <?php } ?>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="basic-datatable" class="table table-striped nowrap w-100">
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
                                                        ?>
                                                        Terkonfirmasi
                                                        <?php
                                                        } else {
                                                            if($this->session->userdata('status') == 'login_kepala') { ?>
                                                            <a href="<?php echo base_url(); ?>laporan/konfirmasi_one/<?php echo $value->id; ?>" class="btn btn-sm btn-success">Konfirmasi</a>
                                                        <?php } else { ?>
                                                            Belum Terkonfirmasi
                                                        <?php
                                                            }
                                                        }
                                                    ?>
												</td>
                                            </tr>
											<?php
											}
											?>
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>document.write(new Date().getFullYear())</script> © Kelurahan <b>Pedurungan Tengah</b>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
