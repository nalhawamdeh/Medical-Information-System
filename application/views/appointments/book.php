<h2><?= $title;?></h2>
<!--
    <div class="form-group">
        <label>Patient ID</label>
        <input type="text" class="form-control" id="patient_id" placeholder="Patient ID">
    </div>
  
    <div class="form-group">
        <label>Patient Surname</label>
        <input type="text" class="form-control" id="patient_surname" placeholder="Patient Surname">
    </div>

    <div class="form-group">
        <label>Patient Email</label>
        <input type="text" class="form-control" id="patient_email" placeholder="Patient Email">
    </div>
  
    <div class="form-group">
        <label class="control-label">Date</label>
        <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>
    </div>

    <div class="form-group">
        <label>Time</label>
        <input type="text" class="form-control" id="time" placeholder="Time">
    </div>

    <div class="form-group">
        <label>Doctor ID</label>
        <input type="text" class="form-control" id="doctor_id" placeholder="Doctor ID">
    </div>

    <div class="form-group">
        <label>Doctor Surname</label>
        <input type="text" class="form-control" id="doctor_surname" placeholder="Doctor Surname">
    </div>

    <div class="form-group">
        <label>Doctor Email</label>
        <input type="text" class="form-control" id="doctor_email" placeholder="Doctor Email">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button> 
</form> -->

<?php echo validation_errors(); ?>
<?php echo form_open('appointments/book'); ?>
    <div class = "form-group">
        <label>Date</label>
        <input type="text" class="form-control" name="date" placeholder="Date">
    </div>

    <div class = "form-group">
        <label>Time</label>
        <input type="time" class="form-control" name="time" placeholder="Time">
    </div>

    <div class = "form-group">
        <label>Patient ID</label>
        <input type="text" class="form-control" name="patient_id" placeholder="Patient ID">
    </div>

    <div class = "form-group">
        <label>Patient Surname</label>
        <input type="text" class="form-control" name="patient_surname" placeholder="Patient Surname">
    </div>

    <div class = "form-group">
        <label>Patient Email</label>
        <input type="text" class="form-control" name="patient_email" placeholder="Patient Email">
    </div>

    <div class = "form-group">
        <label>Doctor ID</label>
        <input type="text" class="form-control" name="doctor_id" placeholder="Doctor ID">
    </div>

    <div class = "form-group">
        <label>Doctor Surname</label>
        <input type="text" class="form-control" name="doctor_surname" placeholder="Doctor Surname">
    </div>

    <div class = "form-group">
        <label>Doctor Email</label>
        <input type="text" class="form-control" name="doctor_email" placeholder="Doctor Email">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>
