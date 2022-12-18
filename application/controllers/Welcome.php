<?php 
class Welcome extends CI_Controller{

	public function index(){
		$data['mahasiswa'] = $this->M_mahasiswa->read_data()->result();
		$this->load->view('welcome_message',$data);
	}

	public function aksi_tambah(){
		$nama				= $this->input->post('nama');
		$nim				= $this->input->post('nim');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');

		$data = array(
			'nama'		=> $nama,
			'nim'		=> $nim,
			'jenis_kelamin'		=> $jenis_kelamin,
		);
		$this->M_mahasiswa->tambah_data($data, 'mahasiswa');
		$this->session->set_flashdata('success','<div class="alert alert-success text-center" role="alert">
		Data Berhasil Ditambahkan!!</div>');
		redirect('Welcome/index');
	}

	public function aksi_hapus($id){
		$where = array ('id' => $id);
		$this->M_mahasiswa->hapus_data($where, 'mahasiswa');
		$this->session->set_flashdata('delete','<div class="alert alert-danger text-center" role="alert">
		Data Berhasil Dihapus!!</div>');

		redirect('Welcome/index');
	}

	public function edit($id)
    {
        $where = array('id' => $id);
        $data['mahasiswa'] = $this->M_mahasiswa->edit_data($where,'mahasiswa')->
            result();
			$this->load->view('edit',$data);
    }

	public function aksi_update(){
		$id					= $this->input->post('id');
		$nama				= $this->input->post('nama');
		$nim				= $this->input->post('nim');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');

		$data = array(
			'nama'		=> $nama,
			'nim'		=> $nim,
			'jenis_kelamin'		=> $jenis_kelamin,
		);
		$where = array('id' => $id);
		$this->M_mahasiswa->update_data($where, $data, 'mahasiswa');
		$this->session->set_flashdata('update', '<div class="alert alert-success text-center" role="alert">
		Data Berhasil Di Update!!</div>');

		redirect('Welcome/index');

	}
}