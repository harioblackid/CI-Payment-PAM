<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Info Tagihan';
        //$data['data'] = $this->db->get_where('surat_keluar', ['arsip' => 1])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/footer');

    }

    public function keluhan()
    {
        $data['title'] = 'Info Keluhan';
        //$data['data'] = $this->db->get_where('surat_keluar', ['arsip' => 1])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/keluhan', $data);
        $this->load->view('templates/footer');

    }

    public function simulasi(){
        $data['title'] = 'Simulasi Tagihan';
        //$data['data'] = $this->db->get_where('surat_keluar', ['arsip' => 1])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/simulasi', $data);
        $this->load->view('templates/footer');
    }

    public function register(){
        $data['title'] = 'Simulasi Tagihan';
        //$data['data'] = $this->db->get_where('surat_keluar', ['arsip' => 1])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/register', $data);
        $this->load->view('templates/footer');
    }

    public function profile(){
        $data['title'] = 'Simulasi Tagihan';
        //$data['data'] = $this->db->get_where('surat_keluar', ['arsip' => 1])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/company_profile', $data);
        $this->load->view('templates/footer');
    }

    public function rincian_tagihan(){
        $data['title'] = 'Info Tagihan';
        //$data['data'] = $this->db->get_where('surat_keluar', ['arsip' => 1])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/rincian_tagihan', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->update('surat_keluar', ['arsip' => 0], ['id_surat_keluar' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Arsip berhasil dikembalikan!</div>');
        redirect('arsip');        
    }

    public function cetak($id)
    {
        $id = decode($id);

        $data['key'] = $id;
        $data['title'] = 'Print - ' . $id;

        $data['data'] = $this->db->query("SELECT * FROM `history_barang_keluar` WHERE id_surat_keluar = '$id'")->result();
        $data['data_surat'] = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row();
        
        $this->load->view('templates/print_header', $data);
        $this->load->view('surat_keluar/print', $data);
        $this->load->view('templates/print_footer'); 
    }

}
