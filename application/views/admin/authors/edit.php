<main id="main" class="main">

    <div class="pagetitle">
        <h1><?php echo $title ?></h1>
    </div>

    <section class="section profile">

        <div class="card">
            <div class="card-body pt-3">
                <?php echo form_open('admin/update-author', ['enctype' => 'multipart/form-data']);?>
                <input type="hidden" name="userid" value="<?= $author['userid'] ?>">
                <input type="hidden" name="authorid" value="<?= $author['auid'] ?>">
                <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                        <img id="profileImg" src="<?= base_url('assets/images/users/'.$author['profile_pic']) ?>" alt="Profile" width="100">
                        <div class="pt-2">
                            <input type="file" class="btn btn-primary btn-sm" name="profileImg" title="Upload new profile image" style="cursor:pointer;" accept="image/*" onchange="previewImage(event)"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="author_name" type="text" class="form-control" id="fullName" value="<?= $author['complete_name'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?= $author['email'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="number" name="contact" class="form-control" value="<?= $author['contact_num'] ?>">
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="<?= base_url('admin/authors') ?>" type="button" class="btn btn-secondary">Back</a>
                </div>
                </form><!-- End Profile Edit Form -->
            </div>
        </div>

    </section>

</main>

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