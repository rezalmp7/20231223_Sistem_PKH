
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
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>warga">Warga</a></li>
                                        <li class="breadcrumb-item active">Edit</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Data <?php echo $warga->nama; ?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Edit Data <?php echo $warga->nama; ?></h4>
                                <div class="card-body">
									<form method="POST" action="<?php echo base_url(); ?>warga/update/<?php echo $warga->id; ?>">
										<div class="mb-3">
											<label for="simpleinput" class="form-label">Nama</label>
											<input type="text" name="nama" value="<?php echo $warga->nama; ?>" id="simpleinput" class="form-control" placeholder="Nama Lengkap">
										</div>

										<div class="mb-3">
											<label for="tempat_lahir" class="form-label">Tempat Lahir</label>
											<input type="text" name="tempat_lahir" value="<?php echo $warga->tempat_lahir; ?>" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
										</div>

										<div class="mb-3">
											<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
											<input type="date" name="tanggal_lahir" value="<?php echo $warga->tanggal_lahir; ?>" id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
										</div>
										
										<div class="mb-3">
											<label for="input_alamat" class="form-label">Alamat</label>
											<textarea class="form-control" name="alamat" id="input_alamat" rows="5" placeholder="Alamat"><?php echo $warga->alamat; ?></textarea>
										</div>

										<div class="mb-3">
											<label for="tempat_lahir" class="form-label">RT</label>
											<input type="number" name="rt" id="tempat_lahir" value="<?php echo $warga->rt; ?>" class="form-control" placeholder="Rukun Tetangga">
										</div>

										<div class="mb-3">
											<label for="input_rw" class="form-label">RW</label>
											<input type="number" name="rw" id="input_rw" value="<?php echo $warga->rw; ?>" class="form-control" placeholder="Rukun Warga">
										</div>

										<div class="mt-3 mb-3">
											<label for="input_gaji" class="form-label">Gaji</label>
											<input type="number" name="gaji" id="input_gaji" value="<?php echo $warga->gaji; ?>" class="form-control" placeholder="Gaji Yang didapat">
										</div>

										<div class="mb-3">
											<div>
												Apakah saudara/i mempunyai balita ?
											</div>
											<div class="row px-3">
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="hasBalita" value="1" id="hasBalitaYa" <?php if($warga->hasBalita == 1) echo "checked"; ?> required>
													<label class="form-check-label" for="hasBalitaYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="hasBalita" value="0" id="hasBalitaTidak" <?php if($warga->hasBalita == 0) echo "checked"; ?> required>
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
													<input class="form-check-input" type="radio" name="isPNS" value="1" id="isPNSYa" <?php if($warga->is_pns == 1) echo "checked"; ?> required>
													<label class="form-check-label" for="isPNSYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="isPNS" value="0" id="isPNSTidak" <?php if($warga->is_pns == 0) echo "checked"; ?> required>
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
													<input class="form-check-input" type="radio" name="umur" value="1" id="umurYa" <?php if($warga->umur == 1) echo "checked"; ?> required>
													<label class="form-check-label" for="umurYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="umur" value="0" id="umurTidak" <?php if($warga->umur == 0) echo "checked"; ?> required>
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
													<input class="form-check-input" type="radio" name="sekolah" value="1" id="sekolahYa" <?php if($warga->sekolah == 1) echo "checked"; ?> required>
													<label class="form-check-label" for="sekolahYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="sekolah" value="0" id="sekolahTidak" <?php if($warga->sekolah == 0) echo "checked"; ?> required>
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
													<input class="form-check-input" type="radio" name="pekerjaan" value="1" id="pekerjaanYa" <?php if($warga->pekerjaan == 1) echo "checked"; ?> required>
													<label class="form-check-label" for="pekerjaanYa">
														Ya
													</label>
												</div>
												<div class="form-check col d-block">
													<input class="form-check-input" type="radio" name="pekerjaan" value="0" id="pekerjaanTidak" <?php if($warga->pekerjaan == 0) echo "checked"; ?> required>
													<label class="form-check-label" for="pekerjaanTidak">
														Tidak
													</label>
												</div>
											</div>
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
