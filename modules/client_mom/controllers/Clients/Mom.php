<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mom extends ClientsController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_mom_model');
        $this->load->model('projects_model');
    }

    public function index(){
        $data['moms'] = $this->client_mom_model->get();
        $data['title'] = _l('client_mom');
        $this->data($data);
        $this->view('client_moms/mom_list');
        $this->layout();
    }

    public function view($token){
        $mom = $this->client_mom_model->get_by_token($token);
        if(!$mom){
            show_404();
        }
        $data['mom'] = $mom;
        $data['title'] = $mom->title;
        $this->data($data);
        $this->view('client_moms/mom_view');
        $this->layout();
    }
}
