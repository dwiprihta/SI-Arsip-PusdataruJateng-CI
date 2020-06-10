<!-- CONTAIN -->
<div class="container-fluid">
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-book"></i> TAMBAH DATA DOKUMEN PEGAWAI</h6>
               </div>
                <div class="card-body">

                <div class="row">
                    <div class="col-lg-6">
                    <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-book"></i> DATA PEGAWAI</h6><br>
                    <form action="<?php echo base_url('dokumen/add_dokumen');?>" method="POST">
                         <div class="form-group">
                         <label for="inputAddress">Cari Data Pegawai</label>
                         <input type="text" class="form-control"  id="find" name="find" placeholder="NIP / Nama Pegawai">
                         <small class="form-text text-danger"><?= form_error('npm');?></small>
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">NIP </label>
                         <input type="text" class="form-control" readonly="" id="nip"  required="" name="nip" id="inputAddress" placeholder="Nomor Induk Pegawai">  
                         <p id="alr" class="text-danger hide">Data map siswa ini sudah pernah ditambahkan!</p>
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Nama</label>
                         <input type="text" class="form-control" readonly="" id="nama"  required="" name="nama" placeholder="Nama Pegawai">  
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Instansi</label>
                         <input type="text" class="form-control" readonly="" id="instansi"  required="" name="instansi" id="inputAddress" placeholder="Pangkat/Golongan">  
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Pangkat</label>
                         <input type="text" class="form-control" readonly="" id="pangkat"  required="" name="pangkat" id="inputAddress" placeholder="Pangkat/Golongan">  
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Jabatan</label>
                         <input type="text" class="form-control" readonly="" id="jabatan"  required="" name="jabatan" id="inputAddress" placeholder="Jabatan">  
                         </div>
                    </div>

                    <div class="col-lg-6">
                    <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-book"></i> DATA PENYIMPANAN</h6><br>




                <!-- <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        Kode map terakhir kali dibuat <span class="btn btn-danger btn-sm"></span>
                    </div>
                </div> -->

                        <div class="form-group">
                        <label for="validationServer01">Data MAP terakhir dibuat</label>
                        <input type="text" readonly="" class="form-control is-valid" id="validationServer01" value="<?=$lastmap['penyimpanan']?>" required>
                        <!-- <div class="valid-feedback">
                            Nomor ini tidak ada bisa digunakan lagi !
                        </div> -->
                        </div>
                        <hr>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Rak</label>
                         <select class="form-control" id="d_cname" name="d_cname" required="">
                         <option readonly=""></option>
                         <?php foreach ($rak as $dt):?>
                            <option value="<?= $dt['rak'];?>">Rak <?= $dt['rak'];?></option>   
                         <?php endforeach; ?>
                         </select>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Blok</label>
                         <select class="form-control" id="d_fname" name="d_fname" required="">
                         <option readonly=""></option>
                         <?php foreach ($block as $dt):?>
                            <option value="<?= $dt['block'];?>">Blok <?= $dt['block'];?></option>   
                         <?php endforeach; ?>
                         </select>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">No Urut Berkas</label>
                         <select class="form-control" id="d_map" name="d_map" required="">
                         <option readonly=""></option>
                         <?php for($i = 1; $i <= 13; $i++) { ?>
                            <option value="<?=$i?>"><?=$i?></option>
                        <?php } ?>    
                         </select>
                        
                         </div>


                         <div class="form-group d_lokasi">
                         <label for="inputAddress"> Tempat Simpan</label>
                         <input type="text" class="form-control d_lokasi" readonly="" required="" id="d_kode_map" name="d_kode_map" placeholder="Data Simpan">  
                         <p id="warn" class="text-danger hide">Kode map sudah digunakan!</p>
                         </div>

                        <!-- DISINI BERKAS -->
                        <div class="form-group" style="margin-top:45px;">
                        <button type="submit" name="input" id="submit" class="btn btn-primary"><i class= 'fa fa-save'></i> Simpan Data</button>  
                        <button type="RESET" class="btn btn-danger">Reset</button>
                        </div>

                        </div>
                        </div>
                                           
                        <!-- DISINI BERKAS -->

                        <hr>
                        <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-book"></i> DATA DOKUMEN PEGAWAI</h6><BR>
                        <div class="row">

                        <!--KOLOM PERTAMA--->
                          <div class="col-lg-4">

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat lamaran masuk</label>
                                <select class="form-control" name="surat_lamaran" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Daftar riwayat hidup/CV</label>
                                <select class="form-control" name="cv" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK calon PNS</label>
                                <select class="form-control" name="sk_cpns" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">STTPL</label>
                                <select class="form-control" name="sttpl" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK PNS</label>
                                <select class="form-control" name="sk_pns" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Karpeg</label>
                                <select class="form-control" name="kapeg" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Taspen</label>
                                <select class="form-control" name="taspen" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Sumpah janji pegawai</label>
                                <select class="form-control" name="sumpah_pegawai" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Ijazah </label>
                                <select class="form-control" name="ijasah" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat kenaikan gaji berkala</label>
                                <select class="form-control" name="surat_kenaikan_gaji" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                          </div> 
                          <!--KOLOM PERTAMA--->


                        <!--KOLOM KEDUA--->
                          <div class="col-lg-4">

                          <div class="form-group">
                                <label for="exampleFormControlSelect1">SK kenaikan pangkat</label>
                                <select class="form-control" name="sk_kenaikan_pangkat" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK jabatan & pelantikan</label>
                                <select class="form-control" name="sk_jabatan" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Sumpah jabatan</label>
                                <select class="form-control" name="sumpah_jabatan" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK penempatan</label>
                                <select class="form-control" name="sk_penempatan" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Data keluarga</label>
                                <select class="form-control" name="data_keluarga" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">KARSU/KARIS</label>
                                <select class="form-control" name="karsu" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Akses BPJS/ Surat keterangan dokter</label>
                                <select class="form-control" name="akses_bpjs" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Suart-surat cuti</label>
                                <select class="form-control" name="surat_cuti" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat mutasi pegawai</label>
                                <select class="form-control" name="surat_mutasi" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">DP 3</label>
                                <select class="form-control" name="dp_tiga" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                          </div> 
                        <!--KOLOM KEDUA--->


                        <!--KOLOM KETIGA--->
                          <div class="col-lg-4">

                          <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat izin/ tugas belajar</label>
                                <select class="form-control" name="surat_belajar" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Penilaian prestasi kerja</label>
                                <select class="form-control" name="penilaian_prestasi" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Tanda jasa (satya lencana dll)</label>
                                <select class="form-control" name="tanda_jasa" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat keterangan penggunaan gelar</label>
                                <select class="form-control" name="surat_penggunaan_gelar" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Riwayat diklat</label>
                                <select class="form-control" name="riwayat_diklat" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat nikah dan akta kelahiran anak</label>
                                <select class="form-control" name="surat_nikah_akta" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat-surat tugas</label>
                                <select class="form-control" name="surat_tugas" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">KTP & KK</label>
                                <select class="form-control" name="ktp_kk" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Pendidikan profesi / spesialis</label>
                                <select class="form-control" name="pend_profesi" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK Pensiun</label>
                                <select class="form-control" name="sk_pensiun" required="" id="exampleFormControlSelect1">
                                    <option></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak ada">Tidak ada</option>    
                                </select>
                                </div>
                          </div> 
                         <!--KOLOM KETIGA--->
                        </div>
                    <hr>
                      
                    </form>
                </div>
    </div>                                  
</div>



         