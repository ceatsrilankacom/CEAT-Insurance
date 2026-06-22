
<!--Loading modal -->
<div class="modal fade" id="loading_modal" role="dialog" style="background-color: transparent">
    <div class="modal-dialog modal-full" style="max-width: 120px;margin-top: 15%;background-color: transparent">
        <div class="modal-content" style="webkit-box-shadow:0px !important;background-color: transparent">
            <div class="modal-body form" style="text-align: center;height: 150px !important;">
                <img style="width: 80px; padding: 10px" src="<?php echo base_url('assets/images/hourglass.svg')?>" >
                <b>Please Wait...</b>
            </div>
        </div>
    </div>
</div>
<!--Loading modal -->


</div>
</div>
</div>
</div>
<div class="display-type"></div>
<footer class="footer" style="width: 100%;display: inline-table;height: 50px;">
    <p style="text-align: right; position: absolute; bottom: 10px; right: 10px;font-size: 10px;color:#4b59a5;">CEAT IT © <?php echo date("Y"); ?> All Rights Reserved.</p>
</footer>
</div>

<!--auto complete added by vkc de mel-->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<!--auto complete module added by vkc de mel-->

<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/tether/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/slick-carousel/slick/slick.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<!--V1 -->
<script src="<?php echo base_url(); ?>assets/node_modules/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sidebarmenu.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dt/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dt/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dt/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dt/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dt/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dt/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dt/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.yadcf.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap-duallistbox-4/dist/jquery.bootstrap-duallistbox.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {

        $.fn.modal.Constructor.prototype.enforceFocus = function () {};

        var csrf_token= $.cookie('csrf_ceat_co');
        $.ajaxSetup({
            data: {
                'csrf_ceat' : csrf_token
            }
        });

        $('.date-picker').bootstrapMaterialDatePicker({ weekStart: 0, time: false,autoclose: true });
        $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
        $('.datetimep').bootstrapMaterialDatePicker({ format: 'Y-MM-DD hh:mm:a' });
        $('.monthpick').bootstrapMaterialDatePicker({ format: 'Y-MM',monthPicker:true,year:false,time:false });
        $('.datetimepnew').bootstrapMaterialDatePicker({ format: 'Y-MM-DD HH:mm:ss' });
        $('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
        $(".select2").select2({allowClear: true,placeholder: "Select a value"});
        $('#check-minutes').click(function(e) {
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });

        $(".date-pick").datepicker({
            format: "yyyy-mm-dd",
            startView: "years",
            //minViewMode: "months",
            autoclose:true
        });
        $(".month-pick").datepicker( {
            format: "yyyy-mm",
            startView: "years",
            minViewMode: "months",
            autoclose:true
        });

    });

    ///////////////////////Added By VKC De MEl 2019-09-26 //////////////////////////////
    $(".numeric").on("keypress keyup blur",function(event){
        if(event.which > 57){
            event.preventDefault();
        }
    });



    $(document).ready(function() {

        //show notify
        $('#notify-count').show();


        // updating the view with notifications using ajax
        function update_employee_usage(){

           $.ajax({
                url:"<?php echo base_url(); ?>index.php/insurance/insurance_claim/update_employee_usage",
               type:"POST",
               dataType:"JSON",
               data:{
                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
               },
               success:function(data){
                   console.log(data);
               },
               error:function(){

               }
           });
        }

        //when refresh load unseen notification
        update_employee_usage();

        //set refresh for view notification
        setInterval(function(){
            update_employee_usage();
        }, 5000);
    });

    ///////////////////////Added By VKC De MEl 2022-03-18 //////////////////////////////

</script>

</body>
</html>