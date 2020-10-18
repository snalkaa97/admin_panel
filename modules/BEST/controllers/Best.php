<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *| --------------------------------------------------------------------------
 *| Web Controller
 *| --------------------------------------------------------------------------
 *| For default controller
 *|
 */
class Best extends MY_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'active_link' => 'dashboard'
        ];
        $this->load->view('dashboard', $data);
    }

    /*

        PORTFOLIO

    */
    public function portfolio()
    {
        $data = [
            'title' => 'Portfolio',
            'active_link' => 'portfolio'
        ];
        $this->load->view('pages/portfolio/index', $data);
    }
    //CREATE_PORTFOLIO
    public function add_portfolio()
    {
        $data = [
            'title' => 'Portfolio',
            'active_link' => 'portfolio'
        ];
        $this->load->view('pages/portfolio/add', $data);
    }
    //INSERT PORTFOLIO
    public function insert_portfolio()
    {
    }
    //EDIT PORTFOLIO
    public function edit_portfolio($id)
    {
    }
    public function update_portfolio($id)
    {
    }
    //DELETE PORTFOLIO
    public function delete_portfolio($id)
    {
    }

    /*

        BLOGS

    */
    public function blogs()
    {
        $data = [
            'title' => 'Blogs',
            'active_link' => 'blogs'
        ];
        $this->load->view('pages/blogs/index', $data);
    }
    //CREATE BLOG
    public function add_blog()
    {
        $data = [
            'title' => 'Blogs',
            'active_link' => 'blogs'
        ];
        $this->load->view('pages/blogs/add', $data);
    }
    //INSERT blogs
    public function insert_blog()
    {
    }
    //EDIT blogs
    public function edit_blog($id)
    {
    }
    public function update_blog($id)
    {
    }
    //DELETE blogs
    public function delete_blog($id)
    {
    }


    /*

        PRODUCTSS

    */
    public function products()
    {
        $data = [
            'title' => 'Products',
            'active_link' => 'products'
        ];
        $this->load->view('pages/products/index', $data);
    }
    //CREATE product
    public function add_product()
    {
        $data = [
            'title' => 'Products',
            'active_link' => 'products'
        ];
        $this->load->view('pages/products/add', $data);
    }
    //INSERT products
    public function insert_product()
    {
    }
    //EDIT products
    public function edit_product($id)
    {
    }
    public function update_product($id)
    {
    }
    //DELETE products
    public function delete_product($id)
    {
    }
}
