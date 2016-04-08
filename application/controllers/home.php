<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('m_biodata');
	}

	public function index()
	{
		$data['biodata'] = $this->m_biodata->tampil_biodata();

		$this->load->view('temp/header');
		$this->load->view('biodata',$data);
		$this->load->view('temp/footer');
	}

	public function tambah_biodata() {

		if ($_POST){

				$input_biodata = array(
					'nama' => $_POST['nama'],
					'kelamin'	=> $_POST['kelamin'],
					'alamat'	=> $_POST['alamat']
				);

				$this->m_biodata->tambah_biodata($input_biodata);
			}

		redirect(base_url().'home');

	}

	public function delete_biodata($id) {

		$this->m_biodata->delete_biodata($id);
		redirect(base_url().'home');

	}

	public function edit_biodata($id) {

		$data['biodata'] = $this->m_biodata->tampil_biodata_edit($id);

		$this->load->view('temp/header');
		$this->load->view('biodata',$data);
		$this->load->view('temp/footer');
	}

	public function edit_biodata_proses($id) {

		if ($_POST){

				$edit_biodata = array(
					'nama' 		=> $_POST['nama'],
					'kelamin'	=> $_POST['kelamin'],
					'alamat'	=> $_POST['alamat']
				);

				$this->m_biodata->edit_biodata($id,$edit_biodata);
			}

		redirect(base_url().'home');

	}


	public function mailku() {

		/*$this->email->from('aditya.radika@gmail.com', 'Aditya Radika');
		$this->email->to('felixaditya15@gmail.com'); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');	
		
		//$config['protocol'] = 'sendmail';
		//$config['mailpath'] = '/usr/sbin/sendmail';
		//$config['charset'] = 'iso-8859-1';
		//$config['wordwrap'] = TRUE;

		/*$config['protocol'] = 'smtp';
	    $config['smtp_host'] = 'smtp.mandrillapp.com';
	    $config['smtp_port'] = '587';
	    $config['smtp_timeout'] = '7';
	    $config['smtp_user'] = 'subscribeme.dev@gmail.com';
	    $config['smtp_pass'] = '2ATEgF7S1FNaNPReITN4ZA';

		$this->email->initialize($config);*/

				/*berhasil*/
				$this->load->library('email');

				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'smtp.mandrillapp.com';
				$config['smtp_port'] = '587';
				$config['smtp_timeout'] = '7';
				$config['smtp_user'] = 'subscribeme.dev@gmail.com';
				$config['smtp_pass'] = '2ATEgF7S1FNaNPReITN4ZA';
				$config['mailtype'] = 'html';
				$config['priority'] = 1;
				$this->email->initialize($config);
				$this->email->from('aditya.radika@gmail.com');
				$this->email->to('felixaditya15@gmail.com');
				$this->email->subject('Subject Binstubs');
				$this->email->message('Lorem ipsum');
				$this->email->send();
				if(!$this->email->send()){
					echo "gagal berhasil";
				};
				$this->email->clear();
				echo $this->email->print_debugger();
				

		/*berhasil 2
		require_once(APPPATH.'libraries/phpmailer/class.phpmailer.php');
		require_once(APPPATH.'libraries/phpmailer/class.smtp.php');

		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		try {
		$mail->Host       = "localhost"; // isi dengan host sesuai keinginan Anda
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host       = "smtp.gmail.com";
		$mail->Port       = 465;
		$mail->Username   = 'hyouka811@gmail.com';  // isi dengan gmail anda
		$mail->Password   = 'malfenf0321';       // isi dengan password gmail anda
		$mail->AddReplyTo('hyouka811@gmail.com', 'BPJS KESEHATAN');      
		$mail->AddAddress('felixaditya15@gmail.com', 'Felix Aditya'); // isi alamat tujuan email, NB : khusus untuk mengirim dari gmail ke yahoo agak lama
		$mail->SetFrom('hyouka811@gmail.com', 'BPJS KESEHATAN'); 
		$mail->Subject = 'Pendaftaran BPJS'; //subyek email
		$mail->AltBody = 'BPJS'; //alt body
		$mail->Body = 'Pendaftaran BPJS Berhasil Silahkan Melakukan pembayaran <br/> No. Rek : 1234567890 <br/> A/n : BPJS Kesehatan <br/> Setelah Melakukan Pembayaran diharapkan untuk mencetak e-ID BPJS Kesehatan di tautan berikut <br/><a href="localhost/bpjs/pendaftaran/aktivasi.php?no_peserta=123">Link e-ID</a>'; //body email
		$mail->Send();
		if($mail->Send()){
			echo "berhasil";
		}
		//echo 'Email berhasil dikirim';
		} catch (phpmailerException $e){
		echo $e;
		} catch (Exception $e) {
		echo $e;
		}*/

	}

}
