<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_mom extends AdminController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_mom_model');
    }

    public function index(){
        if ($this->input->is_ajax_request()) {
            $moms = $this->client_mom_model->get();
            $data = [];
            foreach ($moms as $mom) {
                $row = [];
                $row[] = $mom->title;
                $row[] = _d($mom->mom_date);
                $row[] = '<a href="'.admin_url('projects/view/'.$mom->project_id).'">'.get_project_name_by_id($mom->project_id).'</a>';
                $row[] = '<a href="'.admin_url('client_mom/form/'.$mom->id).'" class="btn btn-primary btn-sm">'._l('edit').'</a> <a href="'.admin_url('client_mom/delete/'.$mom->id).'" class="btn btn-danger btn-sm _delete">'._l('delete').'</a>';
                $data[] = $row;
            }
            echo json_encode(['aaData' => $data]);
            die;
        }
        $data['title'] = _l('client_mom');
        $this->load->view('manage', $data);
    }

    public function form($id = ''){
        if($this->input->post()){
            $data = $this->input->post();
            if($id==''){
                $insert_id = $this->client_mom_model->add($data);
                set_alert('success', _l('added_successfully', _l('client_mom')));
                redirect(admin_url('client_mom'));
            }else{
                $this->client_mom_model->update($data, $id);
                set_alert('success', _l('updated_successfully', _l('client_mom')));
                redirect(admin_url('client_mom'));
            }
        }
        $data['mom'] = $id!='' ? $this->client_mom_model->get($id) : null;
        $data['title'] = $id=='' ? _l('new_mom') : _l('edit');
        $data['projects'] = $this->projects_model->get();
        $this->load->view('mom_form', $data);
    }

    public function delete($id){
        if(!$id){
            redirect(admin_url('client_mom'));
        }
        $this->client_mom_model->delete($id);
        set_alert('success', _l('deleted', _l('client_mom')));
        redirect(admin_url('client_mom'));
    }
}
