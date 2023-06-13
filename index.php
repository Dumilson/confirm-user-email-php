<?php
require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário Bootstrap</title>
  <?php includes('home,meta'); ?>
  <style>
    .logo {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
      margin-top: 30px;
    }

    .logo img {
      max-width: 200px;
      height: auto;
    }
  </style>
</head>

<body>
  <div class="container ">
    <div class="logo">
      <img src="<?php img('logo', 'png'); ?>" alt="Logo">
    </div>
    <h2 class="text-center">Formulário</h2>
    <div class="col-sm-6 offset-md-3">
      <form id="myForm" action="#" method="POST" class="needs-validation" novalidate>
        <div class="form-group">
          <label for="nome"><i class="fas fa-user"></i> Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
          <div class="invalid-feedback">
            Por favor, insira o nome.
          </div>
        </div>
        <div class="form-group">
          <label for="email"><i class="fas fa-envelope"></i> Email:</label>
          <input type="email" class="form-control" id="email" name="email" required>
          <div class="invalid-feedback">
            Por favor, insira um email válido.
          </div>
        </div>
        <div class="form-group">
          <label for="idade"><i class="fas fa-calendar-alt"></i> Idade:</label>
          <input type="number" class="form-control" id="idade" name="idade" required>
          <div class="invalid-feedback">
            Por favor, insira a idade.
          </div>
        </div>
        <div class="form-group">
          <label for="endereco"><i class="fas fa-map-marker-alt"></i> Endereço:</label>
          <input type="text" class="form-control" id="endereco" name="endereco" required>
          <div class="invalid-feedback">
            Por favor, insira o endereço.
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Enviar</button>
      </form>
    </div>
  </div>

  <?php includes('home,footer'); ?>
  <script>
    $(document).ready(function() {
      $('#myForm').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        form.addClass('was-validated');

        if (form[0].checkValidity() === false) {
          event.stopPropagation();
        } else {
          form.removeClass('was-validated');

          $.ajax({
            type: 'POST',
            url: 'app/Request/CreateUser.php',
            dataType: 'json',
            data: $("#myForm").serialize(),
            success: function(response) {
              console.log(response);
              if (response.status == 200) {
                Swal.fire({
                  icon: 'success',
                  title: 'Registro Feito com sucesso!',
                  text: 'Enviamos um email para a confirmação do registro.',
                  confirmButtonText: 'Ok'
                });
              }
              form.removeClass('was-validated');
            },
            error: function(error) {
              console.log(error);
            }
          });
        }
      });
    });
  </script>
</body>

</html>