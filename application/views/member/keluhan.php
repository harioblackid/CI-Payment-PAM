<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('keluhan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <form action="" method="post" class="keluhan">
            <div class="card">
                <div class="card-header font-weight-bold text-primary">
                    Keluhan Pelanggan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Pelapor</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= user()->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="text" name="telp" id="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi Pelapor</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <select name="perihal" id="perihal" class="form-control" required>
                            <option value=""> -- Pilih Perihal -- </option>
                            <option value="Air Kecil">Air Kecil</option>
                            <option value="Air Keruh">Air Keruh</option>
                            <option value="Saluran Mampet">Saluran Mampet</option>
                                
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="masalah">Rincian Masalah</label>
                        <textarea name="masalah" id="masalah" cols="8" rows="5" class="form-control">

                        </textarea>
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