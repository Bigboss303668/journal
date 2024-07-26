<main id="main" class="main">

  <div class="row">
    <div class="col pagetitle">
      <h1><?php echo $title ?></h1>
      <p></p>
    </div>
    <div class="col">
      <div class="d-flex justify-content-end">
        <a href="<?= base_url('admin/add-article') ?>"><button type="button" class="btn btn-primary float-right">Add Article</button></a>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="row">
      <div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Articles</h5>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Abstract</th>
                  <th scope="col">Key Words</th>
                  <th scope="col">DOI</th>
                  <!-- <th scope="col">File Name</th> -->
                  <th scope="col">Date Published</th>
                  <th scope="col">Actions</th>
                  <th scope="col">Publish</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($articles as $article) : ?>
                  <tr>
                    <td><?php echo $article['title']; ?></td>
                    <td><?php echo $article['abstract']; ?></td>
                    <td><?php echo $article['keywords']; ?></td>
                    <td><?php echo $article['doi']; ?></td>
                    <!-- <td><?php echo $article['filename']; ?></td> -->
                    <td><?php echo $article['date_published']; ?></td>
                    <td>
                      <div class="icon">
                        <a href="<?= base_url('admin/article-detail/'.$article['articleid']) ?>"><i class="bi bi-eye-fill"></i></a>
                        <span></span>
                        <a href="<?= base_url('admin/edit-article/' . $article['articleid']) ?>"><i class="bi bi-pencil-fill"></i></a>
                        <span></span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#smallModal<?php echo $article['articleid']; ?>"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                        <span></span>
                      </div>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/publish-article/'.$article['articleid']) ?>" type="button" class="btn btn-primary btn-sm">
                        <?php if ($article['published'] == 1) : ?>
                          Unpublish
                        <?php else : ?>
                          Publish
                        <?php endif; ?>
                      </a>
                    </td>
                  </tr>
                  <div class="modal fade" id="smallModal<?php echo $article['articleid']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete Article</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Do you want to delete this article?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <?php echo form_open('/admin/delete-article/' . $article['articleid']); ?>
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