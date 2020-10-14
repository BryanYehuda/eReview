<?php

    class Editor extends CI_Controller
    {

        public function index()
        {
            if($this->session->userdata('logged_in'))
            {
                $user_id = $this->session->userdata('user_id');
            }
        }

        public function create($user_id)
        {
            $user_id = $this->session->userdata('user_id');
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['error'] = $this->upload->display_errors();
            $data['reviewer'] = $this->Task_model->get_all_reviewer();
            $data['profile_data'] = $this->User_model->get_profile_info($user_id);
            $id_editor = $this->User_model->get_id_editor($user_id);

            $this->form_validation->set_rules('judul', 'Title', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('authors', 'Authors', 'trim|min_length[3]');
            $this->form_validation->set_rules('keywords', 'Keywords', 'trim|min_length[3]');
            
            if($this->form_validation->run() == FALSE)
            {
                $data['user_id'] = $user_id;
                $data['profile_data'] = $this->User_model->get_profile_info($user_id);
                $data['main_view'] = 'editor/create_new_task';
                $this->load->view('layouts/main' , $data);
            }else
            {
                if($this->Task_model->create_task($user_id, $id_editor))
                {
                    $this->session->set_flashdata('task_created', 'Your Task has been created');
                    redirect("users/display_page_role/" . $user_id . " ");
                }
            }
        }

        public function pay($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['error'] = $this->upload->display_errors();

            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|min_length[3]');
            if($this->form_validation->run() == FALSE)
            {
                $data['main_view'] = 'editor/commit_payment';
                $data['task_id'] = $task_id;
                $this->load->view('layouts/main' , $data);
            }else
            {
                if($this->Task_model->commit_payment_model($task_id))
                {
                    $this->session->set_flashdata('task_paid', 'Your Task has been marked paid and will be checked by our admin shortly');
                    redirect("users/display_page_role/" . $user_id . " ");
                }
            }
        }

        public function confirm_finished($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            if($this->Task_model->confirm_finished_model($task_id))
            {
                $this->session->set_flashdata('task_finished', 'Your Task has been marked as finished');
                redirect("users/display_page_role/" . $user_id . " ");
            }   
        }










    }




?>