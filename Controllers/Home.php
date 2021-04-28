<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if ($this->request->getMethod() === 'post') {
			$loginModel = new \App\Models\LoginModel();
			$loginEmp = new \App\Models\LoginEmp();

			$dados=$this->request->getPost();

			// Select na tabela estagiario
			foreach ($loginModel->find() as $estagiario) {
				if ($estagiario->email == $dados['email'] and $estagiario->senha == $dados['senha']) {
					$user = $estagiario;
				}
			}

			// Select na tabela empregador
			foreach ($loginEmp->find() as $empregador) {
				if ($empregador->EMAIL == $dados['email'] and $empregador->SENHA == $dados['senha']) {
					$user = $empregador;
				}
			}

			// Resposta ao usuário
			if (isset($user)) { 
				session()->set('usuario', get_object_vars($user));
			} else {
				session()->setFlashdata('incorreto', 'Dados incorretos ou usuário não cadastrado!');
			}
		}
		return view('index');
	}
}
?>