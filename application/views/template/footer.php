

<!-- Footer -->

      <footer class="sticky-footer bg-white">

        <div class="container my-auto">

          <div class="copyright text-center my-auto">

            <span>Copyright &copy; Monika Dwi Ramadhan 2020</span>

          </div>

        </div>

      </footer>

      <!-- End of Footer -->



    </div>

    <!-- End of Content Wrapper -->



  </div>

  <!-- End of Page Wrapper -->



  <!-- Scroll to Top Button-->

  <a class="scroll-to-top rounded" href="#page-top">

    <i class="fas fa-angle-up"></i>

  </a>

  



  <!-- Logout Modal-->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan Log-Out ?</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>

        </div>

        <div class="modal-body">Pilih tombol "Logout" jika anda ingin meniggalkan aplikasi </div>

        <div class="modal-footer">

            <a class="btn btn-danger" href="<?= base_url('login/logout');?>">Logout</a>

            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        </div>

      </div>

    </div>

  </div>



  <div class="modal" id="ModalGue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-header">

            <h4 class="modal-title" id="ModalHeader"></h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button>

					</div>

					<div class="modal-body" id="ModalContent"></div>

					<div class="modal-footer" id="ModalFooter"></div>

				</div>

			</div>

		</div>

	



    <!-- Bootstrap core JavaScript-->

    

    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>



    <!-- Core plugin JavaScript-->

    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>



    <!-- Custom scripts for all pages-->

    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?>"></script>

    <script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>



    <!-- Page level plugins -->

    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js');?>"></script>



    <!-- Page level custom scripts -->

    <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js');?>"></script>

    <script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js');?>"></script>



    <!-- Page level plugins -->

    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js');?>"></script>

    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>



    <!-- Page level custom scripts -->

    <script src="<?php echo base_url('assets/js/demo/datatables-demo.js');?>"></script>

    <script src="<?=base_url('assets/js/jquery.autocomplete.js?ver=1.2.4')?>"></script> 



    <script type="text/javascript">



    // In your Javascript (external .js resource or <script> tag)

        $(document).ready(function() {

            $('#select').select2();

        });



    $(document).ready(function() {



        // Notification alert

        $("#notif").delay(350).slideDown('slow');

        $("#notif").alert().delay(3000).slideUp('slow');



        // Live search

        $("#search").keyup(function() {

            var str = $("#search").val();

            if (str == "") {

                $("#hint" ).html("<p class='help-block'>Masukkan NISN / nama dan hasil akan otomatis ditampilkan disini.</p>");

            } else {

                $.get("<?=site_url()?>home/result?keyword="+str, function(data) {

                    $("#hint").html(data);

                });

            }

        });





        // Find student

        $('#find').autocomplete({

            serviceUrl: '<?=site_url()?>Dokumen/find',

            noCache: true,

            dataType: 'json',

            onSelect: function (suggestion) {

                $('#find').val("");

                $('#nip').val(''+suggestion.nip);

                $('#nama').val(''+suggestion.nama);

                $('#instansi').val(''+suggestion.instansi);

                $('#pangkat').val(''+suggestion.pangkat);

                $('#jabatan').val(''+suggestion.jabatan);

                $('#m_name').val(''+suggestion.jabatan);



                var str = $("#nip").val();

                $.get("<?=site_url()?>Dokumen/check?keyword="+str, function(data) {

                    if (data == 1) {

                        $('#submit').removeClass('hide');

                        $('#alr').addClass('hide');

                        $('.he').removeClass('has-error');

                    } else {

                        $('#submit').addClass('hide');

                        $('#alr').removeClass('hide');

                        $('.he').addClass('has-error');

                    }

                });

            }

        });



        // Kode map

        $('select#d_cname, select#d_fname, select#d_map').change(function() {

            var c = $("#d_cname").val();

            var f = $("#d_fname").val();

            var d = $("#d_map").val();

            $('.d_lokasi').val(c+"."+f+"."+d);



            var str = $("#d_kode_map").val();

            $.get("<?=site_url()?>Dokumen/result?keyword="+str, function(data) {

                if (data == 1) {

                    $('#submit').removeClass('hide');

                    $('#warn').addClass('hide');

                    $('.d_map, .d_lokasi').removeClass('has-error');

                } else {

                    $('#submit').addClass('hide');

                    $('#warn').removeClass('hide');

                    $('.d_map, .d_lokasi').addClass('has-error');

                }

            });

        });

        

        // Is data complete

        $('select#s_status').change(function() {

            if ($(this).val() != '') {

                $('.hint').hide('slow');

                $('#submit').removeClass('hide');

            } else {

                $('.hint').show('slow');

                $('#submit').addClass('hide');

            }

        });



        // Show hide password

        $('#pass').on('click', function() {

            if ($('#password').attr('pass-shown') == 'false') {

                $('#password').removeAttr('type');

                $('#password').attr('type', 'text');

                $('#password').removeAttr('pass-shown');

                $('#password').attr('pass-shown', 'true');

                $('#pass').html('<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>');

            } else {

                $('#password').removeAttr('type');

                $('#password').attr('type', 'password');

                $('#password').removeAttr('pass-shown');

                $('#password').attr('pass-shown', 'false');

                $('#pass').html('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>');

            }

        });



        // Ajax login

        $("#btn-login").click(function() {

            var formAction = $("#login").attr('action');

            var dataLogin = {

                u_name: $("#username").val(),

                u_pass: $("#password").val(),

                csrf_token: $.cookie('csrf_cookie')

            };



            $.ajax({

                type: "POST",

                url: formAction,

                data: dataLogin,

                beforeSend: function() {

                    $('#status').html('Sedang memproses.....');

                    $('.btn-block').addClass('disabled');

                },

                success: function(data) {

                    if (data == 1) {

                        $("#success").slideDown('slow');

                        $("#success").alert().delay(6000).slideUp('slow');

                        setTimeout(function() {

                            window.location = '<?=site_url('dashboard')?>';

                        }, 2000);

                    } else {

                        $('#status').html('Login');

                        $('.btn-block').removeClass('disabled');

                        $("#failed").slideDown('slow');

                        $("#failed").alert().delay(3000).slideUp('slow');

                        return false;

                    }

                }

            });

            return false;

        });

    });

</script>



<script type="text/javascript">

    $(document).ready(function () {

        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)

        {

            return {

                "iStart": oSettings._iDisplayStart,

                "iEnd": oSettings.fnDisplayEnd(),

                "iLength": oSettings._iDisplayLength,

                "iTotal": oSettings.fnRecordsTotal(),

                "iFilteredTotal": oSettings.fnRecordsDisplay(),

                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),

                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)

            };

        };



         // View data student_archived

         var student_archived = $('#student-archived').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('student/get_archived')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "s_nisn"},

                {"data": "s_name"},

                {"data": "s_gender"},

                {"data": "s_grade"},

                {"data": "m_id"},

                {"data": "s_yi"},

                {"data": "s_yo"},

                {"data": "s_is_active"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data major

        var major = $('#major').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('major/get_data')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "m_name"},

                {"data": "m_id"},

                {"data": "m_created_at"},

                {"data": "m_updated_at"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });





         // View data student

         var student = $('#student').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('student/get_data')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "s_nisn"},

                {"data": "s_name"},

                {"data": "s_dob"},

                {"data": "s_gender"},

                {"data": "s_grade"},

                {"data": "m_id"},

                {"data": "s_status"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data document

        var document = $('#document').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('document/get_data')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "s_nisn"},

                {"data": "s_name"},

                {"data": "s_grade"},

                {"data": "s_mid"},

                {"data": "d_cname"},

                {"data": "d_fname"},

                {"data": "d_map"},

                {"data": "d_kode_map"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data cabinet

        var cabinet = $('#cabinet').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('cabinet/get_data')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "c_name"},

                {"data": "u_fname"},

                {"data": "c_created_at"},

                {"data": "c_updated_at"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data folder

        var cabinet = $('#folder').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('folder/get_data')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "f_name"},

                {"data": "u_fname"},

                {"data": "f_created_at"},

                {"data": "f_updated_at"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data document_deleted

        var document_deleted = $('#document-deleted').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('document/get_deleted')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "s_nisn"},

                {"data": "s_name"},

                {"data": "s_grade"},

                {"data": "s_mid"},

                {"data": "d_kode_map"},

                {"data": "d_deleted_by"},

                {"data": "d_deleted_at"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data document_deleted

        var document_empty = $('#document-empty').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('document/get_empty')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "d_cname"},

                {"data": "d_fname"},

                {"data": "d_map"},

                {"data": "d_kode_map"},

                {"data": "d_created_by"},

                {"data": "d_created_at"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data document_archived

        var document_archived = $('#document-archived').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('document/get_archived')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "s_nisn"},

                {"data": "s_name"},

                {"data": "s_grade"},

                {"data": "s_mid"},

                {"data": "ad_kode_map"},

                {"data": "ad_updated_at"},

                {"data": "ad_taken_by"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data cabinet_deleted

        var cabinet_deleted = $('#cabinet-deleted').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('cabinet/get_deleted')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "c_name"},

                {"data": "u_fname"},

                {"data": "c_created_at"},

                {"data": "c_deleted_at"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data user

        var user = $('#user').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('user/get_data')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "u_name"},

                {"data": "u_fname"},

                {"data": "u_level"},

                {"data": "u_is_active"},

                {"data": "u_last_logged_in"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });



        // View data cabinet_deleted

        var cabinet_deleted = $('#folder-deleted').DataTable({

            "processing": true,

            "language": {

                "processing": "<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Sedang memuat....."

            },

            "serverSide": true,

            "ajax": "<?=site_url('folder/get_deleted')?>",

            "columns": [

                {

                    "data": null,

                    "orderable": true

                },

                {"data": "f_name"},

                {"data": "u_fname"},

                {"data": "f_created_at"},

                {"data": "f_deleted_at"},

                {"data": "tindakan"}

            ],

            "order": [[1, 'asc']],

            "rowCallback": function (row, data, iDisplayIndex) {

                var info = this.fnPagingInfo();

                var page = info.iPage;

                var length = info.iLength;

                var index = page * length + (iDisplayIndex + 1);

                $('td:eq(0)', row).html(index);

            }

        });

    });



     //GRAFIK PIE

     var ctx = document.getElementById("p_arsip");

    var myPieChart = new Chart(ctx, {

      type: 'doughnut',

      data: {

        labels: [

          <?php

            if (count($graph)>0) {

              foreach ($graph as $data) {

                echo "'" .$data->status ."',";

              }

            }

          ?>

        ],

        datasets: [{

          data: [

              <?php

                if (count($graph)>0) {

                   foreach ($graph as $data) {

                    echo $data->total . ", ";

                  }

                }

              ?>

            ],

          backgroundColor: ['#FFCD56', '#FF6384', '#36b9cc'],

          hoverBackgroundColor: ['#FFCD59', '#FF6389', '#2c9faf'],

          hoverBorderColor: "rgba(234, 236, 244, 1)",

        }],

      },

      options: {

        maintainAspectRatio: false,

        tooltips: {

          backgroundColor: "rgb(255,255,255)",

          bodyFontColor: "#858796",

          borderColor: '#dddfeb',

          borderWidth: 1,

          xPadding: 15,

          yPadding: 15,

          displayColors: false,

          caretPadding: 10,

        },

        legend: {

          display: false

        },

        cutoutPercentage: 80,

      },

    });



        



    // Area Chart Example

        var ctx = document.getElementById("a_dokumen");

        var myLineChart = new Chart(ctx, {

        type: 'bar',

        data: {

            labels: [

                <?php

                if (count($graph1)>0) {

                    foreach ($graph1 as $data) {

                    echo "'" .$data->instansi."',";

                    }

                }

                ?>

            ],

            datasets: [{

            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],



            // //label: "Earnings",

            // lineTension: 0.3,

            // backgroundColor: "rgba(78, 115, 223, 0.05)",

            // borderColor: "rgba(78, 115, 223, 1)",

            // pointRadius: 3,

            // pointBackgroundColor: "rgba(78, 115, 223, 1)",

            // pointBorderColor: "rgba(78, 115, 223, 1)",

            // pointHoverRadius: 3,

            // pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",

            // pointHoverBorderColor: "rgba(78, 115, 223, 1)",

            // pointHitRadius: 10,

            // pointBorderWidth: 2,

            data: [

              <?php

                if (count($graph1)>0) {

                   foreach ($graph1 as $data) {

                    echo $data->total . ", ";

                  }

                }

              ?>

            ],

            }],

        },

        options: {

            maintainAspectRatio: false,

            layout: {

            padding: {

                left: 10,

                right: 25,

                top: 25,

                bottom: 0

            }

            },

            scales: {

            xAxes: [{

                time: {

                unit: 'date'

                },

                gridLines: {

                display: false,

                drawBorder: false

                },

                ticks: {

                maxTicksLimit: 7

                }

            }],

            yAxes: [{

                ticks: {

                maxTicksLimit: 5,

                padding: 10,

                // Include a dollar sign in the ticks

                callback: function(value, index, values) {

                    return number_format(value);

                }

                },

                gridLines: {

                color: "rgb(234, 236, 244)",

                zeroLineColor: "rgb(234, 236, 244)",

                drawBorder: false,

                borderDash: [2],

                zeroLineBorderDash: [2]

                }

            }],

            },

            legend: {

            display: false

            },

            tooltips: {

            backgroundColor: "rgb(255,255,255)",

            bodyFontColor: "#858796",

            titleMarginBottom: 10,

            titleFontColor: '#6e707e',

            titleFontSize: 14,

            borderColor: '#dddfeb',

            borderWidth: 1,

            xPadding: 15,

            yPadding: 15,

            displayColors: false,

            intersect: false,

            mode: 'index',

            caretPadding: 10,

            callbacks: {

                label: function(tooltipItem, chart) {

                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';

                return datasetLabel  + number_format(tooltipItem.yLabel);

                }

            }

            }

        }

        });

</script>





  </body>

  </html>