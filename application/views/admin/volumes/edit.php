<main id="main" class="main">

  <div class="pagetitle">
    <h1><?php echo $title ?></h1>
  </div>

  <section class="section profile">

    <div class="card">
      <div class="card-body pt-3">
        <?php echo form_open('admin/update-volume', ['enctype' => 'multipart/form-data']);?>
        <input type="hidden" name="volumeid" value="<?= $volume['volumeid'] ?>">
        <div class="row mb-3">
            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Cover Image</label>
            <div class="col-md-8 col-lg-9">
                <img id="profileImg" src="<?= base_url('assets/images/volumes/'.$volume['coverImg']) ?>" alt="Profile" style="width: 100px; height: 150px;">
                <div class="pt-2">
                    <input type="file" class="btn btn-primary btn-sm" name="coverImg" title="Upload new profile image" style="cursor:pointer;" accept="image/*" onchange="previewImage(event)"/>
                </div>
            </div>
        </div>

        <div class="row mb-3">
          <label for="title" class="col-md-4 col-lg-3 col-form-label">Volume Name</label>
          <div class="col-md-8 col-lg-9">
            <input name="vol_name" type="text" class="form-control" id="card-title" value="<?= $volume['vol_name'] ?>">
          </div>
        </div>

        <div class="row mb-3">
          <label for="Abstract" class="col-md-4 col-lg-3 col-form-label">Description</label>
          <div class="col-md-8 col-lg-9">
            <textarea id="editor1" name="description"></textarea>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <a href="<?= base_url('admin/volumes') ?>" type="button" class="btn btn-secondary">Back</a>
        </div>
      </form><!-- End Profile Edit Form -->
    </div>
  </div>

</section>

</main>

<script>
  CKEDITOR.replace('editor1');
    CKEDITOR.instances.editor1.setData('<?= $volume["description"]?>');
</script>

<script >
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('profileImg');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>