
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcums -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pegawai aktif</li>
            </ol>
          </nav>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw fa-users"></i> DATA PEGAWAI AKTIF</h6>
            </div>

            <div class="card-body">

                  <a href="<?= base_url('pegawai/add_pegawai');?>" id="dropdownMenu1" data-toggle="dropdown"  class=" btn btn-sm btn-primary dropdown-toggle shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah data</a>
                  <ul class="dropdown-menu">  
              
                    <li class="list-group-item"><a href="" data-toggle="modal" data-target="#modaltambah"  style="text-decoration:none; margin-right: 10px ;" ><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Manual</a></li>
                    <li class="list-group-item"><a href="" data-toggle="modal" data-target="#modalup"  style="text-decoration:none; margin-right: 10px ;" ><i class="fa fa-upload" aria-hidden="true"></i> Import data</a></li>
                 
                  </ul>

                  <a href="<?= base_url('pegawai');?>" class="btn btn-sm btn-warning shadow-sm"><i class="fa fa-loading fa-sm text-white-50"></i> Refresh</a>
                 
                  <?=$this->session->flashdata('notif');?>
                <hr>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>#</td>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>Jabatan</th>
                      <th>Pangkat</th>
                      <th>Golongan</th>
                      <th>Instansi</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <td>#</td>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>Jabatan</th>
                      <th>Pangkat</th>
                      <th>Golongan</th>
                      <th>Instansi</th>
                      <th>status</th>
                      <th class="act">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                  $i=1;
                  foreach($pegawai as $mhs):?> 
                    <tr>
                        <td><?= $i;?></td>
                        <td class="le nm"> <a style="text-decoration:none;" tootltip="DETAIL DATA" href="<?= base_url('pegawai/detil_pegawai/')?><?= $mhs['nip'];?>"><?=(ucfirst($mhs['nama']));?></li></td>
                        <td><?=$mhs['nip'];?></td>
                        <td><?=$mhs['jabatan'];?></td>
                        <td><?=$mhs['pangkat'];?></td>
                        <td><?=$mhs['golongan'];?></td>
                        <td><?=(ucfirst($mhs['instansi']));?></td>
                       
                       
                       
                        <?php if ($mhs['status']=="aktif") { ?>
                            <td><a class="badge badge-lg badge-success p-1" href="<?php echo base_url();?>pegawai/ubah_pegawai/<?=$mhs['nip'];?>" data-toggle="modal" data-target="#modaledit<?=$mhs['nip'];?>" data-whatever="@mdo" href="#" class="btn btn-sm btn-success mt-2 ml-1"  \><?=$mhs['status'];?></a></td>
                        <?php }else{?>
                            <td> <div class="badge badge-danger p-1"><?=$mhs['status'];?></div></td>
                        <?php } ?>

                        <td> 
                       
                        <a tooltip="EDIT DATA" class="btn btn-sm btn-primary" href="<?php echo base_url();?>pegawai/ubah_pegawai/<?=$mhs['nip'];?>"><i class="fa fa-pen"></i></a>
                        <a tooltip="HAPUS DATA" class="btn btn-sm btn-danger" onclick="return confirm ('Apakah anda yakin akan menghapus data ini ?')" href="<?php echo base_url();?>pegawai/del_pegawai/<?=$mhs['nip'];?>"><i class="fa fa-trash"></a></td>
                    </tr>
                    <?php $i++;?>
                <?php endforeach;?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- MODAL EDIT -->
      <?php 
      foreach($pegawai as $mhs):?>
      <div class="modal fade" id="modaledit<?=$mhs['nip'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-question-circle"></i> Apakah anda yakin ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">
              <p>Apakah anda yakin akan mengubah  <b><?=$mhs['nama'];?></b> menjadi Pensiun ? data pegawai yang sudah pensiun tidak dapat diaktifkan kembali !

              <form action="<?php echo base_url('pegawai/ubah_pegawaii');?>" method="POST">      
                         <div class="form-group">
                         <input type="hidden" class="form-control"  required="" name="nip" id="inputAddress" placeholder="" value="<?=$mhs['nip'];?>"> 
                         <input type="hidden" class="form-control"  required="" name="nama" id="inputAddress" placeholder="" value="<?=$mhs['nama'];?>">  
                         <input type="hidden" class="form-control"  required="" name="jk" id="inputAddress" placeholder="" value="<?=$mhs['jenis_kelamin'];?>">  
                         <input type="hidden" class="form-control"  required="" name="tmp_lahir" id="inputEmail4" placeholder="Tempat Lahir" value="<?= $mhs['tempat_lahir'];?>">
                         <input type="hidden" class="form-control"  required="" name="tgl_lahir" id="inputPassword4" placeholder="" value="<?= $mhs['tanggal_lahir'];?>">
                         <input type="hidden" class="form-control"  required="" name="instansi" id="inputPassword4" placeholder="" value="<?= $mhs['instansi'];?>">
                         <input type="hidden" class="form-control"  required="" name="jabatan" id="inputPassword4" placeholder="" value="<?= $mhs['jabatan'];?>">
                         <input type="hidden" class="form-control"  required="" name="pangkat" id="inputPassword4" placeholder="" value="<?= $mhs['pangkat'];?>">
                         <input type="hidden" class="form-control"  required="" name="golongan" id="inputPassword4" placeholder="" value="<?= $mhs['golongan'];?>">

                         <input type="hidden" class="form-control"  required="" name="status" id="inputAddress" placeholder="" value="pensiun"> 
                         <hr>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Tahun Pensiun</label>
                         <select class="form-control" name="tgl_pensiun" required="" id="exampleFormControlSelect1">
                            <option disabled="" value="">PILIH TAHUN PENSIUN</option>
                            <?php
                            $thn_skr = date('Y');
                            for ($x = $thn_skr; $x >= 2010; $x--) {
                            ?>
                                <option value="<?php echo $x ?>"><?php echo $x ?></option>
                            <?php
                            }
                            ?>
                        </select>
                         </div>

                         </div>
                         <div class="modal-footer">
                            <button type="submit" name="input" class="btn btn-primary"><i class= 'fa fa-check'></i> Pensiunkan</button>  
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class='fa fa-times'></i> Batal</button>
                         </form>
                         </div>
                         </div>
              </div>
            </div>
        </div>
        <?php endforeach;?>
       <!-- MODAL EDIT -->


      <!-- MODAL TAMBAH -->
        <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-user"></i> Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <form action="<?php echo base_url('pegawai/add_pegawai');?>" method="POST">      
                         <div class="form-group">
                         <label for="inputAddress">NIP (Nomor Induk Pegawai)</label>
                         <input type="text" class="form-control" required="" name="npm" id="inputAddress" placeholder="NIP">
                         <small class="form-text form-danger"><?= form_error('npm');?></small>
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Nama</label>
                         <input type="text" class="form-control"  required="" name="nama" id="inputAddress" placeholder="Nama pegawai">  
                         </div>

                         <div class="form-group"  required="">
                         <label>Jenis Kelamin</label><br>
                         <div class="custom-control custom-radio custom-control-inline">
                         <input type="radio" id="customRadioInline1" name="jk" value="laki-laki" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline1">LAKI-LAKI</label>
                         </div>

                         <div class="custom-control custom-radio custom-control-inline">
                         <input type="radio" id="customRadioInline2" name="jk" value="perempuan" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline2">PEREMPUAN</label>
                         </div> 
                         <small class="form-text text-danger"><?= form_error('jk');?></small>
                         </div> 

                         <div class="form-row">
                         <div class="form-group col-md-6">
                         <label for="inputEmail4">Tempat Lahir</label>
                         <input type="text" class="form-control"  required="" name="tmp_lahir" id="inputEmail4" placeholder="Tempat Lahir">
                         </div>

                         <div class="form-group col-md-6">
                         <label for="inputPassword4">Tanggal Lahir</label>
                         <input type="date" class="form-control"  required="" name="tgl_lahir" id="inputPassword4" placeholder="">
                         </div>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Instansi</label>
                         <select class="form-control" name="instansi" required="">
                              <?php foreach($instansi as $jr):?>
                                   <option value="<?= $jr['instansi'];?>"><?= ucfirst($jr['instansi']);?></option>
                              <?php endforeach;?>      
                         </select>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Jabatan</label>
                         <select class="form-control" name="jabatan" required="" id="exampleFormControlSelect1">
                              <?php foreach($jabatan as $jr):?>
                                   <option value="<?= $jr['jabatan'];?>"><?= $jr['jabatan'];?></option>
                              <?php endforeach;?>      
                         </select>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Pangkat</label>
                         <select class="form-control" name="pangkat" required="" id="pangkat">
                              <?php foreach($pangkat as $jr):?>
                                   <option value="<?= $jr['pangkat'];?>"><?= $jr['pangkat'];?></option>
                              <?php endforeach;?>      
                         </select>
                         </div>


                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Golongan</label>
                         <select class="form-control" name="golongan" required="" id="exampleFormControlSelect1"> 
                            <?php foreach($golongan as $jr):?>
                                   <option value="<?= (ucfirst($jr['golongan']));?>"><?= (ucfirst($jr['golongan']));?></option>
                              <?php endforeach;?>   
                              
                         </select>
                         </div>

                         <input type="hidden" class="form-control"  required="" name="status" value="aktif">

                         <div class="modal-footer">
                            <button type="submit" name="input" class="btn btn-primary"><i class= 'fa fa-save'></i> Simpan Data</button>  
                            <button type="RESET" class="btn btn-danger">Reset</button>
                         </form>
                         </div>
                         </div>
              </div>
            </div>
        </div>
       <!-- MODAL TAMBAH -->

       <!-- MODAL UPLOAD -->
        <div class="modal fade" id="modalup" tabindex="-1" role="dialog" aria-labelledby="modalUp" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-upload"></i> Upload Data pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
                      </div>
                      <div class="modal-body">

                      <div class="alert alert-info mt-2" role="alert"><a class="btn btn-sm btn-info" href="<?php echo base_url("excel/format_pegawai.xlsx"); ?>">Download Template Pengisian <i class='fa fa-download'></i></a> </div>

                      <form class="form-inline" action="<?php echo base_url('pegawai/import');?>" method="POST" enctype="multipart/form-data"> 
                          <div class="form-group">
                          <input type="file" style="width:410px"  class="form-control" name="file" required accept=".xls, .xlsx"> 
                          </div>
                                    
                          <div class="form-group">
                          <button class="btn btn-success my-2 my-sm-0 ml-2" type="submit" name="import"><i class="fa fa-upload" aria-hidden="true"></i></button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
<!-- MODAL UPLOAD -->


       <!-- <script>
            $(document).ready(function () {
                $("#pangkat").select2({
                    placeholder: "Please Select"
                });
            });
        </script> -->



