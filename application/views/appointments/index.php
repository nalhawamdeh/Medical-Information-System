<h2 class="text-primary"> <?= $title?> </h2>
<br>
<?php foreach($appointments as $appointment) :?>
    <div class="appointment-div">
    <h3><?php echo $appointment['date'] ." at ". $appointment['time']; ?></h3>
    <hr class="hr-dark">
        <p> Patient ID: <?php echo $appointment['patient_id'];?> </p>
        <p> Doctor ID: <?php echo $appointment['doctor_id'];?> </p>
        <br>
    <p> <a class="btn btn-info" href="<?php echo site_url('/appointments/' .$appointment['slug']); ?>">View Details</a></p>
    </div>
    <br><br>
<?php endforeach;?>