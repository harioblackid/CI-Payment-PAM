<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Surat Keluar';
        $data['data'] = $this->db->get_where('surat_keluar', ['arsip' => 0])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_keluar/index', $data);
        $this->load->view('templates/footer');

    }

    public function hapus($id)
    {
        $this->db->delete('surat_keluar', ['id_surat_keluar' => $id]);
        $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'>Data surat dengan ID : <strong>$id</strong> berhasil dihapus! </div>");
        redirect('surat_keluar');
    }

    public function tambah()
    {
        $key = outbox();

        $data['key'] = $key;
        $data['title'] = 'Tambah Surat Keluar';

        $data['data'] = $this->db->query("SELECT * FROM `history_barang_keluar` WHERE id_surat_keluar = '$key'")->result();
        $data['data_barang'] = $this->db->query("SELECT * FROM `tbl_barang` WHERE qty > 0")->result();
        $data['stmt'] = $this->db->query("SELECT id_surat_keluar FROM history_barang_keluar WHERE id_surat_keluar = '$key'")->result();

        $this->form_validation->set_rules('kode_surat', 'Kode', 
            'required|trim|is_unique[surat_keluar.kode_surat]', 
            ['is_unique' => 'Nomor Surat Keluar sudah terdaftar!']
        );
        
        $this->form_validation->set_rules('tujuan', 'Tanggal Surat_masuk', 'required|trim');
        $this->form_validation->set_rules('perihal', 'Pengirim', 'required|trim');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required|trim');
        $this->form_validation->set_rules('operator', 'NIP', 'required|trim');
        
        if($this->form_validation->run() == false) {
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_keluar/tambah', $data);
            $this->load->view('templates/footer');    
        }
        else 
        {
            $data = [
                "id_surat_keluar" => $this->input->post('id_surat_keluar'),
                "kode_surat" => $this->input->post('kode_surat'),
                "tujuan" => $this->input->post('tujuan'),
                "perihal" => $this->input->post('perihal'),
                "tanggal_surat" => date('Y-m-d'),
                "operator" => $this->input->post('operator'),
                "arsip" => 0,
            ];

            $ids = $data['id_surat_keluar'];
            
            $this->db->insert('surat_keluar', $data);
            // foreach ($data as $key => $value) {
            //     echo $key . " - " . $value . "<br>";
            // }

            $id = $this->input->post('id[]');
            $idbarang = $this->input->post('id_barang[]');
            $qty = $this->input->post('qty[]');

            $cekdata = $this->db->get_where('history_barang_keluar', ['id_surat_keluar' => $ids])->result_array();            

            foreach ($cekdata as $key => $row) { 
                //echo "id : " . $id[$key] . " qty =" . $qty[$key] . "<br>";
                $this->db->update('history_barang_keluar', ['qty' => $qty[$key]], ['id' => $id[$key]]);

                //Ambil data Qty dari Table Barang
                $getcount = $this->db->get_where('tbl_barang', ['id_barang' => $idbarang[$key]])->row();
                $setcount = $getcount->qty - $qty[$key];

                //Tambahkan Qty barang ke Table Barang
                $this->db->update('tbl_barang', ['qty' => $setcount], ['id_barang' => $idbarang[$key]]);
            }

            $key = $data['kode_surat'];

            $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'>Surat baru berhasil ditambah! dengan kode : <strong>$key</strong></div>");
            redirect("surat_keluar/index");
        }        
    }

    public function edit($id) {

        $id = decode($id);

        $data['key'] = $id;
        $data['title'] = 'Ubah Surat Keluar';

        $data['data'] = $this->db->query("SELECT * FROM `history_barang_keluar` WHERE id_surat_keluar = '$id'")->result();
        $data['data_surat'] = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row();
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_keluar/edit', $data);
        $this->load->view('templates/footer');    
    }

    public function save_change(){
        $id = $this->input->post('id_surat_keluar');
        $data = [
                "id_surat_keluar" => $this->input->post('id_surat_keluar'),
                "kode_surat" => $this->input->post('kode_surat'),
                "tujuan" => $this->input->post('tujuan'),
                "tanggal_surat" => date('Y-m-d'),
                "operator" => $this->input->post('operator'),
                "arsip" => 0,
            ];

        $this->db->update('surat_keluar', $data, ['id_surat_keluar' => $id]);
                    
        $key = $data['kode_surat'];

        $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'>Data surat berhasil diubah! dengan kode : <strong>$key</strong></div>");
        redirect("surat_keluar/index");
    }

    public function insert_barang()
    {
        $data = [
            'id_barang' => $this->input->post('id_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'qty' => 0,
            'note' => $this->input->post('note')
        ];

        // foreach ($data as $key => $value) {
        //     echo $key . " - " . $value . "<br>";
        // }

        if($this->db->insert('tbl_barang', $data)) :
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang baru berhasil ditambah!</div>');
            redirect("surat_keluar/tambah");
        endif;
    }

    public function add_barang($id)
    {
        $id = decode($id);
        $data = [
            "id" => null,
            "id_barang" => $id,
            "id_surat_keluar" => outbox(),
            "qty" => 0
        ];

        $cek = $this->db->get_where("history_barang_keluar", ['id_barang' => $id, 'id_surat_keluar' => outbox()]);
        if($cek->num_rows() > 0)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Barang sudah tersedia! </div>');
            redirect("surat_keluar/tambah");    
        }
        else
        {
            $this->db->insert('history_barang_keluar', $data);
            $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'>Barang dengan ID $id ditambah!</div>");
            redirect("surat_keluar/tambah");    
        }
        
    }

    public function remove_barang($id)
    {

        $id = decode($id);

        $this->db->delete('history_barang_keluar', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang berhasil di hapus</div>');
        redirect("surat_keluar/tambah");                
    }

    public function cetak($id)
    {
        $id = decode($id);

        $data['key'] = $id;
        $data['title'] = 'print - ' . $id;

        //Update Arsip
        $this->db->update("surat_keluar", ['arsip' => 1], ['id_surat_keluar' => $id]);
        
        $data['data'] = $this->db->query("SELECT * FROM `history_barang_keluar` WHERE id_surat_keluar = '$id'")->result();
        $data['data_surat'] = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row();
        
        $this->load->view('templates/print_header', $data);
        $this->load->view('surat_keluar/print', $data);
        $this->load->view('templates/print_footer'); 
    }
}