<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Protocolos Recebidos</title>
    <!-- Inclua o CSS do DataTables e do Bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos personalizados */
        body {
            background-color: #f0f0f0;
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://source.unsplash.com/random/1920x1080');
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        .table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        th, td {
            text-align: center;
            color: #000;
        }
        .btn-add {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-add:hover {
            background-color: #218838;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .fade-in {
            animation: fadeIn 1s ease forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .btn-action {
            padding: 5px;
            margin: 0 5px;
            font-size: 18px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-view {
            background-color: #007bff;
        }
        .btn-download {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Protocolos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Olá, <?= session('usuario_nome') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('login/logout') ?>">Deslogar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mt-5 fade-in">
        <h1 class="mb-4 text-center">Lista de Protocolos Recebidos</h1>
        <button class="btn btn-add btn-download-all">Baixar Tudo</button>
        <table id="protocolos_table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Situação</th>
                    <th>Ações</th> <!-- Nova coluna para as ações -->
                </tr>
            </thead>
            <tbody>        
                <?php foreach ($protocolosrecebidos as $protocolo): ?>
                    <tr>
                        <td><?= $protocolo['protocol_id'] ?></td>
                        <td><?= $protocolo['protocol_matricula'] ?></td>
                        <td><?= $protocolo['protocol_nome'] ?></td>
                        <td><?= $protocolo['protocol_cpf'] ?></td>
                        <td><?= $protocolo['protocol_situacaoprofissional'] ?></td>
                        <td>
                            <button class="btn btn-action btn-view"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-action btn-download"><i class="fas fa-download"></i></button>
                            <button class="btn btn-action btn-delete" data-id="<?= $protocolo['protocol_id'] ?>"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Inclua o JavaScript do jQuery, do DataTables e do Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#protocolos_table').DataTable({
                "pagingType": "simple_numbers",
                "ordering": true,
                "searching": true,
                "info": false,
                "lengthChange" : false,
                "pageLength": 50,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nenhum registro encontrado",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros totais)",
                    "search": "Pesquisar:",
                    "paginate": {
                        "first": "Primeira",
                        "last": "Última",
                        "next": "Próxima",
                        "previous": "Anterior"
                    }
                }
            });

            $('.btn-delete').on('click', function() {
                var protocolId = $(this).data('id');
                if (confirm('Tem certeza que deseja excluir este protocolo?')) {
                    // Redireciona para a rota de exclusão passando o ID do protocolo
                    window.location.href = '<?= base_url("protocolo/delete/") ?>' + protocolId;
                }
            });


            // Adiciona um efeito de pulso ao clicar no botão "Adicionar Protocolo"
        });
    </script>
</body>
</html>
