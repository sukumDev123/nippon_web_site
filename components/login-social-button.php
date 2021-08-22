<div class="button-social-login">
		<div class="border-or">
			<h5 class="text">หรือ</h5>
			<div class="line"></div>
		</div>
		<a href="<?php echo get_site_url() ?>/wp-login.php?loginSocial=google" rel="nofollow" aria-label="Continue with <b>Google</b>" data-plugin="nsl" data-action="connect" data-provider="google" data-popupwidth="600" data-popupheight="600">
			<button class="google">
			<?php  get_template_part("components/icon" , null , ["icon" => "google-icon"]) ?>
			ลงทะเบียนผ่านบัญชี Google
			</button>
		</a>
		<a href="<?php echo get_site_url() ?>/wp-login.php?loginSocial=facebook" rel="nofollow" aria-label="Continue with <b>Facebook</b>" data-plugin="nsl" data-action="connect" data-provider="facebook" data-popupwidth="475" data-popupheight="175" >
			<button class="facebook   ">
				<i class="bi bi-facebook"></i>
				ลงทะเบียนผ่านบัญชี facebook
			</button>
		</a>
	</div>
