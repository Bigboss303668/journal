<main id="main" class="main">

  <div class="row">
    <div class="col pagetitle">
      <h1><?php echo $title ?></h1>
      <p></p>
    </div>
    <div class="col">
      <div class="d-flex justify-content-end">
        <a href="<?= base_url('admin/add-author') ?>"><button type="button" class="btn btn-primary float-right">Add Author</button></a>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="row">
      <div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Authors</h5>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact Number</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($authors as $author) : ?>
                  <tr>
                    <td><?php echo $author['auid']; ?></td>
                    <td><?php echo $author['complete_name']; ?></td>
                    <td><?php echo $author['email']; ?></td>
                    <td><?php echo $author['contact_num']; ?></td>
                    <td><?php echo $author['created_at']; ?></td>
                    <td>
                      <div class="icon">
                        <a href="<?= base_url('admin/author-detail/'.$author['auid']) ?>"><i class="bi bi-eye-fill"></i></a>
                        <a href="<?= base_url('admin/edit-author/' . $author['auid']) ?>"><i class="bi bi-pencil-fill"></i></a>
                        <span></span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#smallModal<?php echo $author['auid']; ?>"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                      </div>
                    </td>
                  </tr>
                  <div class="modal fade" id="smallModal<?php echo $author['auid']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete Author</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Do you want to delete this author?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <?php echo form_open('/admin/delete-author/' . $author['userid']); ?>
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