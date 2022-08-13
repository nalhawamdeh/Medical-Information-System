<h2 class="text-primary page-title"> <?= $title?> </h2>
<br>
<?php foreach($histories as $history) :?>
    <?php if($this->session->userdata('email') == $history['patient_email'] || $this->session->userdata('email') == $history['doctor_email']): ?>
        <div class="appointment-div">
            <h3><?php echo $history['patient_id']; ?></h3>
                <hr class="hr-dark">
                <p> Patient ID: <?php echo $history['patient_id'];?> </p>
                <br>
            <p> <a class="btn btn-info" href="<?php echo site_url('/histories/' .$history['slug']); ?>">View Details</a></p>

        </div>
    <br><br>
    <?php endif;?>
<?php endforeach;?>