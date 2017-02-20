<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cms_page extends MY_Controller{

	function __construct(){

		parent::__construct();

		// check if user
		if(empty($_SESSION['cms_user']['cms_user_id'])){
			header('Location: '.$GLOBALS['config']['base_url'].'cms_login/', true, 302);
			exit();
		}

	}

	function panel_params($params){

		$this->load->model('cms_page_model');
		$this->load->model('cms_page_panel_model');

		$return['block_list'] = array();

		if ($params['page_id']){
				
			$return['page'] = $this->cms_page_model->get_page($params['page_id']);
			$blocks = $this->cms_page_panel_model->get_cms_page_panels_by(array('page_id' => $params['page_id'], ));
				
			foreach($blocks as $block){
				$return['block_list'][] = $block['block_id'];
			}

		} else {
				
			$return['page'] = $this->cms_page_model->new_page();

		}

		// get available layouts
		$layouts = $this->cms_page_model->get_layouts();
		$return['layouts'] = array();
		foreach($layouts as $layout){
			$return['layouts'][$layout['id']] = $layout['name'];
		}

		if (empty($return['page']['layout'])){
			$return['page']['layout'] = 'default';
		}

		return $return;

	}

}
