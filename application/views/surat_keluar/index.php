<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('surat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header ">
                    <a href="<?=base_url('surat_keluar/tambah'); ?>" class="btn btn-primary"> 
                    <i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $row->kode_surat; ?></td>
                                <td><?= $row->perihal; ?></td>
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
                                            <button data-key="<?=$row->id_surat_keluar; ?>" data-url="<?=base_url('surat_keluar/hapus/').$row->id_surat_keluar; ?>" class="dropdown-item show-confirm">
                                                <i class="fas fa-trash fa-sm fa-fw mr-2"></i> Hapus
                                            </button>
                                            <a href="<?=base_url('surat_keluar/edit/').encode($row->id_surat_keluar); ?>" 
                                               class="dropdown-item ">
                                               <i class="fas fa-edit fa-sm fa-fw mr-2"></i> Edit
                                            </a>

                                            <button data-key="<?= encode($row->id_surat_keluar); ?>" data-url="<?=base_url('surat_keluar/cetak'); ?>" class="dropdown-item print-confirm">
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