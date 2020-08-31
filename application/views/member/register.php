<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('simulasi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header font-weight-bold text-primary">
                    Registration
                </div>
                <div class="card-body">
                    <h1>Halaman Pendaftaran</h1>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm btn-block calculate-simulation">
                        <i class="fas fa-save"></i> Action Button
                    </button>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->