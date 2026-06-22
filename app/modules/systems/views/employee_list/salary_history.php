<style>
    #datatable1 tbody td {
        padding: 2px 5px;
    }
    #datatable1 .btn {
        margin-left: 0;
        margin-right: 5px;
        padding: 2px 5px;
    }
    .dataTables_filter{
        text-align: right;
        margin-top: 5px;
    }

    .input-medium {
        width: 200px !important;
    }
    .error-block{
        color:red;
        font-size: 9px;
        text-transform: capitalize;
    }
    #dyTable tbody{
        counter-reset: rowNumber;
    }
    #dyTable tbody tr {
        counter-increment: rowNumber;
    }
    #dyTable tbody tr td:first-child::before {
        content: counter(rowNumber);
    }
    label {
        width: 220px;}
    .modal-open .select2-container--open { z-index: 99999999999 !important; width:100% !important; }
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Employee Salary History</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="element-wrapper">
            <div class="element-actions">
            </div>
            <!--<h6 class="element-header">

            </h6>-->
            <div class="card-header bg-info page-head-title-wrap">
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Employee Salary History</h4>
            </div>
            <div class="element-box">
                <table id="emp_sal_datatable" class="table" cellspacing="0" width="100%">
                    <thead style="background-color: #0e7eff;color: white;">
                    <tr>
                        <th>#</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Employee Category</th>
                        <th>Type</th>
                        <th>Allowance</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    var emp_sal_datatable;

    $(document).ready(function() {

        emp_sal_datatable = $('#emp_sal_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>hr_payroll/employee_list/get_emp_sal_data",
                "type": "POST"
            },

            "columnDefs": [
                {
                    "targets": [ -1 ],
                    "orderable": false
                }
            ],

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "catetyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infocatety": "No entries found",
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
                [0, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"]
            ],

            "pageLength": 20,
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
        });

        emp_sal_datatable.on('order.dt search.dt', function () {
            emp_sal_datatable.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();


        yadcf.init(emp_sal_datatable, [{
                filter_type: "text",
                filter_delay: 500,
                column_number: 0
            }, {
                filter_type: "text",
                filter_delay: 500,
                column_number: 1
            },{
                filter_type: "select",
                filter_default_label: "By Name",
                column_number: 2
            },{
                filter_type: "select",
                filter_default_label: "By Category",
                column_number: 3
            },{
                filter_type: "select",
                filter_default_label: "By Type",
                column_number: 4
            },{
                filter_type: "text",
                filter_delay: 500,
                column_number: 5
            },{
                filter_type: "text",
                filter_delay: 500,
                column_number: 6
            },],
            {
                cumulative_filtering: false
            });
    });

</script>

