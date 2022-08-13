<h2 class="text-primary page-title"> <?=$title?> </h2>

<?php echo form_open('patients/viewprofile'); ?>
    
<div class="form-group">
        <label>Patient ID</label>
        <input type="text" class="form-control" name="patient_id" placeholder="Patient ID" value="<?php echo $patient['patient_id'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Patient Forename</label>
        <input type="text" class="form-control" name="patient_forename" placeholder="Patient Forename" value="<?php echo $patient['patient_forename'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Patient Surname</label>
        <input type="text" class="form-control" name="patient_surname" placeholder="Patient Surname" value="<?php echo $patient['patient_surname'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Patient Email</label>
        <input type="text" class="form-control" name="patient_email" placeholder="Patient Email" value="<?php echo $patient['patient_email'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $patient['password'];?>" readonly>
    </div>

    <a class="btn btn-info pull-left" href="<?php echo base_url();?>patients/editprofile">Edit</a>

</form>