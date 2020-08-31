<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('simulasi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header font-weight-bold text-primary">
                    Keluhan Pelanggan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="awal">Stan Awal</label>
                                <input type="number" name="awal" id="awal" class="form-control" required>
                            </div>    
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="akhir">Stan Akhir</label>
                                <input type="number" name="akhir" id="akhir" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="pakai">Pakai</label>
                        <input type="number" name="pakai" id="pakai" class="form-control" value="0" readonly>
                    </div>

                    <div class="form-group">
                        <label for="perihal">Tarif / Golongan</label>
                        <select name="perihal" id="perihal" class="form-control" required>
                            <option value=""> -- Pilih Perihal -- </option>
                            <option value="Air Kecil">Golongan A</option>
                            <option value="Air Keruh">Golongan B</option>
                                
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="perihal">Ukuran Meter</label>
                        <select name="perihal" id="perihal" class="form-control" required>
                            <option value=""> -- Pilih Perihal -- </option>
                            <option value="Air Kecil">3 - 1</option>
                            <option value="Air Keruh">2 - 1</option>
                                
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary btn-sm btn-block calculate-simulation">
                        <i class="fas fa-calculator"></i> Kalkulasi
                    </button>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- Modal -->