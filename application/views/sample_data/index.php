
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
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Sample Data</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Data Tables</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title d-inline">Data User</h4>
									<a href="<?php echo base_url(); ?>sampleData/create" class="btn btn-sm btn-success float-end">Tambah</a>
                                <div class="card-body">
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>PNS</th>
                                                <th>Gaji</th>
                                                <th>Balita</th>
                                                <th>Umur</th>
                                                <th>Sekolah</th>
                                                <th>Pekerjaan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
											<?php
											foreach ($sample_data as $key => $value) {
											?>
                                            <tr>
												<td><?php echo $key+1; ?></td>
                                                <td><?php echo $value->is_pns == 1 ? "PNS" : "Non PNS"; ?></td>
                                                <td><?php echo $value->type_gaji == 1 ? ">=".$value->gaji : "<".$value->gaji; ?></td>
                                                <td><?php echo $value->hasBalita == 1 ? "Punya" : "Tidak Punya"; ?></td>
                                                <td><?php echo $value->umur == 1 ? "Diatas 45 Tahun" : "Dibawah 45 tahun"; ?></td>
                                                <td><?php echo $value->sekolah == 1 ? "Anak Sekolah" : "Anak Tidak Sekolah"; ?></td>
                                                <td><?php echo $value->pekerjaan == 1 ? "Bekerja" : "Tidak Bekerja"; ?></td>
                                                <td><?php echo $value->status ? "Dapat Bantuan" : "Tidak Dapat"; ?></td>
                                                <td>
													<a href="<?php echo base_url(); ?>sampleData/edit/<?php echo $value->id; ?>" class="btn btn-sm btn-warning">Edit</a>
													<a href="<?php echo base_url(); ?>sampleData/destroy/<?php echo $value->id; ?>" class="btn btn-sm btn-danger">Hapus</a>
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
