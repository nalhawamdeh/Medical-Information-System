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
					<li><a href="<?php echo base_url(); ?>about">About</a></li>
					<li><a href="<?php echo base_url(); ?>contact">Contact Us</a></li>
                    <li><a href="<?php echo base_url(); ?>appointments">Appointments</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url();?>appointments/book">Book Appointment</a></li>
        </ul>
      </div>
    </div>
    </nav>

    <div class="container">
