
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
<?= form_error('surat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<form class="surat" method="post" action="<?=base_url('surat_keluar/save_change'); ?>">
    <div class="row">
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
                            name="kode_surat" 
                            readonly
                            placeholder="Kode Surat" 
                            value="<?= $data_surat->kode_surat; ?>"
                            >
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
                                    required 
                                    placeholder="Nama perusahaan / organisasi" 
                                    value="<?= $data_surat->tujuan; ?>"
                                    >
                            </div>

                            <div class="form-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="perihal" 
                                    name="perihal" 
                                    placeholder="Perihal" 
                                    value="<?= $data_surat->perihal; ?>"
                                    >
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
                                    value="<?= date_indo($data_surat->tanggal_surat); ?>"
                                    >
                            </div>

                            <div class="form-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="operator" 
                                    name="operator" 
                                    placeholder="Operator" 
                                    value="<?= $data_surat->operator; ?>"
                                    >
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?=base_url('surat_keluar/index'); ?>" class="btn btn-default btn-block">
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
            
        </div>        
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Barang terpilih</h6>
                </div>

                <div class="card-body">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Part No</th>
                                <th scope="col">Part Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if(!empty($data)) :
                                foreach ($data as $row) :
                                    $data1 = $this->db->get_where("tbl_barang", ['id_barang' => $row->id_barang])->row();
                            ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data1->id_barang; ?></td>
                                <td><?= $data1->nama_barang; ?></td>
                                <td><span class="badge badge-primary"><?= $row->qty; ?></span></td>
                                <td><?= $data1->note; ?></td> 
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
        <!-- End List Barang -->
       
    </div>
</form>

</div>
<!-- /.container-fluid -->

</div>
