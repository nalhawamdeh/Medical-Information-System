<h2 class="text-primary page-title"> <?= $title;?> </h2>
<?php echo validation_errors();?>

<!--submit to doctors/register function-->
<?php echo form_open('doctors/register');?>
    <div class="form-group">
        <label>Doctor ID</label>
        <input type="text" class="form-control" name="doctor_id" placeholder="Doctor ID">
    </div>

    <div class="form-group">
        <label>Doctor Forename</label>
        <input type="text" class="form-control" name="doctor_forename" placeholder="Doctor Forename">
    </div>

    <div class="form-group">
        <label>Doctor Surname</label>
        <input type="text" class="form-control" name="doctor_surname" placeholder="Doctor Surname">
    </div>

    <div class="form-group">
        <label>Speciality</label>
        <input type="text" class="form-control" name="med_speciality" placeholder="Speciality">
    </div>

    <div class="form-group">
        <label>Organization ID</label>
        <input type="text" class="form-control" name="org_id" placeholder="Organization ID">
    </div>

    <div class="form-group">
        <label>Doctor Email</label>
        <input type="text" class="form-control" name="doctor_email" placeholder="Doctor Email">
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