<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/uikit.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/signUpform.css') ?>">

<div class="uk-flex uk-flex-column uk-flex-center uk-flex-middle" style="height: 80%; margin-right: 20px; margin-left: 20px;">
  <div class="uk-margin-large-top" style="background: #FFFFFF; border: 1px solid #DAE0E6; box-shadow: 0px 1px 2px rgba(16, 24, 40, 0.04); border-radius: 10px; padding: 30px;">
    <span class="uk-text-center span" style="width: 100px">Sign-up</span>

    <form id="create-user">
      <div>
        <div class="uk-margin-small-top">
          <label class="uk-form-label label">Name</label>
          <div class="uk-form-controls">
            <input id="first_name1" class="uk-input input-box" type="text" name="first_name1" placeholder="Enter your First Name">
            <p class="uk-margin-remove-vertical error-msg hidden">Field is empty!</p>
          </div>
        </div>

        <div class="uk-margin-small-top">
          <label class="uk-form-label label">Email</label>
          <div class="uk-form-controls">
            <input id="email1" class="uk-input input-box" type="text" name="email1" placeholder="Enter your Email">
            <p class="uk-margin-remove-vertical error-msg hidden">Field is empty!</p>
          </div>
        </div>
        
        <div class="uk-flex uk-margin-small-top">
          <div class="uk-margin-small-right">
            <label class="uk-form-label label" for="password">Password</label>
            <div class="uk-form-controls">
              <input class="uk-input input-box" id="password1" type="password" placeholder="Enter your password">
              <p class="uk-margin-remove-vertical error-msg hidden">Field is empty!</p>
            </div>
          </div>

          <div class="">
            <label class="uk-form-label label" for="password">Confirm Password</label>
            <div>
              <div class="uk-form-controls">
                <input class="uk-input input-box" id="password_confirm1" name="password_confirm1" type="password" placeholder="Enter your password">
                <p class="uk-margin-remove-vertical error-msg hidden">Field is empty!</p>
              </div>
            </div>
          </div>
        </div>

        <div class="uk-float-right uk-margin-small-top">
          <button class="uk-button uk-button-default" type="reset">Clear</button>
          <button class="uk-button uk-button-primary" type="submit">Sign up</button>
        </div>
      </div>
    </form>
  </div>

  <script src="./assets/js/Validation.js"></script>