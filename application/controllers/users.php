<?php

    class Users extends CI_Controller
    {
        public function index()
        {
            if($this->session->userdata('logged_in'))
            {
                $user_id = $this->session->userdata('user_id');
            }
        }

        public function register()
        {
            $this->form_validation->set_rules('nama', 'Name', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
        
            if($this->form_validation->run() == FALSE)
            {
                $data['main_view'] = 'pages/register_view';
                $this->load->view('layouts/main', $data);
            }else
            {
                if($this->User_model->create_user())
                {
                    $this->session->set_flashdata('user_registered', 'User has been registered, please login');
                    redirect('users/login');
                }    
            }
        
        }

        public function login()
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

            if($this->form_validation->run() == FALSE)
            {
                $data['main_view'] = 'pages/login_view';
                $this->load->view('layouts/main', $data);
            } else
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user_id = $this->User_model->login_user($username, $password);

                if($user_id)
                {
                    $user_data = array
                    (
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    );
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('login_success', 'You are now logged in!');
                    redirect("users/display_page_role/" . $user_id . " ");
                    
                }else
                {
                    $this->session->set_flashdata('login_failed', 'Sorry you are not logged in! Your username or password is wrong!');
                    redirect('users/login');
                }

            }

        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('home/index');
        }

        public function display($user_id)
        {
            $data['profile'] = $this->User_model->get_profile($user_id);
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['main_view'] = 'pages/edit_profile_view';
            $this->load->view('layouts/main', $data);
        }

        public function display_page_role($user_id)
        {
            $data['profiles'] =  $this->User_model->get_profile($user_id);
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['user_id'] = $user_id;
            $peran = $this->User_model->get_roles_id($user_id);
            if($peran == 1)
            {
                $id_editor = $this->User_model->get_id_editor($user_id);
                $data['task_pending_payment'] = $this->Task_model->get_task_editor($id_editor, 1);
                $data['task_pending_confirm_pay'] = $this->Task_model->get_task_editor($id_editor, 2);
                $data['task_pending_acceptance'] = $this->Task_model->get_task_editor($id_editor, 3);
                $data['task_assigned'] = $this->Task_model->get_task_editor($id_editor, 4);
                $data['task_rejected'] = $this->Task_model->get_task_editor($id_editor, 5);
                $data['task_confirm_finished'] = $this->Task_model->get_task_editor($id_editor, 7);
                $data['task_finished'] = $this->Task_model->get_task_editor($id_editor, 8);
                $data['main_view'] = "editor/editor_view";
                $this->load->view('layouts/main', $data);
                
            }else if($peran == 2)
            {
                $id_reviewer = $this->User_model->get_id_reviewer($user_id);
                $data['task_pending_acceptance'] = $this->Task_model->get_task_reviewer($id_reviewer, 3);
                $data['task_assigned'] = $this->Task_model->get_task_reviewer($id_reviewer, 4);
                $data['task_pending_finished'] = $this->Task_model->get_task_reviewer($id_reviewer, 6);
                $data['task_confirm_finished'] = $this->Task_model->get_task_reviewer($id_reviewer, 7);
                $data['task_finished'] = $this->Task_model->get_task_reviewer($id_reviewer, 8);
                $data['main_view'] = "reviewer/reviewer_view";
                $this->load->view('layouts/main', $data);
            }
            else if($peran == 3)
            {
                $data['task_pending_payment'] = $this->Task_model->get_task_makelaar(1);
                $data['task_pending_confirm_pay'] = $this->Task_model->get_task_makelaar(2);
                $data['task_pending_acceptance'] = $this->Task_model->get_task_makelaar(3);
                $data['task_assigned'] = $this->Task_model->get_task_makelaar(4);
                $data['task_rejected'] = $this->Task_model->get_task_makelaar(5);
                $data['task_pending_finished'] = $this->Task_model->get_task_makelaar(6);
                $data['task_confirm_finished'] = $this->Task_model->get_task_makelaar(7);
                $data['task_finished'] = $this->Task_model->get_task_makelaar(8);
                $data['main_view'] = "makelaar/makelaar_view";
                $this->load->view('layouts/main', $data);
            }
        }

        public function edit_profile($user_id)
        {
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['error'] = $this->upload->display_errors();
            $data['profile_data'] = $this->User_model->get_profile_info($user_id);

            $this->form_validation->set_rules('nama', 'Name', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
            
            if($this->form_validation->run() == FALSE)
            {
                $data['profile_data'] = $this->User_model->get_profile_info($user_id);
                $data['main_view'] = 'pages/edit_profile_form';
                $this->load->view('layouts/main' , $data);
            }else
            {
                $config['upload_path']          = './uploads/Profile/';
                $config['allowed_types']        = 'jpg|png';
                $config['file_name']            = $user_id;
                $config['max_width']            = '500';
                $config['max_height']           = '500';
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('userfile'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $data['main_view'] = 'pages/edit_profile_form';
                    $this->load->view('layouts/main' , $data);
                }
                    $data = array('upload_data' => $this->upload->data());

                $data1 = array
                (
                    'id' => $this->session->userdata('user_id'),
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username')
                );

                $data2 = array
                (
                    'id_user' => $this->session->userdata('user_id'),
                    'nama' => $this->input->post('nama')
                );

                $peran = $this->User_model->get_roles_id($user_id);
                if($this->User_model->edit_profile_user($user_id, $data1) && $this->User_model->edit_profile_role($user_id, $data2, $peran))
                {
                    $this->session->set_flashdata('profile_updated', 'Your Profile has been updated');
                    redirect("users/display/" . $user_id . " ");
                }
            }
        }

        public function download($file_location)
        {
            $this->load->helper('download');
            force_download(FCPATH. $file_location, null);
        }

        public function display_bank($user_id)
        {
            $data['user_id'] = $user_id;
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['bank_account'] = $this->User_model->get_bank_account($user_id);
            $data['main_view'] = 'reviewer/bank_account_view';
            $this->load->view('layouts/main', $data);
        }

        public function edit_bank($user_id)
        {
            $data['user_id'] = $user_id;
            $data['profile_data'] = $this->User_model->get_profile_info($user_id);
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['bank_account'] = $this->User_model->get_bank_account($user_id);

            $this->form_validation->set_rules('no_rek', 'No Rekening', 'trim|required|min_length[3]');
            if($this->form_validation->run() == FALSE)
            {
                $data['profile_data'] = $this->User_model->get_profile_info($user_id);
                $data['main_view'] = 'reviewer/bank_account_form';
                $this->load->view('layouts/main' , $data);

            }else
            {
                $data1 = array
                (
                    'no_rek' => $this->input->post('no_rek'),
                );

                if($this->User_model->edit_bank_account($user_id, $data1))
                {
                    $this->session->set_flashdata('bank_updated', 'Your Bank Account has been updated');
                    redirect("users/display_bank/" . $user_id . " ");
                }
            }
        }

        public function display_competence($user_id)
        {
            $data['user_id'] = $user_id;
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['competence'] = $this->User_model->get_competence($user_id);
            $data['main_view'] = 'reviewer/competence_view';
            $this->load->view('layouts/main', $data);
        }

        public function edit_competence($user_id)
        {
            $data['user_id'] = $user_id;
            $data['profile_data'] = $this->User_model->get_profile_info($user_id);
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['competence'] = $this->User_model->get_competence($user_id);

            $this->form_validation->set_rules('kompetensi', 'Competence', 'trim|required|min_length[3]');
            if($this->form_validation->run() == FALSE)
            {
                $data['profile_data'] = $this->User_model->get_profile_info($user_id);
                $data['main_view'] = 'reviewer/competence_edit';
                $this->load->view('layouts/main' , $data);

            }else
            {
                $data1 = array
                (
                    'kompetensi' => $this->input->post('kompetensi'),
                );

                if($this->User_model->edit_bank_account($user_id, $data1))
                {
                    $this->session->set_flashdata('competence_updated', 'Your Competence has been updated');
                    redirect("users/display_competence/" . $user_id . " ");
                }
            }
        }

        public function display_funds($user_id)
        {
            $data['user_id'] = $user_id;
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['funds'] = $this->User_model->display_funds($user_id);
            $data['main_view'] = 'reviewer/funds_view';
            $this->load->view('layouts/main', $data);
        }



    }



?>