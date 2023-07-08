<!-- Main Content -->
<div id="content">
<div class="container">
<?php echo validation_errors(); ?>
    <form method="POST"  action="<?= base_url('index.php/dashboard/edit-resident/'.$resident_data->resident_id); ?>">
    <div class="form-group">
        <label> First Name </label>
        <input type="text" name="first_name" value="<?= $resident_data->first_name?>" class="form-control">
        <span><?= form_error('firstname') ?></span>
</div>
<div class="form-group">
        <label> Middle Name </label>
        <input type="text" name="middle_name" value="<?= $resident_data->middle_name?>" class="form-control"/>
        <span><?= form_error('middlename') ?></span>
</div>
<div class="form-group">

<label> Last Name </label>

    <select name="last_name" class="form-control">
       
          
               
           
        
    </select>
    <span><?= form_error('last_name') ?></span>
</div>
<div class="form-group">
        <label> Birth Date </label>
        <input type="date" name="birth_date"value="<?= $resident_data->birth_date?>" class="form-control"/>
        <span><?= form_error('birth_date') ?></span>
</div>
<div class="form-group">
  <label for="sex">Sex</label>
  <select name="sex" value="<?= $resident_data->sex?>" class="form-control">
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>
  <span><?= form_error('sex') ?></span>
</div>
<div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="address">Address</label>
                        <input type="text" name="street" value="<?= $resident_data->street?>"placeholder="Street" class="form-control"/>
                        <span><?= form_error('street') ?></span>
                    </div>
                    <div class="col-sm-4">
                        <label for="purok"></label>
                        <input type="text" name="purok" value="<?= $resident_data->purok?>"placeholder="Purok" class="form-control"/>
                        <span><?= form_error('purok') ?></span>
                    </div>
                    <div class="col-sm-4">
                        <label for="barangay"></label>
                        <input type="text" name="barangay" value="<?= $resident_data->barangay?>"placeholder="Barangay" class="form-control"/>
                        <span><?= form_error('barangay') ?></span>
                    </div>
                </div>
            </div>
<div class="form-group">
  <label for="civilstatus">Civil Status</label>
  <select name="civil_status" value="<?= $resident_data->civil_status?>" class="form-control">
    <option value="single">Single</option>
    <option value="married">Married</option>
    <option value="separated">Separated</option>
    <option value="widowed">Widowed</option>
  </select>
  <span><?= form_error('civilstatus') ?></span>
</div>
<div class="form-group">
        <label> Nationality </label>
        <input type="text" name="nationality" value="<?= $resident_data->nationality?>"class="form-control"/>
        <span><?= form_error('nationality') ?></span>
</div>
<div class="form-group">
        <label> Contact </label>
        <input type="text" name="contact" value="<?= $resident_data->contact?>"class="form-control"/>
        <span><?= form_error('contact') ?></span>
</div>

<div class="form-group">
        <label> Religion</label>
        <input type="text" name="religion" value="<?= $resident_data->religion?>" class="form-control"/>
        <span><?= form_error('religion') ?></span>
</div>

<div class="form-group">
    <button class="btn btn-primary"> Update Resident </button>
</div>
</form>
</div>
</div>