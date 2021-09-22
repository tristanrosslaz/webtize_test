<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('model');
	}


	public function index()
	{
		
		$allProducts = array();

		// hard coded list of products
		$productArray = array(
			"product_name" => "Item 1",
			"price" => 10,
			"weight" => 200,
		);
		array_push($allProducts, $productArray);

		$productArray = array(
			"product_name" => "Item 2",
			"price" => 100,
			"weight" => 120,
		);
		array_push($allProducts, $productArray);

		$productArray = array(
			"product_name" => "Item 3",
			"price" => 30,
			"weight" => 300,
		);
		array_push($allProducts, $productArray);

		$productArray = array(
			"product_name" => "Item 4",
			"price" => 20,
			"weight" => 500,
		);
		array_push($allProducts, $productArray);

		$productArray = array(
			"product_name" => "Item 5",
			"price" => 30,
			"weight" => 250,
		);
		array_push($allProducts, $productArray);

		$productArray = array(
			"product_name" => "Item 6",
			"price" => 40,
			"weight" => 10,
		);
		array_push($allProducts, $productArray);

		$productArray = array(
			"product_name" => "Item 7",
			"price" => 200,
			"weight" => 10,
		);
		array_push($allProducts, $productArray);

		$productArray = array(
			"product_name" => "Item 8",
			"price" => 120,
			"weight" => 500,
		);
		array_push($allProducts, $productArray);

		$productArray = array(
			"product_name" => "Item 9",
			"price" => 130,
			"weight" => 790,
		);
		array_push($allProducts, $productArray);

		$data = array(
			// 'listProducts'	=> $this->model->listProducts()->result_array(), //get product list from tb_products
			'listProducts'	=> $allProducts 
		);

		$this->load->view('home', $data);
	}
}
