<?php echo validation_errors(); ?>
<?php echo form_open('appointments/update'); ?>
    <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id'];?>">
    
    <div class = "form-group">
        <label>Date</label>
        <input type="text" class="form-control" name="date" placeholder="Date" value="<?php echo $appointment['date'];?>">
    </div>

    <div class = "form-group">
        <label>Time</label>
        <input type="time" class="form-control" name="time" placeholder="Time" value="<?php echo $appointment['time'];?>">
    </div>

    <div class = "form-group">
        <label>Patient ID</label>
        <input type="text" class="form-control" name="patient_id" placeholder="Patient ID" value="<?php echo $appointment['patient_id'];?>">
    </div>

    <div class = "form-group">
        <label>Patient Surname</label>
        <input type="text" class="form-control" name="patient_surname" placeholder="Patient Surname" value="<?php echo $appointment['patient_surname'];?>">
    </div>

    <div class = "form-group">
        <label>Patient Email</label>
        <input type="text" class="form-control" name="patient_email" placeholder="Patient Email" value="<?php echo $appointment['patient_email'];?>">
    </div>

    <div class = "form-group">
        <label>Doctor ID</label>
        <input type="text" class="form-control" name="doctor_id" placeholder="Doctor ID" value="<?php echo $appointment['doctor_id'];?>">
    </div>

    <div class = "form-group">
        <label>Doctor Surname</label>
        <input type="text" class="form-control" name="doctor_surname" placeholder="Doctor Surname" value="<?php echo $appointment['doctor_surname'];?>">
    </div>

    <div class = "form-group">
        <label>Doctor Email</label>
        <input type="text" class="form-control" name="doctor_email" placeholder="Doctor Email" value="<?php echo $appointment['doctor_email'];?>">
    </div>

    <button type="submit" class="btn btn-success">Save Changes</button>
</form>