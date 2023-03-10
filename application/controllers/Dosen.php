<?php 
class Dosen extends CI_Controller{
    public function index(){

        $data['dosen'] = $this->M_dosen->read()->result();
        
        $this->load->view('template/header');
        $this->load->view('dosen/index', $data);
        $this->load->view('template/footer');
    }

    public function aksi_tambah(){
        $gambar         = $this->input->post('gambar');
        $nama           = $this->input->post('nama');
        $nip            = $this->input->post('nip');
        $alamat         = $this->input->post('alamat');

        if($gambar = ''){}else{
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'jpg|png';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar')){
                echo "Upload Gagal"; 
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }

        $data = array(
            'gambar'        =>$gambar,
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

   public function aksi_update()
   {
    
        $id = $this->input->post('id');
       // Load the upload library and set the preferences
       $config['upload_path'] = './assets/gambar';
       $config['allowed_types'] = 'gif|jpg|png';
       $this->load->library('upload', $config);
    
       // If the upload fails, display an error message
       if(!$this->upload->do_upload('gambar')){
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat'); 
        $data = array(
            'nama' => $nama,
            'nip' => $nip,
            'alamat' => $alamat
        );
        $this->db->where('id', $id);
        $this->db->update('tb_dosen', $data);
 
        // Redirect or display a success message
        redirect('Dosen/index');
       }
       else
       {
           // Get the data from the form
           $nama = $this->input->post('nama');
           $nip = $this->input->post('nip');
           $alamat = $this->input->post('alamat');
           $gambar = $this->upload->data();
           $gambar = $gambar['file_name'];
    
           // Update the name and image path in the database
           $data = array(
               'nama' => $nama,
               'nip' => $nip,
               'alamat' => $alamat,
               'gambar' => $gambar
           );
           $this->db->where('id', $id);
           $this->db->update('tb_dosen', $data);
    
           // Redirect or display a success message
           redirect('Dosen/index');
       }
   }
   
}