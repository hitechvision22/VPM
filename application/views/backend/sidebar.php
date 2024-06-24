        <aside class="left-sidebar">
        	<!-- Sidebar scroll-->
        	<div class="scroll-sidebar">
        		<!-- User profile -->
        		<?php
				$id = $this->session->userdata('user_login_id');
				$basicinfo = $this->employee_model->GetBasic($id);
				?>
        		<div class="user-profile">
        			<!-- User profile image -->
        			<div class="profile-img"> <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" />
        				<!-- this is blinking heartbit-->
        				<!-- <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
        			</div>

        			<!-- User profile text-->
        			<div class="profile-text">
        				<h5><?php echo $basicinfo->first_name . ' ' . $basicinfo->last_name; ?></h5>
        				<a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
        				<a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
        			</div>
        		</div>
        		<!-- End User profile text-->
        		<!-- Sidebar navigation-->
        		<nav class="sidebar-nav">
        			<ul id="sidebarnav">
        				<li class="nav-devider"></li>
        				<li> <a href="<?php echo base_url(); ?>"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
        				<?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
        					<li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Employees</span></a>
        					</li>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Partir</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>leave/Holidays">Vacances</a></li>
        							<li><a href="<?php echo base_url(); ?>leave/EmApplication">Demande d’autorisation</a></li>
        							<li><a href="<?php echo base_url(); ?>leave/EmLeavesheet">Feuille de congé</a></li>
        						</ul>
        					</li>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Projects</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>Projects/All_Projects">Projects </a></li>
        							<li><a href="<?php echo base_url(); ?>Projects/All_Tasks">Liste taches</a></li>
        							<!--<li><a href="<?php #echo base_url(); 
														?>Projects/All_Tasks"> Field Visit</a></li>-->
        						</ul>
        					</li>
        					<li> <a href="<?php echo base_url('Rapport/liste_rapports'); ?>"><i class="mdi mdi-clipboard"></i><span class="hide-menu">Mes Rapports</span></a></li>
        				<?php } else { ?>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu">Organisation</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>organization/Department">Département </a></li>
        							<li><a href="<?php echo base_url(); ?>organization/Designation">Désignation</a></li>
        						</ul>
        					</li>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Salariés</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>employee/Employees">Salariés</a></li>
        							<li><a href="<?php echo base_url(); ?>employee/Disciplinary">Discipline</a></li>
        							<li><a href="<?php echo base_url(); ?>employee/Inactive_Employee">Utilisateur Inactif</a></li>
        						</ul>
        					</li>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Frequentation</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>attendance/Attendance">Liste de Présence</a></li>
        							<li><a href="<?php echo base_url(); ?>attendance/Save_Attendance">Ajouter une participation</a></li>
        							<li><a href="<?php echo base_url(); ?>attendance/Attendance_Report">Rapport de présence</a></li>
        						</ul>
        					</li>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-off"></i><span class="hide-menu">Partir</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>leave/Holidays">Vacances</a></li>
        							<li><a href="<?php echo base_url(); ?>leave/leavetypes">Type de congé</a></li>
        							<li><a href="<?php echo base_url(); ?>leave/Application">Demande d'autorisation</a></li>
        							<li><a href="<?php echo base_url(); ?>leave/Earnedleave">congés acquis</a></li>
        							<li><a href="<?php echo base_url(); ?>leave/Leave_report">Rapport</a></li>
        						</ul>
        					</li>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Project </span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>Projects/All_Projects">Projects</a></li>
        							<li><a href="<?php echo base_url(); ?>Projects/All_Tasks"> Liste taches</a></li>
        							<li><a href="<?php echo base_url(); ?>Projects/Field_visit"> Rapport Journaliére</a></li>
        						</ul>
        					</li>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Masse Salariale</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<!--<li><a href="<?php #echo base_url(); 
														?>Payroll/Salary_Type"> Payroll Type </a></li>-->
        							<li><a href="<?php echo base_url(); ?>Payroll/Salary_List">Liste de paie</a></li>
        							<li><a href="<?php echo base_url(); ?>Payroll/Generate_salary"> Générer une fiche de paie</a></li>
        							<li><a href="<?php echo base_url(); ?>Payroll/Payslip_Report">Rapport sur les bulletins de paie</a></li>
        						</ul>
        					</li>
        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cash"></i><span class="hide-menu">pret</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>Loan/View">Pret sous forme de subvention</a></li>
        							<li><a href="<?php echo base_url(); ?>Loan/installment">Versement du pret</a></li>
        						</ul>
        					</li>

        					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-grid"></i><span class="hide-menu">Actif</span></a>
        						<ul aria-expanded="false" class="collapse">
        							<li><a href="<?php echo base_url(); ?>Logistice/Assets_Category">Catégories d'actifs</a></li>
        							<li><a href="<?php echo base_url(); ?>Logistice/All_Assets">Liste des actifs</a></li>
        							<!--<li><a href="<?php #echo base_url(); 
														?>Logistice/View"> Logistic Support List </a></li>-->
        							<li><a href="<?php echo base_url(); ?>Logistice/logistic_support">Soutien Logistique</a></li>
        						</ul>
        					</li>
        					<li> <a href="<?php echo base_url() ?>notice/All_notice"><i class="mdi mdi-clipboard"></i><span class="hide-menu">Remarques<span class="hide-menu"></a></li>
        					<li> <a href="<?php echo base_url(); ?>settings/Settings"><i class="mdi mdi-settings"></i><span class="hide-menu">Paramétres<span class="hide-menu"></a></li>
        					<li> <a href="<?php echo base_url('Rapport/tous_rapports'); ?>"><i class="mdi mdi-clipboard"></i><span class="hide-menu">les Rapports</span></a></li>
        				<?php } ?>
        			</ul>
        		</nav>
        		<!-- End Sidebar navigation -->
        	</div>
        	<!-- End Sidebar scroll-->
        </aside>
