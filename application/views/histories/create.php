<h2 class="text-primary page-title"> <?= $title; ?> </h2>
<?php echo validation_errors(); ?>
<?php echo form_open('histories/create'); ?>

    <div class = "form-group">
        <label class="form-label mt-4">Patient ID</label>
        <input type="text" class="form-control" name="patient_id" placeholder="Patient ID">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Patient Surname</label>
        <input type="text" class="form-control" name="patient_surname" placeholder="Patient Surname">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Patient Email</label>
        <input type="text" class="form-control" name="patient_email" placeholder="Patient Email">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Birthday</label>
        <input type="text" class="form-control" name="date" placeholder="Birthday">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Illness</label>
        <input type="text" class="form-control" name="illness" placeholder="Illness">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Weight</label>
        <input type="text" class="form-control" name="weight" placeholder="Weight">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Height</label>
        <input type="text" class="form-control" name="height" placeholder="Height">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>