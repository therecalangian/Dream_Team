<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Stores';

		$this->load->model('model_stores');
	}

	/* 
    * It only redirects to the manage stores page
    */
	public function index()
	{
		if(!in_array('viewStore', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('stores/index', $this->data);	
	}

	/*
	* It retrieve the specific store information via a store id
	* and returns the data in json format.
	*/
	public function fetchStoresDataById($id) 
	{
		if($id) {
			$data = $this->model_stores->getStoresData($id);
			echo json_encode($data);
		}
	}

	/*
	* It retrieves all the store data from the database 
	* This function is called from the datatable ajax function
	* The data is return based on the json format.
	*/
	public function fetchStoresData()
	{
		$result = array('data' => array());

		$data = $this->model_stores->getStoresData();

		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			if(in_array('updateStore', $this->permission)) {
				$buttons = '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			}

			if(in_array('deleteStore', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$expedited = ($value['expedited'] == 1) ? '<span class="label label-info">Yes</span>' : '<span class="label label-default">No</span>';

			$status = ($value['active'] == 1) ? '<span class="label label-warning">Pending</span>' : '<span class="label label-success">Done</span>';

			if($value['purpose'] == 1){
				$purpose = '<span class="label label-default">Hospital Inclusion</span>';
			}elseif ($value['purpose'] == 2) {
				$purpose = '<span class="label label-default">Thesis/Disseration/SP</span>';
			}
			else{
				$purpose = '<span class="label label-default">Other</span>';
			}
					

			$result['data'][$key] = array(
				#$value['id']
				$value['date_added'],
				$value['generic_name'],
				$value['brand_name'],
				$value['company'],
				$purpose,
				$value['quantity'],
				$expedited,
				$status,
				$value['exp_sample'],
				$value['exp_standard'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
    * If the validation is not valid, then it provides the validation error on the json format
    * If the validation for each input is valid then it inserts the data into the database and 
    returns the appropriate message in the json format.
    */
	public function create()
	{
		if(!in_array('createStore', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('date_added', 'Store name', 'trim|required');
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');
		$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required');
		$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required');
		$this->form_validation->set_rules('generic_name', 'Generic name', 'trim|required');
		$this->form_validation->set_rules('brand_name', 'Brand name', 'trim|required');
		$this->form_validation->set_rules('purpose', 'Purpose', 'trim|required');
		$this->form_validation->set_rules('purpose_others', 'Other purpose', 'trim|required');
		$this->form_validation->set_rules('procedure_drug_assay', 'Procedure of the Drug Assay', 'trim|required');
		$this->form_validation->set_rules('coa_finished_product', 'Certificate of Analysis of Finished Product', 'trim|required');
		$this->form_validation->set_rules('coa_reference_standard', 'Certificate of Analysis of Reference Standard', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('expedited', 'Expedited', 'trim|required');
		$this->form_validation->set_rules('lot_number', 'Lot Number', 'trim|required');
		$this->form_validation->set_rules('drp_number', 'DRP Number', 'trim|required');
		$this->form_validation->set_rules('manufacturer', 'Manufacturer', 'trim|required');
		$this->form_validation->set_rules('distributor', 'Distributor', 'trim|required');
		$this->form_validation->set_rules('manufacturing_date', 'Manufacturing Date', 'trim|required');
		$this->form_validation->set_rules('exp_sample', 'Expiry Date of Sample', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('purity', '% Purity', 'trim|required');
		$this->form_validation->set_rules('batch_number', 'Batch Number', 'trim|required');
		$this->form_validation->set_rules('exp_standard', 'Expiry Date of Standard', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');
		

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'date_added' => $this->input->post('date_added'),
        		'company' => $this->input->post('company'),
        		'company_address' => $this->input->post('company_address'),
        		'contact_person' => $this->input->post('contact_person'),
        		'mobile_number' => $this->input->post('mobile_number'),
        		'email_address' => $this->input->post('email_address'),
        		'generic_name' => $this->input->post('generic_name'),
        		'brand_name' => $this->input->post('brand_name'),
        		'purpose' => $this->input->post('purpose'),
        		'purpose_others' => $this->input->post('purpose_others'),
        		'procedure_drug_assay' => $this->input->post('procedure_drug_assay'),
        		'coa_finished_product' => $this->input->post('coa_finished_product'),
        		'coa_reference_standard' => $this->input->post('coa_reference_standard'),
        		'quantity' => $this->input->post('quantity'),
        		'expedited' => $this->input->post('expedited'),
        		'lot_number' => $this->input->post('lot_number'),
        		'drp_number' => $this->input->post('drp_number'),
        		'manufacturer' => $this->input->post('manufacturer'),
        		'distributor' => $this->input->post('distributor'),
        		'manufacturing_date' => $this->input->post('manufacturing_date'),
        		'exp_sample' => $this->input->post('exp_sample'),
        		'name' => $this->input->post('name'),
        		'purity' => $this->input->post('purity'),
        		'batch_number' => $this->input->post('batch_number'),
        		'exp_standard' => $this->input->post('exp_standard'),
        		'active' => $this->input->post('active'),
        	);

        	$create = $this->model_stores->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the brand information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);
	}	

	/*
    * If the validation is not valid, then it provides the validation error on the json format
    * If the validation for each input is valid then it updates the data into the database and 
    returns a n appropriate message in the json format.
    */
	public function update($id)
	{
		if(!in_array('updateStore', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_date_added', 'Store name', 'trim|required');
			$this->form_validation->set_rules('edit_company', 'Company', 'trim|required');
			$this->form_validation->set_rules('edit_company_address', 'Company Address', 'trim|required');
			$this->form_validation->set_rules('edit_contact_person', 'Contact Person', 'trim|required');
			$this->form_validation->set_rules('edit_mobile_number', 'Mobile Number', 'trim|required');
			$this->form_validation->set_rules('edit_email_address', 'Email Address', 'trim|required');
			$this->form_validation->set_rules('edit_generic_name', 'Generic name', 'trim|required');
			$this->form_validation->set_rules('edit_brand_name', 'Brand name', 'trim|required');
			$this->form_validation->set_rules('edit_purpose', 'Purpose', 'trim|required');
			$this->form_validation->set_rules('edit_purpose_others', 'Other purpose', 'trim|required');
			$this->form_validation->set_rules('edit_procedure_drug_assay', 'Procedure of the Drug Assay', 'trim|required');
			$this->form_validation->set_rules('edit_coa_finished_product', 'Certificate of Analysis of Finished Product', 'trim|required');
			$this->form_validation->set_rules('edit_coa_reference_standard', 'Certificate of Analysis of Reference Standard', 'trim|required');
			$this->form_validation->set_rules('edit_quantity', 'Quantity', 'trim|required');
			$this->form_validation->set_rules('edit_expedited', 'Expedited', 'trim|required');
			$this->form_validation->set_rules('edit_lot_number', 'Lot Number', 'trim|required');
			$this->form_validation->set_rules('edit_drp_number', 'DRP Number', 'trim|required');
			$this->form_validation->set_rules('edit_manufacturer', 'Manufacturer', 'trim|required');
			$this->form_validation->set_rules('edit_distributor', 'Distributor', 'trim|required');
			$this->form_validation->set_rules('edit_manufacturing_date', 'Manufacturing Date', 'trim|required');
			$this->form_validation->set_rules('edit_exp_sample', 'Expiry Date of Sample', 'trim|required');
			$this->form_validation->set_rules('edit_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('edit_purity', '% Purity', 'trim|required');
			$this->form_validation->set_rules('edit_batch_number', 'Batch Number', 'trim|required');
			$this->form_validation->set_rules('edit_exp_standard', 'Expiry Date of Standard', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        	'date_added' => $this->input->post('date_added'),
        		'company' => $this->input->post('company'),
        		'company_address' => $this->input->post('company_address'),
        		'contact_person' => $this->input->post('contact_person'),
        		'mobile_number' => $this->input->post('mobile_number'),
        		'email_address' => $this->input->post('email_address'),
        		'generic_name' => $this->input->post('generic_name'),
        		'brand_name' => $this->input->post('brand_name'),
        		'purpose' => $this->input->post('purpose'),
        		'purpose_others' => $this->input->post('purpose_others'),
        		'procedure_drug_assay' => $this->input->post('procedure_drug_assay'),
        		'coa_finished_product' => $this->input->post('coa_finished_product'),
        		'coa_reference_standard' => $this->input->post('coa_reference_standard'),
        		'quantity' => $this->input->post('quantity'),
        		'expedited' => $this->input->post('expedited'),
        		'lot_number' => $this->input->post('lot_number'),
        		'drp_number' => $this->input->post('drp_number'),
        		'manufacturer' => $this->input->post('manufacturer'),
        		'distributor' => $this->input->post('distributor'),
        		'manufacturing_date' => $this->input->post('manufacturing_date'),
        		'exp_sample' => $this->input->post('exp_sample'),
        		'name' => $this->input->post('name'),
        		'purity' => $this->input->post('purity'),
        		'batch_number' => $this->input->post('batch_number'),
        		'exp_standard' => $this->input->post('exp_standard'),
        		'active' => $this->input->post('active'),
	        	);

	        	$update = $this->model_stores->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* If checks if the store id is provided on the function, if not then an appropriate message 
	is return on the json format
    * If the validation is valid then it removes the data into the database and returns an appropriate 
    message in the json format.
    */
	public function remove()
	{
		if(!in_array('deleteStore', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$store_id = $this->input->post('store_id');

		$response = array();
		if($store_id) {
			$delete = $this->model_stores->remove($store_id);
			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}

}