              <div class="table-responsive">
                <table border="1px solid black" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</td>
                      <th width="30%">Nama</th>
                      <th  width="20%">NIP</th>
                      <th width="20%">Instansi</th>
                      <th width="8%">Almari</th>
                      <th width="8%">Block</th>
                      <th width="8%">No Berkas</th>
                      <th width="10%">Tempat Simpan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</td>
                      <th >Nama</th>
                      <th>NIP</th>
                      <th>Instansi</th>
                      <th>Almari</th>
                      <th>Block</th>
                      <th>No Berkas</th>
                      <th>Tempat Simpan</th>
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
                    </tr>
                    <?php $i++;?>
                <?php endforeach;?>
                </table>
              </div>

              <script type="text/javascript">
         window.print();
      </script>
</body>
</html>
            