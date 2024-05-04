<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Página de Exemplo</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #e9e9e9; 
  }
  .container {
    text-align: center;  }
  h1 {
    color: #333;
  }
  p {
    color: #666;
  }
  iframe {
    width: 100%;
    max-width: 600px;
    height: 400px;
    margin: 20px 0;
  }
  .box {
    background-color: #f9f9f9;
    padding: 20px;
    margin-top: 20px;
    border-radius: 10px;
    color: black;
    margin: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    background-color: #f0f0f0;
  }
  input[type="text"] {
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-right: 10px;
  }
  input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #a73838;
    color: white;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #8e2e2e;
  }
  input[type="reset"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: whitesmoke;
    color: #a73838;
    cursor: pointer;
  }
  input[type="reset"]:hover {
    background-color: #8e2e2e;
  }
</style>
</head>
<body>

<div class="container">
  <h1>Execução do 1/3 de Férias</h1>
  <p>Saiba se você tem o direito a execução do 1/3 de Férias referente aos processos 0000000- XX.20XX.8.11.0041 e 0000000-XX.20XX.8.11.0041</p>
<iframe src="https://www.youtube.com/embed/FZzV5Ak2JK8" frameborder="0" allowfullscreen style="height: 300px;"></iframe>
<div class="box">
    <h2 style="font-size: 24px;">Consulte aqui</h2>
    <form id="consultForm" action="<?= base_url('verificar') ?>" method="post">
  <input type="text" id="nome" name="nome" placeholder="Digite um nome" style="width: 300px; font-size: 16px;">
    <input type="submit" value="Consultar" style="font-size: 16px;" >
    <input type="reset" value="Limpar" style="font-size: 16px;">
    </form>
    <?php if (isset($erro)): ?>
        <p style="color: red;"><?= $erro ?></p>
    <?php endif; ?>
</div>
</div>

</body>
</html>
