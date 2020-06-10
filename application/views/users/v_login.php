<?php $this->load->view('template/header'); ?>

<body class="bg-login2">
  <div class="container">

  <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-5 col-md-4 mt-3">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
              <div class="col-lg-12">
                <div class="p-5">
                    <img class="ml-5 " style="width:65%;" src="<?php echo base_url('/assets/img/logo/logo2.png');?>"  alt="HARUSNYA LOGO"> <div class="text-center">
                  </div><hr>
                  
                  <form action="<?php echo base_url('login/login') ?>" method="post" novalidate>
                  <?=$this->session->flashdata('notif')?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                          </div>
                          <input type="text" class="form-control" name="nip" id="exampleInputEmail1" placeholder="Nomor induk pegawai" autofocus="" />
                        </div>
                        <?php echo form_error('nip','<div class="text-danger">','</div>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                          </div>
                      <input type="password" class="form-control" name="pass" id="password" placeholder="Password" />
                    </div>
                    <?php echo form_error('pass','<div class="text-danger">','</div>'); ?>
                    </div>
                    <hr>
                    <input id="" type="submit" value="Login" class="btn btn-md btn-primary btn-block">
                    <!-- <input id="" type="reset" value="Reset" class="btn btn-md btn-danger btn-block"> -->
                    <form>
                    <div id='ResponseInput'></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 

<?php $this->load->view('template/footer_blind'); ?>

<script>
    $(function(){
      //------------------------Proses Login Ajax-------------------------//
      $('#FormLogin').submit(function(e){
        e.preventDefault();
        $.ajax({
          url: $(this).attr('action'),
          type: "POST",
          cache: false,
          data: $(this).serialize(),
          dataType:'json',
          success: function(json){
            //response dari json_encode di controller

            if(json.status == 1){ window.location.href = json.url_home; }
            if(json.status == 0){ $('#ResponseInput').html(json.pesan); }
            if(json.status == 2){
              $('#ResponseInput').html(json.pesan);
              $('#InputPassword').val('');
            }
          }
        });
      });

      //-----------------------Ketika Tombol Reset Diklik-----------------//
      $('#ResetData').click(function(){
        $('#ResponseInput').html('');
	});
});
</script>

