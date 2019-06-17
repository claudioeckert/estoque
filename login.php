<?php
  include_once "manipulacaoBanco.php";
  
	if(isset($_COOKIE['cookieSiscoest'])){
		session_start();
    $_SESSION['variavelSessaoEmail'] = $_COOKIE['cookieSiscoest'];
    $_SESSION['logado'] = 'logado';
    $sql = "select * from  usuario where email = '".$_SESSION['variavelSessaoEmail']."'";
    $resultado = consulta($sql);
    $linha_dados = $resultado->fetch_array();
    $_SESSION['variavelSessaoNome'] = $linha_dados['nome'];
    $_SESSION['variavelSessaoSobrenome'] = $linha_dados['sobrenome'];
    $_SESSION['variavelSessaoId'] = $linha_dados['idUsuario'];

		header('Location: index.php');
	}else{	
		if(isset($_POST['email']) && isset($_POST['senha'])){
			$email = $_POST['email'];
      $senha = $_POST['senha'];
      $sql = "select * from  usuario where email = '$email' and senha = '$senha'";
      $resultado = consulta($sql);

			if($resultado->num_rows > 0){
        $linha_dados = $resultado->fetch_array();
        
        session_start();
        $_SESSION['variavelSessaoNome'] = $linha_dados['nome'];
        $_SESSION['variavelSessaoSobrenome'] = $linha_dados['sobrenome'];
        $_SESSION['variavelSessaoId'] = $linha_dados['idUsuario'];				
        $_SESSION['variavelSessaoEmail'] = $email;
        $_SESSION['logado'] = 'logado';      
        

        //Cria o cookie somente se a caixa Lembrar-me estiver marcada
        if (isset($_POST['checkboxLembrar'])){
          setcookie('cookieSiscoest', $email, time() + (24*3600));
        }
        
				header('Location: index.php');
			} 
			else{			
				echo "<script> alert('Email ou senha incorretos!'); </script>";
				//echo "<script> location.href='login.php'; </script>";			
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SisCoEst - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="sidebar-brand-text mx-3">SisCoEst</h1>
                    <h1 class="h4 text-gray-900 mb-4">Seja bem vindo!</h1>
                  </div>
                  <form class="user" method="POST" action="login.php">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Digite seu e-mail...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="senha" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name='checkboxLembrar'>
                        <label class="custom-control-label" for="customCheck">Lembrar-me</label>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Entrar">
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="esqueceu_a_senha.php">Esqueceu a senha?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="registro.php">Crie sua conta!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
