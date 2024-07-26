<main id="main" class="main">
  <section class="section profile">
    <div class="row">
      <div class="col-xl-12">

        <div class="card">
          <div class="card-body pt-3">
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title"><?= $title ?></h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">File</div>
                  <div class="col-lg-9 col-md-8"><a type="button" class="btn btn-dark" href="<?= base_url('./uploads/'.$article['filename']); ?>" target="_blank"><i class="bi bi-file-earmark-pdf"></i></a>&nbsp;&nbsp;&nbsp;<?= $article['filename'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Title</div>
                  <div class="col-lg-9 col-md-8"><?= $article['title'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Abstract</div>
                  <div class="col-lg-9 col-md-8"><?= $article['abstract'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Authors</div>
                  <div class="col-lg-9 col-md-8"><?= $article['author_names'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">DOI</div>
                  <div class="col-lg-9 col-md-8"><?= $article['doi'] ?></div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>