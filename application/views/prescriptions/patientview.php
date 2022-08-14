<h2 class="text-primary page-title"> <?= $title?> </h2>

<?php foreach($prescriptions as $prescription) :?>
    <?php if($this->session->userdata('email') == $prescription['patient_email'] ): ?>
        <div class="appointment-div">
            <h3> Prescription ID: <?php echo $prescription['prescription_id']; ?></h3>
            
            <hr class="hr-dark">

            <p> Patient Email: <?php echo $prescription['patient_email'];?> </p>
            <p> Doctor Email: <?php echo $prescription['doctor_email'];?> </p>
            
            <hr class="hr-dark">

            <p> Prescription Date: <?php echo $prescription['prescription_date']; ?></h3>
            <p> Medication: <?php echo $prescription['medication']; ?></h3>
        
        </div>
    <br>
    <?php endif;?>
<?php endforeach;?>