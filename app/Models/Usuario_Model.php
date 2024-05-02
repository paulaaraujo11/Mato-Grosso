<?php
defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class Usuario_model extends Model {

    protected $table = 'usuario';

    public function verificarCredenciais($nomeUsuario, $senha) {
       
        // Consulta para verificar se as credenciais estão corretas
        $query = $this->where('nome', $nomeUsuario)
                      ->where('senha', $senha)
                      ->get();
                    //   die(var_dump($query->getRow()));
        // Verificar se a consulta retornou algum resultado
        if ($query->getRow()) {
            // Se as credenciais estão corretas, retorna 'ok'
            return true;
        } else {
            // Se as credenciais não estão corretas, retorna null
            return false;
        }
    }
}
