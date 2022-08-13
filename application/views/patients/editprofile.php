<h2 class="text-primary page-title"> <?=$title?> </h2>

<?php echo form_open('patients/update'); ?>
    <div class="form-group">
        <label>Patient ID</label>
        <input type="text" class="form-control" name="patient_id" placeholder="Patient ID" value="<?php echo $patient['patient_id'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Patient Forename</label>
        <input type="text" class="form-control" name="patient_forename" placeholder="Patient Forename" value="<?php echo $patient['patient_forename'];?>">
    </div>

    <div class="form-group">
        <label>Patient Surname</label>
        <input type="text" class="form-control" name="patient_surname" placeholder="Patient Surname" value="<?php echo $patient['patient_surname'];?>">
    </div>

    <div class="form-group">
        <label>Patient Email</label>
        <input type="text" class="form-control" name="patient_email" placeholder="Patient Email" value="<?php echo $patient['patient_email'];?>">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $patient['password'];?>">
    </div>

    <button type="submit" class="btn btn-success">Save Changes</button>
    
</form>