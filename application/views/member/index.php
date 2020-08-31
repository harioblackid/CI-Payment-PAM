<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('surat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header font-weight-bold text-primary">
                    Detail Customer
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row mb-2">
                                <div class="col-lg-4 font-weight-bold">Nomor Sambungan</div>
                                <div class="col-lg-8">1234</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-4 font-weight-bold">Nama Pelanggan</div>
                                <div class="col-lg-8">Hario Saloko</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-4 font-weight-bold">Alamat</div>
                                <div class="col-lg-8">
                                Kp. Karokrok Utara RT. 003/002 Ds. Kalijaya Kec. Telagasari Kab. Karawang 41381
                                </div>
                            </div> 

                            <div class="row mb-2">
                                <div class="col-lg-4 font-weight-bold">Golongan</div>
                                <div class="col-lg-8">NIAGA KECIL</div>
                            </div> 
                            <!-- End Row -->
                        </div>
                        <div class="col-lg-4">
                            <div class="row font-weight-bold">
                                <div class="col">Total Tagihan</div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?= rupiah("1000000"); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header font-weight-bold text-primary">
                    Status Pembayaran
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <td>Bulan</td>
                                <td>Nominal</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Agustus 2020</td>
                                <td class="text-danger">
                                    <?= rupiah(85000); ?><br>
                                    <small>Belum Lunas</small>
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Option :</div>

                                            <a href="<?= base_url('member/rincian_tagihan'); ?>" class="dropdown-item ">
                                                <i class="fa fa-edit fa-sm fa-fw mr-2"></i> Detail Transaksi
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Juli 2020</td>
                                <td>
                                    <?= rupiah(85000); ?><br>
                                    <small>Lunas</small>
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Option :</div>

                                            <a href="" class="dropdown-item ">
                                                <i class="fa fa-edit fa-sm fa-fw mr-2"></i> Detail Transaksi
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Juni 2020</td>
                                <td>
                                    <?= rupiah(85000); ?><br>
                                    <small>Lunas</small>
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Option :</div>

                                            <a href="" class="dropdown-item ">
                                                <i class="fa fa-edit fa-sm fa-fw mr-2"></i> Detail Transaksi
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->