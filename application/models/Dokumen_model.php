<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen_model extends CI_Model
{
    private $_table = "dokumen";

   
    public $judul;
    public $image = "Belum Tersedia";
	public $sumberdata;
	public $pejabat;
	public $pjinformasi;
    public $kategori;
	public $bentukinfo;
	public $jangkawaktu;
    public $tanggal;
    public $user;

    public function rules()
    {
        return [

            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],

            
            ['field' => 'kategori',
            'label' => 'Tanggal',
            'rules' => 'required']
        ];

    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();

        // return $this->db->get_where($this->_table, ["judul" => "tes"])->result();
    }


  public function getberkala()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "Berkala"])->result();
    }

 public function getsertamerta()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "Serta Merta"])->result();
    }

 public function getsetiapsaat()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "Setiap Saat"])->result();
    }

 public function getdikecualikan()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "Dikecualikan"])->result();
    }
public function getditolak()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "Ditolak"])->result();
    }
public function getkeberatan()
    {
     

        return $this->db->get_where($this->_table, ["kategori" => "Keberatan"])->result();
    }

public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->image = $this->_uploadImage();
        $this->judul = $post["judul"];
		$this->kategori = $post["kategori"];
	    $this->bentukinfo = $post["bentukinfo"];
	    $this->sumberdata = $post["sumberdata"];
	    $this->pejabat = $this->session->userdata("nama");
	    $this->pjinformasi = $this->session->userdata("nama");
	    $this->jangkawaktu = $post["jangkawaktu"];
        $this->tanggal = date('d-m-Y');
        $this->user = $this->session->userdata("nama");

        // Return the result of insert operation
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->judul = $post["judul"];

        // Handle file upload
	    $files_image = $_FILES["image"];
		if ($files_image["name"] != "") {
            $this->image = $this->_uploadImage("image");
        }
        // If no new file uploaded, keep existing image (don't set this->image)

	    $this->sumberdata = $post["sumberdata"];
	    $this->jangkawaktu = $post["jangkawaktu"];
	    $this->bentukinfo = $post["bentukinfo"];
        $this->kategori = $post["kategori"];
	    $this->tanggal = date('d-m-Y');

        // Return the result of update operation
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/dokumen/';
		$config['allowed_types']        = 'docx|doc|pdf|xlsx';
		$config['file_name']            = $this->id;
		$config['overwrite']			= true;
		$config['max_size']             = 10240; // UPDATED: 10MB (was 50MB) - Security improvement
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			$upload_data = $this->upload->data();

			// SECURITY: MIME Type Validation to prevent file type spoofing
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime = finfo_file($finfo, $upload_data['full_path']);
			finfo_close($finfo);

			// Whitelist of allowed MIME types for documents
			$allowed_mimes = array(
				'application/pdf',
				'application/msword',  // .doc
				'application/vnd.openxmlformats-officedocument.wordprocessingml.document',  // .docx
				'application/vnd.ms-excel',  // .xls
				'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'  // .xlsx
			);

			if (!in_array($mime, $allowed_mimes)) {
				// Invalid MIME type - delete file and return error
				unlink($upload_data['full_path']);
				$this->upload->display_errors('<p>', '</p>'); // Clear errors
				return "Belum Tersedia";
			}

			return $upload_data["file_name"];
		}

		return "Belum Tersedia";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->image != "Belum Tersedia") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/dokumen/$filename.*"));
		}
	}


    public function download($id){
        $query = $this->db->get_where('dokumen',array('id'=>$id));
        return $query->row_array();
    }
}
