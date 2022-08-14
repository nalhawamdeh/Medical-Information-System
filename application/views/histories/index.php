<h2 class="text-primary page-title"> <?= $title?> </h2>
<div>
    <a class="btn btn-info pull-right" href="<?php echo base_url();?>histories/create">Create a New History</a>
</div>
<br><br><br>
<?php foreach($histories as $history) :?>
    <?php if($this->session->userdata('email') == $history['doctor_email'] || $this->session->userdata('email') == $history['patient_email'] ): ?>
        <div class="appointment-div">
            <h3> Patient ID: <?php echo $history['patient_id']; ?></h3>
            <h3> Patient Surname: <?php echo $history['patient_surname'];?> </h3>
            <hr class="hr-dark">
            <p> <a class="btn btn-info" href="<?php echo site_url('/histories/' .$history['slug']); ?>">View Details</a></p>
        </div>
    <br><br>
    <?php endif;?>
<?php endforeach;?>