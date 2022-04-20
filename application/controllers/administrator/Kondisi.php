<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kondisi_barang Controller
*| --------------------------------------------------------------------------
*| Kondisi_barang site
*|
*/
class Kondisi extends Admin  
{
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_kondisi');
    }

    /**
    * show all kondisis
    *
    * @var $offset String
    */
    public function index($offset = 0)
    {
        $this->is_allowed('kondisi_list');

        $filter = $this->input->get('q');
        $field  = $this->input->get('f');

        $this->data['kondisis'] = $this->model_kondisi->get($filter, $field, $this->limit_page, $offset);
        $this->data['kondisi_counts'] = $this->model_kondisi->count_all($filter, $field);

        $config = [
            'base_url'     => 'administrator/kondisi/index/',
            'total_rows'   => $this->model_kondisi->count_all($filter, $field),
            'per_page'     => $this->limit_page,
            'uri_segment'  => 4,
        ];

        $this->data['pagination'] = $this->pagination($config);

        $this->template->title('Kondisi Barang List');
        $this->render('backend/standart/administrator/kondisi/kondisi_list', $this->data);
    }
    
    /**
    * Add new kondisis
    *
    */
    public function add()
    {
        $this->is_allowed('kondisi_add');

        $this->template->title('Kondisi Barang New');
        $this->render('backend/standart/administrator/kondisi/kondisi_add', $this->data);
    }

    /**
    * Add New kondisis
    *
    * @return JSON
    */
    public function add_save()
    {
        if (!$this->is_allowed('kondisi_add', false)) {
            echo json_encode([
                'success' => false,
                'message' => 'Sorry you do not have permission to access'
                ]);
            exit;
        }

        $this->form_validation->set_rules('nama_kondisi', 'Nama kondisi', 'trim|required');
       
        

        if ($this->form_validation->run()) {
        
            $save_data = [
                'nama_kondisi' => $this->input->post('nama_kondisi'),
                // 'keterangan' => $this->input->post('keterangan'),
            ];

            
            $save_kondisi = $this->model_kondisi->store($save_data);

            if ($save_kondisi) {
                if ($this->input->post('save_type') == 'stay') {
                    $this->data['success'] = true;
                    $this->data['id']      = $save_kondisi;
                    $this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/kondisi/edit/' . $save_kondisi, 'Edit kondisi').' or  '.anchor('administrator/kondisi', ' Go back to list');
                } else {
                    set_message('Your data has been successfully stored into the database. '.anchor('administrator/kondisi/edit/' . $save_kondisi, 'Edit kondisi'), 'success');

                    $this->data['success'] = true;
                    $this->data['redirect'] = base_url('administrator/kondisi');
                }
            } else {
                if ($this->input->post('save_type') == 'stay') {
                    $this->data['success'] = false;
                    $this->data['message'] = 'Data not change';
                } else {
                    $this->data['success'] = false;
                    $this->data['message'] = 'Data not change';
                    $this->data['redirect'] = base_url('administrator/kondisi');
                }
            }

        } else {
            $this->data['success'] = false;
            $this->data['message'] = validation_errors();
        }

        echo json_encode($this->data);
    }
    
        /**
    * Update view kondisis
    *
    * @var $id String
    */
    public function edit($id)
    {
        $this->is_allowed('kondisi_update');

        $this->data['kondisi'] = $this->model_kondisi->find($id);

        $this->template->title('kondisi Update');
        $this->render('backend/standart/administrator/kondisi/kondisi_update', $this->data);
    }

    /**
    * Update kondisis
    *
    * @var $id String
    */
    public function edit_save($id)
    {
        if (!$this->is_allowed('kondisi_update', false)) {
            echo json_encode([
                'success' => false,
                'message' => 'Sorry you do not have permission to access'
                ]);
            exit;
        }
        
        $this->form_validation->set_rules('nama_kondisi', 'Nama kondisi', 'trim|required');
        // $this->form_validation->set_rules('departemen', 'Departemen', 'trim|required');
        
        if ($this->form_validation->run()) {
        
            $save_data = [
                'nama_kondisi' => $this->input->post('nama_kondisi'),
                // 'departemen' => $this->input->post('departemen'),
            ];

            
            $save_kondisi = $this->model_kondisi->change($id, $save_data);

            if ($save_kondisi) {
                if ($this->input->post('save_type') == 'stay') {
                    $this->data['success'] = true;
                    $this->data['id']      = $id;
                    $this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/kondisi', ' Go back to list');
                } else {
                    set_message('Your data has been successfully updated into the database. ', 'success');

                    $this->data['success'] = true;
                    $this->data['redirect'] = base_url('administrator/kondisi');
                }
            } else {
                if ($this->input->post('save_type') == 'stay') {
                    $this->data['success'] = false;
                    $this->data['message'] = 'Your data not change';
                } else {
                    $this->data['success'] = false;
                    $this->data['message'] = 'Data not change';
                    $this->data['redirect'] = base_url('administrator/kondisi');
                }
            }
        } else {
            $this->data['success'] = false;
            $this->data['message'] = validation_errors();
        }

        echo json_encode($this->data);
    }
    
    /**
    * delete kondisis
    *
    * @var $id String
    */
    public function delete($id)
    {
        $this->is_allowed('kondisi_delete');

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
            set_message('kondisi has been deleted.', 'success');
        } else {
            set_message('Error delete kondisi.', 'error');
        }

        redirect('administrator/kondisi');
    }

        /**
    * View view kondisis
    *
    * @var $id String
    */
    public function view($id)
    {
        $this->is_allowed('kondisi_view');

        $this->data['kondisi'] = $this->model_kondisi->find($id);

        $this->template->title('kondisi Detail');
        $this->render('backend/standart/administrator/kondisi/kondisi_view', $this->data);
    }
    
    /**
    * delete kondisis
    *
    * @var $id String
    */
    private function _remove($id)
    {
        $kondisi = $this->model_kondisi->find($id);

        
        
        return $this->model_kondisi->remove($id);
    }
    
    
    /**
    * Export to excel
    *
    * @return Files Excel .xls
    */
    public function export()
    {
        $this->is_allowed('kondisi_export');

        $this->model_kondisi->export('kondisi', 'kondisi');
    }

    /**
    * Export to PDF
    *
    * @return Files PDF .pdf
    */
    public function export_pdf()
    {
        $this->is_allowed('kondisi_export');

        $this->model_kondisi->pdf('kondisi', 'kondisi');
    }
}


/* End of file kondisi.php */
/* Location: ./application/controllers/administrator/kondisi.php */