
<div id="content">
    <div class="container">
        <h2>BLOTTER INFORMATION</h2>
        <br>
        <form method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                    <label>Full Name</label>
                    
    <select name="resident_id" placeholder="--SELECT COMPLAINEE--" class="form-control">
        <?php foreach ($residents as $resident): ?>
            <option value="<?= $resident->resident_id ?>">
                <?= $resident->first_name ?> <?= $resident->last_name ?> <?= $resident->last_name ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
                   
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control"/>
                        <span><?= form_error('age') ?></span>
                    </div>
                    <div class="col-sm-6">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control"/>
                        <span><?= form_error('address') ?></span>
                    </div>
                </div>
                  <div class="col-sm-6">
                        <label for="con_complainant">Contact #</label>
                        <input type="text" name="con_complainant" class="form-control"/>
                        <span><?= form_error('con_complainant') ?></span>
                    </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="complainee">Complainee</label>
                        <select name="resident_id" placeholder="--SELECT COMPLAINEE--" class="form-control">
        <?php foreach ($residents as $resident): ?>
            <option value="<?= $resident->resident_id ?>">
                <?= $resident->first_name ?> <?= $resident->last_name ?> <?= $resident->last_name ?>
            </option>
        <?php endforeach; ?>
    </select>
                   
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="age_c">Age</label>
                        <input type="text" name="age_c" class="form-control"/>
                        <span><?= form_error('age_c') ?></span>
                    </div>
                    <div class="col-sm-6">
                        <label for="address_c">Address</label>
                        <input type="text" name="address_c" class="form-control"/>
                        <span><?= form_error('address_c') ?></span>
                    </div>
                </div>
                  <div class="col-sm-6">
                        <label for="con_complainee">Contact #</label>
                        <input type="text" name="con_complainee" class="form-control"/>
                        <span><?= form_error('con_complainee') ?></span>
                    </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="complaint">Complaint</label>
                        <input type="text" name="complaint" placeholder="--SELECT COMPLAINEE--" class="form-control"/>
                        <span><?= form_error('complaint') ?></span>
                    </div>
                   
                </div>
            </div>
            <br>
           <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="action">Action</label>
                        <input type="text" name="action" class="form-control"/>
                        <span><?= form_error('action') ?></span>
                    </div>
                    <div class="col-sm-6">
                        <label for="status">Status</Address></label>
                        <input type="text" name="status" class="form-control"/>
                        <span><?= form_error('status') ?></span>
                    </div>
                </div>
                  <div class="col-sm-6">
                        <label for="location">Location of Incidence</Address></label>
                        <input type="text" name="location" class="form-control"/>
                        <span><?= form_error('location') ?></span>
                    </div>
                    
            </div>

            <br>
            <div class="form-group">
              <center>
                <button class="btn btn-primary">Add Resident</button></center>
            </div>
        </form>

        <?php
        if($this->session->flashdata('success')) { ?>
            <div class= "alert- alert-success" role="alert">
              Successfully Added!
            <div>
            <?php }
            ?>
            <?php
        if($this->session->flashdata('success')) { ?>
           <div class= "alert- alert-success" role="alert">
             Successfully Added!
           <div>
           <?php }
            ?>
        
        </php>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
