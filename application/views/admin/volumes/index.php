<main id="main" class="main">

  <div class="row">
    <div class="col pagetitle">
      <h1><?php echo $title ?></h1>
      <p></p>
    </div>
    <div class="col">
      <div class="d-flex justify-content-end">
        <a href="<?= base_url('admin/add-volume') ?>" type="button" class="btn btn-primary float-right">Add Volume</a>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="row">
      <div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Volumes</h5>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Actions</th>
                  <th scope="col">Publish</th>
                  <th scope="col">Archive</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($volumes as $volume) : ?>
                  <tr>
                    <td><?php echo $volume['volumeid']; ?></td>
                    <td><?php echo $volume['vol_name']; ?></td>
                    <td><?php echo $volume['description']; ?></td>
                    <td><?php echo $volume['date_at']; ?></td>
                    <td>
                      <div class="icon">
                        <a href="<?=base_url('admin/edit-volume/'.$volume['volumeid']) ?>"><i class="bi bi-pencil-fill"></i></a>
                        <span></span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#smallModal<?php echo $volume['volumeid']; ?>"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                        <span></span>
                      </div>
                    </td>
                    <?php if ($volume['archived'] == 0) : ?>
                      <td>
                        <a href="<?= base_url('admin/publish-volume/'.$volume['volumeid']) ?>" type="button" class="btn btn-primary btn-sm">
                          <?php if ($volume['published'] == 1) : ?>
                            Unpublish
                          <?php else : ?>
                            Publish
                          <?php endif; ?>
                        </a>
                      </td>
                    <?php else : ?>
                      <td></td>
                    <?php endif; ?>

                    <?php if ($volume['published'] == 0) : ?>
                      <td>
                        <a href="<?= base_url('admin/archive-volume/'.$volume['volumeid']) ?>" type="button" class="btn btn-primary btn-sm">
                          <?php if ($volume['archived'] == 1) : ?>
                            Unarchive
                          <?php else : ?>
                            Archive
                          <?php endif; ?>
                        </a>
                      </td>
                    <?php endif; ?>
                  </tr>
                  <div class="modal fade" id="smallModal<?php echo $volume['volumeid']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete Volume</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Do you want to delete this volume?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <?php echo form_open('admin/delete-volume/' . $volume['volumeid']); ?>
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