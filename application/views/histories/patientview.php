<h2 class="text-primary page-title"> <?= $title?> </h2>

<?php foreach($histories as $history) :?>
    <?php if($this->session->userdata('email') == $history['patient_email'] ): ?>
        <div class="appointment-div">
            <h3> Patient ID: <?php echo $history['patient_id']; ?></h3>
            <h3> Patient Surname: <?php echo $history['patient_surname'];?></h3>
            
            <hr class="hr-dark">

            <p> Patient Email: <?php echo $history['patient_email'];?> </p>
            <p> Doctor Email: <?php echo $history['doctor_email'];?> </p>
            
            <hr class="hr-dark">

            <p> Illness: <?php echo $history['illness'];?> </p>
            <p> Weight: <?php echo $history['weight'];?> </p>
            <p> Height: <?php echo $history['height'];?> </p>
            <p> Birthday: <?php echo $history['birthday'];?> </p>
        
        </div>
    <br><br>
    <?php endif;?>
<?php endforeach;?>