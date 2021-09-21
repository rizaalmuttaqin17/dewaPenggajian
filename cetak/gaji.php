<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nota Servis</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
	<script src="{{ asset('dist/assets/js/rupiah.js') }}"></script>
    <style>
        *{
            font-family: 'Rubik';
        }
    </style>
</head>
<body id="kt_body"  class="bg-white header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="">
            <div class="card-body p-0">
                <div class="row justify-content-center px-md-0" >
                    <div class="col-md-12">
                      
                        <div class="row p-2" style="background-color: #FFFDC5; box-shadow: 2px 5px 10px #c2c2c2;">
                            <div class="col col-md-3">
                                <h3 class="text-dark font-italic">SLIP Gaji</h3>
                                <h4 class="text-dark font-weight-normal">PT. Yugo Putra Sejahtera</h4>
                            </div>
                            <div class="col col-md-6 justify-content-center" style="display: flex">
                                <!-- <img class="img-thumbnail rounded" style="max-width: auto;height:70px" src="{{ asset('logo-toko/'.$toko['logo']) }}"><br> -->
                              
                            </div>
                            <div class="col col-md-3 text-right">
                                <h4 class="text-dark font-weight-bold">Tgl: <?php echo date('d F Y'); ?></h4>
                            </div>
                        </div>
                        <div class="row pt-2 pb-2 mt-5">
                            <div class="col col-md-4">
                                <h1 class="font-weight-bold mb-5">Data Pelanggan</h1>
                                <div class="row">
                                    <div class="col-md-6 pr-0">
                                        <p class="font-weight-bold mb-0">Nama </p>
                                        <p class="font-weight-bold mb-0">Kontak</p>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        <p class="font-weight-normal mb-0">{{ $servisan->ElektronikUser->Pelanggan->nama }}</p>
                                        <p class="font-weight-normal mb-0">{{ $servisan->ElektronikUser->Pelanggan->no_hp }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-4">
                                <h1 class="font-weight-bold mb-5">Data Barang</h1>
                                <div class="row">
                                    <div class="col-md-6 pr-0">
                                        <p class="font-weight-bold mb-0">Merk/Type</p>
                                        <p class="font-weight-bold mb-0">No. Seri</p>
                                        <p class="font-weight-bold mb-0">Kelengkapan</p>
                                        <p class="font-weight-bold mb-0">Keterangan</p>
                                    </div>
                                    <div class="col-md-6 pl-0">
                                        <p class="font-weight-normal mb-0">{{ $servisan->ElektronikUser->LayananToko->jenis_elektronik }} {{ $servisan->ElektronikUser->merk_type }}</p>
                                        <p class="font-weight-normal mb-0">
                                            @if ($servisan->ElektronikUser->no_seri!=null)
                                                {{ $servisan->ElektronikUser->no_seri }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                        <p class="font-weight-normal mb-0">{{ ($servisan->status_klaim == "Y" )? $servisan->ServisanGaransi->first()->kelengkapan:$servisan->kelengkapan }}</p>
                                    </div>
                                    <div class="col-8">
                                        <p class="font-weight-normal mb-0">
                                            @if ($servisan['keterangan']!=null)
                                                {{ $servisan['keterangan'] }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-4">
                                <h1 class="font-weight-bold mb-5">Tindakan Servis</h1>
                                <div class="row">
                                    @foreach ($tindakan as $items)
                                    <div class="col-md-7 pr-0">
                                        <p class="font-weight-bold mb-0">
                                            {{ $items->tindakan }}
                                        </p>
                                    </div>
                                    <div class="col-md-1 pl-0">
                                        <p class="font-weight-normal mb-0">Rp.</p>
                                    </div>
                                    <div class="col-md-4 pl-0">
                                        <p class="font-weight-normal mb-0 text-right">{{ number_format($items->harga, 0, ",", ".") }}</p>
                                    </div>
                                    @endforeach
                                    <div class="col-md-12 pr-0 mt-15">
                                        <h1 class="font-weight-bold mb-0">Pembayaran</h1>
                                    </div>
                                    <div class="col-md-7 pr-0">
                                        <p class="font-weight-bold mb-0">Biaya Servis</p>
                                    </div>
                                    <div class="col-md-1 pl-0">
                                        <p class="font-weight-normal mb-0">Rp.</p>
                                    </div>
                                    <div class="col-md-4 pl-0">
                                        <p class="font-weight-normal mb-0 text-right">
                                            <script>document.write(angkaRupiah({{ $servisan->total_biaya}},"Rp. ",",00"))</script></p>
                                    </div>
                                    <div class="col-md-7 pr-0">
                                        <p class="font-weight-bold mb-0">Uang Muka</p>
                                    </div>
                                    <div class="col-md-1 pl-0">
                                        <p class="font-weight-normal mb-0">Rp.</p>
                                    </div>
                                    <div class="col-md-4 pl-0">
                                        <p class="font-weight-normal mb-0 text-right"><script>document.write(angkaRupiah({{ $servisan->uang_muka }},"Rp. ",",00"))</script></p>
                                    </div>
                                    <div class="col-md-7 pr-0">
                                        <p class="font-weight-bold mb-0">Total</p>
                                    </div>
                                    <div class="col-md-1 pl-0">
                                        <p class="font-weight-normal mb-0">Rp.</p>
                                    </div>
                                    <div class="col-md-4 pl-0">
                                        <p class="font-weight-normal mb-0 text-right"><script>document.write(angkaRupiah({{ $servisan->total_biaya-$servisan->uang_muka }},"Rp. ",",00"))</script></p>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="border-bottom w-100 mt-5 mb-1"></div>
                        <p class="font-italic text-right">Tanggal Cetak : <?php echo date('d F Y'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <div>
</body>
</html>
<script>
			
    $(document).ready(function(){
        window.print();
    });
</script>