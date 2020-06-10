
                <table border="1px solid black" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <td>#</td>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>Tempat. tanggal lahir</th>
                      <th>Instansi</th>
                      <th>Pangkat</th>
                      <th>Jabatan</th>
                      <th>Golongan</th>
                      <th>status</th>
                      <th>Tanggal Pensiun</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <td>#</td>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>Tempat. tanggal lahir</th>
                      <th>Instansi</th>
                      <th>Pangkat</th>
                      <th>Jabatan</th>
                      <th>Golongan</th>
                      <th>status</th>
                      <th>Tanggal Pensiun</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                  $i=1;
                  foreach($pegawai as $mhs):?>
                   
                    <tr>
                        <td><?= $i;?></td>
                        <td class="le nm"> <?=(ucfirst($mhs['nama']));?></li></td>
                        <td><?=$mhs['nip'];?></td>
                        <td><?=$mhs['tempat_lahir'];?>, <?=$mhs['tanggal_lahir'];?></td>
                        <td><?=(ucfirst($mhs['instansi']));?></td>
                        <td><?=$mhs['pangkat'];?></td>
                        <td><?=$mhs['jabatan'];?></td>
                        <td><?=$mhs['golongan'];?></td>
                        <td><?=$mhs['status'];?></td>
                        <td><?=$mhs['tanggal_pensiun'];?></td>
                    </tr>
                    <?php $i++;?>
                <?php endforeach;?>
                </table>
     
<script type="text/javascript">
         window.print();
      </script>
</body>
</html>
           