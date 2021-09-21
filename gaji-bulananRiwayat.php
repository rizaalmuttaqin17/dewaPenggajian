<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'gaji-bulanan';
    $page = 'Gaji Bulanan';
    include 'layout/menu.php'
?>

<?php startblock('gaji-bulanan') ?>
<div class="col-12">
	<div class="card mb-4">
		<div class="card-header pb-0 p-3">
			<h6 class="mb-1 ">Gaji Karyawan <a href="gaji-bulanan.php" class="btn btn-primary d-flex align-items-center" style="float: right;"> <i class="fas fa-money-bill fa-2x   "></i><span style="margin-left: 10px;">Gaji Belum Dibayar</span></a></h6>
			<p class="text-sm">Riwayat Gaji Karyawan</p>
			
		</div>
		<div class="card-body pt-4 p-3">
					<ul class="list-group">
						<?php 
				
							$query = "SELECT * FROM gaji_bulanan  ORDER BY tanggal_gajian DESC";
							$result = mysqli_query($db,$query);
							while ($row = mysqli_fetch_array($result)) {
								?>
								
								<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
									<div class="row">
										<div class="col-md-12">
											<h6 class="mb-3 text-sm">Gajiku dibayar pada <?php echo date('d F Y',strtotime($row['tanggal_gajian'])); ?></h6>
										</div>
										<div class="col-md-4">
											<div class="d-flex flex-column">
												<span class="mb-2 text-xs">Gaji Pokok Bulanan:  <br>  <span
														class="text-dark font-weight-bold ms-sm-2"><?php echo "Rp. " .  number_format($row['gaji_pokok'], 0, ",", "."); ?></span></span>
												<span class="mb-2 text-xs">Tunjangan: <br>  <span
														class="text-dark ms-sm-2 font-weight-bold"><?php echo "Rp. " .  number_format($row['tunjangan'], 0, ",", "."); ?></span></span>
												
											</div>
										</div>
										<div class="col-md-4">
											<div class="d-flex flex-column">
												
												<span class="mb-2 text-xs">Potongan: <br> <span
														class="text-dark ms-sm-2 font-weight-bold"><?php echo "Rp. " .  number_format($row['potongan'], 0, ",", "."); ?></span></span>
												<span class="text-xs">PPh (<?php echo $settingKantor['potongan_gaji_pph'] ?>%):  <br> <span
														class="text-dark ms-sm-2 font-weight-bold"><?php echo "Rp. " .  number_format($row['pph'], 0, ",", "."); ?></span></span>
											</div>
										</div>
										<div class="col-md-4">
											<div class="d-flex flex-column">
												<span class="mb-2 text-xs">Total Gaji:  <br> <span
														class="text-dark font-weight-bold ms-sm-2"><?php echo "Rp. " .  number_format($row['total_gaji'], 0, ",", "."); ?></span></span>
												
											</div>
										</div>
									</div>
									<div class="ms-auto text-end">
										<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
											<i class="fas fa-file-pdf   fa-2x "></i> PDF
										</a>
									</div>
								</li>
								<?php 
							}
						?>
						
					</ul>
				</div>
	</div>
</div>
<?php endblock();?>