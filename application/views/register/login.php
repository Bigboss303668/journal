<style type="text/css">
	@media screen and (min-width: 641px){
		body {
		  overflow: hidden;
	  }
  }
</style>

<div class="uk-flex uk-flex-center uk-flex-middle uk-height-viewport" style="margin-top: -50px; margin-left: 20px; margin-right: 20px;">
	<div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-width-1-2@s uk-width-auto@m" style="background: #FFFFFF; border: 1px solid #DAE0E6; box-shadow: 0px 1px 2px rgba(16, 24, 40, 0.04); border-radius: 10px; padding: 30px;">
		<?php echo form_open('login/auth', array('class' => 'uk-form-stacked')); ?>
			<span class="uk-text-center span">Login</span>
			<div>
				<div class="uk-margin">
  					<label class="uk-form-label label">Email</label>
  					<div class="uk-form-controls">
    					<input class="uk-input input-box"type="text" name="email" placeholder="Enter your email">
  					</div>
				</div>

				<div class="uk-margin">
				  <label class="uk-form-label label" for="password">Password</label>
				  <div class="uk-form-controls uk-position-relative uk-flex uk-float-right">
				  	<a class="uk-form-icon uk-form-icon-eye uk-form-icon-flip uk-margin-small-right" href="#" uk-icon="icon: eye" onclick="togglePasswordVisibility('password')"></a>
				    <input class="uk-input input-box" id="password" type="password" name="password" placeholder="Enter your password">
				  </div>
				</div>

			</div>
			<br>
			<p id="error" style="display:none; color: red; text-align: center; font-family: Poppins;">Invalid email or password</p>
			<div class="uk-width-1-1 uk-text-center">
					<button id="btn" class="uk-button uk-button-primary uk-button-large uk-border-rounded" type="submit" style="font-family: Poppins; text-transform: none; height: 46px; line-height:100%; width
					: 100%; margin-top:32px">Login</button>
				</div>
		</form>		
	</div>
</div>