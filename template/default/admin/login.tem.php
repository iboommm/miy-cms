<?php 
	require_once "/class/config/class.template.php";
	require_once "/class/config/class.setting.php";
	require_once '/class/config/class.lang.php';

	$getLang = getLang();
	require 'lang/lang.'.$getLang.'.php';

	ob_start();
?>
	<section class="container">
			<section class="login-form" >
				<div class="panel panel-default" id="panelLogin"> 
					<div class="panel-heading"><?php echo $lang['Admincp']; ?></div>
					<div class="panel-body">
						<div class="progress"  id="loading" style="display: none;">
						  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
						    <span class="sr-only"><?php echo $lang['Admincp-Processing']; ?>...</span>
						  </div>
						</div>
					    <form method="post" action="" role="login">
        					<input type="text" id="username" class="form-control input-lg" placeholder="<?php echo $lang['Username']; ?>" required>
        					<input type="password" id="password"  class="form-control input-lg" placeholder="<?php echo $lang['Password']; ?>" required>
							<button type="button" name="go" class="btn btn-lg btn-primary btn-block"><?php echo $lang['Submit']; ?></button>
						</form>
						<div class="alert alert-danger" id="panelLogin-Login-Fail" style="display: none;">
						  <strong> <?php echo $lang['Admin-error']; ?>!</strong> <br><?php echo $lang['Admin-error-login']; ?>.
						</div>
					</div>
				</div>				
			</section>
	</section>

	<script>
		$(document).ready(function() {
			$('input').keypress(function (e) {
			  if (e.which == 13) {
			   	$('button[name=go]').click();
			  }
			});
		});
		
		$('button[name=go]').click(function(event) {

			var encodedUsername = btoa($('input#username').val());
			var encodedPassword = btoa($('input#password').val());
			var generateData = "" + encodedUsername + "," + encodedPassword + "";
			$.post('login-check', {data: generateData}, function(data) {
				if(data == "1") {	
					$('#loading').css("display","block");
					$('form[role=login]').css("display","none");
					$('#panelLogin-Login-Fail').css("display","none");
					location.reload();
				}else {
					$('#panelLogin-Login-Fail').css("display","block");
					$('input#username').val("");
					$('input#password').val("");
				}
			});
		});
	</script>
<?php
	
	$render = ob_get_clean(); 
	$login = new Template();
	$login->setTitle($lang['Admin-Login']." - ".getSetting("title"));
	$login->setKeyword("testKeyword");
	$login->setDescription("testDescription");
	$login->setAuthor("testAuthor");
	$login->setRender($render);
	$login->setTheme(getTheme());
	$login->renderPage();

 ?>

