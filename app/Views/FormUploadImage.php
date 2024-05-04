<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem e Confirmação</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .container {
            width: 500px;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #form-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #imagem {
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #modal-confirmacao h2 {
            margin-top: 0;
        }

        #modal-confirmacao p {
            margin: 10px 0;
        }

        #btn-fechar {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Enviar Imagem</h1>
        <form id="form-upload" action="<?= base_url('salvarimagem') ?>" method="post" enctype="multipart/form-data">
            <input type="file" id="imagem" name="imagem" accept="image/*" required>
            <input type="hidden" name="matricula" value="<? echo $matricula; ?>">
            <button type="submit">Enviar</button>
        </form>

        <div id="modal-confirmacao" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Imagem enviada com sucesso!</h2>
                <p>Obrigado por enviar sua imagem. Clique em "Fechar" para continuar.</p>
                <button id="btn-fechar" onclick="window.location.href = '<?= base_url('form') ?>'">Fechar</button>
            </div>
        </div>
    </div>
    <script>
    const modal = document.getElementById('modal-confirmacao');
    const btnFechar = document.getElementById('btn-fechar');
    const formUpload = document.getElementById('form-upload');

    formUpload.addEventListener('submit', function(event) {
        event.preventDefault();
        const file = document.getElementById('imagem').files[0];

        if (file) {
            // Simulate image upload (replace with actual upload logic)
            console.log('Sending image:', file.name);

            // Simulate successful upload with a delay (replace with actual response handling)
            setTimeout(() => {
                // Create a FormData object
                const formData = new FormData();
                formData.append('imagem', file);

                // Send the image data to the server using fetch
                fetch('<?= base_url('salvarimagem') ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server
                    console.log(data);
                })
                .catch(error => {
                    // Handle any errors that occur during the request
                    console.error(error);
                });

                modal.style.display = 'block';
            }, 1000); // Simulate a 1-second delay




        } else {
            alert('Selecione uma imagem para enviar.');
        }
    });

    btnFechar.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close modal by clicking outside the content area
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
</script>

</body>
</html>
