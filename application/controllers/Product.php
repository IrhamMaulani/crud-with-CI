<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['products'] = $this->product_model->getall();
        $this->load->view('content', $data);
    }

    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        } else {
            $this->session->set_flashdata('success', 'Gagal disimpan');
        }

        redirect("content");
    }

    public function edit($id = null)
    {
        $product = $this->product_model;

        if (!isset($id)) {
            redirect('content');
        }
        $data["product"] = $product->getById($id);
        if (!$data["product"]) {
            show_404();
        }
        
        $this->load->view("edit_form", $data);
    }

    public function update()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        
        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil diedit');
            redirect("content");
        } else {
            $this->session->set_flashdata('success', 'Gagal diedit');
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) {
            show_404();
        }
        if ($this->product_model->delete($id)) {
            redirect(site_url('content'));
        }
    }
}