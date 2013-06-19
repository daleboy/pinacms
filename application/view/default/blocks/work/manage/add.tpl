<h1><span class="section-icon icon-book"></span>{lng lng="add_work"}</h1>
<form action="api.php" method="post" id="add_work">
	<input type="hidden" name="action" value="work.manage.add" />
	<div class="right-narrow-column">

		<fieldset class="operations">
			<h2>{lng lng="actions"}</h2>
			<div class="button-bar">
				<button class="css3 button-add">{lng lng="save"}</button>
				<button class="css3 additional button-cancel">{lng lng="cancel"}</button>
			</div>
		</fieldset>
		{module action="image.manage.fieldset"}

	</div>
	{block view="work.manage.form"}

</form>
		
	
{literal}
<script type="text/javascript">

	$(document).ready(function(){
		$('#add_work').managePage({
			object: "work"
		});
	});

</script>
{/literal}	