<style>
    .datepicker table {
        width: 100%;
    }
    .ui-datepicker-calendar {
        display: none;
    }
</style>
<script>
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    });
</script>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">FP files</li>
            </ol>
        </div>
    </div>
</div>
<div>
    <?php
    if ($this->session->userdata('success') != "") {
        ?>
        <div id="success-alert" class="alert alert-success"><?php echo $this->session->userdata('success'); ?></div>
        <?php $this->session->set_userdata('success', "");
    }
    ?>
    <?php
    if ($this->session->userdata('error_msg') != "") {
        ?>
        <div id="success-alert" class="alert alert-danger"><?php echo $this->session->userdata('error_msg'); ?></div>
        <?php $this->session->set_userdata('error_msg', "");
    }
    ?>
</div>
<div class="row">
    <div class="col-12">
        <div class="element-wrapper">
            <div class="card-header bg-info page-head-title-wrap">
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Fingerprint File Data Management</h4>
                <div class="d-flex justify-content-end align-items-center">
                    <?php $baseURL = base_url(); if($baseURL=="http://mx5.earrow.net/kreston/"){?>

                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#upload_file_kr"><i class="fa fa-plus-circle"></i> Upload CSV File - Kreston</button>

                    <?php }elseif($baseURL=="http://mx5.earrow.net/demo/demohr/"){ ?>

                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#upload_file_tech"><i class="fa fa-plus-circle"></i> Upload CSV File</button>

                    <?php } else {?>

                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#upload_file_kr"><i class="fa fa-plus-circle"></i> Upload CSV File</button>
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#upload_file_new"><i class="fa fa-plus-circle"></i> Upload CSV File (From USB Direct)</button>

                    <?php } ?>
                    <button type="button" class="btn btn-success pull-right" onclick="Process_Data()" ><i class="fa fa-plus-circle"></i> Process Uploaded Data</button>
                </div>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_1" role="tab"><i class="fa fa-list" style="font-size: 18px;margin-right: 5px"></i>  FP Raw Data</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_2" role="tab"><i class="fa fa-file-excel-o" style="font-size: 18px;margin-right: 5px"></i>  FP Uploaded Files</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="tab_1" role="tabpanel">
                        <div class="portlet yellow-crusta box">
                            <div class="portlet-title">
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="datatableFP" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Emp #</th>
                                                        <th>FName</th><th>LName</th>
                                                        <th>Time</th>
                                                        <!--<th>Posting</th>-->
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane  p-20" id="tab_2" role="tabpanel">
                        <div class="portlet blue-hoki box">
                            <div class="portlet-title">
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-body">
                                                <table id="datatable1" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    foreach($files as $value){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $value->name; ?></td>
                                                            <td><?php echo $value->date; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--UPLOAD MODALs-->
<div class="modal fade" id="upload_file_tech" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Upload CSV File</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <form enctype='multipart/form-data' action="<?php  echo site_url('systems/file_upload_con/upload_file_teckpac'); ?>" method="post">
                <?php //echo form_open_multipart(site_url('systems/file_upload_con/upload_file')); ?>

                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <p>
                        Support only CSV, TXT files <a href="<?php echo base_url(); ?>assets/data/fp_sample_software_export_new_tech.txt" target="_blank" class="pull-right btn btn-sm btn-default">View Sample FP File</a>
                    </p>
                    <div class="form-group">
                        <label for="file_upload">File input</label>
                        <input type="file" id="file_upload" name="file">
                    </div>
                    <div class="form-group">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" id="" name="submit" class="btn btn-success" value="Upload File">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--<div class="modal fade" id="upload_file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Upload CSV File</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <form enctype='multipart/form-data' action="<?php /* echo site_url('systems/file_upload_con/upload_file'); */?>" method="post">
                <?php /*//echo form_open_multipart(site_url('systems/file_upload_con/upload_file')); */?>

                <input type="hidden" name="<?php /*echo $this->security->get_csrf_token_name(); */?>" value="<?php /*echo $this->security->get_csrf_hash(); */?>">
                <div class="modal-body">
                    <p>
                        Support only CSV, TXT files <a href="<?php /*echo base_url(); */?>assets/data/fp_sample_software_export_new_tech.txt" target="_blank" class="pull-right btn btn-sm btn-default">View Sample FP File</a>
                    </p>
                    <div class="form-group">
                        <label for="file_upload">File input</label>
                        <input type="file" id="file_upload" name="file">
                    </div>
                    <div class="form-group">

                    </div>

                </div>

                <div class="modal-footer">
                    <input type="submit" id="" name="submit" class="btn btn-success" value="Upload File">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="upload_file_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Upload CSV File (From USB)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <form enctype='multipart/form-data' action="<?php /*echo site_url('systems/file_upload_con/upload_file_new');*/?>" method="post">
                <input type="hidden" name="<?php /*echo $this->security->get_csrf_token_name(); */?>" value="<?php /*echo $this->security->get_csrf_hash(); */?>">
                <?php /*echo form_open_multipart(site_url('systems/file_upload_con/upload_file_new'));*/?>
                <div class="modal-body">
                    <p>
                        Support only CSV, TXT files <a href="<?php /*echo base_url(); */?>assets/data/fp_sample_usb.txt"  target="_blank" class="pull-right btn btn-sm btn-default">View Sample FP File</a>
                    </p>
                    <div class="form-group">
                        <label for="file_upload">File input</label>
                        <input type="file" id="file_upload" name="file">
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="submit" id="" name="submit" class="btn btn-success" value="Upload File">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>-->
<!--<div class="modal fade" id="upload_file_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Upload CSV File (From USB)</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form enctype='multipart/form-data' action="<?php /* echo site_url('systems/file_upload_con/upload_file_new'); */?>" method="post">
                <input type="hidden" name="<?php /*echo $this->security->get_csrf_token_name(); */?>" value="<?php /*echo $this->security->get_csrf_hash(); */?>">
            <?php /*//echo form_open_multipart(site_url('systems/file_upload_con/upload_file_new')); */?>
            <div class="modal-body">
                <p>
                    Support only CSV, TXT files <a href="<?php /*echo base_url(); */?>assets/data/fp_sample_usb.txt"  target="_blank" class="pull-right btn btn-sm btn-default">View Sample FP File</a>
                </p>
                <div class="form-group">
                    <label for="file_upload">File input</label>
                    <input type="file" id="file_upload" name="file">
                </div>

            </div>

            <div class="modal-footer">
                <input type="submit" id="" name="submit" class="btn btn-success" value="Upload File">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
-->



<div class="modal fade" id="upload_file_kr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Upload CSV File (From USB) Kreston</h3>
                <button type="button" class="close warp_form" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="upload_file_kr_form" enctype='multipart/form-data' class="form-horizontal" role="form">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="loading_upload_data" style="text-align: center; display: none">
                    <h4> Uploading Data, Please Wait.......</h4>
                    <img style="width: 80px; padding: 10px" src="<?php echo base_url('assets/images/hourglass.svg')?>" >
                </div>
                <div class="warp_form">
                    <p>
                        Support only csv, dat, txt file extensions <a href="<?php echo base_url(); ?>assets/data/1_attlog_2_test.dat"  target="_blank" class="pull-right btn btn-sm btn-default">View Sample FP File</a>
                    </p>
                    <div class="form-group">
                        <label for="sun_all_mass">Select Month: </label>
                        <input type="text" class="month_select" name="raw_upload_month" id="raw_upload_month"/>
                    </div>
                    <div class="form-group">
                        <label for="file_upload">File input</label>
                        <input type="file" id="file_upload" name="file">
                    </div>
                </div>
            </div>
            <div class="modal-footer warp_form">
                <input type="submit" id="UploadRawData" name="submit" class="btn btn-success" value="Upload File">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="add_attendance_allowance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel"></h3>
                <button type="button" class="close hide_btn_modal" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="sun_all_mass">Select Month: </label>
                    <input type="text" class="month_select" name="date_select" id="date_select"/>
                </div>
                <div id="loading"  style="text-align: center; display: none">
                    <h4>  Posting Data, Please Wait...........</h4>
                    <img style="width: 80px; padding: 10px" src="<?php echo base_url('assets/images/hourglass.svg')?>" >
                </div>
                <input type="button" class="btn btn-primary hide_btn_modal" id="savePosting" value="Posting"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default hide_btn_modal" data-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        datatableFP_table = $('#datatableFP').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo site_url('systems/file_upload_con/ajax_list_fp_raw_Data')?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [-1],
                    "orderable": [
                        [0, 'desc']
                    ],
                }
            ],
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "buttons": [
                { extend: 'print', text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print' },
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                }
            ],
            responsive: true,
            "order": [
                [0, 'desc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"]
            ],
            "pageLength": 20,
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
        });
        yadcf.init(datatableFP_table, [{
                filter_type: "text",
                filter_delay: 500,
                column_number: 0
            }, {
                filter_type: "text",
                filter_delay: 500,
                column_number: 1
            }],
            {
                cumulative_filtering: false
            });


        $("#savePosting").off('click');
        $("#savePosting").on('click', function(e){
            e.preventDefault();
            save_posting();
        });

        $("#UploadRawData").off('click');
        $("#UploadRawData").on('click', function(e){
            e.preventDefault();
            upload_fp_data();
        });
    });

    //Process Data Modal Open
    function Process_Data()
    {
        $('#loading').hide();
        $('#date_select').val('');
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#add_attendance_allowance').modal({backdrop: 'static', keyboard: false});
        $('.modal-title').text('Posting Month');
    }

    //Process Save Data in to ATT main tbl
    function save_posting() {
        var date_select = $('#date_select').val();
        if (date_select != "") {
            $('#loading').show();
            $('.hide_btn_modal').hide();
            $('#error_msg11').hide();
            $.ajax({
                type: "post",
                async: true,
                url: "<?php echo site_url('systems/file_upload_con/data_posting'); ?>",
                data: {
                    "date_select": date_select
                },
                dataType: "html",
                success: function (data) {
                    $('#loading').hide();
                    $('.hide_btn_modal').show();
                    if (data == 'error') {
                        $('#success_msg1').hide();
                        $('#error_msg11').show();
                        $('#error_msg11').html("Error : No FP Data Available.");
                        // alert(data);
                    }  else {
                        $('#error_msg11').hide();
                        $('#success_msg1').show();
                        $('#success_msg1').html("Successfully Posted.");
                        //$('#load_leave1').html(data);
                    }
                }
            });
        } else {
            $('#loading').hide();
            $('#success_msg1').hide();
            $('#error_msg11').show();
            $('#error_msg11').html("Error : Please Select Month.");
        }
    }

    $(function()
    {
        $(".month_select").datepicker( {
            format: "yyyy-mm",
            startView: "months",
            minViewMode: "months",
            autoclose:true
        });
    });
    $('.month_select').datepicker({autoclose:true});

    //UploadRawData Save
    function upload_fp_data() {
        var raw_upload_month = $('#raw_upload_month').val();
        if (raw_upload_month != "") {
            $('.loading_upload_data').show();
            $('.warp_form').hide();
            $.ajax({
                type: "post",
                async: true,
                url: "<?php echo site_url('systems/file_upload_con/upload_file_kr'); ?>",
                data: {
                    "raw_upload_month": raw_upload_month
                },
                dataType: "html",
                success: function (data) {
                    $('.loading_upload_data').hide();
                    $('.warp_form').show();
                    $('#upload_file_kr_form')[0].reset();
                    if (data.status) {
                        bootbox.alert(data.message);
                        $('#upload_file_kr').modal('hide');
                        reload_table(datatableFP_table);
                    }  else {
                        bootbox.alert(data.message);
                        //$('#upload_file_kr').modal('hide');
                        reload_table(datatableFP_table);
                        //$('#load_leave1').html(data);
                    }
                }
            });
        } else {
            $('#loading_upload_data').hide();
            bootbox.alert("Error : Please Select Month.");
        }
    }

    function reload_table(table)
    {
        if(typeof table !== "undefined")
        {
            table.ajax.reload(null,false);
        }
    }
</script>

<?php /*$baseURL = base_url(); if($baseURL=="http://mx5.earrow.net/kreston/"){*/?><!--
    url: "<?php /*echo site_url('systems/file_upload_con/upload_file_kr'); */?>",
<?php /*}elseif($baseURL=="http://mx5.earrow.net/demo/demohr/"){ */?>
    url: "<?php /*echo site_url('systems/file_upload_con/upload_file_teckpac'); */?>",
<?php /*} else {*/?>
    url: "<?php /*echo site_url('systems/file_upload_con/upload_file_kr'); */?>",
--><?php /*}*/?>