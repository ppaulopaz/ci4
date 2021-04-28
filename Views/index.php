<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Tela de login</title>
	<style>
	body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #ADD8E6;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			background: #60a3bc;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			border: 2px solid white;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #4F4F4F !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #4F4F4F !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
	</style>
</head>
<body>
	<?php if (session()->get('usuario')){
		$dados=session()->get('usuario');
		if (isset($dados['id_estagiario'])) {
			include_once('pagina_estagiario.php');
		} elseif ($dados['ID_EMPREGADOR']) {
			include_once('pagina_empregador.php');
		}
		?>

    <?php } else { ?>
          
		<div class="container h-100">
			<div class="d-flex justify-content-center h-100">
				<div class="user_card">
					<div class="d-flex justify-content-center">
						<div class="brand_logo_container">
							<img src="https://image.flaticon.com/icons/png/512/64/64572.png" class="brand_logo" alt="Logo" >
						</div>
					</div>
					<div class="d-flex justify-content-center form_container">
						<form  method="post">
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"></span>
								</div>
								<input type="text" name="email"class="form-control input_user" value="" placeholder="E-mail" required>
							</div>
							<div class="input-group mb-2">
								<div class="input-group-append">
									<span class="input-group-text"></span>
								</div>
								<input type="password" name="senha" class="form-control input_pass" value="" placeholder="Senha" required>
							</div>
								<div class="d-flex justify-content-center mt-3 login_container">
									<input type="submit" value="Entrar" class="btn login_btn">
								</div>
						</form>
					</div>
			
					<div class="mt-4">
						<div class="d-flex justify-content-center links">
							Não possui conta? <a href="<?php echo base_url('cadastrar')?>" class="ml-2">Criar conta</a>
						</div>
						
					</div>
				</div>

				<?php if (session()->get('incorreto')) {?>
					<div class="alert alert-danger col-sm-3" role="alert" style="position:absolute; top:83%;">
						<a class="close" data-dismiss="alert">×</a>
						<p><?= session()->get('incorreto')?></p>
					</div>
        		<?php } ?>

			</div>
		</div>

    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

