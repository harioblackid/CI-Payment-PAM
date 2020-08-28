
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<?= form_error('surat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<form class="surat" method="post" action="<?=base_url('surat_masuk/tambah'); ?>">
    <div class="row mb-2">
        <div class="col-lg-12">
            <!-- Notifikasi -->

            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            
            

            <div class="card">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id_surat_masuk" value="<?= $key; ?>">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="kode_surat" 
                            name="kode_surat"
                            placeholder="Kode Surat" 
                            value="<?= set_value('kode_surat'); ?>"
                            >
                        <?= form_error('kode_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                                <label for="tanggal_surat"><small>Tanggal Surat</small></label>
                                <input 
                                    type="date" 
                                    class="form-control" 
                                    id="tanggal_surat" 
                                    name="tanggal_surat" 
                                    placeholder="Tanggal Surat" 
                                    value="<?= set_value('tanggal_surat'); ?>"
                                    >
                                <?= form_error('tanggal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="pengirim" 
                                    name="pengirim" 
                                    placeholder="Pengirim" 
                                    value="<?= set_value('pengirim'); ?>"
                                    >
                                <?= form_error('pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input 
                                    type="perihal" 
                                    class="form-control" 
                                    id="perihal" 
                                    name="perihal" 
                                    placeholder="Perihal" 
                                    value="<?= set_value('perihal'); ?>"
                                    >
                                <?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label><small>Tanggal Terima</small></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="tanggal_terima" 
                                    name="tanggal_terima" 
                                    readonly 
                                    value="<?= date_indo(date('Y-m-d')); ?>"
                                    >
                                <?= form_error('tanggal_terima', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            

                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php 
                    $key = inbox();
                    $stmt = $this->db->query("SELECT id_surat_masuk FROM history_barang_masuk WHERE id_surat_masuk = '$key'")->result();
                    $cek = (is_object($stmt) ? 0 : count($stmt));

                    $disabled = ($cek > 0 ? "" : "disabled")
                    ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?=base_url('surat_masuk/index'); ?>" class="btn btn-default btn-block">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>        
                        </div>
                        <div class="col-lg-8">
                            <button class="btn btn-success btn-block" <?php echo $disabled; ?>>
                                <i class="fas fa-save"></i> Simpan
                            </button>        
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>        
    </div>

    <div class="row mb-4">
        <div class="col-lg-6">
            
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Barang terpilih</h6>
                </div>

                <div class="card-body">
                    <?php
                        //Hitung Jumlah baris pada tabel BARANG
                        $count = count($data);
                    ?>
                    <!-- <button type="button" class="btn btn-danger btn-sm mb-2" data-toggle="modal" data-target="#newModal">
                        <i class="fa fa-list-ul"></i> Daftar Stok Barang <span class="badge badge-light"><?= $count; ?></span>
                    </button>
 -->
                    <table class="table table-striped" id="dataTable">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Quantity</th>
                        </tr>
                        <?php
                            $no = 1;
                            if(!empty($data)) :
                                foreach ($data as $row) :
                                    $data1 = $this->db->get_where("tbl_barang", ['id_barang' => $row->id_barang])->row();
                        ?>
                        <tr>
                            <td>
                                <a href="<?=base_url('surat_masuk/remove_barang/').encode($row->id); ?>" class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i>
                                </a>
                                <input type="hidden" name="id[]" value="<?= $row->id; ?>">
                                <input type="hidden" name="id_barang[]" value="<?=$data1->id_barang; ?>">
                            </td>
                            <td><?= $data1->id_barang; ?></td>
                            <td><?= $data1->nama_barang; ?></td>
                            <td>
                                <input type="number" name="qty[]" class="form-control input-sm" required min="1">
                            </td>
                        </tr>
                        <?php
                                endforeach;
                            else : 
                        ?>
                        <tr>
                            <td colspan="5" align="center"><span class="badge badge-danger">No added data anyway!</span></td>
                        </tr>
                    <?php endif ; ?>
                    </table>
                    
                </div>
            </div>

        </div>
        <!-- End List Barang -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Stok Barang</h6>
                    
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" data-target="#newModal" href="" role="button" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-plus fa-sm fa-fw text-blue-400"></i>
                        </a>
                        
                    </div>
                </div>
                
                <?php

                //Get Next ID Barang
                $query = $this->db->query("SELECT id_barang FROM `tbl_barang` ORDER BY id_barang DESC LIMIT 0,1")->row();
                if(!is_object($query))
                {
                    $id = 1;
                }
                else{
                    $id = $query->id_barang + 1;    
                }
                
                ?>
                <div class="card-body">
                    <table class="table table-hover table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Part No</th>
                                <th scope="col">Part Name</th>
                                <th scope="col">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        if(!empty($data_barang)) :
                            foreach ($data_barang as $row) :

                        ?>
                        <tr>
                            <td>
                                <a href="<?= base_url('surat_masuk/add_barang/') . encode($row->id_barang); ?>" class="btn btn-danger btn-sm"><i class="fa fa fa-plus-square"></i></a>
                            </td>
                            <td><?= $row->id_barang; ?></td>
                            <td><?= $row->nama_barang; ?></td>
                            <td><span class="badge badge-primary"><?= $row->qty; ?></span></td>
                        </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                        
                        </tbody>
                    </table>

                    
                </div>
                
            </div>            
        </div>
    </div>
</form>

</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuLabel">New Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="<?=base_url('surat_masuk/insert_barang'); ?>">                            
            <div class="modal-body">
          
                <!-- Field Form -->
                <div class="form-group">
                    <label><small>Part No</small></label>
                    <input class="form-control" type="text" name="id_barang" readonly value="<?=$id; ?>">

                </div>

                <div class="form-group">
                    <input type="text" name="nama_barang" class="form-control" placeholder="Part Name" 
                    value="" required>
                    
                </div>

                <div class="form-group">
                    <input type="text" name="note" class="form-control" placeholder="Note">
                </div>
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit" value="add_barang">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>