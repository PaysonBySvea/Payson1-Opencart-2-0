<?php

class ControllerPaymentPaysondirect extends Controller {

    private $error = array();
    private $data = array();

    public function index() {
        //Load the language file for this module
        $this->load->language('payment/paysondirect');

        //Set the title from the language file $_['heading_title'] string
        $this->document->setTitle($this->language->get('heading_title'));

        //create the table payson_order in the database
        $this->load->model('module/paysondirect');
        $this->model_module_paysondirect->createModuleTables();

        //Load the settings model. You can also add any other models you want to load here.
        $this->load->model('setting/setting');
        //Save the settings if the user has submitted the admin form (ie if someone has pressed save).		
        if (($this->request->server['REQUEST_METHOD'] == 'POST')&& $this->validate()) {
            $this->model_setting_setting->editSetting('paysondirect', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['text_modul_name'] = $this->language->get('text_modul_name');
        $this->data['text_modul_version'] = $this->language->get('text_modul_version');
        //$this->data['modul_version'] = $this->language->get('text_modul_version');
        
        $this->data['text_edit']       = $this->language->get('text_edit');
        $this->data['user_name'] = $this->language->get('user_name');
        $this->data['agent_id'] = $this->language->get('agent_id');
        $this->data['md5'] = $this->language->get('md5');
        $this->data['paysondirect_method_card_bank_info'] = $this->language->get('payment_method_card_bank_info');

        $this->data['secure_word'] = $this->language->get('secure_word');
        $this->data['entry_logg'] = $this->language->get('entry_logg');


        $this->data['payment_method_card'] = $this->language->get('payment_method_card');
        $this->data['payment_method_bank'] = $this->language->get('payment_method_bank');
        $this->data['payment_method_inv'] = $this->language->get('payment_method_inv');
        $this->data['payment_method_sms'] = $this->language->get('payment_method_sms');
        $this->data['payment_method_sms_bank'] = $this->language->get('payment_method_sms_bank');
        $this->data['payment_method_card_bank'] = $this->language->get('payment_method_card_bank');
        $this->data['payment_method_sms_card'] = $this->language->get('payment_method_sms_card');
        $this->data['payment_method_card_bank_sms'] = $this->language->get('payment_method_card_bank_sms');
        $this->data['payment_method_sms_inv'] = $this->language->get('payment_method_sms_inv');
        $this->data['payment_method_bank_inv'] = $this->language->get('payment_method_bank_inv');
        $this->data['payment_method_card_inv'] = $this->language->get('payment_method_card_inv');
        $this->data['payment_method_sms_bank_inv'] = $this->language->get('payment_method_sms_bank_inv');
        $this->data['payment_method_sms_card_inv'] = $this->language->get('payment_method_sms_card_inv');       
        $this->data['payment_method_inv_car_ban'] = $this->language->get('payment_method_inv_car_ban');
        $this->data['payment_method_sms_bank_card_inv'] = $this->language->get('payment_method_sms_bank_card_inv');       
        $this->data['payment_method_none']= $this->language->get('payment_method_none');
        
        $this->data['paysondirect_method_mode'] = $this->language->get('payment_method_mode');
        $this->data['paysondirect_mode'] = $this->language->get('payment_mode');
        $this->data['paysondirect_method_mode_live'] = $this->language->get('payment_method_mode_live');
        $this->data['paysondirect_method_mode_sandbox'] = $this->language->get('payment_method_mode_sandbox');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_all_zones'] = $this->language->get('text_all_zones');

        $this->data['entry_order_status'] = $this->language->get('entry_order_status');
        $this->data['entry_total'] = $this->language->get('entry_total');
        $this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['entry_order_item_details_to_ignore'] = $this->language->get('entry_order_item_details_to_ignore');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $this->data['entry_totals_to_ignore'] = $this->language->get('entry_totals_to_ignore');

        $this->data['entry_show_receipt_page'] = $this->language->get('entry_show_receipt_page');
        $this->data['entry_show_receipt_page_yes'] = $this->language->get('entry_show_receipt_page_yes');
        $this->data['entry_show_receipt_page_no'] = $this->language->get('entry_show_receipt_page_no');

        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');
        
        
        
        
        $this->data['help_method_mode'] = $this->language->get('help_method_mode');
        $this->data['help_user_name'] = $this->language->get('help_user_name');
        $this->data['help_agent_id'] = $this->language->get('help_agent_id');
        $this->data['help_md5'] = $this->language->get('help_md5');
        $this->data['help_method_card_bank_info'] = $this->language->get('help_method_card_bank_info');
        $this->data['help_secure_word'] = $this->language->get('help_secure_word');
        $this->data['help_logg'] = $this->language->get('help_logg');
        $this->data['help_total'] = $this->language->get('help_total');
        $this->data['help_totals_to_ignore'] = $this->language->get('help_totals_to_ignore');       
        

        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }

        if (isset($this->error['user_name'])) {
            $this->data['error_user_name'] = $this->error['user_name'];
        } else {
            $this->data['error_user_name'] = '';
        }

        if (isset($this->error['agent_id'])) {
            $this->data['error_agent_id'] = $this->error['agent_id'];
        } else {
            $this->data['error_agent_id'] = '';
        }

        if (isset($this->error['md5'])) {
            $this->data['error_md5'] = $this->error['md5'];
        } else {
            $this->data['error_md5'] = '';
        }

        if (isset($this->error['ignored_order_totals'])) {
            $this->data['error_ignored_order_totals'] = $this->error['ignored_order_totals'];
        } else {
            $this->data['error_ignored_order_totals'] = '';
        }

        $this->data['error_invoiceFeeError'] = (isset($this->error['invoiceFeeError']) ? $this->error['invoiceFeeError'] : '');


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
            'href' => $this->url->link('payment/paysondirect', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->data['action'] = $this->url->link('payment/paysondirect', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        
        if (isset($this->request->post['paysondirect_modul_version'])) {
            $this->data['paysondirect_modul_version'] = $this->request->post['paysondirect_modul_version'];
        } else {
            $this->data['paysondirect_modul_version'] = $this->config->get('paysondirect_modul_version');
        }
        
        
        
        if (isset($this->request->post['paysondirect_user_name'])) {
            $this->data['paysondirect_user_name'] = $this->request->post['paysondirect_user_name'];
        } else {
            $this->data['paysondirect_user_name'] = $this->config->get('paysondirect_user_name');
        }

        if (isset($this->request->post['paysondirect_agent_id'])) {
            $this->data['paysondirect_agent_id'] = $this->request->post['paysondirect_agent_id'];
        } else {
            $this->data['paysondirect_agent_id'] = $this->config->get('paysondirect_agent_id');
        }
        if (isset($this->request->post['paysondirect_md5'])) {
            $this->data['paysondirect_md5'] = $this->request->post['paysondirect_md5'];
        } else {
            $this->data['paysondirect_md5'] = $this->config->get('paysondirect_md5');
        }

        if (isset($this->request->post['paysondirect_mode'])) {
            $this->data['paysondirect_mode'] = $this->request->post['paysondirect_mode'];
        } else {
            $this->data['paysondirect_mode'] = $this->config->get('paysondirect_mode');
        }
        $this->data['paysoninvoice_fee_fee'] = (isset($this->request->post['paysoninvoice_fee_fee']) ? $this->request->post['paysoninvoice_fee_fee'] : $this->config->get('paysoninvoice_fee_fee'));
        
        if (isset($this->request->post['paysondirect_payment_method'])) {
            $this->data['paysondirect_payment_method'] = $this->request->post['paysondirect_payment_method'];
        } else {
            $this->data['paysondirect_payment_method'] = $this->config->get('paysondirect_payment_method');
        }

        if (isset($this->request->post['paysondirect_secure_word'])) {
            $this->data['paysondirect_secure_word'] = $this->request->post['paysondirect_secure_word'];
        } else {
            $this->data['paysondirect_secure_word'] = $this->config->get('paysondirect_secure_word');
        }

        if (isset($this->request->post['paysondirect_logg'])) {
            $this->data['paysondirect_logg'] = $this->request->post['paysondirect_logg'];
        } else {
            $this->data['paysondirect_logg'] = $this->config->get('paysondirect_logg');
        }

        if (isset($this->request->post['paysondirect_total'])) {
            $this->data['paysondirect_total'] = $this->request->post['paysondirect_total'];
        } else {
            $this->data['paysondirect_total'] = $this->config->get('paysondirect_total');
        }

        if (isset($this->request->post['paysondirect_order_status_id'])) {
            $this->data['paysondirect_order_status_id'] = $this->request->post['paysondirect_order_status_id'];
        } else {
            $this->data['paysondirect_order_status_id'] = $this->config->get('paysondirect_order_status_id');
        }

        $this->data['paysondirect_invoice_status_id'] = (isset($this->request->post['paysondirect_invoice_status_id']) ? $this->request->post['paysondirect_invoice_status_id'] : $this->config->get('paysondirect_invoice_status_id'));

        $this->load->model('localisation/order_status');

        $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        if (isset($this->request->post['paysondirect_geo_zone_id'])) {
            $this->data['paysondirect_geo_zone_id'] = $this->request->post['paysondirect_geo_zone_id'];
        } else {
            $this->data['paysondirect_geo_zone_id'] = $this->config->get('paysondirect_geo_zone_id');
        }

        $this->load->model('localisation/geo_zone');

        $this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

        if (isset($this->request->post['paysondirect_status'])) {
            $this->data['paysondirect_status'] = $this->request->post['paysondirect_status'];
        } else {
            $this->data['paysondirect_status'] = $this->config->get('paysondirect_status');
        }

        if (isset($this->request->post['paysondirect_sort_order'])) {
            $this->data['paysondirect_sort_order'] = $this->request->post['paysondirect_sort_order'];
        } else {
            $this->data['paysondirect_sort_order'] = $this->config->get('paysondirect_sort_order');
        }

        if (isset($this->request->post['paysondirect_receipt'])) {
            $this->data['paysondirect_receipt'] = $this->request->post['paysondirect_receipt'];
        } else {
            $this->data['paysondirect_receipt'] = $this->config->get('paysondirect_receipt');
        }
        if (isset($this->request->post['paysondirect_ignored_order_totals'])) {
            $this->data['paysondirect_ignored_order_totals'] = $this->request->post['paysondirect_ignored_order_totals'];
        } else {
            if ($this->config->get('paysondirect_ignored_order_totals') == null) {
                $this->data['paysondirect_ignored_order_totals'] = 'sub_total, total, taxes';
            } else
                $this->data['paysondirect_ignored_order_totals'] = $this->config->get('paysondirect_ignored_order_totals');
        }       
        
        $this->data['header'] = $this->load->controller('common/header');
	$this->data['column_left'] = $this->load->controller('common/column_left');
	$this->data['footer'] = $this->load->controller('common/footer');

	$this->response->setOutput($this->load->view('payment/paysondirect.tpl', $this->data));
    }

    private function validate() {

        if (!$this->user->hasPermission('modify', 'payment/paysondirect')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ($this->request->post['paysondirect_mode'] != 0) {          
            if (!isset($this->request->post['paysondirect_agent_id']) || !$this->request->post['paysondirect_agent_id']) {
                $this->error['agent_id'] = $this->language->get('error_agent_id');
            }

            if (!isset($this->request->post['paysondirect_user_name']) || !$this->request->post['paysondirect_user_name']) {
                $this->error['user_name'] = $this->language->get('error_user_name');
            }
            if (!isset($this->request->post['paysondirect_md5']) || !$this->request->post['paysondirect_md5']) {
                $this->error['md5'] = $this->language->get('error_md5');
            }
            
            
            
        }
        if (!$this->request->post['paysondirect_ignored_order_totals']) {
            $this->error['ignored_order_totals'] = $this->language->get('error_ignored_order_totals');
        }

       if (isset($this->request->post['paysoninvoice_fee_fee'])) {
            if (!is_numeric($this->request->post['paysoninvoice_fee_fee'])) {
                $this->error['invoiceFeeError'] = "Invoicefee must be a number";
            } else {
                if ($this->request->post['paysoninvoice_fee_fee'] < 0 || $this->request->post['paysoninvoice_fee_fee'] > 40) {
                    $this->error['invoiceFeeError'] = "Invoicefee must be between 0-40";
                }
            }
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }

}

?>