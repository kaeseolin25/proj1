<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Resident List</h1>
   <p class="mb-4">
      <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-resident') ?>">Add Resident</a>
   </p>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">List</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Fullname</th>
                     <th scope="col">Birth Date</th>
                     <th scope="col">Sex</th>
                     <th scope="col">Address</th>
                     <th scope="col">Contact Number</th>
                     <th scope="col">Religion</th>
                     <th scope="col">Civil Status</th>
                     <th scope="col">Nationality</th>
                     <th scope="col">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($resident_list as $resident) : ?>
                     <tr>
                        <th scope="row"><?= $resident->resident_id ?></th>
                        <td><?= $resident->last_name ?>, <?= $resident->first_name ?> <?= $resident->middle_name ?></td>
                        <td><?= $resident->birth_date ?></td>
                        <td><?= $resident->sex ?></td>
                        <td><?= $resident->street ?> <?= $resident->purok ?> <?= $resident->barangay ?></td>
                        <td><?= $resident->contact ?></td>
                        <td><?= $resident->religion ?></td>
                        <td><?= $resident->civil_status ?></td>
                        <td><?= $resident->nationality ?></td>

                        <td>
                           <a href="<?= base_url('index.php/dashboard/edit-resident/' . $resident->resident_id) ?>" class="btn btn-primary">Update</a>
                           <a href="<?= base_url('index.php/dashboard/delete-resident/' . $resident->resident_id) ?>" class="btn btn-danger">Delete</a>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

</div>
