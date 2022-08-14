<h2 class="text-primary page-title"> <?= $title?> </h2>
<div>
    <a class="btn btn-info pull-right" href="<?php echo base_url();?>prescriptions/create">Create a New Prescription</a>
</div>
<br><br><br>
<?php foreach($prescriptions as $prescription) :?>
    <?php if($this->session->userdata('email') == $prescription['doctor_email']): ?>
        <div class="appointment-div">
            <h3> Prescription ID: <?php echo $prescription['prescription_id']; ?></h3>
            <h3> Prescription Date: <?php echo $prescription['prescription_date']; ?></h3>
            <h3> Medication: <?php echo $prescription['medication']; ?></h3>
            <h3> Patient Email: <?php echo $prescription['patient_email'];?> </h3>
            <hr class="hr-dark">
            <a class="btn btn-info pull-left" href="prescriptions/edit/<?php echo $prescription['slug'];?>">Edit</a>
            <?php echo form_open('prescriptions/delete/'.$prescription['prescription_id']);?>
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        </div>
    <br><br>
    <?php endif;?>
<?php endforeach;?>