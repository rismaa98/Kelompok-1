<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email',
            [
                'required' => 'Warning, Tidak boleh kosong : Email',
                'valid_email' => 'Warning, Penulisan email tidak benar / sesuai '
            ]

        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Warning, Tidak boleh kosong : Kata sandi/Password',
        ]);
        $data['judul'] = 'Login Page';
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Page';
            $this->load->view('templates/header', $data);
            $this->load->view('failed_login');
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('user');
                    } else {
                        redirect('guru');
                    }
                } else {
                    $this->session->set_flashdata('notif_login', '<div class="alert alert-danger" role="alert">Gagal melakukan proses autentikasi. Mohon untuk mengisi email & password dengan benar.</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('notif_login', '<div class="alert alert-danger" role="alert">Gagal melakukan proses autentikasi. Mohon untuk aktivasi akun terlebih dahulu</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('notif_login', '<div class="alert alert-danger" role="alert">Gagal melakukan proses autentikasi. Mohon untuk mengisi email & password dengan benar.</div>');
            redirect('auth/login');
        }
    }


    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|trim',
            [
                'required' => 'Warning, Tidak boleh kosong : Email',
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'Warning, Email sudah tersedia di database',
                'required' => 'Warning, Tidak boleh kosong : Email',
                'valid_email' => 'Warning, Penulisan email tidak benar / sesuai '
            ]
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Warning, Tidak boleh kosong : Password',
            'matches' => 'Warning, Password tidak sama/sesuai',
            'min_length' => 'Warning, Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', ['required' => 'Warning, Tidak boleh kosong : Password']);

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Learning Hub";
            $this->session->set_flashdata('regist', '<div class="alert alert-success" role="alert">Gagal melakukan proses autentikasi. Mohon untuk mengisi email & password dengan benar</div>');
            $this->load->view('templates/header', $data);
            $this->load->view('register');
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // siapkan token
            $token = mt_rand(1000, 9999);
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('profile', [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
            ]);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('regist', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di buat,silahkan untuk melakukan aktivasi terlebih dahulu</div>');
            redirect('home/regist');
        }
    }


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'salmanxfxa@gmail.com',
            'smtp_pass' => 'Mhs-ubsi19',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'starttls'  => true,
            'newline'   => "\r\n",
        ];



        $url      = site_url() . '/auth/showverify?email=' . $this->input->post('email');
        $link     = '<a href="' . $url . '"> Click this link Verification </a>';
        $message = '<html><head></head><body>';
        $message .= '<p><b>Dear student,</b></p><br>';
        $message .= '<p><b>Thank you for registering, please enter the following verification code to </b><p>';
        $message .= '<p><b>complete the registration process :</b><p>';
        $message .= '<p>[Code] :' . $token . '</p>';
        $message .= '<p>[Link] :</p>' . $link;
        $message .= '<p><b>Regards,</b><p><br>';
        $message .= '<p><b>Team Learning Hub</b><p>';
        $message .= '</body></html>';

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('jakafitriansyah19@gmail.com', 'Learning Hub : Creative Student');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message($message);
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message($message);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function showverify()
    {
        // $email = $_GET['email'];
        $data['email'] = $_GET['email'];
        $data['judul'] = 'Learning Hub';
        $this->load->view('verify', $data);
    }
    public function prosesverify()
    {
        $email = $this->input->post('email');
        $token = $this->input->post('token');

        $getcode = $this->db->get_where('user_token', ['email' => $email]);
        if ($getcode->num_rows() > 0) {
            if ($token === $getcode->row()->token) {
                $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

                if ($user_token) {
                    if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                        $this->db->set('is_active', 1);
                        $this->db->where('email', $email);
                        $this->db->update('user');

                        $this->db->delete('user_token', ['email' => $email]);

                        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                        redirect('home/regist');
                    } else {
                        $this->db->delete('user', ['email' => $email]);
                        $this->db->delete('user_token', ['email' => $email]);

                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                        redirect('auth/login');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth/login');
            }
        } else {
            redirect('auth/login');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('home');
    }

    public function login()
    {
        $data['judul'] = "Login Page";
        $this->load->view('templates/header', $data);
        $this->load->view('failed_login');
        $this->load->view('login');
        $this->load->view('templates/footer');
    }
    public function registered()
    {
        $data['judul'] = "Daftar Page";
        $this->load->view('templates/header', $data);
        $this->load->view('register');
        $this->load->view('login');
        $this->load->view('templates/footer');
    }
    public function blocked()
    {
        $this->load->view('blocked');
    }


    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}
