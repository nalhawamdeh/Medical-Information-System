<?php echo form_open('doctors/login'); ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center"><?php echo $title;?></h1><br>
            <div class="form-group">
                <input type="text" name="doctor_email" class="form-control" placeholder="Doctor Email" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </div>
</form>