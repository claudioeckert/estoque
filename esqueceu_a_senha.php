<?php
  include_once "manipulacaoBanco.php";
  include_once "enviarEmail.php";
  
  if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
    $sql = "select * from  usuario where email = '$email'";
    $resultado = consulta($sql);

    if($resultado->num_rows > 0){
      $linha_dados = $resultado->fetch_array();
      $emailBuscado = $linha_dados['email'];
      $senhaBuscada = $linha_dados['senha'];

      $res = email($emailBuscado, $senhaBuscada);//chama a classe email
      
      if($res == "ok"){
        echo "<script> alert('Senha encaminhada para o e-mail informado!'); </script>";
        //header('Location: login.php');
      }
      if($res == "erro"){
        echo "<script> alert('Erro!'); </script>"; 
      }
    }else{
       echo "<script> alert('Não foi localizado o e-mail informado!'); </script>"; 
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

  <title>SisCoEst - Esqueceu a senha</title>

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
                    <h1 class="h4 text-gray-900 mb-2">Esqueceu a Senha?</h1>
                    <p class="mb-4">Esqueceu sua senha? Nós entendemos, coisas acontecem. Basta digitar seu e-mail abaixo e nós lhe enviaremos a senha!</p>
                  </div>
                  <form method="POST" action="esqueceu_a_senha.php" class="user">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Digite o e-mail cadastrado..." autofocus>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Encaminhar Senha!">
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="registro.php">Crie sua conta!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="login.php">Já tem cadastro? Entrar!</a>
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
