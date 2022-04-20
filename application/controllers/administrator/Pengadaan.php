<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Pengadaan Controller
*| --------------------------------------------------------------------------
*| Pengadaan site
*|
*/
class Pengadaan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_pengadaan');
		
	}

	/**
	* show all Pengadaans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('pengadaan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['pengadaans'] = $this->model_pengadaan->get($filter, $field, $this->limit_page, $offset);
		$this->data['pengadaan_counts'] = $this->model_pengadaan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/pengadaan/index/',
			'total_rows'   => $this->model_pengadaan->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Pengadaan List');
		$this->render('backend/standart/administrator/pengadaan/pengadaan_list', $this->data);
	}
	
	/**
	* Add new pengadaans
	*
	*/
	public function add()
	{
		$this->is_allowed('pengadaan_add');

		$this->template->title('Pengadaan New');
		$this->render('backend/standart/administrator/pengadaan/pengadaan_add', $this->data);
	}

	/**
	* Add New Pengadaans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('pengadaan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('tanggal_pengadaan', 'Tanggal Pengadaan', 'trim|required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');
		$this->form_validation->set_rules('jenis_pengadaan', 'Jenis Pengadaan', 'trim|required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		

		if ($this->form_validation->run()) {
		
		$atr_barang = $this->input->post('nama_barang');
		$pieces = explode("-", $atr_barang);

		$atr_jenis_pengadaan = $this->input->post('jenis_pengadaan');
		$pieces_pengadaan = explode("-", $atr_jenis_pengadaan);

		$kode_pengadaan = $pieces_pengadaan[0];
		$jenis_pengadaan = $pieces_pengadaan[1];

		$id_barang = $pieces[0];
		$kode_barang = $pieces[1];
		$nama_barang = $pieces[2];
		$kategori_barang = $pieces[3];
		$tanggal_pengadaan = $this->input->post('tanggal_pengadaan');

		$tanggal_pengadaan_edit = explode("-", $tanggal_pengadaan);

		$tahun_pengadaan = $tanggal_pengadaan_edit[0];
		$bulan_pengadaan = $tanggal_pengadaan_edit[1];

		$tanggal_pengadaan_fix = $tahun_pengadaan.'-'.$bulan_pengadaan;

		$kode_inventaris = $kode_barang.'-'.$kategori_barang.'-'.$kode_pengadaan.'-'.$tanggal_pengadaan_fix;

			$save_data = [
				'tanggal_pengadaan' => $this->input->post('tanggal_pengadaan'),
				'supplier' => $this->input->post('supplier'),
				'jenis_pengadaan' => $jenis_pengadaan,
				'keterangan' => $this->input->post('keterangan'),
				'id_barang' => $id_barang,
				'nama_barang' => $nama_barang,
				'deskripsi_barang' => $this->input->post('deskripsi_barang'),
				'harga' => $this->input->post('harga'),
				'jumlah' => $this->input->post('jumlah'),
			];

			

			
			$save_pengadaan = $this->model_pengadaan->store($save_data);
			$this->load->model('model_barang');
			$save_data_barang = [
				'kode_inventaris' => $kode_inventaris,
				
			];

			$save_barang = $this->model_barang->change($id_barang, $save_data_barang);

			if ($save_pengadaan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_pengadaan;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/pengadaan/edit/' . $save_pengadaan, 'Edit Pengadaan').' or  '.anchor('administrator/pengadaan', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/pengadaan/edit/' . $save_pengadaan, 'Edit Pengadaan'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pengadaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/pengadaan');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Pengadaans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('pengadaan_update');

		$this->data['pengadaan'] = $this->model_pengadaan->find($id);

		$this->template->title('Pengadaan Update');
		$this->render('backend/standart/administrator/pengadaan/pengadaan_update', $this->data);
	}

	/**
	* Update Pengadaans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('pengadaan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('tanggal_pengadaan', 'Tanggal Pengadaan', 'trim|required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');
		$this->form_validation->set_rules('jenis_pengadaan', 'Jenis Pengadaan', 'trim|required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal_pengadaan' => $this->input->post('tanggal_pengadaan'),
				'supplier' => $this->input->post('supplier'),
				'jenis_pengadaan' => $this->input->post('jenis_pengadaan'),
				'keterangan' => $this->input->post('keterangan'),
				'nama_barang' => $this->input->post('nama_barang'),
				'deskripsi_barang' => $this->input->post('deskripsi_barang'),
				'harga' => $this->input->post('harga'),
				'jumlah' => $this->input->post('jumlah'),
			];

			
			$save_pengadaan = $this->model_pengadaan->change($id, $save_data);

			if ($save_pengadaan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/pengadaan', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pengadaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/pengadaan');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Pengadaans
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('pengadaan_delete');

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
            set_message('Pengadaan has been deleted.', 'success');
		} else {
            set_message('Error delete pengadaan.', 'error');
		}

		redirect('administrator/pengadaan');
	}

		/**
	* View view Pengadaans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('pengadaan_view');

		$this->data['pengadaan'] = $this->model_pengadaan->find($id);

		$this->template->title('Pengadaan Detail');
		$this->render('backend/standart/administrator/pengadaan/pengadaan_view', $this->data);
	}
	
	/**
	* delete Pengadaans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$pengadaan = $this->model_pengadaan->find($id);

		
		
		return $this->model_pengadaan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('pengadaan_export');

		$this->model_pengadaan->export('pengadaan', 'pengadaan');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('pengadaan_export');

		$this->model_pengadaan->pdf('pengadaan', 'pengadaan');
	}
}


/* End of file pengadaan.php */
/* Location: ./application/controllers/administrator/Pengadaan.php */