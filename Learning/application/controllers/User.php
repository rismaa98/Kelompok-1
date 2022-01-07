<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User', 'Systemuser');
        $this->load->model('M_admin', 'Systemadmin');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Learning Hub';

        $data['content'] = $this->Systemuser->getcontent();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/templates/header.php', $data);
        $this->load->view('user/index.php', $data);
        $this->load->view('user/templates/footer.php');
    }

    public function theory($id_subject_matter)
    {
        $data['title'] = 'Materi | Learning Hub';
        $data['content'] = $this->Systemuser->get_theory($id_subject_matter);
        $data['complete'] = $this->Systemuser->complete_task($id_subject_matter);
        $data['user'] =    $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/templates/header.php', $data);
        $this->load->view('user/theory.php');
        $this->load->view('user/templates/footer.php');
    }
    public function sub_theory($name_class)
    {
        $data['title'] = 'Kelas | Learning Hub';
        $data['content'] = $this->Systemuser->get_subtheory($name_class);


        $data['user'] =    $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/templates/header.php', $data);
        $this->load->view('user/sub_theory.php');
        $this->load->view('user/templates/footer.php');
    }
    public function set_akun($email, $id)
    {

        $data['title'] = 'Profil | Learning';
        $data['content'] = $this->Systemuser->get_profile($email);
        $data['task'] = $this->Systemuser->get_task_user($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('date_birth', 'Data Of Birht', 'required|trim');
        $this->form_validation->set_rules('jk', 'Gender', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/set_akun', $data);
            $this->load->view('user/templates/footer');
        } else {
            $id = $this->input->post('id');
            $this->Systemuser->update_user($id);

            $this->session->set_flashdata('n_edit', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user/set_akun/'  . $email  . '/' . $id);
        }
    }
    public function profile($id)
    {
        $data['title'] = 'Learning Hub';
        $data['content'] = $this->Systemuser->get_profile($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/templates/header.php', $data);
        $this->load->view('user/profile.php');
        $this->load->view('user/templates/footer.php');
    }

    public function upload_task($id_subject_matter)
    {


        $data['title'] = 'Learning Hub';
        $data['content'] = $this->Systemuser->get_theory($id_subject_matter);
        $data['user'] =    $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('link', 'Link Tugas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates/header.php', $data);
            $this->load->view('user/theory.php');
            $this->load->view('user/templates/footer.php');
        } else {

            $this->Systemuser->save_task($id_subject_matter);
            redirect('user/theory/' . $id_subject_matter);
        }
    }

    public function c_edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('date_birth', 'Data Of Birht', 'required|trim');
        $this->form_validation->set_rules('jk', 'Gender', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('user/templates/footer');
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/images/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->Systemuser->update_user($id);

            $this->db->set('name', $name, 'email', $email);
            $this->db->where('id', $data['id']);
            $this->db->update('user');

            $this->session->set_flashdata('n_edit', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user/set_akun/' . $email  . '/' . $id);
        }
    }


    public function change_password()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/change_password', $data);
            $this->load->view('user/templates/footer');
        } else {
            $email = $this->input->post('email');
            $id = $this->input->post('id');
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/set_akun/' . $email  . '/' . $id);
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/change_password');
                } else {
                    // password sudah ok

                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $id = $this->input->post('id');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/set_akun/' . $email  . '/' . $id);
                }
            }
        }
    }
}
