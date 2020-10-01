<body>
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			<div class="users-form">
				<a class="login100-form-title p-b-49">Reset Password</a>
    			<?= $this->Form->create(); ?>
					<div class="wrap-input100 m-b-23">
						<?= $this->Form->input('email', ['autofocus' => true, 'label' => 'Email address', 'required' => true]);?>
					</div>
					<?= $this->Form->button('Request reset email', ['class' => 'login100-form-btn']); ?>
				<?= $this->Form->end();?>

				</div>
			</div>
		</div>
	</div>
</body>