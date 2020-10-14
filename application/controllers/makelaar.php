<?php

    class Makelaar extends CI_Controller
    {

        public function index()
        {
            if($this->session->userdata('logged_in'))
            {
                $user_id = $this->session->userdata('user_id');
            }
        }

        public function accept_payment($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            if($this->Task_model->accept_payment_model($task_id))
            {   
                
                $this->session->set_flashdata('payment_accepted', 'The payment for this task has been accepted');
                redirect("users/display_page_role/" . $user_id . " ");
            }
        }

        public function reject_payment($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            if($this->Task_model->reject_payment_model($task_id))
            {   
                $this->session->set_flashdata('payment_rejected', 'The payment for this task has been rejected');
                redirect("users/display_page_role/" . $user_id . " ");
            }
        }

        public function accept_finished($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            if($this->Task_model->accept_finished_model($task_id))
            {   
                $this->session->set_flashdata('finished_accepted', 'This task has been accepted as finished');
                redirect("users/display_page_role/" . $user_id . " ");
            }
        }

        public function reject_finished($task_id)
        {
            $user_id = $this->session->userdata('user_id');
            if($this->Task_model->reject_finished_model($task_id))
            {   
                $this->session->set_flashdata('finished_rejected', 'This task has been rejected as finished');
                redirect("users/display_page_role/" . $user_id . " ");
            }
        }

        public function download($task_id)
        {
            $file_location = $this->Task_model->get_bukti($task_id);
            $this->load->helper('download');
            force_download(FCPATH. $file_location, null);
        }

        public function send_funds($id_reviewer)
        {
            $user_id = $this->session->userdata('user_id');
            $data['id_reviewer'] = $id_reviewer;
            $data['roles'] = $this->User_model->get_roles_name($user_id);
            $data['error'] = $this->upload->display_errors();
            $data['reviewer'] = $this->Task_model->get_all_reviewer();
            $data['profile_data'] = $this->User_model->get_profile_info($user_id);
            $funds = $this->User_model->get_funds($id_reviewer);

            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|min_length[3]');
            if($this->form_validation->run() == FALSE)
            {
                $data['user_id'] = $user_id;
                $data['profile_data'] = $this->User_model->get_profile_info($user_id);
                $data['main_view'] = 'makelaar/send_funds_view';
                $this->load->view('layouts/main' , $data);
            }else
            {
                if($this->Task_model->send_funds_model($data, $funds))
                {
                    $this->session->set_flashdata('funds_sent', 'Your funds has been sent');
                    redirect("users/display_page_role/" . $user_id . " ");
                }
            }
        }



    }
?>