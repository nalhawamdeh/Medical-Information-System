<h2 class="text-primary page-title"> <?= $title; ?> </h2>
<?php echo validation_errors(); ?>
<?php echo form_open('prescriptions/create'); ?>

    <div class = "form-group">
        <label class="form-label mt-4">Prescription ID</label>
        <input type="text" class="form-control" name="prescription_id" placeholder="Prescription ID">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Patient Email</label>
        <input type="text" class="form-control" name="patient_email" placeholder="Patient Email">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Prescription Date</label>
        <input type="text" class="form-control" name="date" placeholder="Prescription Date">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Medication</label>
        <input type="text" class="form-control" name="medication" placeholder="Medication">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>