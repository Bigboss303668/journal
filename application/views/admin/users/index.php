<main id="main" class="main">

  <div class="row">
    <div class="col pagetitle">
      <h1><?php echo $title ?></h1>
      <p></p>
    </div>
    <div class="col">
      <div class="d-flex justify-content-end">
        <a href="<?= base_url('admin/add-user') ?>"><button type="button" class="btn btn-primary float-right">Add User</button></a>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="row">
      <div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">User Management</h5>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user) : ?>
                  <tr>
                    <td><?php echo $user['userid']; ?></td>
                    <td><?php echo $user['complete_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role_name']; ?></td>
                    <td><?php echo $user['date_created']; ?></td>
                    <td>
                      <?php if ($user['status'] == 0) : ?>
                        <span class="badge rounded-pill bg-danger">In-active</span>
                      <?php else : ?>
                        <span class="badge rounded-pill bg-success">Active</span>
                      <?php endif; ?>

                    </td>
                    <td>
                      <div class="icon">
                        <a href="<?= base_url('admin/user-detail/'.$user['userid']) ?>"><i class="bi bi-eye-fill"></i></a>
                        <a href="<?= base_url('admin/edit-user/'.$user['userid']) ?>"><i class="bi bi-pencil-fill"></i></a>
                        <span></span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#smallModal<?php echo $user['userid']; ?>"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                      </div>
                    </td>
                  </tr>
                  <div class="modal fade" id="smallModal<?php echo $user['userid']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Do you want to delete this user?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <?php echo form_open('admin/delete-user/'.$user['userid']); ?>
                          <button type="submit" class="btn btn-danger">Delete</button>
                          <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>

</main>