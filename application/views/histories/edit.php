<h2 class="text-primary page-title"> <?= $title; ?> </h2>
<?php echo validation_errors(); ?>
<?php echo form_open('histories/update'); ?>

    <div class = "form-group">
        <label class="form-label mt-4">Patient ID</label>
        <input type="text" class="form-control" name="patient_id" value="<?php echo $history['patient_id'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Patient Surname</label>
        <input type="text" class="form-control" name="patient_surname" value="<?php echo $history['patient_surname'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Patient Email</label>
        <input type="text" class="form-control" name="patient_email" value="<?php echo $history['patient_email'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Birthday</label>
        <input type="text" class="form-control" name="date" value="<?php echo $history['birthday'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Illness</label>
        <input type="text" class="form-control" name="illness" value="<?php echo $history['illness'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Weight</label>
        <input type="text" class="form-control" name="weight" value="<?php echo $history['weight'];?>">
    </div>

    <div class = "form-group">
        <label class="form-label mt-4">Height</label>
        <input type="text" class="form-control" name="height" value="<?php echo $history['height'];?>">
    </div>

    <button type="submit" class="btn btn-success">Save Changes</button>
</form>