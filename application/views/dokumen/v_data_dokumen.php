
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcums -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Dokumen Pegawai</li>
            </ol>
          </nav>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw fa-book"></i> ARSIP PEGAWAI AKTIF</h6>
            </div>
            <div class="card-body">

                    <a href="" id="dropdownMenu1" data-toggle="dropdown"  class=" btn btn-sm btn-primary dropdown-toggle shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah data</a>
                      <ul class="dropdown-menu">  
                      <li class="list-group-item"><a href="<?= base_url('dokumen/add_dokumen');?>" style="text-decoration:none; margin-right: 10px ;" ><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Manual</a></li>
                      <li class="list-group-item"><a href=""  data-toggle="modal" data-target="#modalup"  style="text-decoration:none; margin-right: 10px ;" ><i class="fa fa-upload" aria-hidden="true"></i> Import data</a></li>
                  </ul>

                  <a href="<?= base_url('dokumen');?>" class="btn btn-sm btn-warning shadow-sm"><i class="fa fa-loading fa-sm text-white-50"></i> Refresh</a>
                  <?=$this->session->flashdata('notif');?>
                <hr>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</td>
                      <th >Nama</th>
                      <th>NIP</th>
                      <th>Instansi</th>
                      <th width="8%">Rak</th>
                      <th width="10%">Blok</th>
                      <th width="5%">No Berkas</th>
                      <th width="5%">Tempat Simpan</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</td>
                      <th >Nama</th>
                      <th>NIP</th>
                      <th>Instansi</th>
                      <th width="8%">Rak</th>
                      <th width="10%">Blok</th>
                      <th>No Berkas</th>
                      <th>Tempat Simpan</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                  $i=1;
                  foreach($dokumen as $mhs):?>
                   
                    <tr>
                        <td><?= $i;?></td>
                        <td class="le nm"><?= (ucfirst($mhs['nama']));?></td>
                        <td><?=$mhs['nip'];?></td>
                        <td><?=$mhs['instansi'];?></td>
                        <td><?=$mhs['rak'];?></td>
                        <td><?=$mhs['box'];?></td>
                        <td><?=$mhs['definitif'];?></td>
                        <td><?=$mhs['penyimpanan'];?></td>
                       
                        <td> 
                        <a tootltip="DETAIL DATA" class="btn btn-sm btn-success" href="<?php echo base_url();?>dokumen/detil_dokumen/<?=$mhs['nip'];?>"><i class="fa fa-eye"></i></a>
                        <a tooltip="EDIT DATA" class="btn btn-sm btn-primary" href="<?php echo base_url();?>dokumen/ubah_dokumen/<?=$mhs['nip'];?>"><i class="fa fa-pen"></i></a>
                        <a tooltip="HAPUS DATA" class="btn btn-sm btn-danger" onclick="return confirm ('Apakah anda yakin akan menghapus data ini ?')" href="<?php echo base_url();?>dokumen/del_dokumen/<?=$mhs['nip'];?>"><i class="fa fa-trash"></a></td>
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

      <!-- MODAL UPLOAD -->
      <div class="modal fade" id="modalup" tabindex="-1" role="dialog" aria-labelledby="modalUp" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-upload"></i> Upload Data Dokumen Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
                      </div>
                      <div class="modal-body">

                      <div class="alert alert-info mt-2" role="alert"><a class="btn btn-sm btn-info" href="<?php echo base_url("excel/format_dokumen.xlsx"); ?>">Download Template Pengisian <i class='fa fa-download'></i></a> </div>

                        <form class="form-inline" action="<?php echo base_url('dokumen/import');?>" method="POST" enctype="multipart/form-data"> 
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




