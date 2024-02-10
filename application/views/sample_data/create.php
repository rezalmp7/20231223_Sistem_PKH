
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
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/sampleData">Sample Data</a></li>
                                        <li class="breadcrumb-item active">Tambah</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Tambah Sample</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Tambah Data Sample</h4>
                                <div class="card-body">
									<form method="POST" action="<?php echo base_url(); ?>sampleData/store">

										<div class="mb-3 mt-3">
											<label for="example-password" class="form-label">Gaji</label>
											<select class="form-select" name="type_gaji" id="example-select">
												<option value="0" selected>< Rp 5.000.000</option>
												<option value="1">>= Rp 5.000.000</option>
											</select>
										</div>
										<div class="mb-3">
											<div>
												Apakah saudara/i mempunyai balita ?
											</div>
											<div class="row px-3">
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="hasBalita" value="1" id="hasBalitaYa" checked required>
													<label class="form-check-label" for="hasBalitaYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="hasBalita" value="0" id="hasBalitaTidak" required>
													<label class="form-check-label" for="hasBalitaTidak">
														Tidak
													</label>
												</div>
											</div>
										</div>

										<div class="mb-3">
											<div>
												Apakah anda PNS ?
											</div>
											<div class="row px-3">
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="isPNS" value="1" id="isPNSYa" checked required>
													<label class="form-check-label" for="isPNSYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="isPNS" value="0" id="isPNSTidak" required>
													<label class="form-check-label" for="isPNSTidak">
														Tidak
													</label>
												</div>
											</div>
										</div>
										
										<div class="mb-3">
											<div>
												Apakah Usia Anda diatas 45 Tahun ? ?
											</div>
											<div class="row px-3">
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="umur" value="1" id="umurYa" required>
													<label class="form-check-label" for="umurYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="umur" value="0" id="umurTidak"  required>
													<label class="form-check-label" for="umurTidak">
														Tidak
													</label>
												</div>
											</div>
										</div>

										<div class="mb-3">
											<div>
												Apakah saudara/I memiliki anak yang masih sekolah ?
											</div>
											<div class="row px-3">
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="sekolah" value="1" id="sekolahYa" checked required>
													<label class="form-check-label" for="sekolahYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="sekolah" value="0" id="sekolahTidak" required>
													<label class="form-check-label" for="sekolahTidak">
														Tidak
													</label>
												</div>
											</div>
										</div>

										<div class="mb-3">
											<div>
												Apa Anda Sedang Bekerja?
											</div>
											<div class="row px-3">
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="pekerjaan" value="1" id="pekerjaanYa" checked required>
													<label class="form-check-label" for="pekerjaanYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="pekerjaan" value="0" id="pekerjaanTidak" required>
													<label class="form-check-label" for="pekerjaanTidak">
														Tidak
													</label>
												</div>
											</div>
										</div>

										<div class="mb-3 mt-3">
											<label for="example-password" class="form-label">Status</label>
											<select class="form-select" name="status" id="example-select">
												<option value="1">Dapat Bantuan</option>
												<option value="0">Tidak Dapat Bantuan</option>
											</select>
										</div>

										<div class="mb-3">
											<button type="submit" class="btn btn-success btn-sm float-end">Simpan</button>
										</div>
										<div class="clearfix"></div>
									</form>
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
