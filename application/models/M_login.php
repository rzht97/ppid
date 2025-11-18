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

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

 public function getAll()
    {
    	$useradmin =$this->session->userdata("nama");
        return $this->db->get_where($this->_table, ["username" => $useradmin ])->result();

        // return $this->db->get_where($this->_table, ["judul" => "tes"])->result();
    }


      public function getById($id)
    {
        return $this->db->get_where($this->_table, ["username" => $id])->row();
    }


    public function update()
    {
        $post = $this->input->post();
        $this->username = $post["username"];
        $this->password = md5($post["password"]);
	
	
        $this->db->update($this->_table, $this, array('username' => $post['id']));
    }
}