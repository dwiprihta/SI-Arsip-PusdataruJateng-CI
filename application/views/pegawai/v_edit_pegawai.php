<!-- CONTAIN -->
<div class="container-fluid">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><I class="fa fa-user"></i> UBAH DATA PEGAWAI</h6>
                </div>
                <div class="card-body">
  
               <div class="row">
               <div class="col-lg-7">
                    <form action="" method="POST">      
                         <div class="form-group">
                         <label for="inputAddress">NIP (Nomor Induk Pegawai)</label>
                         <input type="text" class="form-control" required="" readonly="" name="nip" id="inputAddress" placeholder="NIP" value="<?= $pegawai['nip'];?>">
                         <small class="form-text text-danger"><?= form_error('npm');?></small>
                         </div>

                         <div class="form-group">
                         <label for="inputAddress">Nama</label>
                         <input type="text" class="form-control"  required="" name="nama" id="inputAddress" placeholder="Nama Pegawai" value="<?= $pegawai['nama'];?>">  
                         </div>

                         <div class="form-group"  required="">
                         <label>Jenis Kelamin</label><br>
                         <div class="custom-control custom-radio custom-control-inline">
                         <input type="radio" id="customRadioInline1" name="jk" value="laki-laki" <?php if ($pegawai['jenis_kelamin']=='laki-laki') {echo 'checked';}?> class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline1">LAKI-LAKI</label>
                         </div>

                         <div class="custom-control custom-radio custom-control-inline">
                         <input type="radio" id="customRadioInline2" name="jk" value="perempuan" <?php if ($pegawai['jenis_kelamin']=='perempuan') {echo 'checked';}?> class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline2">PEREMPUAN</label>
                         </div> 
                         </div> 

                         <div class="form-row">
                         <div class="form-group col-md-6">
                         <label for="inputEmail4">Tempat Lahir</label>
                         <input type="text" class="form-control"  required="" name="tmp_lahir" id="inputEmail4" placeholder="Tempat Lahir" value="<?= $pegawai['tempat_lahir'];?>">
                         </div>

                         <div class="form-group col-md-6">
                         <label for="inputPassword4">Tanggal Lahir</label>
                         <input type="date" class="form-control"  required="" name="tgl_lahir" id="inputPassword4" placeholder="" value="<?= $pegawai['tanggal_lahir'];?>">
                         </div>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Instansi</label>
                         <select class="form-control" name="instansi" required="" id="exampleFormControlSelect1"> 
                            <option value="<?= $pegawai['instansi'];?>"><?= (strtoupper($pegawai['instansi']));?></option>
                            <?php foreach($instansi as $jr):?>
                                   <option value="<?= (ucfirst($jr['instansi']));?>"><?= (ucfirst($jr['instansi']));?></option>
                              <?php endforeach;?>   
                              
                         </select>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Jabatan</label>
                         <select class="form-control" name="jabatan" required="" id="exampleFormControlSelect1">
                         <option value="<?= $pegawai['jabatan'];?>"><?= (ucfirst($pegawai['jabatan']));?></option>
                              <?php foreach($jabatan as $jr):?>
                                   <option value="<?= (ucfirst($jr['jabatan']));?>"><?= (ucfirst($jr['jabatan']));?></option>
                              <?php endforeach;?>      
                         </select>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Pangkat</label>
                         <select class="form-control" name="pangkat" required="" id="exampleFormControlSelect1"> 
                            <option value="<?= $pegawai['pangkat'];?>"><?= (strtoupper($pegawai['pangkat']));?></option>
                            <?php foreach($pangkat as $jr):?>
                                   <option value="<?= (ucfirst($jr['pangkat']));?>"><?= (ucfirst($jr['pangkat']));?></option>
                              <?php endforeach;?>   
                              
                         </select>
                         </div>

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Golongan</label>
                         <select class="form-control" name="golongan" required="" id="exampleFormControlSelect1"> 
                            <option value="<?= $pegawai['golongan'];?>"><?= (strtoupper($pegawai['golongan']));?></option>
                            <?php foreach($golongan as $jr):?>
                                   <option value="<?= (ucfirst($jr['golongan']));?>"><?= (ucfirst($jr['golongan']));?></option>
                              <?php endforeach;?>   
                              
                         </select>
                         </div>

                         <input type="hidden" class="form-control"  required="" name="tgl_pensiun" id="inputPassword4" placeholder="" value="<?= $pegawai['tanggal_pensiun'];?>">

                         <div class="form-group">
                         <label for="exampleFormControlSelect1">Status</label>
                         <select class="form-control" name="status" required="" id="exampleFormControlSelect1">
                              <option value="<?= $pegawai['status'];?>"><?= (strtoupper($pegawai['status']));?></option>
                              <option value="aktif">AKTIF</option>
                              <option value="pensiun">PENSIUN</option>    
                         </select>
                         </div>
                         <hr>
                         <button onclick="return confirm ('Apakah anda yakin akan merubah data ini ?')" type="submit" name="input" class="btn btn-primary"><i class= 'fa fa-save'></i> Simpan Data</button>
                         </form>
                         </div>
                    </div>
                    </div>
               </div>
          </div>
     </div>


         