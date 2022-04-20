<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kategori Controller
*| --------------------------------------------------------------------------
*| Kategori site
*|
*/
class Kategori extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kategori');
	}

	/**
	* show all Kategoris
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kategori_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kategoris'] = $this->model_kategori->get($filter, $field, $this->limit_page, $offset);
		$this->data['kategori_counts'] = $this->model_kategori->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kategori/index/',
			'total_rows'   => $this->model_kategori->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kategori List');
		$this->render('backend/standart/administrator/kategori/kategori_list', $this->data);
	}
	
	/**
	* Add new kategoris
	*
	*/
	public function add()
	{
		$this->is_allowed('kategori_add');

		$this->template->title('Kategori New');
		$this->render('backend/standart/administrator/kategori/kategori_add', $this->data);
	}

	/**
	* Add New Kategoris
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kategori_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('katerogi', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('kode_kategori', 'Kode Kategori', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'kode_kategori' => $this->input->post('kode_kategori'),
				'katerogi' => $this->input->post('katerogi'),
				'keterangan' => $this->input->post('keterangan'),
			];

			
			$save_kategori = $this->model_kategori->store($save_data);

			if ($save_kategori) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kategori;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/kategori/edit/' . $save_kategori, 'Edit Kategori').' or  '.anchor('administrator/kategori', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/kategori/edit/' . $save_kategori, 'Edit Kategori'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kategori');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/kategori');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Kategoris
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kategori_update');

		$this->data['kategori'] = $this->model_kategori->find($id);

		$this->template->title('Kategori Update');
		$this->render('backend/standart/administrator/kategori/kategori_update', $this->data);
	}

	/**
	* Update Kategoris
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kategori_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('katerogi', 'Katerogi', 'trim|required');
		$this->form_validation->set_rules('kode_kategori', 'Kode Kategori', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'katerogi' => $this->input->post('katerogi'),
				'kode_kategori' => $this->input->post('kode_kategori'),
				'keterangan' => $this->input->post('keterangan'),
			];

			
			$save_kategori = $this->model_kategori->change($id, $save_data);

			if ($save_kategori) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/kategori', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kategori');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/kategori');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Kategoris
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('kategori_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message('Kategori has been deleted.', 'success');
		} else {
            set_message('Error delete kategori.', 'error');
		}

		redirect('administrator/kategori');
	}

		/**
	* View view Kategoris
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kategori_view');

		$this->data['kategori'] = $this->model_kategori->find($id);

		$this->template->title('Kategori Detail');
		$this->render('backend/standart/administrator/kategori/kategori_view', $this->data);
	}
	
	/**
	* delete Kategoris
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kategori = $this->model_kategori->find($id);

		
		
		return $this->model_kategori->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kategori_export');

		$this->model_kategori->export('kategori', 'kategori');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kategori_export');

		$this->model_kategori->pdf('kategori', 'kategori');
	}
}


/* End of file kategori.php */
/* Location: ./application/controllers/administrator/Kategori.php */