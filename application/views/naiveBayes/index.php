
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
                                        <li class="breadcrumb-item active">Naive Bayes</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Data Naive Bayes</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title d-inline">Data Naive Bayes</h4>
                                <div class="card-body">
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>PNS</th>
                                                <th>Gaji</th>
												<th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
											<?php
											foreach ($warga as $key => $value) {
											?>
                                            <tr>
                                                <td><?php echo $value['nama']; ?></td>
                                                <td><?php echo $value['is_pns'] == '0' ? "Non PNS" : "PNS"; ?></td>
                                                <td><?php echo "Rp ".number_format($value['gaji']); ?></td>
                                                <td>
													<?php
													if($value['status'][0] == "DITERIMA") {
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
