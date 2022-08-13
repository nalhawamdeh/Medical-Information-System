<h2 class="text-primary page-title"> <?= $title;?> </h2>


<?php echo form_open('doctors/update');?>
    <div class="form-group">
        <label>Doctor ID</label>
        <input type="text" class="form-control" name="doctor_id" placeholder="Doctor ID" value="<?php echo $doctor['doctor_id'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Doctor Forename</label>
        <input type="text" class="form-control" name="doctor_forename" placeholder="Doctor Forename" value="<?php echo $doctor['doctor_forename'];?>">
    </div>

    <div class="form-group">
        <label>Doctor Surname</label>
        <input type="text" class="form-control" name="doctor_surname" placeholder="Doctor Surname" value="<?php echo $doctor['doctor_surname'];?>">
    </div>

    <div class="form-group">
        <label>Speciality</label>
        <input type="text" class="form-control" name="med_speciality" placeholder="Speciality" value="<?php echo $doctor['med_speciality'];?>">
    </div>

    <div class="form-group">
        <label>Organization ID</label>
        <input type="text" class="form-control" name="org_id" placeholder="Organization ID" value="<?php echo $doctor['org_id'];?>">
    </div>

    <div class="form-group">
        <label>Doctor Email</label>
        <input type="text" class="form-control" name="doctor_email" placeholder="Doctor Email" value="<?php echo $doctor['doctor_email'];?>">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $doctor['password'];?>">
    </div>

    <button type="submit" class="btn btn-success">Save Changes</button>
</form>