<!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i><?= company()->name; ?>
          <small class="float-right">Tanggal : <?= date_indo($data_surat->tanggal_surat); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

    <div class="row invoice-info">

      <div class="col-sm-4 invoice-col">
        Dari
        <address>
          <strong><?= company()->name; ?></strong><br>
          Jl. Kertabumi No.62, Kec. Karawang Barat<br>
          Kabupaten Karawang, Jawa Barat 41311<br>
          Phone: (0267) 405312<br>
          Email: <?= $this->session->email; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Untuk
        <address>
          <strong><?=$data_surat->tujuan; ?></strong><br>
          Perihal : <?=$data_surat->perihal; ?><br>
          
        </address>
      </div>
      <!-- /.col -->
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-sm-12 invoice-col">
        <center><h3><u> Surat Jalan</h3></u></center>
        
        <center><b>Nomor Surat : </b><?=$data_surat->kode_surat; ?></center><br>
      </div>      
    </div>

    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Qty</th>
              <th scope="col">Part No</th>
              <th scope="col">Part Name</th>
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
              <td><?= $row->qty; ?></td>
              <td><?= $data1->id_barang; ?></td>
              <td><?= $data1->nama_barang; ?></td>
              <td><?= $data1->note; ?></td> 
            </tr>
            <?php 
                endforeach; 
                endif;
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row invoice-info">
      <!-- accepted payments column -->
      <div class="col-4 invoice-col">
        <p class="lead">&nbsp;</p>

          Penerima
          <address>
            <p class="mb-4"><strong><?= $data_surat->tujuan; ?></strong></p><br>
            (...................................)<br>
            Lembar 1 & 2 untuk Office
          </address>
      </div>

      <div class="col-4 invoice-col">
        <p class="lead">&nbsp;</p>

          Mengetahui
          <address>
            <p class="mb-4">&nbsp;</p><br>
            <strong>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</strong><br>
            Lembar 3 untuk security 
          </address>
      </div>
      <!-- /.col -->
      <div class="col-4 invoice-col">
        <p class="lead">Karawang, <?= date_indo(date('Y-m-d')) ?></p>

          Hormat Kami
          <address>
            <p class="mb-4"><strong><?= company()->name; ?></strong></p><br>
            (<?= $data_surat->operator; ?>)<br>
            Lembar 4 & 5 untuk penerima
          </address>
      </div>
      <!-- /.col -->
    </div>