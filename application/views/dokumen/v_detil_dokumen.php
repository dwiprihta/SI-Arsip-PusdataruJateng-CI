
<!-- CONTAIN -->
<div class="container-fluid">

 <!-- Breadcums -->
 <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail arsip dokumen aktif</li>
            </ol>
          </nav>
          
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <div class="row">
                          <div class="col-lg-6">
                            <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-user"></i> DATA PEGAWAI</h6>
                          </div>
                          <div class="col-lg-6">
                            <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-book"></i> DATA TEMPAT SIMPAN</h6>
                          </div>
                        </div>
                        </div>
                        <div class="card-body">
          
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="inputAddress">NIP </label>
                    <input type="text" class="form-control" readonly="" id="nip"  required="" name="nip" id="inputAddress" value="<?= $dokumen['nip'];?>">  
                    </div>

                    <div class="form-group">
                    <label for="inputAddress">Nama</label>
                    <input type="text" class="form-control" readonly="" id="nama"  required="" name="nama" placeholder="Nama Pegawai"  value="<?= $dokumen['nama'];?>">  
                    </div>

                    <div class="form-group">
                    <label for="inputAddress">Instansi</label>
                    <input type="text" class="form-control" readonly="" id="pangkat"  required="" name="pangkat" id="inputAddress"  value="<?= $dokumen['instansi'];?>">  
                    </div>


                    <div class="form-group">
                    <label for="inputAddress">Pangkat</label>
                    <input type="text" class="form-control" readonly="" id="pangkat"  required="" name="pangkat" id="inputAddress"  value="<?= $dokumen['pangkat'];?>">  
                    </div>

                    <div class="form-group">
                    <label for="inputAddress">Jabatan</label>
                    <input type="text" class="form-control" readonly="" id="jabatan"  required="" name="jabatan" id="inputAddress"  value="<?= $dokumen['jabatan'];?>">  
                    </div>

                    
               </div>

               
               <div class="col-lg-6"> 
                  <div class="form-group">
                  <label for="exampleFormControlSelect1">Rak</label>
                  <input type="text" class="form-control" readonly="" value="Rak <?= $dokumen['rak'];?>">
                  </div>

                  <div class="form-group">
                  <label for="exampleFormControlSelect1">Blok</label>
                  <input type="text" class="form-control" readonly="" value="Blok <?= $dokumen['box'];?>">
                  </div>

                  <div class="form-group">
                  <label for="exampleFormControlSelect1">No Urut Berkas</label>
                  <input type="text" class="form-control" readonly="" value="Nomor Urut <?= $dokumen['definitif'];?>">
                  </div>

                  <div class="form-group d_lokasi">
                  <label for="inputAddress">Tempat Simpan</label>
                  <input type="text" value="<?= $dokumen['penyimpanan'];?>" class="form-control d_lokasi" readonly="" required="" id="d_kode_map" name="d_kode_map" placeholder="Data Simpan">  
                  </div>

                  <div class="form-group d_lokasi">
                  <label for="inputAddress">.</label>
                  <?php if($dkm_p['status']=='dipinjam'){?>
                    <button class="btn btn-block btn-primary" disabled="" href="" data-toggle="modal" data-target="#modaltambah"><I class="fa fa-truck"></i> PINJAM DOKUMEN</button>
                  <?php } else{?>
                    <button class="btn btn-block btn-primary" href="" data-toggle="modal" data-target="#modaltambah"><I class="fa fa-truck"></i> PINJAM DOKUMEN</button>
                  <?php }?>
                  </div>
               </div>
               </div>

               
               <div class=" py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-list"></i> DATA ARSIP PEGAWAI AKTIF</h6>
                </div>

              <?php if($dkm_p['status']=='dipinjam'){?>
                <div class="alert alert-info mt-2" role="alert"> <strong><i class="fa fa-info-circle"></i> ARSIP PEGAWAI INI DALAM PEMINJAMAN ! </strong></div>
              <?php } else{?>
              
              <?php }?>
                <table class="table table-bordered table-hover">
              
            <thead>
                <tr>
                    <th width="">#</th>
                    <th width="">Nama Dokumen</th>
                    <th width="">Status</th>
                    <th width="">#</th>
                    <th width="">Nama Dokumen</th>
                    <th width="">Status</th>
                    <!-- <th width="">Petugas</th>
                    <th width="">Tanggal Pinjam</th>
                    <th width="">Petugas</th>
                    <th width="">Tanggal Kembali</th>
                    <th width="">Petugas</th> -->
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Surat Lamaran Masuk </td>
                <td><?php if ($dkm['surat_lamaran']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>

              <!-- KOLOM 2-->
                <td>16</td>
                <td>Akses BPJS/ Surat keterangan dokter</td>
                <td><?php if ($dkm['akses_bpjs']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>2</td>
                <td>Daftar riwayat hidup/CV </td>
                <td><?php if ($dkm['cv']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>17</td>
                <td>Suart-surat cuti</td>
                <td><?php if ($dkm['surat_cuti']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>3</td>
                <td>SK calon PNS</td>
                <td><?php if ($dkm['sk_cpns']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>18</td>
                <td>Surat mutasi pegawai</td>
                <td><?php if ($dkm['surat_mutasi']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>4</td>
                <td>STTPL</td>
                <td><?php if ($dkm['sttpl']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>19</td>
                <td>DP 3</td>
                <td><?php if ($dkm['dp_tiga']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>5</td>
                <td>SK PNS</td>
                <td><?php if ($dkm['sk_pns']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>20</td>
                <td>Surat izin/ tugas belajar</td>
                <td><?php if ($dkm['surat_belajar']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>6</td>
                <td>Karpeg</td>
                <td><?php if ($dkm['kapeg']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>21</td>
                <td>Penilaian prestasi kerja</td>
                <td><?php if ($dkm['penilaian_prestasi']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>7</td>
                <td>Taspen</td>
                <td><?php if ($dkm['taspen']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>22</td>
                <td>Tanda jasa (satya lencana dll)</td>
                <td><?php if ($dkm['tanda_jasa']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>8</td>
                <td>Sumpah janji pegawai</td>
                <td><?php if ($dkm['sumpah_pegawai']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
               <td>23</td>
                <td>Surat keterangan penggunaan gelar</td>
                <td><?php if ($dkm['surat_penggunaan_gelar']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>9</td>
                <td>Ijazah</td>
                <td><?php if ($dkm['ijasah']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>24</td>
                <td>Riwayat diklat</td>
                <td><?php if ($dkm['riwayat_diklat']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>10</td>
                <td>Surat kenaikan gaji berkala</td>
                <td><?php if ($dkm['surat_kenaikan_gaji']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>25</td>
                <td>Surat nikah dan akta kelahiran anak</td>
                <td><?php if ($dkm['surat_nikah_akta']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>11</td>
                <td>SK kenaikan pangkat</td>
                <td><?php if ($dkm['sk_kenaikan_pangkat']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>26</td>
                <td>Surat-surat tugas</td>
                <td><?php if ($dkm['surat_tugas']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>12</td>
                <td>SK jabatan & pelantikan</td>
                <td><?php if ($dkm['sk_jabatan']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>27</td>
                <td>KARSU/KARIS</td>
                <td><?php if ($dkm['karsu']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>
             
              </tr>

              <tr>
                <td>13</td>
                <td>Sumpah jabatan</td>
                <td><?php if ($dkm['sumpah_jabatan']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                 <!-- KOLOM 2-->
                 <td>28</td>
                <td>KTP & KK</td>
                <td><?php if ($dkm['ktp_kk']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>14</td>
                <td>SK penempatan</td>
                <td><?php if ($dkm['sk_penempatan']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                 <!-- KOLOM 2-->
                <td>29</td>
                <td>Pendidikan profesi / spesialis</td>
                <td><?php if ($dkm['pend_profesi']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td>15</td>
                <td>Data keluarga</td>
                <td><?php if ($dkm['data_keluarga']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                <?php } ?>
                </td>

                <!-- KOLOM 2-->
                <td>30</td>
                <td>SK Pensiun</td>
                <td><?php if ($dkm['sk_pensiun']=="ada"){?>
                  <div class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" title="ADA"><i class="fa fa-check"></i></div>
                  <?php }else{?>
                  <div class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" title="TIDAK ADA"><i class="fa fa-times"></i></div>
                  <?php } ?>
                </td>
              </tr>

            </tbody>
        </table>
        </div>
                

                    </div>
               </div>
          </div>
     </div>

     <!-- MODAL TAMBAH -->
     <div class="modal fade" id="modaltambah<?=$dkm['nip'];?>" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
          <div class="modal-dialog" role="dkm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-camera"></i> TAMBAH FOTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>
              </div>
              <div class="modal-body">

              <?php echo form_open_multipart('dkm/edit_foto'); ?>     
              <img id="preview" class="" style="margin-left:100px;border-radius:10px;" width="50%" src="<?php echo base_url('/assets/img/foto_dokumen/')?><?=$dkm['foto'];?>";/><hr>

							<input type="hidden" required="" class="form-control" name="nip" value="<?=$dkm['nip'];?>">  

              <div class="form-group">
							      <label style="float:left; margin-left: 15px;">Foto dkm</label>
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
                              <input type="NIP" required="" readonly="" class="form-control" name="nip" value="<?= $dokumen['nip'];?>">   
                        </div>

                        <div class="form-group">
                              <label>NIP</label>
                              <input type="NIP" required=""  readonly="" class="form-control" name="nama" value="<?= $dokumen['nama'];?>">   
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
    var preview=dkm.getElementById(idpreview);
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



       


         