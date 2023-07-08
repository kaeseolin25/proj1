<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Blotter List</h1>
   <p class="mb-4">
      <a class="btn btn-primary"  href="<?= base_url('index.php/dashboard/add-blotter/' ) ?>" >Add Blotter</a>
      <a href="<?= base_url('index.php/dashboard/delete-blotter/' ) ?>" class="btn btn-danger">Delete</a>
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
                     <th scope="col">Date Recorded</th>
                     <th scope="col"> Complainant</th>
                     <th scope="col">Person to Complain</th>
                     <th scope="col">Complaint</th>
                     <th scope="col">Action Taken</th>
                     <th scope="col">Status</th>
                     <th scope="col">Location of Incidence</th>
                     <th scope="col">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($blotter_list as $blotter) : ?>
                     <tr>
                        <th scope="row"><?= $blotter->blotter_id ?></th>
                        <td><?= $blotter->date ?></td>
                        <td><?= $blotter->complainant ?></td>
                        <td><?= $blotter->complainee ?></td>
                        <td><?= $blotter->complaint ?></td>
                        <td><?= $blotter->action ?> </td>
                       
                        <td><?= $blotter->status ?></td>
                        <td><?= $blotter->location ?></td>

                        <td>
                        <a href="<?= base_url('index.php/dashboard/edit-blotter/' . $blotter->blotter_id) ?>" class="btn btn-primary">Update</a>
                           <a href="<?= base_url('index.php/dashboard/delete-blotter/' . $blotter->blotter_id) ?>" class="btn btn-danger">Delete</a>
                        
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
