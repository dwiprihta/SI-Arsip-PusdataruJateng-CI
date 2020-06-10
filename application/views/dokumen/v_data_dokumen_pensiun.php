

        <!-- Begin Page Content -->

        <div class="container-fluid">



          <!-- Breadcums -->

          <nav aria-label="breadcrumb">

            <ol class="breadcrumb bg-white">

              <li class="breadcrumb-item"><a href="#">Beranda</a></li>

              <li class="breadcrumb-item active" aria-current="page">Arsip Pegawai pensiun</li>

            </ol>

          </nav>

          

          <!-- DataTales Example -->

          <div class="card shadow mb-4">

            <div class="card-header py-3">

              <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw fa-book"></i> ARSIP PEGAWAI PENSIUN</h6>

            </div>

            <div class="card-body">

              <?=$this->session->flashdata('notif');?>

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                  <tr>

                      <th>#</td>

                      <th >Nama</th>

                      <th>NIP</th>

                      <th>Instansi</th>

                      <!-- <th width="8%">Rak</th> -->

                      <!-- <th width="10%">Boxs</th>

                      <th width="5%">No Berkas</th> -->

                      <th width="5%">Tempat Simpan</th>

                      <th width="10%">Status</th>
                      <th width="10%">Keterangan</th>

                      <th width="15%">Action</th>

                    </tr>

                  </thead>

                  <tfoot>

                    <tr>

                      <th>#</td>

                      <th >Nama</th>

                      <th>NIP</th>

                      <th>Instansi</th>

                      <th>Tempat Simpan</th>

                      <th width="10%">Status</th>
                      <th width="10%">Keterangan</th>

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

                        <?php if ($mhs['penyimpanan_pensiun']=="") { ?>

                            <td><a class="badge badge-lg badge-danger p-1" href="<?php echo base_url();?>dokumen/ubah_dokumen_p/<?=$mhs['nip'];?>" class="btn btn-sm btn-success mt-2 ml-1"\>BELUM DISET</a></td>

                        <?php }else{?>

                            <td><b>Boks <?=$mhs['penyimpanan_pensiun'];?></b></div></td>
                            

                        <?php } ?>

                        <?php
                          $tgl_save= $mhs['tanggal_pensiun'];
                          $tgl_due= $tgl_save + 2;
                          //var_dump($tgl_due); die;
                          $status_now=strtolower(substr($mhs['jabatan'],0,5));

                            if (date('Y') > $tgl_due):?>
                                <td> <div class="badge badge-warning p-1">inaktif</div></td>
                            <?php else:?>
                                <td> <div class="badge badge-success p-1">aktif</div></td>
                        <?php endif;?>


                        <?php 
                        //  $tgl_save= $mhs['tanggal_simpan'];
                        //  $tgl_due=date('Y-m-d', strtotime('+2 year', strtotime($tgl_save))); //tambah tanggal sebanyak 2 tahun
                        //  $status_now=strtolower(substr($mhs['jabatan'],0,5));
          
                          if ($status_now == "kabid" OR $status_now == "kepal"):?>
                            <td> <div class="badge badge-info p-1">permanen</div></td>
                            <?php else:?>
                                <?php 
                                if (date('Y-m-d') > $tgl_due):?>
                                    <td> <div class="badge badge-danger p-1">musnah</div></td>
                                <?php else:?>
                                    <td>-</td>
                                <?php endif;?>
                          <?php endif;?>

                        <td> 
                        <a tootltip="DETAIL DATA" class="btn btn-sm btn-success" href="<?php echo base_url();?>dokumen/detil_dokumen_p/<?=$mhs['nip'];?>"><i class="fa fa-eye"></i></a>
                        <a tooltip="EDIT DATA" class="btn btn-sm btn-primary" href="<?php echo base_url();?>dokumen/ubah_dokumen_p/<?=$mhs['nip'];?>"><i class="fa fa-pen"></i></a>
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









