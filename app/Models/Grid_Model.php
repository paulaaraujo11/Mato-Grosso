<?php
defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Models;

use CodeIgniter\Model;

class Grid_model extends Model {

    protected $table = 'usuario';

    public function verificarCredenciais($nomeUsuario, $senha) {

    }
}
