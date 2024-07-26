<main id="main" class="main">

  <div class="pagetitle">
    <h1><?php echo $title ?></h1>
  </div>

  <section class="section profile">

    <div class="card">
      <div class="card-body pt-3">
        <?php echo form_open('admin/insert-article', ['enctype' => 'multipart/form-data']);?>
        <div class="row mb-3">
          <label for="inputNumber" class="col-md-4 col-lg-3 col-form-label">File</label>
          <div class="col-md-8 col-lg-9">
            <input class="form-control" name="file" type="file" id="formFile" accept=".doc,.docx,application/pdf">
          </div>
        </div>
        <div class="row mb-3">
          <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
          <div class="col-md-8 col-lg-9">
            <input name="title" type="text" class="form-control" id="card-title">
          </div>
        </div>

        <div class="row mb-3">
          <label for="Keyword" class="col-md-4 col-lg-3 col-form-label">Keywords</label>
          <div class="col-md-8 col-lg-9">
            <input name="keywords" type="text" class="form-control" id="Keyword">
          </div>
        </div>

        <div class="row mb-3">
          <label for="Abstract" class="col-md-4 col-lg-3 col-form-label">Abstract</label>
          <div class="col-md-8 col-lg-9">
            <textarea id="editor1" name="abstract"></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <label for="Doi" class="col-md-4 col-lg-3 col-form-label">Authors</label>
          <div class="col-md-8 col-lg-9">
            <select data-placeholder="Select Authors" multiple class="chosen-select" name="authors[]">
              <option value=""></option>
              <?php foreach ($authors as $author) :?>
                <option value="<?= $author['auid']?>">
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
              <?php foreach ($volumes as $volume) :?>
                <option value="<?= $volume['volumeid']?>">
                  <?= $volume['vol_name']?>
                </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
          <a href="<?= base_url('admin/articles') ?>" type="button" class="btn btn-secondary">Back</a>
        </div>
      </form><!-- End Profile Edit Form -->
    </div>
  </div>

</section>

</main>

<script>
  CKEDITOR.replace('editor1');
</script>