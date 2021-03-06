<!-- CONTAIN -->
<div class="container-fluid">
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-book"></i> EDIT DATA DOKUMEN PEGAWAI PENSIUN</h6>
               </div>
                <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">

                    <form action="" method="POST">

                         <input type="hidden" class="form-control" readonly="" id="tgl"  required="" name="tgl" id="inputAddress" value="<?= $dokumen['tanggal_simpan'];?>"> 

                         <div class="form-group">
                         <label for="inputAddress">NIP </label>
                         <input type="text" class="form-control" readonly="" id="nip"  required="" name="nip" id="inputAddress" value="<?= $dokumen['nip'];?>">  
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Nama</label>
                         <input type="text" class="form-control" readonly="" id="nama"  required="" name="nama" placeholder="Nama Pegawai"  value="<?= $dokumen['nama'];?>">  
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Instansi Terakhir</label>
                         <input type="text" class="form-control" readonly="" id="pangkat"  required="" name="pangkat" id="inputAddress"  value="<?= $dokumen['instansi'];?>">  
                         </div>
                         
                         <input type="hidden" name="d_cname" value="<?= $dokumen['rak'];?>">
                         <input type="hidden" name="d_map" value="<?= $dokumen['definitif'];?>">
                         <input type="hidden" value="<?= $dokumen['penyimpanan'];?>" name="d_kode_map">
                         <input type="hidden" value="<?= $dokumen['box'];?>" name="d_fname">

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Boks Penyimpanan</label>
                         <select class="form-control is-valid" id="boks" name="simpan_pensiun" required="">
                            <option disabled="" value=""> Pilih Boks Penyimpanan</option>
                            <?php foreach ($box as $bx):?>
                                <option value="<?=$bx['box'];?>">Boks <?= $bx['box'];?></option>
                            <?php endforeach;?>
                         </select>
                         </div>
                    </div>
                 </div>    

                        <!-- DISINI BERKAS -->
                        <hr>
                        <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-book"></i> EDIT DATA DOKUMEN PEGAWAI</h6><BR>
                        <div class="row">

                        <!--KOLOM PERTAMA--->
                          <div class="col-lg-4">

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat lamaran masuk</label>
                                <select class="form-control" name="surat_lamaran" required="" id="exampleFormControlSelect1">
                                    <option value="<?= $dkm['surat_lamaran'];?>"><?= ucfirst($dkm['surat_lamaran']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Daftar riwayat hidup/CV</label>
                                <select class="form-control" name="cv" required="" id="exampleFormControlSelect1">
                                    <option value="<?= $dkm['cv'];?>"><?= ucfirst($dkm['cv']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK calon PNS</label>
                                <select class="form-control" name="sk_cpns" required="" id="exampleFormControlSelect1">
                                    <option value="<?= $dkm['sk_cpns'];?>"><?= ucfirst($dkm['sk_cpns']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">STTPL</label>
                                <select class="form-control" name="sttpl" required="" id="exampleFormControlSelect1">
                                    <option value="<?= $dkm['sttpl'];?>"><?= ucfirst($dkm['sttpl']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK PNS</label>
                                <select class="form-control" name="sk_pns" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['sk_pns'];?>"><?= ucfirst($dkm['sk_pns']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Karpeg</label>
                                <select class="form-control" name="kapeg" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['kapeg'];?>"><?= ucfirst($dkm['kapeg']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Taspen</label>
                                <select class="form-control" name="taspen" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['taspen'];?>"><?= ucfirst($dkm['taspen']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Sumpah janji pegawai</label>
                                <select class="form-control" name="sumpah_pegawai" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['sumpah_pegawai'];?>"><?= ucfirst($dkm['sumpah_pegawai']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Ijazah </label>
                                <select class="form-control" name="ijasah" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['ijasah'];?>"><?= ucfirst($dkm['ijasah']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat kenaikan gaji berkala</label>
                                <select class="form-control" name="surat_kenaikan_gaji" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['surat_kenaikan_gaji'];?>"><?= ucfirst($dkm['surat_kenaikan_gaji']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                          </div> 
                          <!--KOLOM PERTAMA--->


                        <!--KOLOM KEDUA--->
                          <div class="col-lg-4">

                          <div class="form-group">
                                <label for="exampleFormControlSelect1">SK kenaikan pangkat</label>
                                <select class="form-control" name="sk_kenaikan_pangkat" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['sk_kenaikan_pangkat'];?>"><?= ucfirst($dkm['sk_kenaikan_pangkat']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK jabatan & pelantikan</label>
                                <select class="form-control" name="sk_jabatan" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['sk_jabatan'];?>"><?= ucfirst($dkm['sk_jabatan']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Sumpah jabatan</label>
                                <select class="form-control" name="sumpah_jabatan" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['sumpah_jabatan'];?>"><?= ucfirst($dkm['sumpah_jabatan']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK penempatan</label>
                                <select class="form-control" name="sk_penempatan" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['sk_penempatan'];?>"><?= ucfirst($dkm['sk_penempatan']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Data keluarga</label>
                                <select class="form-control" name="data_keluarga" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['data_keluarga'];?>"><?= ucfirst($dkm['data_keluarga']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">KARSU/KARIS</label>
                                <select class="form-control" name="karsu" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['karsu'];?>"><?= ucfirst($dkm['karsu']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Akses BPJS/ Surat keterangan dokter</label>
                                <select class="form-control" name="akses_bpjs" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['akses_bpjs'];?>"><?= ucfirst($dkm['akses_bpjs']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Suart-surat cuti</label>
                                <select class="form-control" name="surat_cuti" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['surat_cuti'];?>"><?= ucfirst($dkm['surat_cuti']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat mutasi pegawai</label>
                                <select class="form-control" name="surat_mutasi" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['surat_mutasi'];?>"><?= ucfirst($dkm['surat_mutasi']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">DP 3</label>
                                <select class="form-control" name="dp_tiga" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['dp_tiga'];?>"><?= ucfirst($dkm['dp_tiga']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                          </div> 
                        <!--KOLOM KEDUA--->


                        <!--KOLOM KETIGA--->
                          <div class="col-lg-4">

                          <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat izin/ tugas belajar</label>
                                <select class="form-control" name="surat_belajar" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['surat_belajar'];?>"><?= ucfirst($dkm['surat_belajar']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Penilaian prestasi kerja</label>
                                <select class="form-control" name="penilaian_prestasi" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['penilaian_prestasi'];?>"><?= ucfirst($dkm['penilaian_prestasi']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Tanda jasa (satya lencana dll)</label>
                                <select class="form-control" name="tanda_jasa" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['tanda_jasa'];?>"><?= ucfirst($dkm['tanda_jasa']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat keterangan penggunaan gelar</label>
                                <select class="form-control" name="surat_penggunaan_gelar" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['surat_penggunaan_gelar'];?>"><?= ucfirst($dkm['surat_penggunaan_gelar']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Riwayat diklat</label>
                                <select class="form-control" name="riwayat_diklat" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['riwayat_diklat'];?>"><?= ucfirst($dkm['riwayat_diklat']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat nikah dan akta kelahiran anak</label>
                                <select class="form-control" name="surat_nikah_akta" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['surat_nikah_akta'];?>"><?= ucfirst($dkm['surat_nikah_akta']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Surat-surat tugas</label>
                                <select class="form-control" name="surat_tugas" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['surat_tugas'];?>"><?= ucfirst($dkm['surat_tugas']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">KTP & KK</label>
                                <select class="form-control" name="ktp_kk" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['ktp_kk'];?>"><?= ucfirst($dkm['ktp_kk']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">Pendidikan profesi / spesialis</label>
                                <select class="form-control" name="pend_profesi" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['pend_profesi'];?>"><?= ucfirst($dkm['pend_profesi']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleFormControlSelect1">SK Pensiun</label>
                                <select class="form-control" name="sk_pensiun" required="" id="exampleFormControlSelect1">
                                <option value="<?= $dkm['sk_pensiun'];?>"><?= ucfirst($dkm['sk_pensiun']);?></option>
                                    <option value="ada">Ada</option>
                                    <option value="tidak">Tidak ada</option>    
                                </select>
                                </div>
                          </div> 
                         <!--KOLOM KETIGA--->
                        </div>
                    <hr>
                        <!-- DISINI BERKAS -->
                        <button onclick="return confirm ('Apakah anda yakin akan merubah data ini ?')" type="submit" name="input" class="btn btn-primary"><i class= 'fa fa-save'></i> Simpan Data</button>  
                    </form>
                </div>
    </div>                                  
</div>



         