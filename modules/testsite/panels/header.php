<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class header extends MY_Controller{
	
	function panel_params($params){
		
		$this->load->model('cms_page_model');
		
		if (stristr($params['page_id'], '=')){
			list($page_slug, $block_id) = explode('=', $params['page_id']);
			$params['page'] = $this->cms_page_model->get_page_by_slug($page_slug);
		} else {
			$params['page'] = $this->cms_page_model->get_page($params['page_id']);
		}

		return $params;
		
	}

}
