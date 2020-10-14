<?php

    class Task_model extends CI_Model
    {
        
        public function create_task($user_id, $id_editor)
        {
            $data1 = array
            (
                'judul' => $this->input->post('judul'),
                'authors' => $this->input->post('authors'),
                'keywords' => $this->input->post('keywords'),
                'id_editor' => $id_editor,
                'nama_editor' => $this->User_model->get_editor_name($id_editor),
                'file_loc' => "uploads/paper/" . $this->input->post('judul') . " "
            );
            $insert_query = $this->db->insert('task', $data1);
            $id_task = $this->db->insert_id();

            $config['upload_path']          = './uploads/paper/';
            $config['allowed_types']        = 'docx|doc|pdf|jpg|png';
            $config['file_name']            = $id_task;
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $data['user_id'] = $user_id;
                $data['profile_data'] = $this->User_model->get_profile_info($user_id);
                $data['main_view'] = 'pages/create_new_task';
                redirect("editor/create/" . $user_id . " ");
                return FALSE;
            }
                $data = array('upload_data' => $this->upload->data());
            
            $id_reviewer = $this->input->post('reviewer');
            $data2 = array
            (
                'id_task' => $id_task,
                'id_reviewer' => $id_reviewer, 
                'nama_reviewer' => $this->User_model->get_reviewer_name($id_reviewer),
                'tgl_deadline' => $this->input->post('tgl_deadline')
            );
            $this->db->insert('assignment', $data2);

            $data3 = array
            (
                'file_loc' => "uploads/paper/" . $id_task . " "
            );
            $this->db->where('id_task' , $id_task);
            $this->db->update('task', $data3);
            return $insert_query;
        }

        public function get_all_reviewer()
        {
            $query = $this->db->get('reviewer');
            return $query->result();
        }

        public function get_task_editor($id_editor, $status)
        {
            $this->db->select
            ('
                task.judul,
                task.authors,
                task.keywords,
                task.file_loc,
                task.id_task,
                assignment.id_reviewer,
                assignment.nama_reviewer,
                assignment.tgl_assign,
                assignment.tgl_deadline
            ');
            $this->db->from('assignment');
            $this->db->join('task', 'task.id_task = assignment.id_task');
            $this->db->where('task.status' , $status);
            $this->db->where('task.id_editor' , $id_editor);
            $query = $this->db->get();
            return $query->result();
        }

        public function get_task_reviewer($id_reviewer, $status)
        {
            $this->db->select
            ('
                task.judul,
                task.authors,
                task.keywords,
                task.file_loc,
                task.id_task,
                task.id_editor,
                task.nama_editor,
                assignment.tgl_assign,
                assignment.tgl_deadline
            ');
            $this->db->from('assignment');
            $this->db->join('task', 'task.id_task = assignment.id_task');
            $this->db->where('task.status' , $status);
            $this->db->where('assignment.id_reviewer' , $id_reviewer);
            $query = $this->db->get();
            return $query->result();
        }

        public function get_task_makelaar($status)
        {
            $this->db->select
            ('
                task.judul,
                task.authors,
                task.keywords,
                task.file_loc,
                task.id_task,
                task.id_editor,
                task.nama_editor,
                assignment.id_reviewer,
                assignment.nama_reviewer,
                assignment.tgl_assign,
                assignment.tgl_deadline
            ');
            $this->db->from('assignment');
            $this->db->join('task', 'task.id_task = assignment.id_task');
            $this->db->where('task.status' , $status);
            $query = $this->db->get();
            return $query->result();
        }

        public function get_bukti($id_task)
        {
            $this->db->select('bukti');
            $this->db->from('pembayaran');
            $this->db->where('id_task', $id_task);
            $query = $this->db->get();
            $result = $query->row();
            return $result->bukti;
        }

        public function commit_payment_model($task_id)
        {
            $data1 = array
            (
                'amount' => $this->input->post('amount'),
                'id_task' => $task_id
            );
            $insert_query = $this->db->insert('pembayaran', $data1);
            $id_pembayaran = $this->db->insert_id();

            $config['upload_path']          = './uploads/bukti/';
            $config['allowed_types']        = 'jpg|png';
            $config['file_name']            = $task_id;
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $data['main_view'] = 'editor/commit_payment';
                $this->load->view('layouts/main' , $data);
            }
                $data = array('upload_data' => $this->upload->data());

            $data2 = array
            (
                'bukti' =>  "uploads/bukti/" . $id_pembayaran . " "
            );
            $this->db->where('id_pembayaran' , $id_pembayaran);
            $this->db->update('pembayaran', $data2);

            $this->db->set('status', 2);
            $this->db->where('id_task', $task_id);
            $this->db->update('task');

            return TRUE;
        }

        public function confirm_finished_model($task_id)
        {
            $this->db->set('status', 8);
            $this->db->where('id_task', $task_id);
            $this->db->update('task');
            return TRUE;
        }

        public function accept_task($task_id)
        {
            $this->db->set('status', 4);
            $this->db->where('id_task', $task_id);
            $this->db->update('task');
            return TRUE;
        }

        public function reject_task($task_id)
        {
            $this->db->set('status', 5);
            $this->db->where('id_task', $task_id);
            $this->db->update('task');
            return TRUE;
        }

        public function submit_model($task_id)
        {
            $config['upload_path']          = './uploads/paper/';
            $config['allowed_types']        = 'docx|doc|pdf|jpg|png';
            $config['file_name']            = $task_id;
            $config['overwrite']            = TRUE;
            $config['max_size']             = 10000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $data['main_view'] = 'reviewer/submit_form';
                $this->load->view('layouts/main' , $data);
            }else 
            {
                $data = array('upload_data' => $this->upload->data());
                $this->db->set('status', 6);
                $this->db->where('id_task', $task_id);
                $this->db->update('task');

                return TRUE;
            }
                
        }

        public function accept_payment_model($task_id)
        {
            $this->db->set('status', 3);
            $this->db->where('id_task', $task_id);
            $this->db->update('task');
            return TRUE;
        }

        public function reject_payment_model($task_id)
        {
            $this->db->set('status', 1);
            $this->db->where('id_task', $task_id);
            $this->db->update('task');
            return TRUE;
        }

        public function accept_finished_model($task_id)
        {
            $this->db->set('status', 7);
            $this->db->where('id_task', $task_id);
            $this->db->update('task');
            return TRUE;
        }

        public function reject_finished_model($task_id)
        {
            $this->db->set('status', 4);
            $this->db->where('id_task', $task_id);
            $this->db->update('task');
            return TRUE;
        }

        public function send_funds_model($data, $funds)
        {
            $id_reviewer = $this->input->post('reviewer');
            $funds_new = $this->input->post('amount');
            $funds_total = $funds_new + $funds;

            $data1 = array
            (
                'funds' => $funds_total
            );

            $this->db->where('id_reviewer' , $id_reviewer);
            $this->db->update('reviewer', $data1);
            return TRUE;
        }

        public function deduct_funds_model($data, $funds, $id_reviewer)
        {
            $funds_new = $this->input->post('amount');

            if($funds_new > $funds)
            {
                return FALSE;
            }else
            {
                $funds_total = $funds - $funds_new;
                $data1 = array
                (
                    'funds' => $funds_total
                );
                $this->db->where('id_reviewer' , $id_reviewer);
                $this->db->update('reviewer', $data1);
                return TRUE;
            }

        }

    







    }








?>