
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
                                            <li class="breadcrumb-item active">Welcome Sistem Bantuan Keluarahan Pedurungan Tengah!</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome Data Bantuan Keluarahan Pedurungan Tengah!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-eye-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Data Semple</h6>
                                        <h2 class="my-2"><?php echo number_format($countSampleData); ?></h2>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-wallet-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Data Warga</h6>
                                        <h2 class="my-2"><?php echo number_format($countData); ?></h2>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-shopping-basket-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Dapat Bantuan</h6>
                                        <h2 class="my-2"><?php echo number_format($countDapatBantuan); ?></h2>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-group-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Tidak Dapat</h6>
                                        <h2 class="my-2"><?php echo number_format($countNonBantuan); ?></h2>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>

                        <div class="row">
							<div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h4 class="fs-22 fw-semibold"><?php echo round(($countDapatBantuan/($countNonBantuan+$countDapatBantuan))*100,2); ?>%</h4>
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Persentase Penerima Bantuan</p>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="header-title mb-0">Grafik Bantuan</h5>

                                        <div id="weeklysales-collapse" class="collapse pt-3 show">
                                            <div dir="ltr">
                                                <div id="revenue-chart" class="apex-charts" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                                            </div>
                                        </div>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <h5 class="header-title mb-0">Data Dapat Bantuan</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive p-3">
                                                <table id="basic-datatable" class="table table-striped nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>Gaji</th>
                                                            <th>Punya Balita</th>
                                                            <th>Usia</th>
                                                            <th>Anak Sekolah</th>
                                                            <th>PNS</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        foreach ($warga as $key => $value) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $value['nama']; ?></td>
                                                            <td><?php echo $value['alamat']; ?></td>
                                                            <td><?php echo "Rp ".number_format($value['gaji']); ?></td>
                                                            <td><?php echo $value['hasBalita'] == '0' ? "Tidak Punya" : "Punya"; ?></td>
                                                            <td><?php echo $value['umur'] == 1 ? "Diatas 45 Tahun" : "Dibawah 45 tahun"; ?></td>
                                                            <td><?php echo $value['sekolah'] == 1 ? "Sekolah" : "Lulus/Belum"; ?></td>
                                                            <td><?php echo $value['is_pns'] == '0' ? "Non PNS" : "PNS"; ?></td>
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
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

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
			<script>
				<?php
				$js_array = json_encode($labelGrafik);
				echo "let labelGrafikBar = ". $js_array . ";\n";
				$js_ditolak = json_encode($dataGrafik['ditolak']);
				echo "let labelGrafikDitolak = ". $js_ditolak . ";\n";
				$js_diterima = json_encode($dataGrafik['diterima']);
				echo "let labelGrafikDiterima = ". $js_diterima . ";\n";
				?>
				console.log(labelGrafikBar);
				var options = {
					series: [
						{
							name: 'Tidak Dapat Bantuan',
							data: labelGrafikDitolak
						}, {
							name: 'Dapat Bantuan',
							data: labelGrafikDiterima
						}
					],
					chart: {
						type: 'bar',
						height: 350,
						stacked: true,
						toolbar: {
							show: true
						},
						zoom: {
							enabled: true
						}
					},
					responsive: [{
						breakpoint: 480,
						options: {
							legend: {
							position: 'bottom',
							offsetX: -10,
							offsetY: 0
							}
						}
					}],
					plotOptions: {
						bar: {
							horizontal: false,
							borderRadius: 10,
							dataLabels: {
							total: {
								enabled: true,
								style: {
								fontSize: '13px',
								fontWeight: 900
								}
							}
							}
						},
					},
					xaxis: {
						type: 'text',
						categories: labelGrafikBar,
					},
					legend: {
						position: 'right',
						offsetY: 40
					},
					fill: {
						opacity: 1
					}
				};

				var chart = new ApexCharts(document.querySelector("#revenue-chart"), options);

				chart.render();
			</script>
