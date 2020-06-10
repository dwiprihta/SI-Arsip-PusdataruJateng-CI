
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcums -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data block</li>
            </ol>
          </nav>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-block-open"></i> DATA BLOK</h6>
            </div>
            <div class="card-body">

                  <a href="<?= base_url('block/add_block');?>" data-toggle="modal" data-target="#modaltambah" class=" btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah data</a>
                  <a href="<?= base_url('block');?>" class="btn btn-sm btn-warning shadow-sm"><i class="fa fa-loading fa-sm text-white-50"></i> Refresh</a>
                 
                  <?=$this->session->flashdata('notif');?>
                <hr>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Blok</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Nama Blok</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <form action="" method="POST"> 
                  <?php 
                  $i=1;
                  foreach($block as $mhs):?>
                    <tr>
                        <td><?=$mhs['id_block'];?>
                        <td>Blok <b><?= (ucfirst($mhs['block']));?></b></td>

                        <?php if ($mhs['status']=="aktif") { ?>
                            <td><a class="badge badge-lg badge-success p-1" href="<?php echo base_url();?>block/ubah_block/<?=$mhs['id_block'];?>" data-toggle="modal" data-target="#modaledit<?=$mhs['id_block'];?>" data-whatever="@mdo" href="#" class="btn btn-sm btn-success mt-2 ml-1"  \><?=$mhs['status'];?></a></td>
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
      foreach($block as $mhs):?>
      <div class="modal fade" id="modaledit<?=$mhs['id_block'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-question-circle"></i> Apakah anda yakin ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">
              <p>Apakah anda yakin akan mengubah block <b><?=$mhs['block'];?></b> menjadi tidak aktif ?

              <form action="<?php echo base_url('block/ubah_block');?>" method="POST">      
                         <div class="form-group">
                         <input type="hidden" class="form-control"  required="" name="id" id="inputAddress" placeholder="" value="<?=$mhs['id_block'];?>">  

                         <input type="hidden" class="form-control"  required="" name="block" id="inputAddress" placeholder="" value="<?=$mhs['block'];?>">  
                        
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
                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-block-open"></i> Tambah block</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <form action="<?php echo base_url('block/add_block');?>" method="POST">      
                         <div class="form-group">
                         <label for="inputAddress">Nama block</label>
                         <input type="text" class="form-control"  required="" name="block" id="inputAddress" placeholder="Nama block">  
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


