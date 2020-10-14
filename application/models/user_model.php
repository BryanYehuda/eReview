<?php

    class User_model extends CI_Model
    {
        public function create_user()
        {
            $option = ['cost' => 12];
            $encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $option);
            $data = array
            (
                'username' => $this->input->post('username'),
                'password' => $encripted_pass,
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email')
            );
            $insert_data = $this->db->insert('users', $data);
            $id_user = $this->db->insert_id();
            
            $peran = $this->input->post('peran');
            if ($peran == 1) {
                
                $data1 = array
                (
                    'id_user' => $id_user,
                    'nama' => $this->input->post('nama')
                );
                $this->db->insert('editor', $data1);

                $data2 = array
                (
                    'id_user' => $id_user,
                    'id_grup' => $peran
                );
                $this->db->insert('member', $data2);

			} elseif ($peran == 2) {

				$data1 = array
                (
                    'id_user' => $id_user,
                    'nama' => $this->input->post('nama')
                );
                $this->db->insert('reviewer', $data1);

                $data2 = array
                (
                    'id_user' => $id_user,
                    'id_grup' => $peran
                );
                $this->db->insert('member', $data2);

			} else {
				$data1 = array
                (
                    'id_user' => $id_user,
                    'nama' => $this->input->post('nama')
                );
                $this->db->insert('makelar', $data1);

                $data2 = array
                (
                    'id_user' => $id_user,
                    'id_grup' => 3
                );
                $this->db->insert('member', $data2);
			}
            return $insert_data;
        }
        
        public function login_user($username, $password)
        {
            $this->db->where('username', $username);
            $result = $this->db->get('users');
            $db_password = $result->row(2)->password;
           
            if(password_verify($password, $db_password))
            {
                return $result->row(0)->id;
            }else
            {
                return FALSE;
            }
        }

        public function get_profile($id) 
        {
            $this->db->where('id', $id);
            $query = $this->db->get('users');
            return $query->row();
        }

        function get_roles_name($id_user)
        {
            $q = "SELECT t1.*, t2.nama_grup FROM (SELECT t0.* FROM member t0 WHERE t0.sts_member=1 AND t0.id_user=". $id_user.") t1 
			INNER JOIN grup t2 ON t1.id_grup=t2.id_grup AND t2.sts_grup=1";
		    $res = $this->db->query($q);
		    return $res->result_array();
        }

        function get_roles_id($id_user)
        {
            $query   = "select b.id_grup from  users A, member B, grup C 
                        where  (A.id = B.id_user) AND (B.id_grup = C.id_grup) AND (A.id = " .$id_user  .")";
            $result = $this->db->query($query);
            return $result->row(0)->id_grup;
        }

        public function get_profile_info($user_id)
        {
            $this->db->where('id', $user_id);
            $get_data = $this->db->get('users');
            return $get_data->row();
        }

        public function edit_profile_user($user_id, $data)
        {
            $this->db->where('id' , $user_id);
            $this->db->update('users' , $data);
            return true;
        }

        public function edit_profile_role($user_id, $data, $peran)
        {
            if($peran == 1)
            {
                $this->db->where('id_user' , $user_id);
                $this->db->update('editor' , $data);
                return true;
            }else if($peran == 2)
            {
                $this->db->where('id_user' , $user_id);
                $this->db->update('reviewer' , $data);
                return true;
            }if($peran == 3)
            {
                $this->db->where('id_user' , $user_id);
                $this->db->update('makelar' , $data);
                return true;
            }
        }

        public function get_id_editor($user_id)
        {
            $query   = "select id_editor from `editor` where id_user = $user_id";
            $result = $this->db->query($query);
            return $result->row(0)->id_editor;
        }

        public function get_id_reviewer($user_id)
        {
            $query   = "select id_reviewer from `reviewer` where id_user = $user_id";
            $result = $this->db->query($query);
            return $result->row(0)->id_reviewer;
        }

        public function get_id_makelaar($user_id)
        {
            $this->db->where('id_user' , $user_id);
            $get_data = $this->db->get('makelar');
            return $get_data->row(0);
        }

        public function get_reviewer_name($id_reviewer)
        {
            $this->db->where('id_reviewer' , $id_reviewer);
            $get_data = $this->db->get('reviewer');
            return $get_data->row(2)->nama;
        }

        public function get_editor_name($id_editor)
        {
            $this->db->where('id_editor' , $id_editor);
            $get_data = $this->db->get('editor');
            return $get_data->row(2)->nama;
        }

        public function get_bank_account($user_id)
        {
            $this->db->where('id_user', $user_id);
            $get_data = $this->db->get('reviewer');
            return $get_data->row();
        }

        public function edit_bank_account($user_id, $no_rek)
        {
            $this->db->where('id_user' , $user_id);
            $this->db->update('reviewer' , $no_rek);
            return true;
        }

        public function get_competence($user_id)
        {
            $this->db->where('id_user', $user_id);
            $get_data = $this->db->get('reviewer');
            return $get_data->row();
        }

        public function edit_competence($user_id, $data)
        {
            $this->db->where('id_user' , $user_id);
            $this->db->update('reviewer' , $data);
            return true;
        }

        public function display_funds($user_id)
        {
            $this->db->where('id_user' , $user_id);
            $get_data = $this->db->get('reviewer');
            return $get_data->row();
        }

        public function get_funds($id_reviewer)
        {
            $query   = "select funds from `reviewer` where id_reviewer = $id_reviewer";
            $result = $this->db->query($query);
            return $result->row(0)->funds;
        }

    }



?>