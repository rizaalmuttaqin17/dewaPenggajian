<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'gajiku';
    $page = 'Gajiku';
    include 'layout/menu.php'
?>
<?php startblock('css') ?>
<?php endblock();?>

<?php startblock('gajiku') ?>
<div class="container-fluid">
	<div class="page-header min-height-100 border-radius-xl mt-4"
		style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
		<span class="mask bg-gradient-primary opacity-6"></span>
	</div>
	<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
		<div class="row gx-4">
			<div class="col-auto">
				<div class="avatar avatar-xl position-relawwtive">
					<img src="assets/img/users/<?php echo $_SESSION['users']['foto']; ?>" alt="profile_image"
						class="w-100 border-radius-lg shadow-sm">
				</div>
			</div>
			<div class="col-auto my-auto">
				<div class="h-100">
					<h5 class="mb-1">
						<?php echo $_SESSION['users']['name']; ?>
					</h5>
					<p class="mb-0 font-weight-bold text-sm">
						Jabatan : <?php echo $_SESSION['users']['jabatan']; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row my-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header pb-0 px-3">
					<h6 class="mb-0">Gajiku</h6>
				</div>
				<div class="card-body pt-4 p-3">
					<ul class="list-group">
						<?php 
							$query = "SELECT * FROM gaji_bulanan WHERE id_user='".$_SESSION['users']['id']."' AND MONTH(NOW())=MONTH(tanggal_gajian) GROUP BY tanggal_gajian DESC";
							$result = mysqli_query($db,$query);
							if(mysqli_num_rows($result)==0){
								$gajiBelumDibayar = 0;
								$queryJabatan = "SELECT * FROM jabatan WHERE id='".$_SESSION['users']['id_jabatan']."'";
								$resultJabatan = mysqli_fetch_array(mysqli_query($db,$queryJabatan));

								$potongan = 0;
								$to = date('Y-m-1');
								$from = date('Y-m-t');
								$queryPotongan = "SELECT * FROM potongan_gaji WHERE id_user='".$_SESSION['users']['id']."'  AND tanggal_potongan  BETWEEN '".$to."' AND '".$from."'";
								$resultPotongan = mysqli_query($db,$queryPotongan);
								if(mysqli_num_rows($resultPotongan)> 0 ){
									while($rows = mysqli_fetch_array($resultPotongan)){
										$potongan += $rows['potongan'];
									}
								}

								// PPH
								$pph = $settingKantor['potongan_gaji_pph']*($resultJabatan['gaji_pokok']+$_SESSION['users']['tunjangan']-$potongan)/100;

								?>
								<!-- Gaji bulan ini yang belum dibayar -->
								<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
									<div class="row">
										<div class="col-md-12">
											<h6 class="mb-3 text-sm">Gajiku belum dibayar Bulan <?php echo date('F Y'); ?></h6>

										</div>
										<div class="col-md-4">
											<div class="d-flex flex-column">
												<span class="mb-2 text-xs">Gaji Pokok Bulanan:  <br>  <span
														class="text-dark font-weight-bold ms-sm-2"><?php echo "Rp. " .  number_format($resultJabatan['gaji_pokok'], 0, ",", "."); ?></span></span>
												<span class="mb-2 text-xs">Tunjangan: <br>  <span
														class="text-dark ms-sm-2 font-weight-bold"><?php echo "Rp. " .  number_format($_SESSION['users']['tunjangan'], 0, ",", "."); ?></span></span>
											</div>
										</div>
										<div class="col-md-4">
											<div class="d-flex flex-column"> 
												<span class="mb-2 text-xs">Potongan: <br> <span
														class="text-dark ms-sm-2 font-weight-bold"><?php echo "Rp. " .  number_format($potongan, 0, ",", "."); ?></span></span>
												<span class="text-xs">PPh (<?php echo $settingKantor['potongan_gaji_pph']; ?>%):  <br> <span
														class="text-dark ms-sm-2 font-weight-bold"><?php echo "Rp. " .  number_format($pph, 0, ",", "."); ?></span></span>
											</div>
										</div>
										<div class="col-md-4">
											<div class="d-flex flex-column">
												<span class="mb-2 text-xs">Total Gaji:  <br> <span
														class="text-dark font-weight-bold ms-sm-2"><?php echo "Rp. " .  number_format($resultJabatan['gaji_pokok']+$_SESSION['users']['tunjangan']-$potongan-$pph, 0, ",", "."); ?></span></span>
												
											</div>
										</div>
									</div>
									<div class="ms-auto text-end">
										<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="cetak/gaji.php?id=<?php echo $_SESSION['users']['id'] ?>&print=now" target="_blank">
										<i class="fas fa-print  fa-2x  "></i> Cetak
										</a>
									</div>
								</li>
								<?php
							}
							$query = "SELECT * FROM gaji_bulanan WHERE id_user =  '".$_SESSION['users']['id']."' GROUP BY tanggal_gajian DESC";
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
										<a class="btn btn-link text-danger text-gradient px-3 mb-0"  href="cetak/gaji.php?id=<?php echo $_SESSION['users']['id'] ?>&print=<?php echo $row['id']; ?>" target="_blank">
										<i class="fas fa-print  fa-2x  "></i> Cetak
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
	</div>
</div>


<?php endblock();?>

<?php startblock('js') ?>
<?php endblock();?>