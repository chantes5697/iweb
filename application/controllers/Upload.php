<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                header( 'X-Content-Type-Options: nosniff' );
                header( 'X-Frame-Options: SAMEORIGIN' );
                header( 'X-XSS-Protection: 1; mode=block' );
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './public/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|pdf';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
}
?>
