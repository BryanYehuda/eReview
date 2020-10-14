<?php

    class Home extends CI_Controller 
    {
        public function index()
        {
            $data['main_view'] = 'pages/home_view';
            $this->load->view('layouts/main', $data);
        }

        public function editor()
        {
            $data['main_view'] = 'editor/editor_view';
            $this->load->view('layouts/main', $data);
        }


    }


?>