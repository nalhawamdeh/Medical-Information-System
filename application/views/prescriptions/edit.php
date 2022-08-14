<h2 class="text-primary page-title"> <?= $title; ?> </h2>
<?php echo validation_errors(); ?>
<?php echo form_open('prescriptions/update'); ?>

    <div class = "form-group">
        <label class="form-label mt-4">Prescription ID</label>
        <input type="text" class="form-control" name="prescription_id" value="<?php echo $prescription['prescription_id'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Patient Email</label>
        <input type="text" class="form-control" name="patient_email" value="<?php echo $prescription['patient_email'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Prescription Date</label>
        <input type="text" class="form-control" name="date" value="<?php echo $prescription['prescription_date'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Medication</label>
        <input type="text" class="form-control" name="medication" value="<?php echo $prescription['medication'];?>">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>