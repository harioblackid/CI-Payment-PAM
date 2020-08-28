<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <!-- Notifikasi -->

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>        
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Note</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $row->id_barang; ?></td>
                                <td><?= $row->nama_barang; ?></td>
                                <td><span class="badge badge-primary"><?= $row->qty; ?></span></td>
                                <td><?= $row->note; ?></td>
                                <td>

                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Option :</div>
                                            <?php if($row->qty == 0) : ?>
                                            <button data-key="<?=$row->id_barang; ?>" data-url="<?=base_url('barang/hapus'); ?>" 
                                                class="dropdown-item show-confirm">
                                                <i class="fas fa-trash fa-sm fa-fw mr-2 "></i> Hapus
                                            </button>
                                            
                                            <?php endif; ?>

                                            <a href="<?=base_url('barang/edit/').encode($row->id_barang); ?>" 
                                               class="dropdown-item ">
                                               <i class="fas fa-edit fa-sm fa-fw mr-2"></i> Edit
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