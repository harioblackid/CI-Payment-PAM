<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('simulasi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header font-weight-bold text-primary">
                    Profile Perusahaan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">Nama Perusahaan</div>
                        <div class="col-sm-8"><?= company()->name; ?></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">Aplikasi</div>
                        <div class="col-sm-8"><?= company()->author; ?></div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">Alamat</div>
                        <div class="col-sm-8"><?= company()->address; ?></div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->