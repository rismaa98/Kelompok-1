<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('M_Admin', 'Systemadmin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function content()
    {
        $data['title'] = 'Materi';
        $data['content'] = $this->Systemadmin->getcontent();
        $data['show'] = $this->Systemadmin->getclass();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/content', $data);
        $this->load->view('admin/templates/footer');
    }
    public function sertifikat()
    {
    $data['title'] = 'Sertifikat';
    $data['a'] = $this->Systemadmin->getsertifikat();


    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar',);
    $this->load->view('admin/templates/topbar',);
    $this->load->view('admin/sertifikat', $data);
    $this->load->view('admin/templates/footer');
    }
    public function c_content()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('sub_title', 'Sub Title', 'required|trim');
        $this->form_validation->set_rules('content', 'Content', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Materi';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['content'] = $this->Systemadmin->getcontent();
            $data['show'] = $this->Systemadmin->getclass();

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/content', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $id = $this->input->post('id');
            $this->Systemadmin->save($id);
            $this->session->set_flashdata('conten_info', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('admin/content');
        }
    }

    public function del_content($id_subject_matter)
    {
        $this->Systemadmin->del_content($id_subject_matter);
        $this->Systemadmin->del_task($id_subject_matter);
        redirect('admin/content');
    }

    public function push($id_subject_matter, $id)
    {
        $data = [
            'id_subject_matter' => $id_subject_matter,
        ];

        $this->db->update('class', $data, ['id_user' => $id]);
        $this->db->update('completed_task', $data, ['id_user' => $id]);
        $this->db->update('task_user', $data, ['id_user' => $id]);

        echo "sukses";
    }
    public function study()
    {
        $data['title'] = 'Class';
        $data['ambil'] = $this->Systemadmin->getclass();
        $data['content'] = $this->Systemadmin->getuser();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/study', $data);
        $this->load->view('admin/templates/footer');
    }

    public function data_user()
    {
        $data['title'] = 'Data User';
        $data['content'] = $this->Systemadmin->getuser();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',);
        $this->load->view('admin/templates/topbar',);
        $this->load->view('admin/data_user', $data);
        $this->load->view('admin/templates/footer');
    }
    public function task()
    {
        $data['title'] = 'Data Tugas';
        $data['content'] = $this->Systemadmin->gettask();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',);
        $this->load->view('admin/templates/topbar',);
        $this->load->view('admin/task', $data);
        $this->load->view('admin/templates/footer');
    }

    public function class()
    {
        $this->form_validation->set_rules('class', "Kelas", 'required');
        $this->form_validation->set_rules('deskripsi', "Deskripsi", 'required');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Class';
            $data['content'] = $this->Systemadmin->getstudy();
            $data['ambil'] = $this->Systemadmin->getclass();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/study', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $id = $this->input->post('id');
            $this->Systemadmin->save_class($id);
            redirect('admin/study');
        }
    }

    public function form_kategori($id)
    {
        $data['title'] = 'Edit Kategori';
        $data['ambil'] = $this->Systemadmin->get_kategori_id($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/form_kategori', $data);
        $this->load->view('admin/templates/footer');
    }

    public function form_task($id_task)
    {
        $data['title'] = 'Edit Tugas';
        $data['ambil'] = $this->Systemadmin->gettask_id($id_task);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/form_task', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit_kategori()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Materi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/form_kategori', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $ambil = $this->input->post('id_kategori');
            $this->Systemadmin->update_kategori($ambil);
            redirect('admin/study');
        }
    }
    public function edit_task()
    {
        $this->form_validation->set_rules('name_task', 'Deskripsi Tugas', 'required|trim');
        $this->form_validation->set_rules('start_task', 'Tidak boleh kosong', 'required');
        $this->form_validation->set_rules('end_task', 'Tidak boleh kosong', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/form_task', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $ambil = $this->input->post('id_task');
            $this->Systemadmin->update_task($ambil);
            redirect('admin/task');
        }
    }


    function upload_image()
    {
        if (isset($_FILES["image"]["name"])) {
            $config['upload_path'] = './assets/images/materi/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/materi/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './assets/images/materi/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'assets/images/materi' . $data['file_name'];
            }
        }
    }

    function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('admin/templates/footer');
    }

    public function role_add()
    {
        # code...
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('admin/templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
}
