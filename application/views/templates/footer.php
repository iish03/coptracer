	<?php foreach ($script as $script_link): ?>
		<?= script_tag($script_link); ?>
	<?php endforeach ?>
	<script type="text/javascript">
		$(function() {
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			CKEDITOR.replace('editor1');
			//bootstrap WYSIHTML5 - text editor
			$(".textarea").wysihtml5();
			
		});
	</script>

	</body>
</html>