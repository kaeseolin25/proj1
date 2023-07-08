
<div id="content">
    <div class="container">
        <h2>RESIDENT INFORMATION</h2>
        <br>
        <form method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="firstname">Resident's Name</label>
                        <input type="text" name="first_name" placeholder="First Name" class="form-control"/>
                        <span><?= form_error('firstname') ?></span>
                    </div>
                    <div class="col-sm-4">
                        <label for="middlename"></label>
                        <input type="text" name="middle_name" placeholder="Middle Name" class="form-control"/>
                        <span><?= form_error('middlename') ?></span>
                    </div>
                    <div class="col-sm-4">
                        <label for="lastname"></label>
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control"/>
                        <span><?= form_error('lastname') ?></span>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="birth_date">Birth Date</label>
                        <input type="date" name="birth_date" class="form-control"/>
                        <span><?= form_error('birth_date') ?></span>
                    </div>
                    <div class="col-sm-6">
                        <label for="sex">Sex</label>
                        <select name="sex" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span><?= form_error('sex') ?></span>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="address">Address</label>
                        <input type="text" name="street" placeholder="Street" class="form-control"/>
                        <span><?= form_error('street') ?></span>
                    </div>
                    <div class="col-sm-4">
                        <label for="purok"></label>
                        <input type="text" name="purok" placeholder="Purok" class="form-control"/>
                        <span><?= form_error('purok') ?></span>
                    </div>
                    <div class="col-sm-4">
                        <label for="barangay"></label>
                        <input type="text" name="barangay" placeholder="Barangay" class="form-control"/>
                        <span><?= form_error('barangay') ?></span>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="contact">Contact</label>
                        <input type="tel" name="contact" class="form-control"/>
                        <span><?= form_error('contact') ?></span>
                    </div>
                    <div class="col-sm-6">
                    <label for="religion">Religion</label>
                        <input type="text" name="religion" class="form-control"/>
                        <span><?= form_error('religion') ?></span>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="civilstatus">Civil Status</label>
                        <select name="civil_status" class="form-control">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="separated">Separated</option>
                            <option value="widowed">Widowed</option>
                        </select>
                        <span><?= form_error('civilstatus') ?></span>
                    </div>
                    <div class="col-sm-6">
                        <label for="nationality">Nationality</label>
                        <input type="text" name="nationality" class="form-control"/>
                        <span><?= form_error('nationality') ?></span>
                    </div>
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
