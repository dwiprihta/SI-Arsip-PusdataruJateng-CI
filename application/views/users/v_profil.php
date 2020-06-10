
<!-- CONTAIN -->
<div class="container-fluid">

 <!-- Breadcums -->
 <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profil</li>
            </ol>
          </nav>
          
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-user"></i> PROFIL USER</h6>
                </div>
                <div class="card-body">
  
               <div class="row">
               <div class="col-lg-4">
               <img style="border-radius:10px;" width="100%" src="<?php echo base_url('/assets/img/foto_pegawai/')?><?= $this->session->userdata('foto'); ?>"  alt="foto pegawai">

               <a data-toggle="modal" data-target="#modaledit<?= (ucfirst($this->session->userdata('nip'))); ?>" data-whatever="@mdo" class="btn btn-sm btn-success btn-block mt-2" href=""><i class="fa fa-key" ></i> UBAH PASSWORD </a>

               </div>
               <div class="col-lg-8">
               <h4 class="small font-weight-bold">NIP Nomor Induk Pegawai</h4>
               <?= (ucfirst($this->session->userdata('nip'))); ?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Nama Pegawai</h4>
               <?= (ucfirst($this->session->userdata('nama'))); ?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Jenis Kelamin</h4>
               <?= (ucfirst($this->session->userdata('jenis_kelamin'))); ?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Instansi</h4>
               <?= (ucfirst($this->session->userdata('instansi'))); ?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Jabatan</h4>
               <?= (ucfirst($this->session->userdata('jabatan'))); ?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Pangkat</h4>
               <?= (ucfirst($this->session->userdata('pangkat'))); ?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Pangkat</h4>
               <?= (ucfirst($this->session->userdata('golongan'))); ?>
               <hr class="mt-1">


               </div>
               </div>

                    </div>
               </div>
          </div>
     </div>

    
</div>
</div>
<!-- MODAL EDIT -->

<div class="modal fade" id="modaledit<?= (ucfirst($this->session->userdata('nip'))); ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-question-circle"></i> Ubah Password akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <form action="<?php echo base_url('user/ubah_user');?>" method="POST">      
                         <div class="form-group">
                         <input type="text" class="form-control" name="nip" id="inputAddress" placeholder="" value="<?= (ucfirst($this->session->userdata('nip'))); ?>">  
 
                         <div class="form-group">
                         <label for="inputAddress">Password Lama</label>
                         <input type="password" class="form-control" id="pass" name="pass" placeholder="Password lama">  
                         <small class="form-text text-danger"><?= form_error('pass1');?></small>
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Password Baru</label>
                         <input type="password" class="form-control" id="pass1"  required="" name="pass1" placeholder="Password baru">  
                         <small class="form-text text-danger"><?= form_error('pass2');?></small>
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Ulangi Password baru</label>
                         <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Ulangi Password baru">  
                         <small class="form-text text-danger"><?= form_error('pass2');?></small>
                         </div>
                        
                         </div>

                         <div class="modal-footer">
                            <button type="submit" name="input" class="btn btn-primary"><i class= 'fa fa-check'></i> Ubah</button>  
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class='fa fa-times'></i> Batal</button>
                         </form>
                         </div>
                         </div>
              </div>
            </div>
        </div>
       <!-- MODAL EDIT -->
       
<script type="text/javascript">

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function tampilkanPreview(userfile,idpreview)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png atau .jpg.");
      }
  }
}
</script>



       


         