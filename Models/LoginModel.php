<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model 
{
    // Conexão com a tabela estagiário
    protected $table = 'estagiario';
    protected $primaryKey = 'id_estagiario';
    protected $allowedFields = ['email','senha','nome_estagiario','curso_estagiario','ano_ingresso_estagiario','minicurriculo_estagiario'];
    protected $returnType = 'object';
}
    
class LoginEmp extends Model 
{
    //Conexão com a tabela empregador
    protected $table = 'empregador';
    protected $primaryKey = 'id_empregador';
    protected $allowedFields = ['email','senha','nome_empresa','endereco_empresa','pessoa_de_contato','descricao_empresa','produtos_empresa'];
    protected $returnType = 'object';
}