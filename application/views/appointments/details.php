<div class="appointment-div">
    <h2> Appointment ID: <?php echo $appointment['appointment_id']; ?></h2>
    <h2><?php echo $appointment['date'] ." at ". $appointment['time']; ?></h2>
    <hr class="hr-dark">
        <p> Patient ID: <?php echo $appointment['patient_id'];?> </p>
        <p> Patient Surname: <?php echo $appointment['patient_surname'];?> </p>
        <p> Doctor ID: <?php echo $appointment['doctor_id'];?> </p>
        <p> Doctor Surname: Dr. <?php echo $appointment['doctor_surname'];?> </p>
        <br>
</div>
