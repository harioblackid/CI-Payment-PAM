<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-4">
        <div class="col-lg-6">
            <!-- Notifikasi -->

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>        
                </div>

                <form method="post" action="<?=base_url('barang/save'); ?>">
                <div class="card-body">
                                                
                    <!-- Field Form -->
                    <div class="form-group">
                        <label><small>Kode Barang</small></label>
                        <input class="form-control" type="text" name="id_barang" readonly value="<?=$data->id_barang; ?>">

                    </div>

                    <div class="form-group">
                        <label><small>Qty</small></label>
                        <input class="form-control" type="text" name="qty" readonly value="<?=$data->qty; ?>">

                    </div>

                    <div class="form-group">
                        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" 
                        value="<?=$data->nama_barang; ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <input type="text" name="note" class="form-control" placeholder="Note" value="<?=$data->note; ?>">
                    </div>

                    
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?=base_url('barang'); ?>" class="btn btn-default btn-block">
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