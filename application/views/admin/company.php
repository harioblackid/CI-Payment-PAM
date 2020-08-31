<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('company', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <form action="" method="post" class="company">
            <div class="card">
                <div class="card-header font-weight-bold text-primary">
                    <?= $title; ?>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" 
                        placeholder="Submenu title" value="<?=company()->name; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="author">Aplication Name</label>
                        <input type="text" class="form-control" id="author" name="author" 
                        placeholder="App Name" value="<?=company()->author; ?>">
                        <?= form_error('author', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" 
                        placeholder="Address" value="<?=company()->address; ?>">
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary btn-sm btn-block">
                        <i class="fas fa-save"></i> Save
                    </button>
                    
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->