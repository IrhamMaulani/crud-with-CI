<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "products";

    public $id;
    public $product_name;
    public $product_price;
    public $product_image = "default.jpg";
    public $product_description;

    public function rules()
    {
        return[
            [
                'field'    =>  'product_name',
                'label'    =>   'Name',
                'rules'    =>   'required'
            ],
            [
                'field'     =>  'product_price',
                'label'     =>  'Price',
                'rules'     =>  'numeric'
            ],
            [
                'field'     =>  'product_description',
                'label'     =>  'Description',
                'rules'     =>  'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_name =$post['product_name'];
        $this->product_price =$post['product_price'];
        $this->product_description =$post['product_description'];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_name =$post['product_name'];
        $this->product_price =$post['product_price'];
        $this->product_description =$post['product_description'];
        $this->db->update($this->_table, $this, ["id" => $post['id']]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ["id" => $id]);
    }
}