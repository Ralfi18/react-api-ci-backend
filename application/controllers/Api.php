<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		header('Access-Control-Allow-Origin: http://localhost:8080');
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
		header('Content-Type: application/json; utf-8');
		header('Access-Control-Max-Age: 1000');
		header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

		$this->load->model('post');
	}
	
	public function index()
	{
		// $post = file_get_contents('php://input');
		$data = "sdata initail";
		if($this->input->server('REQUEST_METHOD') == 'POST') {
			// $data = $this->input->post('data');
			$data = $this->post->get_all();
			echo json_encode($data);
			exit;
		}

	}

	public function add() {
		if($this->input->server('REQUEST_METHOD') == 'POST') {

			// $post = json_decode( file_get_contents('php://input') );

			// $resp = $this->post->add([
			// 	'title' => $post->title,
			// 	'body' => $post->body
			// ]);

			$jsonArray = json_decode($this->input->raw_input_stream, true);

			$resp = $this->post->add([
				'title' => $jsonArray['title'],
				'body'  => $jsonArray['body']
			]);

			echo json_encode($resp);	
			exit;
		}
	}
}
