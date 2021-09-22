<?php require_once 'assets/phpti/ti.php' ?>
<?php 
    $current_page = 'pengguna';
    $page = 'Karyawan';
    include 'layout/menu.php';
    $idKaryawan = $_GET['id'];
    $query = "SELECT * FROM users,jabatan WHERE users.id=$idKaryawan AND users.id_jabatan=jabatan.id";
    $resultKaryawan = mysqli_fetch_array(mysqli_query($db,$query));
?>
<?php startblock('css') ?>
<?php endblock();?>

<?php startblock('absensi') ?>
<div class="container-fluid">
	<div class="page-header min-height-100 border-radius-xl mt-4"
		style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
		<span class="mask bg-gradient-primary opacity-6"></span>
	</div>
	<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
		<div class="row gx-4">
			<div class="col-auto">
				<div class="avatar avatar-xl position-relative">
					<img src="assets/img/users/<?php echo $resultKaryawan['foto']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
				</div>
			</div>
			<div class="col-auto my-auto">
				<div class="h-100">
					<h5 class="mb-1">
						<?php echo $resultKaryawan['name']; ?>
					</h5>
					<p class="mb-0 font-weight-bold text-sm">
						Jabatan : <?php echo $resultKaryawan['jabatan']; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row my-4">
		<div class="col-12">
			<div class="card">
				<div class="table-responsive">
					<table class="table align-items-center mb-0">
						<thead>
							<tr>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl
									Absen</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam
									Masuk</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam
									Pulang</th>
								<th
									class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
									Status Absen
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$query = "SELECT * FROM absensi WHERE MONTH(tanggal_absen) = MONTH(NOW()) AND id_user =  '".$idKaryawan."' ORDER BY tanggal_absen DESC";
								$result = mysqli_query($db,$query);
								while ($row = mysqli_fetch_array($result)) {
								?>

									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?php echo date('d F Y',strtotime($row['tanggal_absen'])); ?></h6>
												</div>
											</div>
										</td>
										<td>
										<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?php echo date('H:i:s',strtotime($row['jam_masuk'])); ?></h6>
												</div>
											</div>
										</td>
										<td>
										<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?php echo ($row['jam_keluar']!=null)?date('H:i:s',strtotime($row['jam_keluar'])):"Belum Absen Pulang!" ?></h6>
												</div>
											</div>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-sm"><?php echo ($row['terlambat']=='N')?'<span class="btn btn-danger btn-sm">Terlambat</span>':'<button type="button" class="btn btn-success">Masuk</button> ' ?></span>
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
	</div>
</div>


<?php endblock();?>

<?php startblock('js') ?>
<?php endblock();?>