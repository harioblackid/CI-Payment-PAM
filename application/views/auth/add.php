<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-4">
        <div class="col-lg-6">
            <!-- Notifikasi -->

            <?= $this->session->flashdata('message'); ?>
            <?= form_error('add_user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <div class="card">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>        
                </div>

                <form method="post" class="add_user" action="<?=base_url('auth/registration'); ?>">
                <div class="card-body">
                                                                    
                    <!-- Field Form -->
                    <div class="form-group">
                        <label><small>Full Name</small></label>
                        <input class="form-control" type="text" name="name" id="name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label><small>Username</small></label>
                        <input class="form-control" type="text" name="email" id="email" value="<?= set_value('email');?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label><small>Password</small></label>
                        <input class="form-control" type="password" name="password1" id="password1">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label><small>Repeat Password</small></label>
                        <input class="form-control" type="password" name="password2" id="password2">
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?=base_url('user/list'); ?>" class="btn btn-default btn-block">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>        
                        </div>
                        <div class="col-lg-8">
                            <button class="btn btn-success btn-block">
                                <i class="fas fa-save"></i> Simpan
                            </button>        
                        </div>
                    </div>
                    
                </div>

            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->