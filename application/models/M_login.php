<?php 

class M_login extends CI_Model{	

    private $_table = "admin";

    public $id;
    public $username;
    public $password;
  

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required']
        ];

    }

	/**
	 * DEPRECATED: Use get_by_username() instead
	 * Keeping for backward compatibility
	 */
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	/**
	 * Get user by username only (for password verification)
	 * Used in new bcrypt authentication
	 */
	public function get_by_username($username){
		$username_clean = $this->db->escape_str($username);
		return $this->db->get_where($this->_table, ["username" => $username_clean])->row();
	}

	public function getAll()
    {
    	$useradmin = $this->session->userdata("nama");
        return $this->db->get_where($this->_table, ["username" => $useradmin])->result();
    }

	public function getById($id)
    {
        return $this->db->get_where($this->_table, ["username" => $id])->row();
    }

	/**
	 * Update user with bcrypt password hashing
	 * Fixed: Changed MD5 to bcrypt
	 */
    public function update()
    {
        $post = $this->input->post();
        $this->username = $post["username"];

        // Hash password with bcrypt (cost 10)
        if(!empty($post["password"])){
            $this->password = password_hash($post["password"], PASSWORD_BCRYPT, ['cost' => 10]);
        }

        $this->db->update($this->_table, $this, array('username' => $post['id']));
    }

	/**
	 * Create new user dengan bcrypt password
	 * Added: New method for user creation
	 */
	public function create($username, $password){
		$data = array(
			'username' => $username,
			'password' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 10])
		);

		return $this->db->insert($this->_table, $data);
	}

	/**
	 * Migration helper: Convert MD5 password to bcrypt
	 * Usage: Called when user successfully logs in with old MD5 password
	 */
	public function migrate_password($username, $new_password){
		$data = array(
			'password' => password_hash($new_password, PASSWORD_BCRYPT, ['cost' => 10])
		);

		$this->db->where('username', $username);
		return $this->db->update($this->_table, $data);
	}
}