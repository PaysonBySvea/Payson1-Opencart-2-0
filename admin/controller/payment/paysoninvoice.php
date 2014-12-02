<?php

class ControllerPaymentPaysoninvoice extends Controller {

    private $error = array();
    private $data = array();

    public function index() {

        $this->load->language('payment/paysoninvoice');
        
        $this->load->model('setting/setting');
        //Save the settings if the user has submitted the admin form (ie if someone has pressed save).		
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('paysoninvoice', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
        }        

        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['text_edit']       = $this->language->get('text_edit');
        $this->data['config_message'] = $this->language->get('config_message');

        $this->data['link_to_paysondirect'] = $this->url->link('payment/paysondirect', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['entry_order_status'] = $this->language->get('entry_order_status');	
        $this->data['text_all_zones'] = $this->language->get('text_all_zones');
        $this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');

        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');

        $this->data['action'] = $this->url->link('payment/paysoninvoice', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        if (isset($this->request->post['paysoninvoice_status'])) {
            $this->data['paysoninvoice_status'] = $this->request->post['paysoninvoice_status'];
        } else {
            $this->data['paysoninvoice_status'] = $this->config->get('paysoninvoice_status');
        }

        if (isset($this->request->post['paysoninvoice_sort_order'])) {
            $this->data['paysoninvoice_sort_order'] = $this->request->post['paysoninvoice_sort_order'];
        } else {
            $this->data['paysoninvoice_sort_order'] = $this->config->get('paysoninvoice_sort_order');
        }
        
        if (isset($this->request->post['paysoninvoice_order_status_id'])) {
			$this->data['paysoninvoice_order_status_id'] = $this->request->post['paysoninvoice_order_status_id'];
		} else {
			$this->data['paysoninvoice_order_status_id'] = $this->config->get('paysoninvoice_order_status_id'); 
		} 
		
		$this->load->model('localisation/order_status');
		
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
      
         if (isset($this->request->post['paysoninvoice_geo_zone_id'])) {
		$this->data['paysoninvoice_geo_zone_id'] = $this->request->post['paysoninvoice_geo_zone_id'];
	} else {
		$this->data['paysoninvoice_geo_zone_id'] = $this->config->get('paysoninvoice_geo_zone_id'); 
	} 
		
	$this->load->model('localisation/geo_zone');						
		
	$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
                
                
                
                
        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }
        
        


        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_payment'),
            'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('payment/paysoninvoice', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );      
        
        $this->data['header'] = $this->load->controller('common/header');
	$this->data['column_left'] = $this->load->controller('common/column_left');
	$this->data['footer'] = $this->load->controller('common/footer');

	$this->response->setOutput($this->load->view('payment/paysoninvoice.tpl', $this->data));
    }

    private function validate() {
        if (!$this->user->hasPermission('modify', 'payment/paysoninvoice')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
     
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }

}

?>