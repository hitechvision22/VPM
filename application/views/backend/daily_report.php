<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-file-text"></i> Daily Reports</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">Daily Report</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    <a data-toggle="modal" data-target="#reportModel" class="text-white">
                        Add Report
                    </a>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Report List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Employee PIN</th>
                                        <th>Employee Name</th>
                                        <th>Report</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($reports as $report): ?>
                                    <tr>
                                        <td><?php echo $report->id; ?></td>
                                        <td><?php echo date('jS \of F Y', strtotime($report->report_date)); ?></td>
                                        <td><?php echo $report->em_code; ?></td>
                                        <td><?php echo $report->first_name.' '.$report->last_name; ?></td>
                                        <td><?php echo substr($report->report_content, 0, 50).'...'; ?></td>
                                        <?php if($this->session->userdata('user_type') == 'ADMIN'){ ?>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary waves-effect waves-light reportEdit" data-id="<?php echo $report->id; ?>">
                                                <i class="fa fa-pencil-square-o"></i> Edit
                                            </a>
                                        </td>
                                        <?php } else { ?>
                                        <td>View Only</td>
                                        <?php } ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="reportModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Daily Report</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="Daily_Report" id="reportForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" name="report_date" class="form-control mydatetimepickerFull" required>
                            </div>
                            <div class="form-group">
                                <label>Report</label>
                                <textarea name="report_content" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="report_id">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $("#addNewReport").on("click", function() {
                $('#reportForm').trigger("reset");
                $('#reportForm').find('[name="report_id"]').val("").end();
            });

            $(document).ready(function() {
                $(".reportEdit").click(function(e) {
                    e.preventDefault(e);
                    var reportID = $(this).attr('data-id');
                    $('#reportForm').trigger("reset");
                    $('#reportModel').modal('show');
                    $.ajax({
                        url: 'getReportData?id=' + reportID,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function(response) {
                        $('#reportForm').find('[name="report_id"]').val(response.id).end();
                        $('#reportForm').find('[name="report_date"]').val(response.report_date).end();
                        $('#reportForm').find('[name="report_content"]').val(response.report_content).end();
                    });
                });
            });
        </script>
    </div>
</div>

<?php $this->load->view('backend/footer'); ?>
