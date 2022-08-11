<h2 class="text-primary page-title"> <?= $title;?> </h2>
<?php echo validation_errors();?>

<!--submit to users/register function-->
<?php echo form_open('patients/register');?>
    <div class="form-group">
        <label>Patient ID</label>
        <input type="text" class="form-control" name="patient_id" placeholder="Patient ID">
    </div>

    <div class="form-group">
        <label>Patient Forename</label>
        <input type="text" class="form-control" name="patient_forename" placeholder="Patient Forename">
    </div>

    <div class="form-group">
        <label>Patient Surname</label>
        <input type="text" class="form-control" name="patient_surname" placeholder="Patient Surname">
    </div>

    <div class="form-group">
        <label>Patient Email</label>
        <input type="text" class="form-control" name="patient_email" placeholder="Patient Email">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
    </div>

    <button type="submit" class="btn btn-success">Register</button>
</form>