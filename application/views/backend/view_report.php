<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Rapport</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>reports">Rapports</a></li>
                    <li class="breadcrumb-item active">Voir Rapport</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"><?php echo $report->title; ?></h4>
                    </div>
                    <div class="card-body">
                        <h5>Créé par: <?php echo $report->employee_id; ?></h5>
                        <h5>Date: <?php echo $report->created_at; ?></h5>
                        <p><?php echo $report->content; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/footer'); ?>
