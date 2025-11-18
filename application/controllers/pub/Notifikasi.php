<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notifikasi extends CI_Controller {
	
	
    public function kirimemail()
    {                
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com', // atau smptp lainnya                
            'smtp_user' => 'ppidsumedangkab@gmail.com',  // Email gmail admin aplikasi
            'smtp_pass'   => 'ogmxkllpglzkogfe',  // Password Gmail atau Sandi Aplikasi Gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];        
        $this->load->library('email', $config); // panggil library email
        $this->email->from('ppidsumedangkab@gmail.com','PPID Kabupaten Sumedang');
        $this->email->to('info.jogjatech@gmail.com');            
        $this->email->subject('Verifikasi Akun PPID Kab. Sumedang');
        $this->email->message('Yth. Pengajuan akun PPID Kab. Sumedang telah diverifikasi. silahkan buat permohonan informasi sekarang, terimakasih');
        if($this->email->send()){
            echo 'Sukses, email berhasil dikirimkan, coba deh cek email kamu ada surat cinta dari aku :)';
        }else{
            echo 'Error, Gagal melakukan kirim email, cek koneksi jaringan dan lainnya.';
        }
    }
    
}