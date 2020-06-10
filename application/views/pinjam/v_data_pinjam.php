
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcums -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data pinjam</li>
            </ol>
          </nav>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-file"></i> DATA PINJAM ARSIP</h6>
            </div>
            <div class="card-body">

                  <a href="<?= base_url('pinjam/add_');?>" data-toggle="modal" data-target="#modaltambah" class=" btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah data</a>
                  <a href="<?= base_url('pinjam');?>" class="btn btn-sm btn-warning shadow-sm"><i class="fa fa-loading fa-sm text-white-50"></i> Refresh</a>
                 
                  <?=$this->session->flashdata('notif');?>
                <hr>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Transaksi</th>
                      <th>Nama peminjam</th>
                      <th>keperluan</th>
                      <th>Tanggal pinjam</th>
                      <th>Petugas</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No Transaksi</th>
                      <th>Nama peminjam</th>
                      <th>keperluan</th>
                      <th>Tanggal_pinjam</th>
                      <th>Petugas</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <form action="" method="POST"> 
                  <?php 
                  foreach($pinjam as $mhs):?>
                    <tr>
                        <td><?=$mhs['no_pinjam'];?>
                        <td><i class="fas fa-fw fa-pinjam"></i> <?= (ucfirst($mhs['nama']));?></td>
                        <td><?= (ucfirst($mhs['keperluan']));?></td>
                        <td><?= (ucfirst($mhs['tanggal_pinjam']));?></td>
                        <td><?= (ucfirst($mhs['petugas']));?></td>
                      
                        <td><a class="badge badge-lg badge-warning p-1" href="" data-toggle="modal" data-target="#modaledit<?=$mhs['no_pinjam'];?>" data-whatever="@mdo">dipinjam</a></td>

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
      foreach($pinjam as $mhs):?>
      <div class="modal fade" id="modaledit<?=$mhs['no_pinjam'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-question-circle"></i> Pengembalian arsip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">
              <p>Apakah anda yakin akan mengembalikan arsip dengn nomor transaksi <b><?=$mhs['no_pinjam'];?></b> yang dipinjam oleh  <b><?=$mhs['nama'];?></b> ? <hr>

              <form action="<?php echo base_url('pinjam/ubah_pinjam');?>" method="POST">      
                         <div class="form-group">
                         <input  class="form-control" type="hidden" name="no_pinjam" value="<?=$mhs['no_pinjam'];?>">
                         <input  class="form-control" type="hidden" name="nip" value="<?=$mhs['nip'];?>">  
                         <input  class="form-control" type="hidden" name="keperluan" value="<?=$mhs['keperluan'];?>"> 
                         <input  class="form-control" type="hidden" name="tanggal_pinjam" value="<?=$mhs['tanggal_pinjam'];?>">
                         <input  class="form-control" type="hidden" name="petugas" value="<?=$mhs['petugas'];?>">
                         <input  class="form-control" type="hidden" name="petugas_k" value=<?= (ucfirst($this->session->userdata('nama'))); ?>>

                         <div class="form-group">
                              <label>Catatan Pengembalian</label>
                              <textarea class="form-control" rows="3" name="catatan"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-file"></i> Tambah data pinjam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <form action="<?php echo base_url('pinjam/add_pinjam');?>" method="POST">      
                  
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


