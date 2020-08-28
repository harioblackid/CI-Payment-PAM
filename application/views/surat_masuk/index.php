<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header ">
                    <a href="<?=base_url('surat_masuk/tambah'); ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Pengirim</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $row->kode_surat; ?></td>
                                <td>
                                    <strong><?= $row->pengirim; ?></strong><br>
                                    <small>
                                        <?= $row->perihal; ?><br>
                                        Pada Tanggal : <?= date_indo($row->tanggal_surat); ?>
                                    </small>        
                                </td>
                                <td><?= date_indo($row->tanggal_terima); ?>
                                    
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Option :</div>
                                            <button data-key="<?=$row->id_surat_masuk; ?>" data-url="<?=base_url('surat_masuk/hapus'); ?>" class="dropdown-item show-confirm">
                                                <i class="fas fa-trash fa-sm fa-fw mr-2"></i> Hapus
                                            </button>
                                            
                                            <a href="<?=base_url('surat_masuk/edit/').encode($row->id_surat_masuk); ?>" 
                                               class="dropdown-item ">
                                               <i class="fa fa-edit fa-sm fa-fw mr-2"></i> Edit
                                            </a>
                                            
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