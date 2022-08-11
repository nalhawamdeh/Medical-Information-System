<div class="appointment-div">
    <h2> Appointment ID: <?php echo $appointment['appointment_id']; ?></h2>
    <h2><?php echo $appointment['date'] ." at ". $appointment['time']; ?></h2>
    <hr class="hr-dark">
        <p> Patient ID: <?php echo $appointment['patient_id'];?> </p>
        <p> Patient Surname: <?php echo $appointment['patient_surname'];?> </p>
        <p> Doctor ID: <?php echo $appointment['doctor_id'];?> </p>
        <p> Doctor Surname: Dr. <?php echo $appointment['doctor_surname'];?> </p>

        <hr class="hr-dark" >

        <a class="btn btn-info pull-left" href="edit/<?php echo $appointment['slug'];?>">Edit</a>

        <?php echo form_open('appointments/delete/'.$appointment['appointment_id']);?>
            <input type="submit" value="Delete" class="btn btn-danger">
        
</div>

