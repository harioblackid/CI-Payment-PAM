<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('surat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Agustus 2020</h6>
                            <h6 class="m-0 font-weight-bold text-danger"><?= rupiah(85000); ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-12 py-1 d-flex flex-row align-items-center justify-content-between">
                                <span>Stan Sekarang</span>
                                <strong class="text-right">95 m3</strong> 
                                </div>
                        
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-12 py-1 d-flex flex-row align-items-center justify-content-between">
                                    <span>Stan Bulan Lalu</span>
                                    <strong class="text-right">90 m3</strong> 
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-12 py-1 d-flex flex-row align-items-center justify-content-between">
                                    <span>Total Pemakaian</span>
                                    <strong class="text-right">5 m3</strong> 
                                </div>
                            </div>

                            <hr> 

                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <table class="table table-stripe">
                                        <thead>
                                            <tr>
                                                <td>Progresif</td>
                                                <td>Pakai</td>
                                                <td>Biaya</td>
                                                <td>Subtotal</td>
                                            </tr>
                                        </thead>
                                        <tbody class="small">
                                            <tr>
                                                <td>Blok I</td>
                                                <td>5 m3</td>
                                                <td><?= rupiah(11000); ?></td>
                                                <td><?= rupiah(55000); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        
                            </div> 
                          
                        </div>
                    </div>    
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h6 class="m-0 font-weight-bold text-primary">Perhitungan Rekening</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 py-0 d-flex flex-row align-items-center justify-content-between">
                                    <span>Denda Tunggakan</span>
                                    <strong class="text-danger"><?= rupiah(0); ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 py-0 d-flex flex-row align-items-center justify-content-between">
                                    <span>Denda Tunggakan</span>
                                    <strong class="text-danger"><?= rupiah(0); ?></strong>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-12 py-0 d-flex flex-row align-items-center justify-content-between">
                                    <span>Biaya Pemakaian</span>
                                    <span><?= rupiah(0); ?></span>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-12 py-0 d-flex flex-row align-items-center justify-content-between">
                                    <span>Air Limbah</span>
                                    <span><?= rupiah(0); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 py-0 d-flex flex-row align-items-center justify-content-between">
                                    <span>Administrasi</span>
                                    <span><?= rupiah(0); ?></span>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->