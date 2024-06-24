<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row m-b-10"> 
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i>
                <a href="<?php echo base_url(); ?>reports/create" class="text-white"> Ajouter Rapport</a></button>
                <?php if ($this->session->userdata('user_role') == 'admin'): ?>
                <form method="post" action="<?php echo base_url(); ?>reports/search">
                    <input type="text" name="query" placeholder="Recherche de rapports...">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Recherche</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Liste des rapports</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="reports123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Contenu</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($reports as $report): ?>
                                    <tr>
                                        <td><?php echo $report->title; ?></td>
                                        <td><?php echo substr($report->content, 0, 100) . '...'; ?></td>
                                        <td><?php echo $report->created_at; ?></td>
                                        <td class="jsgrid-align-center ">
                                            <a href="<?php echo base_url(); ?>reports/view/<?php echo $report->id; ?>" title="View" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/footer'); ?>
<script>
    $('#reports123').DataTable({
        "aaSorting": [[2,'desc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
