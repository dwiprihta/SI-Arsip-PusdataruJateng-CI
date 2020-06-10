
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcums -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data golongan</li>
            </ol>
          </nav>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-street-view"></i> DATA GOLONGAN</h6>
            </div>
            <div class="card-body">

                  <a href="<?= base_url('golongan/add_golongan');?>" data-toggle="modal" data-target="#modaltambah" class=" btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah data</a>
                  <a href="<?= base_url('golongan');?>" class="btn btn-sm btn-warning shadow-sm"><i class="fa fa-loading fa-sm text-white-50"></i> Refresh</a>
                 
                  <?=$this->session->flashdata('notif');?>
                <hr>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>golongan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>golongan</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <form action="" method="POST"> 
                  <?php 
                  $i=1;
                  foreach($golongan as $mhs):?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?= (ucfirst($mhs['golongan']));?></td>

                        <?php if ($mhs['status']=="aktif") { ?>
                            <td><a class="badge badge-lg badge-success p-1" href="<?php echo base_url();?>golongan/ubah_golongan/<?=$mhs['id_golongan'];?>" data-toggle="modal" data-target="#modaledit<?=$mhs['id_golongan'];?>" data-whatever="@mdo" href="#" class="btn btn-sm btn-success mt-2 ml-1"  \><?=$mhs['status'];?></a></td>
                        <?php }else{?>
                            <td> <div class="badge badge-danger p-1"><?=$mhs['status'];?></div></td>
                        <?php } ?>
                    </tr>
                  <?php $i++;?>
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
      foreach($golongan as $mhs):?>
      <div class="modal fade" id="modaledit<?=$mhs['id_golongan'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-question-circle"></i> Apakah anda yakin ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">
              <p>Apakah anda yakin akan mengubah golongan <b><?=$mhs['golongan'];?></b> menjadi tidak aktif ?

              <form action="<?php echo base_url('golongan/ubah_golongan');?>" method="POST">      
                         <div class="form-group">
                         <input type="hidden" class="form-control"  required="" name="id" id="inputAddress" placeholder="" value="<?=$mhs['id_golongan'];?>">  

                         <input type="hidden" class="form-control"  required="" name="golongan" id="inputAddress" placeholder="" value="<?=$mhs['golongan'];?>">  
                        
                         <input type="hidden" class="form-control"  required="" name="status" id="inputAddress" placeholder="" value="nonaktif">  
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
                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-street-view"></i> Tambah golongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <form action="<?php echo base_url('golongan/add_golongan');?>" method="POST">      
                         <div class="form-group">
                         <label for="inputAddress">Nama golongan</label>
                         <input type="text" class="form-control"  required="" name="golongan" id="inputAddress" placeholder="Nama golongan">  
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


