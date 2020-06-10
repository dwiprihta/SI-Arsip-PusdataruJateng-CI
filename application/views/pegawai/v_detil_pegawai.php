
<!-- CONTAIN -->
<div class="container-fluid">

 <!-- Breadcums -->
 <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Pegawai</li>
            </ol>
          </nav>
          
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-user"></i> UBAH DATA PEGAWAI</h6>
                </div>
                <div class="card-body">
  
               <div class="row">
               <div class="col-lg-4">
               <img style="border-radius:10px;" width="100%" src="<?php echo base_url('/assets/img/foto_pegawai/')?><?=$pegawai['foto'];?>"  alt="foto pegawai">

              <div class="row">
                <div class="col-lg-6">
                  <a class="btn btn-sm btn-info btn-block mt-4" data-toggle="modal" data-target="#modaltambah<?=$pegawai['nip'];?>" href=""><i class="fa fa-camera"></i> </a>
                </div>

                <div class="col-lg-6">
                  <a data-toggle="tooltip" data-placement="top" title="Ubah data pegawai" class="btn btn-sm btn-success btn-block mt-4" href="<?php echo base_url();?>pegawai/ubah_pegawai/<?=$pegawai['nip'];?>"><i class="fa fa-pen" ></i> </a>
                </div>

                <!-- <div class="col-lg-4">
                  <form class="form-inline" action="<?php echo base_url('report/sortir_label');?>" target="blank" method="POST"> 
                    <div class="form-group">
                    <input type="hidden" style="width:410px"  class="form-control" name="label" value="<?=$pegawai['nip'];?>"> 
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-danger btn-block mt-4"><i class="fa fa-print" ></i> </button>
                    </div>
                   </form>
                </div> -->

        
              </div>

               </div>
               <div class="col-lg-8">
               <h4 class="small font-weight-bold">NIP Nomor Induk Pegawai</h4>
               <?=$pegawai['nip'];?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Nama Pegawai</h4>
               <?=$pegawai['nama'];?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Jenis Kelamin</h4>
               <?=$pegawai['jenis_kelamin'];?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Tempat tanggal lahir</h4>
               <?=$pegawai['tempat_lahir'];?> ,   <?=$pegawai['tanggal_lahir'];?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Instansi</h4>
              <?=$pegawai['instansi'];?>
               <hr class="mt-1">

               <h4 class="small font-weight-bold">Jabatan, Pangkat & Golongan</h4>
               <?=$pegawai['jabatan'];?>, <?=$pegawai['pangkat'];?> & <?=$pegawai['golongan'];?>
               <hr class="mt-1">
               
               <h4 class="small font-weight-bold">Status Pegawai</h4>
               <?=$pegawai['status'];?> 
               <hr class="mt-1">

               </div>
               </div>

                    </div>
               </div>
          </div>
     </div>

     <!-- MODAL TAMBAH -->
     <div class="modal fade" id="modaltambah<?=$pegawai['nip'];?>" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-camera"></i> TAMBAH FOTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <?php echo form_open_multipart('pegawai/edit_foto'); ?>     
              <img id="preview" class="" style="margin-left:100px;border-radius:10px;" width="50%" src="<?php echo base_url('/assets/img/foto_pegawai/')?><?=$pegawai['foto'];?>";/><hr>

							<input type="hidden" required="" class="form-control" name="nip" value="<?=$pegawai['nip'];?>">  

              <div class="form-group">
							      <label style="float:left; margin-left: 15px;">Foto Pegawai</label>
							      <div class="col-lg-12 col-md-12 col-sm-12">
							      <input type="file" required="" class="form-control" name="foto" onchange="tampilkanPreview(this,'preview')">  
							      </div>   
							</div>

              <div class="modal-footer">
                <button type="submit" name="input" class="btn btn-primary"><i class= 'fa fa-save'></i> Simpan Foto</button>  
                <button type="RESET" class="btn btn-danger">Reset</button>
                <?php echo form_close() ?>
              </div>
              </div>
  </div>
</div>
</div>
<!-- MODAL TAMBAH -->
       
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



       


         