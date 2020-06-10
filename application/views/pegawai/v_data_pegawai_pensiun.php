

        <!-- Begin Page Content -->

        <div class="container-fluid">



          <!-- Breadcums -->

          <nav aria-label="breadcrumb">

            <ol class="breadcrumb bg-white">

              <li class="breadcrumb-item"><a href="#">Beranda</a></li>

              <li class="breadcrumb-item active" aria-current="page">Data Pegawai pensiun</li>

            </ol>

          </nav>

          

          <!-- DataTales Example -->

          <div class="card shadow mb-4">

            <div class="card-header py-3">

              <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw fa-user"></i> DATA PEGAWAI PENSIUN</h6>

            </div>

            <div class="card-body">



                  <!-- <a href="<?= base_url('pegawai/add_pegawai');?>" data-toggle="modal" data-target="#modaltambah" class=" btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah data</a> -->

                  <!-- <a href="<?= base_url('pegawai');?>" class="btn btn-sm btn-warning shadow-sm"><i class="fa fa-loading fa-sm text-white-50"></i> Refresh</a> -->

                 

                  <?=$this->session->flashdata('notif');?>

                <!-- <hr> -->

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

                       <th>Thn Pensiun</th>

                      <th>status</th>

                      <th><center>Action</center></th>

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

                      <th>Thn Pensiun</th>

                      <th>status</th>

                      <th class="act"><center>Action</center></th>

                    </tr>

                  </tfoot>

                  <tbody>

                  <?php 

                  $i=1;

                  foreach($pegawai as $mhs):?>

                   

                    <tr>

                        <td><?= $i;?></td>

                        <td class="le nm"> <a style="text-decoration:none;" tootltip="DETAIL DATA" href="<?php echo base_url();?>pegawai/detil_pegawai/<?=$mhs['nip'];?>">  <?=(ucfirst($mhs['nama']));?></li></td>

                        <td><?=$mhs['nip'];?></td> 

                        <td><?=$mhs['jabatan'];?></td>    

                        <td><?=$mhs['pangkat'];?></td>

                        <td><?=$mhs['golongan'];?></td>

                        <td><?=$mhs['instansi'];?></td>  

                        <td><?=$mhs['tanggal_pensiun'];?></td>



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

                         <input type="hidden" class="form-control"  required="" name="jabatan" id="inputPassword4" placeholder="" value="<?= $mhs['id_jabatan'];?>">

                         <input type="hidden" class="form-control"  required="" name="pangkat" id="inputPassword4" placeholder="" value="<?= $mhs['id_pangkat'];?>">

                         <input type="hidden" class="form-control"  required="" name="status" id="inputAddress" placeholder="" value="pensiun">                         

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

                         <label for="exampleFormControlSelect1">Jabatan</label>

                         <select class="form-control" name="pangkat" required="" id="exampleFormControlSelect1">

                              <?php foreach($pangkat as $jr):?>

                                   <option value="<?= $jr['id_pangkat'];?>"><?= $jr['pangkat'];?></option>

                              <?php endforeach;?>      

                         </select>

                         </div>





                         <div class="form-group">

                         <label for="exampleFormControlSelect1">Jabatan</label>

                         <select class="form-control" name="jabatan" required="" id="exampleFormControlSelect1">

                              <?php foreach($jabatan as $jr):?>

                                   <option value="<?= $jr['id_jabatan'];?>"><?= $jr['jabatan'];?></option>

                              <?php endforeach;?>      

                         </select>

                         </div>



                         <div class="form-group">

                         <label for="exampleFormControlSelect1">Status</label>

                         <select class="form-control" name="status" required="" id="exampleFormControlSelect1">

                            <option value="aktif">AKTIF</option>

                            <option value="pensiun">PENSIUN</option>    

                         </select>

                         </div>



                         <div class="modal-footer">

                            <button type="submit" name="input" class="btn btn-primary"><i class= 'fa fa-save'></i> Simpan Data</button>  

                            <button type="RESET" class="btn btn-danger">Reset</button>

                         </form>

                         </div>

                         </div>

              </div>

            </div>

        

      

       <!-- MODAL TAMBAH -->



       <script>

            $(document).ready(function () {

                $("#instansi").select2({

                    placeholder: "Please Select"

                });



                $("#kota2").select2({

                    placeholder: "Please Select"

                });

            });

        </script>





