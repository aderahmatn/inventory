<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Access Controller
*| --------------------------------------------------------------------------
*| access site
*|
*/
class Access extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model([
			'model_access',
			'model_group'
		]);
	}

	/**
	* show all access
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('access_list');

		$this->data['groups'] = $this->model_group->find_all();

		$this->template->title('Access List');
		$this->render('backend/standart/administrator/access/access_list', $this->data);
	}

	/**
	* Update accesss
	*
	* @var String $id 
	*/
	public function save()
	{
		if (!$this->is_allowed('access_update', false)) {
			return $this->response([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
		}

		$permissions = $this->input->post('id');
		$group_id = $this->input->post('group_id');

		$this->db->delete('aauth_perm_to_group', ['group_id' => $group_id]);
		if (count($permissions)) {
			$data = [];
			foreach ($permissions as $perms) {
				$data[] = [
					'perm_id' => $perms,
					'group_id' => $group_id,
				];
			}
			$save_access = $this->db->insert_batch('aauth_perm_to_group', $data);
		} else {
			$save_access = true;
		}

		if ($save_access) {
			$this->data = [
				'success' => true,
				'message' => 'Your data has been successfully updated into the database. ',
			];
		} else {
			$this->data = [
				'success' => false,
				'message' => 'Data not change ',
			];
		}

		return $this->response($this->data);
	}

	/**
	* Get Access group
	*
	* @var String $group_id 
	*/
	public function get_access_group($group_id)
	{
		if (!$this->is_allowed('access_list', false)) {
			echo '<center>Sorry you do not have permission to access</center>';
			exit;
		}
		$group_perms_groupping = [];

		$group_perms = $this->model_group->get_permission_group($group_id);
		foreach(db_get_all_data('aauth_perms') as $perms) { 

			$group_name = 'other';
			$perm_tmp_arr = explode('_', $perms->name);

			if (isset($perm_tmp_arr[0]) AND !empty($perm_tmp_arr[0])) {
				$group_name =  strtolower($perm_tmp_arr[0]);
			} 
			$group_perms_groupping[$group_name][] = $perms;
		}

		foreach($group_perms_groupping as $group_name => $childs) { ?>
			
			<li>
				<label class="text-green toggle-select-all-access" title="click to toggle check group" data-target=".<?= $group_name; ?>"><b><?= ucwords($group_name); ?></b></label>
			</li>
			<?php foreach($childs as $perms) { ?>
			<li>
				<label>
					<input type="checkbox" class="flat-red check <?= $group_name; ?>" name="id[]" value="<?= $perms->id; ?>" <?= array_search($perms->id, $group_perms) ? 'checked' : ''; ?>>
					<?= _ent(ucwords(clean_snake_case($perms->name))); ?>
				</label>
			</li>
			<?php }
		}
	}
}


/* End of file Access.php */
/* Location: ./application/controllers/administrator/Access.php */