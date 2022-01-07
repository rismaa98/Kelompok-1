<?php

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('M_Guru', 'Systemguru');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/templates/sidebar', $data);
        $this->load->view('guru/templates/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('guru/templates/footer');
    }
    public function c_content($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('sub_title', 'Sub Title', 'required|trim');
        $this->form_validation->set_rules('content', 'Content', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Materi';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['content'] = $this->Systemguru->getcontent($id);
            $data['show'] = $this->Systemguru->getclass();

            $this->load->view('guru/templates/header', $data);
            $this->load->view('guru/templates/sidebar', $data);
            $this->load->view('guru/templates/topbar', $data);
            $this->load->view('guru/content', $data);
            $this->load->view('guru/templates/footer');
        } else {
            $id = $this->input->post('id');
            $this->Systemguru->save($id);
            $this->session->set_flashdata('conten_info', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('guru/content/' . $id);
        }
    }
    public function content($id)
    {

        $data['title'] = 'Materi';
        $data['content'] = $this->Systemguru->getcontent($id);
        $data['show'] = $this->Systemguru->getclass();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/templates/sidebar', $data);
        $this->load->view('guru/templates/topbar', $data);
        $this->load->view('guru/content', $data);
        $this->load->view('guru/templates/footer');
    }

    public function data_user($id)
    {
        $data['title'] = 'Data User';
        $data['content'] = $this->Systemguru->getuser($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/templates/sidebar',);
        $this->load->view('guru/templates/topbar',);
        $this->load->view('guru/data_user', $data);
        $this->load->view('guru/templates/footer');
    }
    public function task($id)
    {
        $data['title'] = 'Data Tugas';
        $data['content'] = $this->Systemguru->gettask($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/templates/sidebar',);
        $this->load->view('guru/templates/topbar',);
        $this->load->view('guru/task', $data);
        $this->load->view('guru/templates/footer');
    }

    public function form_task($id_task)
    {
        $data['title'] = 'Edit Tugas';
        $data['ambil'] = $this->Systemguru->gettask_id($id_task);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/templates/sidebar', $data);
        $this->load->view('guru/templates/topbar', $data);
        $this->load->view('guru/form_task', $data);
        $this->load->view('guru/templates/footer');
    }

    public function edit_task()
    {
        $this->form_validation->set_rules('name_task', 'Deskripsi Tugas', 'required|trim');
        $this->form_validation->set_rules('start_task', 'Tidak boleh kosong', 'required');
        $this->form_validation->set_rules('end_task', 'Tidak boleh kosong', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('guru/templates/header', $data);
            $this->load->view('guru/templates/sidebar', $data);
            $this->load->view('guru/templates/topbar', $data);
            $this->load->view('guru/form_task', $data);
            $this->load->view('guru/templates/footer');
        } else {
            $id = $this->input->post('id');
            $ambil = $this->input->post('id_task');
            $this->Systemguru->update_task($ambil);
            redirect('guru/task/' . $id);
        }
    }

    public function poin($id)
    {
        $data['title'] = 'Data Tugas';
        $data['content'] = $this->Systemguru->getpoin($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/templates/sidebar',);
        $this->load->view('guru/templates/topbar',);
        $this->load->view('guru/poin', $data);
        $this->load->view('guru/templates/footer');
    }

    public function form_poin($id_completed_task)
    {
        $data['title'] = 'Data Tugas';
        $data['content'] = $this->Systemguru->getpoin_id($id_completed_task);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/templates/sidebar',);
        $this->load->view('guru/templates/topbar',);
        $this->load->view('guru/form_poin', $data);
        $this->load->view('guru/templates/footer');
    }

    public function poin_add()
    {

        $this->form_validation->set_rules('poin', 'Nilai Siswa', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Tugas';

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('guru/templates/header', $data);
            $this->load->view('guru/templates/sidebar',);
            $this->load->view('guru/templates/topbar',);
            $this->load->view('guru/poin', $data);
            $this->load->view('guru/templates/footer');
        } else {
            $id = $this->input->post('id');
            $id_completed_task = $this->input->post('id_completed_task');
            $this->Systemguru->update_poin($id_completed_task);
            redirect('guru/poin/' . $id);
        }
    }

    public function lulus($id)
    {
        $data['title'] = 'Data Tugas';
        $data['content'] = $this->Systemguru->getpoin($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/templates/sidebar',);
        $this->load->view('guru/templates/topbar',);
        $this->load->view('guru/lulus', $data);
        $this->load->view('guru/templates/footer');
    }
}
