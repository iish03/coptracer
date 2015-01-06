<div class="form-box" id="login-box">
	<div class="header"><?=$this->lang->line('lbl_register_membership')?></div>

	<?php echo form_open('register') ?>
		<div class="body bg-gray">
			<div class="form-group">
				<input type="text" name="firstname" class="form-control" placeholder="First name" value="<?php echo set_value('firstname'); ?>" maxlength="50"/>
				<?=form_error('firstname', '<p class="error">', '</p>') ?>
			</div>
			<div class="form-group">
				<input type="text" name="lastname" class="form-control" placeholder="Last name" value="<?php echo set_value('lastname'); ?>" maxlength="50"/>
				<?=form_error('lastname', '<p class="error">', '</p>') ?>
			</div>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Student No" value="<?php echo set_value('username'); ?>" maxlength="50"/>
				<?=form_error('username', '<p class="error">', '</p>') ?>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" maxlength="50"/>
				<?=form_error('password', '<p class="error">', '</p>') ?>
			</div>
			<div class="form-group">
				<input type="password" name="passconf" class="form-control" placeholder="Retype password" value="<?php echo set_value('passconf'); ?>" maxlength="50"/>
				<?=form_error('passconf', '<p class="error">', '</p>') ?>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn bg-olive btn-block"><?=$this->lang->line('lbl_sign_me_up')?></button>
			<a href="login" class="text-center"><?=$this->lang->line('lbl_have_membership')?></a>
		</div>
	<?php echo form_close(); ?>
</div>