<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'gaji-bulanan';
    $page = 'Gaji Karyawan';
    include 'layout/menu.php'
?>

<?php startblock('gaji-bulanan') ?>
<div class="col-12">
	<div class="card mb-4">
		<div class="card-header pb-0 p-3">
			<h6 class="mb-1 ">Gaji Karyawan <a href="gaji-bulananRiwayat.php" class="btn btn-primary d-flex align-items-center" style="float: right;"> <i class="fa fa-history fa-2x " aria-hidden="true"></i> <span style="margin-left: 10px;">Riwayat Penggajian</span></a></h6>
			<p class="text-sm">Karyawan yang belum digaji bulan <?php echo date('F Y'); ?></p>
			
		</div>
		<div class="card-body pt-4 p-3">
			<ul class="list-group">
				<?php
					$query = "SELECT * FROM users WHERE (deleted_at is null or deleted_at = '')";
					$resultKaryawan = mysqli_query($db, $query);
					while($row = mysqli_fetch_array($resultKaryawan)){
						$queryCekGaji = "SELECT * FROM gaji_bulanan WHERE id_user='".$row['id']."' AND MONTH(NOW())=MONTH(tanggal_gajian) ORDER BY tanggal_gajian DESC";
						if(mysqli_num_rows(mysqli_query($db,$queryCekGaji))==0){
							$queryJabatan = "SELECT * FROM jabatan WHERE id='".$row['id_jabatan']."'";
							$resultJabatan = mysqli_fetch_array(mysqli_query($db,$queryJabatan));

							$potongan = 0;
							$to = date('Y-m-1');
							$from = date('Y-m-t');
							$queryPotongan = "SELECT * FROM potongan_gaji WHERE id_user='".$row['id']."'  AND tanggal_potongan  BETWEEN '".$to."' AND '".$from."'";
							$resultPotongan = mysqli_query($db,$queryPotongan);
							if(mysqli_num_rows($resultPotongan)> 0 ){
								while($rows = mysqli_fetch_array($resultPotongan)){
									$potongan += $rows['potongan'];
								}
							}

							// PPH
							$pph = $settingKantor['potongan_gaji_pph']*($resultJabatan['gaji_pokok']+$row['tunjangan']-$potongan)/100;
							?>
							<!-- Gaji bulan ini yang belum dibayar -->
							<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
								<div class="row">
									<div class="col-md-12">
										<h6 class="mb-3 text-sm">Gaji <?php echo $row['name']; ?></h6>

									</div>
									<div class="col-md-4">
										<div class="d-flex flex-column">
											<span class="mb-2 text-xs">Gaji Pokok Bulanan:  <br>  <span
													class="text-dark font-weight-bold ms-sm-2"><?php echo "Rp. " .  number_format($resultJabatan['gaji_pokok'], 0, ",", "."); ?></span></span>
											<span class="mb-2 text-xs">Tunjangan: <br>  <span
													class="text-dark ms-sm-2 font-weight-bold"><?php echo "Rp. " .  number_format($row['tunjangan'], 0, ",", "."); ?></span></span>
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
													class="text-dark font-weight-bold ms-sm-2"><?php echo "Rp. " .  number_format($resultJabatan['gaji_pokok']+$row['tunjangan']-$potongan-$pph, 0, ",", "."); ?></span></span>
											
										</div>
									</div>
								</div>
								<div class="ms-auto text-end">
									<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
										<i class="fas fa-file-pdf   fa-2x "></i> PDF
									</a>
									<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="gaji-bulananBayar.php?id=<?php echo $row['id']; ?>">
										<i class="fas fa-money-bill  fa-2x  "></i> BAYAR
									</a>
								</div>
							</li>
							<?php
						}
					}
				?>
			</ul>
		</div>
	</div>
</div>
<?php endblock();?>