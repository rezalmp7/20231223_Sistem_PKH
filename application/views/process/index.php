
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
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/warga">Warga</a></li>
                                        <li class="breadcrumb-item active">Edit</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Clustering Warga</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
							<!-- <div class="col"> -->
							<div class="row justify-content-md-center">
								<div class="col">
									<!-- <div class="collapse multi-collapse" id="multiCollapseExample"> -->
									<div class="card card-body">
										<h2>Inisialisasi</h2>
										<div class="row">
											<div class="col-12 justify-content-md-center table-responsive">
												<table class="table table-bordered table-striped">
													<thead>
														<tr>
															<th rowspan="1">Centroid</th>
															<th rowspan="1"><?php echo $variable_x; ?></th>
															<th rowspan="1"><?php echo $variable_y; ?></th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($centroid[0] as $key_c => $value_c) { ?>
														<tr>
															<td><?php echo ($key_c+1); ?></td>
															<td><?php echo $value_c[0]; ?></td>
															<td><?php echo $value_c[1]; ?></td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
										</div>
									<!-- </div> -->
									</div>
								</div>
								<?php
								foreach ($hasil_iterasi as $key => $value) { ?>
								<!-- <div class="col"> -->
								<div class="row justify-content-md-center">
									<div class="col">
										<!-- <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $key; ?>"> -->
										<div class="card card-body">
											<h2>Iterasi ke <?php echo ($key+1) ?></h2>
											<div class="row">
												<div class="col-12 justify-content-md-center table-responsive">
													<table class="table table-bordered table-striped">
														<thead>
															<tr>
																<th rowspan="1" class="text-center">Centroid</th>
																<th rowspan="1" class="text-center"><?php echo $variable_x; ?></th>
																<th rowspan="1" class="text-center"><?php echo $variable_y; ?></th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($centroid[$key] as $key_c => $value_c) { ?>
															<tr>
																<td class="text-center"><?php echo ($key_c+1); ?></td>
																<td class="text-center"><?php echo $value_c[0]; ?></td>
																<td class="text-center"><?php echo $value_c[1]; ?></td>
															</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
												<div class="col-12 justify-content-md-center">
													<table class="table table-bordered table-striped">
														<thead>
															<tr>
																<th rowspan="2" class="text-center">Data ke i</th>
																<th rowspan="2" class="text-center">Nama</th>
																<th rowspan="2" class="text-center"><?php echo $variable_x; ?></th>
																<th rowspan="2" class="text-center"><?php echo $variable_y; ?></th>
																<th rowspan="1" class="text-center" colspan="<?php echo $cluster; ?>">Jarak ke centroid <?php echo $cluster; ?></th>
																<th rowspan="2" class="text-center" >Jarak terdekat</th>
																<th rowspan="2" class="text-center">Cluster</th>
															</tr>
															<tr>
															<?php for ($i=1; $i <=$cluster ; $i++) { ?> 
																<th rowspan="1" class="text-center"><?php echo $i; ?></th>
															<?php }?>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($value as $key_data => $value_data) { ?>
															<tr>
																<td class="text-center"><?php echo $key_data+1; ?></td>
																<td class="text-center"><?php echo $provinsi[$key_data]; ?></td>
																<td class="text-center"><?php echo $value_data['data'][0]; ?></td>
																<td class="text-center"><?php echo $value_data['data'][1]; ?></td>
																<?php
																foreach ($value_data['jarak_ke_centroid'] as $key_jc => $value_jc) { ?>
																	<td class="text-center"><?php echo $value_jc; ?></td>
																<?php 
																}
																?>
																<td class="text-center"><?php echo $value_data['jarak_terdekat']['value']; ?></td>
																<td class="text-center"><?php echo $value_data['jarak_terdekat']['cluster']; ?></td>
															</tr>

															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									<!-- </div> -->
									</div>
								</div>
								<?php
								}
								?>
								<div class="col-12 justify-content-md-center">
									<div id="chartContainer" style="min-width: 810px; height: 600px; max-width: 900px; margin: 0 auto"></div>
								</div>
							</div>
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


<script type="text/javascript">
var data=[];
var color=['red','green','blue'];
<?php foreach ($centroid[(count($centroid)-1)] as $key => $value) { ?>
		var dataPoints={
		    name: "Centroid <?php echo ($key+1); ?>",
		    color: 'yellow',
		    data: [{
			    x:<?php echo $value[0]; ?>,
			    y:<?php echo $value[1]; ?>
			}]
		};
		data.push(dataPoints);
<?php } ?>
<?php 
	foreach ($hasil_cluster as $key => $value) { ?>
		var dataPoints={
		    name: "Cluster <?php echo ($key+1); ?>",
		    color: color[<?php echo $key; ?>],
		    data: []
		};
<?php	for ($i=0; $i <count($value[0]) ; $i++) { ?>
	<?php	
			$nama_provinsi='';
			foreach ($data as $key_d => $value_d) { 
				if($value_d[0]==$value[0][$i] && $value_d[1]==$value[1][$i]){
					$nama_provinsi=$provinsi[$key_d];
				}
			} ?>
			dataPoints.data.push({
				name:"<?php echo $nama_provinsi; ?>",
				x:<?php echo $value[0][$i]; ?>,
				y:<?php echo $value[1][$i]; ?>
			});
<?php 	} ?>
		data.push(dataPoints);
<?php } ?>
console.log(data);
// break;
Highcharts.chart('chartContainer', {
    chart: {
        type: 'scatter',
        zoomType: 'xy'
    },
    title: {
        text: 'Klasterisasi Perbandingan PNS dan Gaji Warga Desa '
    },
    xAxis: {
        title: {
            enabled: true,
            text: 'PNS'
        },
        startOnTick: true,
        endOnTick: true,
        showLastLabel: true
    },
    yAxis: {
        title: {
            text: 'Gaji'
        }
    },
    plotOptions: {
        scatter: {
            marker: {
                radius: 5,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)'
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{series.name} {point.key}</b><br>',
                pointFormat: '{point.x} pns, {point.y} gaji'
            }
        }
    },
    series: data
});


</script>
<br>
</body>
</html>
