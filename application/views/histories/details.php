<div class="appointment-div">
    <h2> Patient ID: <?php echo $history['patient_id']; ?></h2>
    <hr class="hr-dark">
        <p> Illness: <?php echo $history['illness'];?> </p>
        <p> Weight: <?php echo $history['weight'];?> </p>
        <p> Height: <?php echo $history['height'];?> </p>
        <p> Birthday: <?php echo $history['birthday'];?> </p>
        <p> Patient_Email: <?php echo $history['patient_email'];?> </p>
        
        <?php if($this->session->userdata('email') == $history['doctor_email']): ?>
        <hr class="hr-dark" >

        <a class="btn btn-info pull-left" href="edit/<?php echo $history['slug'];?>">Edit</a>

        <?php echo form_open('histories/delete/'.$history['patient_id']);?>
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        <?php endif;?>
</div>