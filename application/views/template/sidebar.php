<!-- Page Wrapper -->
<div id="wrapper">


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-default sidebar sidebar-primary accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin');?>">
    <div class="sidebar-brand-icon">
      <!-- <i class="fa fa-wallet"></i> -->
      <img style="border-radius:10px;" width="100%" src="<?php echo base_url('/assets/img/logo/logoo.jpg');?>"  alt="HARUSNYA LOGO">
    </div>
    <!-- <div class="sidebar-brand-text mx-1">PUSDATARU</div> -->
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?=base_url('admin');?>">
      <i class="fas fa-fw fa-home"></i>
      <span>Beranda</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Data Pegawai
  </div>

  <!-- Nav Item - KASIR -->
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('pegawai');?>">
      <i class="fa fa-users"></i>
      <span>Data Pegawai Aktif</span></a>
  </li>

  <!-- Nav Item - HISTORU PENJUALAN -->
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('pegawai/pensiun');?>">
      <i class="fa fa-user"></i>
      <span>Data Pegawai Pensiun</span></a>
  </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Arsip Personal File Pegawai
  </div>

   <!-- Nav Item -outlet -->
   <li class="nav-item">
    <a class="nav-link" href="<?= base_url('dokumen') ?>">
      <i class="fas fa-book-open"></i>
      <span>Pegawai aktif</span></a>
  </li>

  
    <!-- Nav Item -outlet -->
    <li class="nav-item">
    <a class="nav-link" href="<?= base_url('dokumen/pensiun') ?>">
      <i class="fas fa-book"></i>
      <span>Pegawai pensiun</span></a>
  </li>


 <!-- Divider -->
 <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Transaksi arsip
  </div>

   <!-- Nav Item -outlet -->
   <li class="nav-item">
    <a class="nav-link" href="<?= base_url('pinjam') ?>">
      <i class="fas fa-file-medical-alt"></i>
      <span>Arsip Dipinjam</span></a>
  </li>

  <!-- Nav Item -outlet -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('pinjam/kembali') ?>">
      <i class="fas fa-file"></i>
      <span>Arsip Dikembalikan</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Master Data
  </div>

  <!-- Nav Item - Pages Collapse Menu -->

 <!-- Nav Item -produk -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-list"></i>
      <span>Kelengkapan</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?=base_url('instansi');?>">Data Instansi</a>
      <a class="collapse-item" href="<?=base_url('jabatan');?>">Data Jabatan</a>
      <a class="collapse-item" href="<?=base_url('pangkat');?>">Data Pangkat</a>
      <a class="collapse-item" href="<?=base_url('golongan');?>">Data Golongan</a>
        
      </div>
    </div>
  </li>

 <!-- Nav Item - user -->
 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-eye"></i>
          <span>Kelengkapan Dokumen</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <!-- <a class="collapse-item" href="<?=base_url('almari');?>">Data Almari</a> -->
          <a class="collapse-item" href="<?=base_url('rak');?>">Data Rak</a>
          <a class="collapse-item" href="<?=base_url('block');?>">Data Blok</a>
          <a class="collapse-item" href="<?=base_url('box');?>">Data Boks</a>
          <!-- <a class="collapse-item" href="register.html">Data Bendel</a> -->
          </div>
        </div>
      </li>

   <!-- Nav Item -outlet -->
   <li class="nav-item">
    <a class="nav-link" href="<?=base_url('user');?>">
      <i class="fas fa-key"></i>
      <span>Manajemen User</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Heading -->
  <div class="sidebar-heading">
    REPORT
  </div>

   <!-- Nav Item -outlet -->
   <li class="nav-item">
    <a class="nav-link" href="<?= base_url('report') ?>">
      <i class="fas fa-print"></i>
      <span>Laporan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

   <!-- Nav Item - Charts -->
   <li class="nav-item">
    <a class="nav-link" href="<?= base_url('login/logout');?>" data-toggle="modal" data-target="#logoutModal">
      <span class="btn btn-danger" style="width:100%">Log-Out <i class="fa fa-arrow-right"></i></span></a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

    
</ul>
<!-- End of Sidebar -->



 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <div id="jam-digital">
    	<div class="mb-1" id="hours">
        <b><p class="m-0 font-weight-bold text-primary" id="jam"></p></b>
    </div>
    <div id="minute">
    <b><p class="m-0 font-weight-bold text-primary" id="menit"></p></b>
    </div>
    <div id="second">
    <b><p class="m-0 font-weight-bold text-primary" id="detik"></p></b>
    </div>
</div>
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div> -->
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= (ucfirst($this->session->userdata('nama'))); ?></span></br>
          <div class="topbar-divider d-none d-sm-block"></div>
          <img class="img-profile rounded-circle" src="<?php echo base_url('/assets/img/foto_pegawai/')?><?= $this->session->userdata('foto'); ?>"  alt="foto pegawai">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?= base_url('user/profil');?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('login/logout');?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->
  <script>
    window.setTimeout("waktu()",1000); 
      function waktu() { 
      var tanggal = new Date(); 
      setTimeout("waktu()",1000); 
      document.getElementById("jam").innerHTML = tanggal.getHours(); 
      document.getElementById("menit").innerHTML = tanggal.getMinutes();
      document.getElementById("detik").innerHTML = tanggal.getSeconds();
	} 
  </script>