<html>
    <head>
        <title> Medical Info System </title>
        <link rel="stylesheet" href="https://bootswatch.com/3/yeti/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    </head>

    <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
    </script>
    

    <body>
    <nav class="navbar navbar-inverse">
		<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">Medical Info System</a>
				</div>
			<div id="navbar">
				<ul class="nav navbar-nav">
					  <li><a href="<?php echo base_url(); ?>">Home</a></li>
					<!--<li><a href="<\\?php echo base_url(); ?>about">About</a></li>-->
					<!--<li><a href="<\\?php echo base_url(); ?>contact">Contact</a></li>-->
          <?php if($this->session->userdata('logged_in')): ?>
            
            <li><a href="<?php echo base_url(); ?>appointments">Appointments</a></li>

            <?php if(($this->session->userdata('profile')=="patient")):?>
              <li><a href="<?php echo site_url();?>prescriptions/patientview">My Prescriptions</a></li>
              <li><a href="<?php echo site_url();?>histories/patientview">My Medical History</a></li>
            <?php endif;?>
          
            <?php if(($this->session->userdata('profile')=="doctor")):?>
              <li><a href="<?php echo base_url();?>prescriptions">Prescriptions</a></li>
              <li><a href="<?php echo base_url();?>histories">Medical Histories</a></li>
            <?php endif;?>
          <?php endif;?>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <?php if(!$this->session->userdata('logged_in')): ?>
          <li><a href="<?php echo base_url();?>loginprofiles">Login</a></li>
          <li><a href="<?php echo base_url();?>registerprofiles">Register</a></li>
          <?php endif;?>

          <?php if($this->session->userdata('logged_in')): ?>
            <?php if(($this->session->userdata('profile')=="doctor")):?>
              <li><a href="<?php echo base_url();?>doctors/viewprofile">My Profile</a></li>
              <li><a href="<?php echo base_url();?>doctors/logout">Logout</a></li>
            <?php endif;?>
            <?php if(($this->session->userdata('profile')=="patient")):?>
              <li><a href="<?php echo base_url();?>patients/viewprofile">My Profile</a></li>
              <li><a href="<?php echo base_url();?>patients/logout">Logout</a></li>
            <?php endif;?>
          <?php endif;?>

        </ul>
      </div>
    </div>
    </nav>

    <div class="container">

    <!-- Alerts -->
    <?php if($this -> session -> flashdata('patient_registered')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('patient_registered') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('patient_notloggedin')): ?>
      <?php echo '<p class="alert alert-danger">' .$this -> session -> flashdata('patient_notloggedin') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('patient_loggedin')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('patient_loggedin') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('patient_loggedout')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('patient_loggedout') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('doctor_loggedin')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('doctor_loggedin') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('doctor_notloggedin')): ?>
      <?php echo '<p class="alert alert-danger">' .$this -> session -> flashdata('doctor_notloggedin') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('doctor_loggedout')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('doctor_loggedout') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('doctor_registered')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('doctor_registered') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('patient_updateprofile')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('patient_updateprofile') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('doctor_updateprofile')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('doctor_updateprofile') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('history_created')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('history_created') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('history_deleted')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('history_deleted') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('history_updated')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('history_updated') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('appointment_updated')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('appointment_updated') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('appointment_deleted')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('appointment_deleted') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('appointment_booked')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('appointment_booked') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('prescription_created')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('prescription_created') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('prescription_updated')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('prescription_updated') . '</p>'; ?>   
    <?php endif; ?>

    <?php if($this -> session -> flashdata('prescription_deleted')): ?>
      <?php echo '<p class="alert alert-success">' .$this -> session -> flashdata('prescription_deleted') . '</p>'; ?>   
    <?php endif; ?>
    <!-- Add alerts for book appointment and change appointment in controllers create edit delete update methods also for doctors -->