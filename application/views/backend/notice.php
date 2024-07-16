<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-clipboard"></i>Rapport</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Rapport</li>
                    </ol>
                </div>
            </div>
        <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#noticemodel" data-whatever="@getbootstrap" class="text-white "><i class="" aria-hidden="true"></i>Ajouter rapport</a></button>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                    <h4 class="m-b-0 text-white">Rapport</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>Employee</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($notice as $value): ?>
                                            <tr>
                                                <td><?php echo $value->id; ?></td>
                                                <td><?php echo $value->title; ?></td>
                                                <td><?php echo nl2br(substr($value->description, 0, 100)) . (strlen($value->description) > 100 ? '...' : ''); ?></td>
                                                <td><?php echo $value->first_name . ' ' . $value->last_name; ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($value->date)); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- sample modal content -->
                        <div class="modal fade" id="noticemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Rapport</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" method="post" action="Published_Notice" id="btnSubmit">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Titre Rapport</label>
                                                <textarea class="form-control" name="title" id="message-text1" required minlength="5" maxlength="150"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Description</label>
                                                <textarea class="form-control" name="description" id="description" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name1" class="control-label">Employee</label>
                                                <select name="employee_id" class="form-control custom-select" required>
                                                    <option value="">Select Employee</option>
                                                    <?php foreach($employees as $employee): ?>
                                                        <option value="<?php echo $employee->id; ?>"><?php echo $employee->first_name . ' ' . $employee->last_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-success">Envoyer</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal --> 
        </div>
      </div>
<?php $this->load->view('backend/footer'); ?>
