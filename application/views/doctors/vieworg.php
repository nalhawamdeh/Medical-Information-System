<h2 class="text-primary page-title"> <?= $title;?> </h2>


<?php echo form_open('doctors/vieworg');?>
<div class="form-group">
    <div class="form-group">
        <label>Organization ID</label>
        <input type="text" class="form-control" name="org_id" placeholder="Organization ID" value="<?php echo $org['org_id'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Organization Name</label>
        <input type="text" class="form-control" name="org_name" placeholder="Organization Name" value="<?php echo $org['org_name'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Building</label>
        <input type="text" class="form-control" name="building" placeholder="Building" value="<?php echo $org['building'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Street</label>
        <input type="text" class="form-control" name="street" placeholder="Street" value="<?php echo $org['street'];?>" readonly>
    </div>

    <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $org['city'];?>" readonly>
    </div>

    <div class="form-group">
        <label>Country</label>
        <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo $org['country'];?>" readonly>
    </div>


    <a class="btn btn-info pull-left" href="<?php echo base_url();?>doctors/editorg">Edit</a>
</form>
</form>