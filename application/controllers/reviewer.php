<?php

    class Reviewer extends CI_Controller
    {

        public function index()
        {
            if($this->session->userdata('logged_in'))
            {
                $user_id = $this->session->userdata('user_id');
            }
        }

        public function accept($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            if($this->Task_model->accept_task($task_id))
            {   
                $this->session->set_flashdata('task_accepted', 'Your Task has been accepted');
                redirect("users/display_page_role/" . $user_id . " ");
            }
        }

        public function reject($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            if($this->Task_model->reject_task($task_id))
            {   
                $this->session->set_flashdata('task_rejected', 'Your Task has been rejected');
                redirect("users/display_page_role/" . $user_id . " ");
            }
        }

        public function submit($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['error'] = $this->upload->display_errors();

            $this->form_validation->set_rules('message', 'Message', 'trim|min_length[3]');
            if($this->form_validation->run() == FALSE)
            {
                $data['main_view'] = 'reviewer/submit_form';
                $data['task_id'] = $task_id;
                $this->load->view('layouts/main' , $data);
            }else
            {
                if($this->Task_model->submit_model($task_id))
                {
                    $this->session->set_flashdata('task_finished', 'Your Task has been marked finished and will be checked by our admin shortly');
                    redirect("users/display_page_role/" . $user_id . " ");
                }
            }
            
        }

        public function deduct_funds($user_id)
        {
            $user_id = $this->session->userdata('user_id');
            $id_reviewer = $this->User_model->get_id_reviewer($user_id);
            $data['id_reviewer'] = $id_reviewer;
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['error'] = $this->upload->display_errors();
            $data['profile_data'] = $this->User_model->get_profile_info($user_id);
            $data['task'] = $this->Task_model->get_task_reviewer($id_reviewer, 8);
            $funds = $this->User_model->get_funds($id_reviewer);

            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|min_length[3]');
            if($this->form_validation->run() == FALSE)
            {
                $data['user_id'] = $user_id;
                $data['profile_data'] = $this->User_model->get_profile_info($user_id);
                $data['main_view'] = 'reviewer/deduct_funds';
                $this->load->view('layouts/main' , $data);
            }else
            {
                if($this->Task_model->deduct_funds_model($data, $funds, $id_reviewer))
                {
                    $this->session->set_flashdata('funds_deducted', 'Your funds has been deducted and will be transferred shortly');
                    redirect("users/display_funds/" . $user_id . " ");
                }else
                {
                    $this->session->set_flashdata('funds_higher', 'You cannot deduct funds higher than your available funds');
                    redirect("reviewer/deduct_funds/" . $user_id . " ");
                } 
            }

        }











    }

?>