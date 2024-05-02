<?php

namespace App\Controllers;

use App\Models\Usuario_model;
use CodeIgniter\Controller;

class Login_Controller extends Controller {

    public function index() {
        return view("Login.php");
    }

    public function verificarCredenciais() {
        // Carregar o modelo
        $nomeUsuario = $this->request->getPost('username');
        $senha = $this->request->getPost('password');
        
        $usuarioModel = new Usuario_model();
        
        // Verificar as credenciais
        $resultado = $usuarioModel->verificarCredenciais($nomeUsuario, $senha);
        if ($resultado) {
            return redirect()->to(base_url('login/sucesso'));


        } else {
            // Se as credenciais estiverem incorretas, exibir uma mensagem de erro
            $data['error_message'] = 'Credenciais incorretas!';
            return view('Login', $data);
        }
    }

}
