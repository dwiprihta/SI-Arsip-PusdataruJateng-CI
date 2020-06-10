
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcums -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data arsip kembali</li>
            </ol>
          </nav>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-file"></i> DATA PENGEMBALIAN ARSIP</h6>
            </div>
            <div class="card-body">

                  <?=$this->session->flashdata('notif');?>
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Transaksi</th>
                      <th>Nama peminjam</th>
                      <th>Tanggal kembali</th>
                      <th>Petugas</th>
                      <th>catatan</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No Transaksi</th>
                      <th>Nama peminjam</th>
                      <th>Tanggal kembali</th>
                      <th>Petugas</th>
                      <th>catatan</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <form action="" method="POST"> 
                  <?php 
                  foreach($kembali as $mhs):?>
                    <tr>
                        <td><?=$mhs['no_pinjam'];?>
                        <td><i class="fas fa-fw fa-kembali"></i> <?= (ucfirst($mhs['nama']));?></td>
                        <td><?= (ucfirst($mhs['tanggal_kembali']));?></td>
                        <td><?= (ucfirst($mhs['petugas_k']));?></td>

                        <?php if ($mhs['catatan']==""){?>
                          <td>Tidak ada</td>
                        <?php } else{ ?>
                          <td><?= (ucfirst($mhs['catatan']));?></td>
                          <?php }?>
                        <td> <div class="badge badge-info p-1">kembali</div></td>

                        <td>
                        <!-- <a tootltip="DETAIL DATA" class="btn btn-sm btn-success" href="<?php echo base_url();?>pegawai/detil_pegawai/<?=$mhs['nip'];?>"><i class="fa fa-eye"></i></a> -->
                        <!-- <a tooltip="EDIT DATA" class="btn btn-sm btn-primary" href="" ><i class="fa fa-pen"></i></a> -->
                        <a tooltip="HAPUS DATA" class="btn btn-sm btn-danger" onclick="return confirm ('Apakah anda yakin akan menghapus data ini ?')" href="<?php echo base_url();?>pinjam/del_pinjam/<?=$mhs['no_pinjam'];?>"><i class="fa fa-trash"></a></td>
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
      foreach($kembali as $mhs):?>
      <div class="modal fade" id="modaledit<?=$mhs['no_pinjam'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-question-circle"></i> Pengembalian arsip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">
              <p>Apakah anda yakin akan mengembalikan arsip dengn nomor transaksi <b><?=$mhs['no_pinjam'];?></b> yang dikembali oleh  <b><?=$mhs['nama'];?></b> ? <hr>

              <form action="<?php echo base_url('kembali/ubah_kembali');?>" method="POST">      
                         <div class="form-group">
                         <input  class="form-control" type="hidden" name="no_pinjam" value="<?=$mhs['no_pinjam'];?>">
                         <input  class="form-control" type="hidden" name="nip" value="<?=$mhs['nip'];?>">  
                         <input  class="form-control" type="hidden" name="keperluan" value="<?=$mhs['keperluan'];?>"> 
                         <input  class="form-control" type="hidden" name="tanggal_kembali" value="<?=$mhs['tanggal_kembali'];?>">
                         <input  class="form-control" type="hidden" name="petugas" value="<?=$mhs['petugas'];?>">
                         <input  class="form-control" type="hidden" name="petugas_k" value=<?= (ucfirst($this->session->userdata('nama'))); ?>>

                         <div class="form-group">
                              <label>Catatan Pengembalian</label>
                              <textarea required="" class="form-control" rows="3" name="catatan"></textarea>
                        </div>
                        
                         </div>

                         <div class="modal-footer">
                            <button type="submit" name="input" class="btn btn-primary"><i class= 'fa fa-check'></i> Simpan</button>  
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
                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-file"></i> Tambah data kembali</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <form action="<?php echo base_url('kembali/add_kembali');?>" method="POST">      
                  
                      <div class="form-group">
                      <label>NIP</label>
                         <select class="form-control" style="width:470px;" name="nip" required="" id="select">
                              <?php foreach($pegawai as $jr):?>
                                   <option value="<?= $jr['nip'];?>"><?= $jr['nip'];?>-<?= $jr['nama'];?>-<?= $jr['instansi'];?></option>
                              <?php endforeach;?>      
                         </select>
                         </div>
                       
                         <div class="form-group">
                         <label for="inputAddress">Keperluan peminjaman</label>
                         <input type="text" class="form-control" id=""  required="" name="keperluan" placeholder="Keperluan">  
                         </div>

                         <input type="hidden" class="form-control" id=""  required="" name="petugas" placeholder="Keperluan" value="<?= (ucfirst($this->session->userdata('nama'))); ?>"> 


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


