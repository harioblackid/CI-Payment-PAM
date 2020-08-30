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
                            <div class="row m-2">
                                <div class="col-lg-4 font-weight-bold">Nomor Sambungan</div>
                                <div class="col-lg-8">1234</div>
                            </div>

                            <div class="row m-2">
                                <div class="col-lg-4 font-weight-bold">Nama Pelanggan</div>
                                <div class="col-lg-8">Hario Saloko</div>
                            </div>

                            <div class="row m-2">
                                <div class="col-lg-4 font-weight-bold">Alamat</div>
                                <div class="col-lg-8">
                                Kp. Karokrok Utara RT. 003/002 Ds. Kalijaya Kec. Telagasari Kab. Karawang 41381
                                </div>
                            </div> 

                            <div class="row m-2">
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
                                    <h1><?= rupiah("1000000"); ?></h1>
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