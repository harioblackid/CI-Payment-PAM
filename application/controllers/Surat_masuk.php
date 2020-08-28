<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
    public function __construct()
    { 
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Surat Masuk';
        $data['data'] = $this->db->get_where('surat_masuk')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('templates/footer');


    }

    public function hapus($id)
    {
        $this->db->delete('surat_masuk', ['id_surat_masuk' => $id]);
        $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'>Data surat dengan ID : <strong>$id</strong> berhasil dihapus! </div>");
        redirect('surat_masuk');
    }

    public function tambah()
    {
        $key = inbox();
        $data['key'] = $key;
        $data['title'] = 'Tambah Data Surat';

        $data['next_code'] = nextOut();
        $data['data'] = $this->db->query("SELECT * FROM `history_barang_masuk` WHERE id_surat_masuk = '$key'")->result();
        $data['data_barang'] = $this->db->get("tbl_barang")->result();

        $this->form_validation->set_rules('kode_surat', 'Kode', 
            'required|trim|is_unique[surat_masuk.kode_surat]', 
            ['is_unique' => 'Nomor surat_masuk sudah terdaftar!']
        );
        
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
        $this->form_validation->set_rules('tanggal_terima', 'Tanggal Terima', 'required|trim');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat_masuk', 'required|trim');
        
        $this->form_validation->set_rules('perihal', 'Perihal', 'required|trim');

        if($this->form_validation->run() == false) {
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat_masuk/tambah', $data);
            $this->load->view('templates/footer');    
        }
        else 
        {
            $data = [
                "id_surat_masuk" => $this->input->post('id_surat_masuk'),
                "kode_surat" => $this->input->post('kode_surat'),
                "pengirim" => $this->input->post('pengirim'),
                "tanggal_terima" => date('Y-m-d'),
                "tanggal_surat" => $this->input->post('tanggal_surat'),
                
                "perihal" => $this->input->post('perihal')
            ];

            $ids = $this->input->post('id_surat_masuk');
            
            $this->db->insert('surat_masuk', $data);
            // foreach ($data as $key => $value) {
            //     echo $key . " - " . $value . "<br>";
            // }

            $id = $this->input->post('id[]');
            $idbarang = $this->input->post('id_barang[]');
            $qty = $this->input->post('qty[]');

            $cekdata = $this->db->get_where('history_barang_masuk', ['id_surat_masuk' => $ids])->result_array();            

            foreach ($cekdata as $key => $row) {
                //echo "id : " . $id[$key] . " qty =" . $qty[$key] . "<br>";
                $this->db->update('history_barang_masuk', ['qty' => $qty[$key]], ['id' => $id[$key]]);

                //Ambil data Qty dari Table Barang
                $getcount = $this->db->get_where('tbl_barang', ['id_barang' => $idbarang[$key]])->row();
                $setcount = $getcount->qty + $qty[$key];

                //Tambahkan Qty barang ke Table Barang
                $this->db->update('tbl_barang', ['qty' => $setcount], ['id_barang' => $idbarang[$key]]);
                
                 
            }

            $key = $data['kode_surat'];

            $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'>Surat baru berhasil ditambah! dengan kode : <strong>$key</strong></div>");
            redirect("surat_masuk/index");
        }        
    }

    public function edit($id) {

        $id = decode($id);

        $data['key'] = $id;
        $data['title'] = 'Tambah Data Surat';

        $data['data'] = $this->db->query("SELECT * FROM `history_barang_masuk` WHERE id_surat_masuk = '$id'")->result();
        $data['data_surat'] = $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id])->row();
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat_masuk/edit', $data);
        $this->load->view('templates/footer');    
    }

    public function save_change(){
        $id = $this->input->post('id_surat_masuk');
        $data = [
            "kode_surat" => $this->input->post('kode_surat'),
            "pengirim" => $this->input->post('pengirim'),
            "tanggal_terima" => date('Y-m-d'),
            "tanggal_surat" => $this->input->post('tanggal_surat'),
            
            "perihal" => $this->input->post('perihal')
        ];

        $this->db->update('surat_masuk', $data, ['id_surat_masuk' => $id]);
                    
        $key = $data['kode_surat'];

        $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert'>Data surat berhasil diubah! dengan kode : <strong>$key</strong></div>");
        redirect("surat_masuk/index");
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
            redirect("surat_masuk/tambah");
        endif;
    }

    public function add_barang($id)
    {
        $id = decode($id);
        $data = [
            "id" => null,
            "id_barang" => $id,
            "id_surat_masuk" => inbox(),
            "qty" => 0
        ];

        $cek = $this->db->get_where("history_barang_masuk", ['id_barang' => $id, 'id_surat_masuk' => inbox()]);
        if($cek->num_rows() > 0)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Barang sudah tersedia! </div>');
            redirect("surat_masuk/tambah");    
        }
        else
        {
            $this->db->insert('history_barang_masuk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang dengan ID $id ditambah!</div>');
            redirect("surat_masuk/tambah");    
        }
        
    }

    public function remove_barang($id)
    {

        $id = decode($id);

        $this->db->delete('history_barang_masuk', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang berhasil di hapus</div>');
        redirect("surat_masuk/tambah");                
    }
}