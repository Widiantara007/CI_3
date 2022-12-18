<?php 
class Dosen extends CI_Controller{
    public function index(){

        $data['dosen'] = $this->M_dosen->read()->result();
        $this->load->view('template/header');
        $this->load->view('dosen/index', $data);
        $this->load->view('template/footer');
    }

    public function aksi_tambah(){
        $nama           = $this->input->post('nama');
        $nip            = $this->input->post('nip');
        $alamat         = $this->input->post('alamat');

        $data = array(
            'nama'          =>$nama,
            'nip'           =>$nip,
            'alamat'        =>$alamat
        );

        $this->M_dosen->tambah($data,'tb_dosen');
        $this->session->set_flashdata('input','<div class="alert alert-success text-center" role="alert">
        Data Berhasil Ditambah!
        </div>');
        
        redirect('Dosen/index');
    }

    public function aksi_delete($id){
        $where = array ('id' => $id);
        $this->M_dosen->hapus($where, 'tb_dosen');
        $this->session->set_flashdata('delete','<div class="alert alert-danger text-center" role="alert">
        Data Berhasil Dihapus!
        </div>');

        redirect('Dosen/index'); 
    }

    public function edit($id){
        $where = array('id' => $id);
        $data['dosen'] = $this->M_dosen->edit_data($where, 'tb_dosen')->result();

        $this->load->view('template/header');
        $this->load->view('dosen/edit',$data);
        $this->load->view('template/footer');
   }

   public function aksi_update(){
    $id             = $this->input->post('id');
    $nama           = $this->input->post('nama');
    $nip            = $this->input->post('nip');
    $alamat         = $this->input->post('alamat');

    $data = array(
        'nama'          =>$nama,
        'nip'           =>$nip,
        'alamat'        =>$alamat
    );
    $where = array ('id' => $id);
    $this->M_dosen->update_data($where, $data, 'tb_dosen');
    $this->session->set_flashdata('input','<div class="alert alert-success text-center" role="alert">
    Data Berhasil Diupdate!
    </div>');

    redirect('Dosen/index');
   }
}