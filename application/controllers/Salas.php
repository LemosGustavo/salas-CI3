<?php


class Salas extends CI_Controller {
    public function index() {
        $this->loadViews("salas/index");
    }

    public function listSalas() {
        $this->loadViews("salas/salas_index");
    }
    
    public function crearSalasModal() {

       $this->viewModel("salas/salas_crear_modal");
    }
    

    public function loadViews($view = null, $data = null) {
        if ($data) {
            $data['view'] = $view;
            $this->load->view("includes/header", $data);
            $this->load->view($view, $data);
            $this->load->view("includes/footer", $data);
        } else {
            $this->load->view("includes/header");
            $this->load->view($view);
            $this->load->view("includes/footer");
        }
    }

    public function viewModel($view = null, $data = null) {
            $data['view'] = $view;
            $this->load->view($view, $data);
    }
}
