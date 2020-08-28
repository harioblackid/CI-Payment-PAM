
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<?= form_error('surat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<form class="surat" method="post" action="<?=base_url('surat_keluar/tambah'); ?>">
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
                        <input type="hidden" name="id_surat_keluar" value="<?= $key; ?>">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="kode_surat" 
                            readonly
                            name="kode_surat" 
                            placeholder="Kode Surat" 
                            value="<?= nextOut(); ?>/MJA-MKT/<?= get_month4(date('m')); ?>/<?= date('Y'); ?>"
                            >
                        <?= form_error('kode_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label><small>Tujuan</small></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="tujuan" 
                                    name="tujuan" 
                                    placeholder="Nama perusahaan / organisasi" 
                                    value="<?= set_value('Tujuan'); ?>"
                                    >
                                <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input 
                                    type="text" 
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
                                <label><small>Tanggal Surat</small></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="tanggal_surat" 
                                    name="tanggal_surat" 
                                    readonly 
                                    value="<?= date_indo(date('Y-m-d')); ?>"
                                    >
                                <?= form_error('tanggal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="operator" 
                                    name="operator" 
                                    placeholder="Driver" 
                                    value="<?= set_value('operator'); ?>"
                                    >
                                <?= form_error('operator', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            

                            
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php 
                    
                    $cek = (is_object($stmt) ? 0 : count($stmt));

                    $disabled = ($cek > 0 ? "" : "disabled")
                    ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?=base_url('surat_keluar/index'); ?>" class="btn btn-default btn-block">
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
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Quantity</th>
                        </tr>
                        <?php
                            $no = 1;
                            if(!empty($data)) :
                                foreach ($data as $row) :
                                    $data1 = $this->db->get_where("tbl_barang", ['id_barang' => $row->id_barang])->row();
                                    $max = $data1->qty;
                        ?>
                        <tr>
                            <td>
                                <a href="<?=base_url('surat_keluar/remove_barang/').encode($row->id); ?>" class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i>
                                </a>
                                <input type="hidden" name="id[]" value="<?= $row->id; ?>">
                                <input type="hidden" name="id_barang[]" value="<?=$data1->id_barang; ?>">
                            </td>
                            <td><?= $data1->id_barang; ?></td>
                            <td><?= $data1->nama_barang; ?></td>
                            <td>
                                <input type="number" name="qty[]" class="form-control input-sm" required min="1" max="<?=$max; ?>">
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
                    
                </div>
                
                <?php

                //Get Next ID Barang
                $query = $this->db->query("SELECT id_barang FROM `tbl_barang` ORDER BY id_barang DESC LIMIT 0,1")->row();
                if(empty($query))
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
                                <a href="<?= base_url('surat_keluar/add_barang/') . encode($row->id_barang); ?>" class="btn btn-danger btn-sm"><i class="fa fa fa-plus-square"></i></a>
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