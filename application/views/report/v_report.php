 <!-- Begin Page Content -->

 <div class="container-fluid">



 <!-- Breadcums -->

 <nav aria-label="breadcrumb">

            <ol class="breadcrumb bg-white">

              <li class="breadcrumb-item"><a href="#">Beranda</a></li>

              <li class="breadcrumb-item active" aria-current="page">Report</li>

            </ol>

          </nav>



<!-- Content Row -->

<div class="row mt-5 mb-5">



<!-- Earnings (Monthly) Card Example -->

  <div class="col-xl-4 col-md-4 mb-4">

    <div class="card border-bottom-primary shadow h-100 py-2">

      <div class="card-body">

        <div class="row no-gutters align-items-center">

          

          <div class="col mr-2">       

            <center><i class="text-primary fas fa-id-card primary fa-6x mb-3"></i> </center><div class="text-center">

            <h1 class="h6"><B>CETAK LABEL ARSIP</b></h1>

          </div><hr>

              <button href="<?= base_url('report/label') ?>" data-toggle="modal" data-target="#modaltambah" type="submit" class="btn btn-md btn-primary btn-sm btn-block"><i class="fa fa-print"></i> Cetak label arsip</button>

              <!-- <button disabled="" type="reset" class="btn btn-sm btn-md btn-danger btn-block"><i class="fa fa-download"></i> Export Excel</button> -->

          </div>

        </div>

      </div>

    </div>

  </div>



  <!-- Earnings (Monthly) Card Example -->

  <div class="col-xl-4 col-md-4 mb-4">

    <div class="card border-bottom-primary shadow h-100 py-2">

      <div class="card-body">

        <div class="row no-gutters align-items-center">



            <div class="col mr-2">       

                <center><i class="text-primary fas fa-box-open fa-6x mb-3"></i> </center>

                <div class="text-center">

                <h1 class="h6"><B>CETAK DATA ARSIP</b></h1>

              </div><hr>  

              <button href="<?= base_url('report/label') ?>" data-toggle="modal" data-target="#modaldoc" type="submit" class="btn btn-md btn-primary btn-sm btn-block"><i class="fa fa-print"></i> Cetak data arsip</button>

              <!-- <button disabled="" type="reset" class="btn btn-sm btn-md btn-danger btn-block"><i class="fa fa-download"></i> Export Excel</button> -->

          </div>

        </div>

      </div>

    </div>

  </div>



  <!-- Earnings (Monthly) Card Example -->

  <div class="col-xl-4 col-md-4 mb-4">

    <div class="card border-bottom-primary shadow h-100 py-2">

      <div class="card-body">

        <div class="row no-gutters align-items-center">

          <div class="col mr-2">

            <div class="row no-gutters align-items-center">



            <div class="col mr-2">       

                <center><i  class="text-primary fas fa-users fa-6x mb-3"></i> </center>                                                                                                             <div class="text-center">

                <h1 class="h6"><B>CETAK DATA PEGAWAI</b></h1>

              </div><hr>

                  

              <button href="<?= base_url('report/label') ?>" data-toggle="modal" data-target="#modalpegawai" type="submit" class="btn btn-md btn-primary btn-sm btn-block"><i class="fa fa-print"></i> Cetak data pegawai</button>

              <a href="<?= base_url('pegawai/export') ?>" class="btn btn-sm btn-md btn-danger btn-block"><i class="fa fa-download"></i> Export Excel</a>

          </div>

        </div>

      </div>

    </div>

  </div>



<!-- Content Row -->

</div>

</div>

</div>

</div>





<!-- MODAL TAMBAH -->

<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">

          <div class="modal-dialog" role="document">

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-filter"></i> Sortir cetak Label</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>

              </div>

              <div class="modal-body">



              <div class="alert alert-info mt-2" role="alert"><i class="fa fa-info-circle" aria-hidden="true"></i> Sortir berdasarkan Nama, Nip,atau Instansi</strong></div>



              <form class="form-inline" action="<?php echo base_url('report/sortir_label');?>" target="blank" method="POST"> 

                  <div class="form-group">

                  <input type="text" style="width:410px"  class="form-control" name="label" id="inputAddress" placeholder="Ketik keyword"> 

                  </div>



                  <div class="form-group">

                  <button class="btn btn-danger my-2 my-sm-0 ml-2" type="submit" name="cari"><i class="fa fa-search" aria-hidden="true"></i></button>

                  </div>

              </form>

          </div>

      </div>

    </div>

</div>

<!-- MODAL TAMBAH -->





<!-- MODAL TAMBAH -->

<div class="modal fade" id="modaldoc" tabindex="-1" role="dialog" aria-labelledby="modaldoc" aria-hidden="true">

          <div class="modal-dialog" role="document">

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-filter"></i> Sortir cetak dokumen</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>

              </div>

              <div class="modal-body">



              <div class="alert alert-info mt-2" role="alert"><i class="fa fa-info-circle" aria-hidden="true"></i> Sortir berdasarkan Nama, Nip, Instansi, atau Status</strong></div>



              <form class="form-inline" action="<?php echo base_url('report/sortir_dokumen');?>" target="blank" method="POST"> 

                  <div class="form-group">

                  <input type="text" style="width:410px"  class="form-control" name="dokumen" id="inputAddress" placeholder="Ketik keyword"> 

                  </div>



                  <div class="form-group">

                  <button class="btn btn-danger my-2 my-sm-0 ml-2" type="submit" name="cari"><i class="fa fa-search" aria-hidden="true"></i></button>

                  </div>

              </form>

          </div>

      </div>

    </div>

</div>

<!-- MODAL TAMBAH -->





<!-- MODAL TAMBAH -->

<div class="modal fade" id="modalpegawai" tabindex="-1" role="dialog" aria-labelledby="modalPegawai aria-hidden="true">

          <div class="modal-dialog" role="document">

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel"><I class="fa fa-filter"></i> Sortir cetak Pegawai</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>

              </div>

              <div class="modal-body">



              <div class="alert alert-info mt-2" role="alert"><i class="fa fa-info-circle" aria-hidden="true"></i> Sortir berdasarkan Nama, Nip, Instansi, atau status</strong></div>



              <form class="form-inline" action="<?php echo base_url('report/sortir_pegawai');?>" target="blank" method="POST"> 

                  <div class="form-group">

                  <input type="text" style="width:410px"  class="form-control" name="pegawai" id="inputAddress" placeholder="Ketik keyword"> 

                  </div>



                  <div class="form-group">

                  <button class="btn btn-danger my-2 my-sm-0 ml-2" type="submit" name="cari"><i class="fa fa-search" aria-hidden="true"></i></button>

                  </div>

              </form>

          </div>

      </div>

    </div>

</div>

<!-- MODAL TAMBAH -->



