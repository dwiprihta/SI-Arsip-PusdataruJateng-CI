
<div class="row">
<?php 
  foreach($report as $mhs):?>
<div class="col-lg-3 col-md-3 col-sm-3">
      <table style="margin-bottom:25px;" cellpadding="8" border="1px solid blue" width="100%" height="100%" >
          <tr>
            <td><h4><b><center><?=$mhs['nip'];?></center><b></h4></td>
          </tr>
          <tr>
            <td><h6><center><?=strtoupper($mhs['nama']);?></center></h6></td>
          </tr>
          <tr >
          <td><h6><center><?=ucfirst($mhs['tempat_lahir']);?>, <?=$mhs['tanggal_lahir'];?></center></h6></td>
          </tr>
          <tr height="540px;">
            <td></td>
          </tr>
          <tr>
          <td><h4><b><center>NO:<?=ucfirst($mhs['definitif']);?></center><b></h4></td>
          </tr>
      </table>
    </div>
    <?php endforeach;?> 

   
</div>
<script type="text/javascript">
         window.print();
      </script>
</body>
</html>

             