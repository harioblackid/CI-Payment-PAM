<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('surat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Perihal</th>
                                
                                <th scope="col">Tujuan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Operator</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $row->kode_surat; ?></td>
                                <td><?= $row->perihal ?></td>
                                <td><?= $row->tujuan; ?></td>
                                <td><?= date_indo($row->tanggal_surat); ?></td>
                                <td><?= $row->operator; ?></td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Option :</div>
                                            <button data-key="<?= encode($row->id_surat_keluar); ?>" data-url="<?=base_url('arsip/cetak'); ?>" class="dropdown-item print-confirm">
                                               <i class="fas fa-print fa-sm fa-fw mr-2"></i> Print
                                            </button>
                                            
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>      
                </div>
            </div>
            
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('surat'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

 