
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcums -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data User</li>
            </ol>
          </nav>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-key"></i> DATA USER SISTEM</h6>
            </div>
            <div class="card-body">

                  <a href="<?= base_url('user/add_');?>" data-toggle="modal" data-target="#modaltambah" class=" btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah data</a>
                  <a href="<?= base_url('user');?>" class="btn btn-sm btn-warning shadow-sm"><i class="fa fa-loading fa-sm text-white-50"></i> Refresh</a>
                 
                  <?=$this->session->flashdata('notif');?>
                <hr>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIP</th>
                      <th>Nama User</th>
                      <th>Jabatan</th>
                      <th>Status Akun</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIP</th>
                      <th>Nama User</th>
                      <th>Jabatan</th>
                      <th>Status Akun</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <form action="" method="POST"> 
                  <?php 
                  foreach($user as $mhs):?>
                    <tr>
                        <td><?=$mhs['nip'];?>
                        <td><i class="fas fa-fw fa-user"></i> <?= (ucfirst($mhs['nama']));?></td>
                        <td><?= (ucfirst($mhs['jabatan']));?></td>
                      
                        <?php if ($mhs['status_akun']=="aktif") { ?>
                            <td><a class="badge badge-lg badge-success p-1" href=""><?=$mhs['status'];?></a></td>
                        <?php }else{?>
                            <td> <div class="badge badge-danger p-1"><?=$mhs['status_akun'];?></div></td>
                        <?php } ?>

                        <td>
                        <!-- <a tootltip="DETAIL DATA" class="btn btn-sm btn-success" href="<?php echo base_url();?>pegawai/detil_pegawai/<?=$mhs['nip'];?>"><i class="fa fa-eye"></i></a> -->
                        <a tooltip="EDIT DATA" class="btn btn-sm btn-primary" href="" data-toggle="modal" data-target="#modaledit<?=$mhs['nip'];?>" data-whatever="@mdo"><i class="fa fa-pen"></i></a>
                        <a tooltip="HAPUS DATA" class="btn btn-sm btn-danger" onclick="return confirm ('Apakah anda yakin akan menghapus data ini ?')" href="<?php echo base_url();?>user/del_user/<?=$mhs['nip'];?>"><i class="fa fa-trash"></a></td>
                        </td>
                    </tr>
                <?php endforeach;?>
                </form>
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
      foreach($user as $mhs):?>
      <div class="modal fade" id="modaledit<?=$mhs['nip'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-question-circle"></i> Ubah Password akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <form action="<?php echo base_url('user/ubah_user');?>" method="POST">      
                         <div class="form-group">
                         <input type="hidden" class="form-control" name="nip" id="inputAddress" placeholder="" value="<?=$mhs['nip'];?>">  
 
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
        <?php endforeach;?>
       <!-- MODAL EDIT -->


      <!-- MODAL TAMBAH -->
        <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-key"></i> Tambah User Sistem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <form action="<?php echo base_url('user/add_user');?>" method="POST">      
                        <!-- <div class="form-group">
                         <label for="inputAddress">Cari Data Pegawai</label>
                         <input type="text" class="form-control"  id="find" name="find" placeholder="NIP / Nama Pegawai">
                         <small class="form-text text-danger"><?= form_error('nip');?></small>
                         </div> -->

                      <div class="form-group">
                      <label>NIP</label>
                         <select class="form-control" style="width:470px;" name="nip" required="" id="select">
                              <?php foreach($pegawai as $jr):?>
                                   <option value="<?= $jr['nip'];?>"><?= $jr['nip'];?>-<?= $jr['nama'];?>-<?= $jr['instansi'];?></option>
                              <?php endforeach;?>      
                         </select>
                         </div>
                       

                         <div class="form-group">
                         <label for="inputAddress">Password</label>
                         <input type="password" class="form-control" id="pass"  required="" name="pass1" placeholder="Password">  
                         <small class="form-text text-danger"><?= form_error('pass1');?></small>
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Ulangi Password</label>
                         <input type="password" class="form-control" id="pass2"  required="" name="pass2" placeholder="Ulangi Password">  
                         <small class="form-text text-danger"><?= form_error('pass2');?></small>
                         </div>

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


