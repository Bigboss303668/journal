<main id="main" class="main">

  <div class="pagetitle">
    <h1><?php echo $title ?></h1>
  </div>

  <section class="section profile">

    <div class="card">
      <div class="card-body pt-3">
        <?php echo form_open('admin/update-article', ['enctype' => 'multipart/form-data']);?>
        
        <input type="hidden" name="articleid" value="<?= $article['articleid'] ?>">
        <div class="row mb-3">
          <label for="inputNumber" class="col-md-4 col-lg-3 col-form-label">File</label>
          <div class="col-md-8 col-lg-9">
            <label class="mb-3" id="fileLabel"><?=$article['filename']?></label>
            <input class="form-control" name="file" type="file" id="formFile" accept="application/pdf">
          </div>
        </div>
        <div class="row mb-3">
          <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
          <div class="col-md-8 col-lg-9">
            <input name="title" type="text" class="form-control" id="card-title" value="<?= $article['title'] ?>">
          </div>
        </div>

        <div class="row mb-3">
          <label for="Keyword" class="col-md-4 col-lg-3 col-form-label">Keywords</label>
          <div class="col-md-8 col-lg-9">
            <input name="keywords" type="text" class="form-control" id="Keyword" value="<?= $article['keywords'] ?>">
          </div>
        </div>

        <div class="row mb-3">
          <label for="Abstract" class="col-md-4 col-lg-3 col-form-label">Abstract</label>
          <div class="col-md-8 col-lg-9">
            <textarea id="editor1" name="abstract"><?= $article['abstract'] ?></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <label for="Doi" class="col-md-4 col-lg-3 col-form-label">Authors</label>
          <div class="col-md-8 col-lg-9">
            <select data-placeholder="Select Authors" multiple class="chosen-select" name="authors[]">
              <option value=""></option>
              <?php foreach ($a as $author) :?>
                <option value="<?= $author['auid']?>" <?= in_array($author['auid'], $b) ? 'selected' : '' ?>>
                  <?= $author['complete_name']?>
                </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="Volume" class="col-md-4 col-lg-3 col-form-label">Volume</label>
          <div class="col-md-8 col-lg-9">
            <select class="form-select" aria-label="Volume" name="volume">
              <option value="<?= $article['volumeid'] ?>"><?= $article['vol_name'] ?></option>
              <?php foreach ($volumes as $volume) :?>
                <?php if ($volume['volumeid']!= $article['volumeid']):?>
                  <option value="<?= $volume['volumeid']?>">
                    <?= $volume['vol_name']?>
                  </option>
                  <?php endif;?>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <a href="<?= base_url('admin/articles') ?>" type="button" class="btn btn-secondary">Back</a>
        </div>
      </form><!-- End Profile Edit Form -->
    </div>
  </div>

</section>

</main>

<script>
  CKEDITOR.replace('editor1');
  CKEDITOR.instances.editor1.setData('<?= $article["abstract"]?>');
</script>

<script>
  document.getElementById('formFile').addEventListener('change', function(e) {
    var fileName = e.target.files[0].name;
    document.getElementById('fileLabel').textContent = fileName;
  });
</script>
