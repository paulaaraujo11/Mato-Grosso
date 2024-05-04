<?php
defined('BASEPATH') OR exit('No direct script access allowed');


namespace App\Models;

use CodeIgniter\Model;

class Autor_Model extends Model
{
    public $table = 'autores';

    public function verificarUsuario($nome)
    {
        return $this->db->table($this->table)
                    ->where('autor_nome', $nome)
                    ->get()->getRow();
    }
    public function getMatricula($nome)
    {
        $usuario = $this->db->table($this->table)
                    ->where('autor_nome', $nome)
                    ->get()->getRow();
        return $usuario->autor_matricula;
    }
    public function getValor($nome)
    {
        $usuario = $this->db->table($this->table)
                    ->where('autor_nome', $nome)
                    ->get()->getRow();
        return $usuario->autor_valor;
    }

    public function criarProtocolo($nome, $email, $telefone, $cpf, $cep, $logradouro, $cidade, $bairro, $estado, $complemento, $ip,$rg,$exp,$civil,$numero){
        //dd($ip);
        $insertId = $this->db->table('protocolosrecebidos')->insert([
            'protocol_anoprotocolo' => date('Y'),
            'protocol_nome' => $nome,
            'protocol_cpf' => $cpf,
            'protocol_matricula' => $this->getMatricula($nome),
            'protocol_tipocategoria' => 'Profissionais do magistério',
            'protocol_situacaoprofissional' => 'Efetivo',
            'protocol_valor' => $this->getValor($nome),
            'protocol_identidade' => $rg,
            'protocol_orgaoexped' => $exp,
            'protocol_estadocivil' => $civil,
            'protocol_endereco' => $logradouro.' '.$complemento,
            'protocol_numero' => $numero,
            'protocol_bairro' => $bairro,
            'protocol_cidade' => $cidade,
            'protocol_estado' => $estado,
            'protocol_cep' => $cep,
            'protocol_telefone' => $telefone,
            'protocol_email' => $email,
            'protocol_ipmaquina' => 'ip_teste',
        ]);


        if ($insertId) {
            $this->db->table($this->table)
                ->set('autor_statusdocumentos', 'RECEBIDO')
                ->where('autor_matricula', $this->getMatricula($nome))
                ->update();
        }
    }
}
