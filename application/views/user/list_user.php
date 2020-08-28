<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-12">
        <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                    <a href="<?= base_url('auth/add'); ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah User
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $row->email; ?></td>
                                <td><?= $row->name; ?></td>
                                <td>
                                <?php if($row->role_id != 1) : ?>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Option :</div>
                                            <button data-key="<?=encode($row->id); ?>" data-url="<?=base_url('auth/hapus'); ?>" class="dropdown-item show-confirm">
                                                <i class="fas fa-trash fa-sm fa-fw mr-2"></i> Hapus
                                            </button>
                                            
                                        </div>
                                    </div>
                                <?php endif; ?>
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