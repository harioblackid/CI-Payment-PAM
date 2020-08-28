<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['data'] = $this->db->get('tbl_barang')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');

    }

    public function edit($id)
    {
        $id = decode($id);
        $data['title'] = 'Ubah Data Barang';
        $data['data'] = $this->db->get_where('tbl_barang', ['id_barang' => $id])->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/edit', $data);
        $this->load->view('templates/footer');        
    }

    public function save()
    {
        $id = $this->input->post('id_barang');
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'note' => $this->input->post('note')
        ];

        $this->db->update('tbl_barang', $data, ['id_barang' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil diubah!</div>');
        redirect('barang');
    }

    public function hapus($id)
    {
        
        $this->db->delete('tbl_barang', ['id_barang' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil dihapus!</div>');
        redirect('barang');
    }

    
}