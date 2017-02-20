<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cms_list_list extends MY_Controller{

	function __construct(){

		parent::__construct();

		// check if user
		if(empty($_SESSION['cms_user']['cms_user_id'])){
			header('Location: '.$GLOBALS['config']['base_url'].'cms_login/', true, 302);
			exit();
		}

	}

	function panel_params($params){

		$this->load->model('cms_page_panel_model');

		$return['edit_base'] = $params['edit_base'];
		$return['id_field'] = $params['id_field'];
		$return['title_field'] = !empty($params['title_field']) ? $params['title_field'] : '';
		$return['title_panel'] = !empty($params['title_panel']) ? $params['title_panel'] : '';
		$return['no_sort'] = empty($params['no_sort']) ? 0 : 'no_sort';

		if (!empty($params['panel_name'])){

			$filter = array('panel_name' => $params['panel_name'], 'page_id' => [999999,0], );
				
			if (!empty($params['filters'])){
				$filter = array_merge($filter, $params['filters']);
			}

			$return['total'] = $this->cms_page_panel_model->count_cms_page_panels_by(array_merge($filter, ['panel_name' => $params['panel_name'], 'page_id' => 999999, ]));
			$return['total'] += $this->cms_page_panel_model->count_cms_page_panels_by(array_merge($filter, ['panel_name' => $params['panel_name'], 'page_id' => 0, ]));

			$filter['_start'] = !empty($params['start']) ? $params['start'] : 0;
			$filter['_limit'] = !empty($params['limit']) ? $params['limit'] : 0;
			$return['list'] = $this->cms_page_panel_model->get_cms_page_panels_by($filter);

		} else {
				
			$filter = array();
			if (!empty($params['filters'])){
				$filter = $params['filters'];
			}
				
			$filter['_start'] = !empty($params['start']) ? $params['start'] : 0;
			$filter['_limit'] = !empty($params['limit']) ? $params['limit'] : 0;
				
			list($model, $method) = explode('|', $params['source']);
				
			$this->load->model($model);
				
			$return['list'] = $this->$model->$method($filter);
				
			$count_method = str_replace('get_', 'count_', $method);
			$return['total'] = $this->$model->$count_method(!empty($params['filters']) ? $params['filters'] : array());
				
		}

		if (!empty($return['title_panel'])){

			foreach($return['list'] as $key => $block){

				$return['list'][$key]['list_block'] = $this->cms_page_panel_model->get_cms_page_panel($block[$params['id_field']]);
			}
				
		}

		return $return;

	}

}
