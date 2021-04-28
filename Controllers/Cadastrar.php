<?php namespace App\Controllers;

class Cadastrar extends BaseController
{
    public function index()
    {
        $data = [];
        $data['erros']='';
        // Verificar se houve uma inserção no banco
        if ($this->request->getMethod() === 'post') {
            //Conxeão com banco
            $loginModel = new \App\Models\LoginModel();
            $loginEmp = new \App\Models\LoginEmp();
            //Variavel dados com valores do inpust
            $dados=$this->request->getPost();
            //validando email e senhas
            $validacao = $this->validate([
                    'email'=>'required',
                    'senha'=>'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[0-9]/]|regex_match[/\W/]',
                    'senhaconf'=>'required|matches[senha]'
                ],[
                    'email'=>[
                        'required' => 'Campo de email é obrigatório',
                    ],
                    'senha' => [
                        'required' => 'Campo de senha é obrigatório',
                        'min_length' => 'Senha deve ter mais de 6 caracter',
                        'regex_match' => 'Use uma letra maíuscula, numero e caracter especial na  senha',
                        
                    ],
                    'senhaconf' =>[
                        'required' => 'Campo de confirmar senha é obrigatório',
                        'matches' => 'As senhas deve ser iguais'
                    ]
            
            ]);
            // if para ver se as verificações estão certas
            if (!$validacao) {
                echo 'erro! Verifique a senha';
                //retorna ao formulário com dados preenchido
                return redirect()->back()->withInput()->with('erro', $this->validator);
            }else{
                //excluindo a senhaConf do array dados
                unset($dados['senhaconf']);
                //verifica o tipo de usuário
                if ($dados['tipo_usuario']==1){
                    unset($dados['tipo_usuario']);
                    //validando nome, curso.....
                    $validacao1 = $this->validate([
                        'email'=>'required|is_unique[estagiario.email]',
                        'nome_estagiario'=>'required',
                        'curso_estagiario'=>'required',
                        'ano_ingresso_estagiario'=>'required',
                        'minicurriculo_estagiario'=>'required'
                    ],[
                        'email' => [
                            'is_unique' => 'E-mail já cadastrado',
                        ],
                        'nome_estagiario'=>[
                            'required' => 'O campo NOME deve ser preenchido',
                        ],
                        'curso_estagiario'=>[
                            'required' => 'O campo CURSO deve ser preenchido',
                        ],
                        'ano_ingresso_estagiario'=>[
                            'required' => 'O campo ANO INGRESSO deve ser preenchido',
                        ],
                        'minicurriculo_estagiario'=>[
                            'required' => 'O campo MINICURRICULO deve ser preenchido',
                        ]
                        
                    ]);
                    if (!$validacao1) {
                        echo 'Preencha os campos de ESTAGIARIO correto';
                        return redirect()->back()->withInput()->with('erro', $this->validator);
                    }else{
                        //fazendo a inserção no banco
                        if ($loginModel->insert($dados)) {
                            echo 'certo, email enviado!';
                            return redirect('/');
                        }else {
                            return redirect()->back()->withInput()->with('erro', $this->validator);
                        }
                    }
                }else {
                    ///aqui o tipo de usuário é 2, logo é empregador
                    unset($dados['tipo_usuario']);
                    $validacao1 = $this->validate([
                        'email'=> 'required|is_unique[empregador.email]',
                        'nome_empresa'=>'required',
                        'endereco_empresa'=>'required',
                        'pessoa_de_contato'=>'required',
                        'descricao_empresa'=>'required',
                        'produtos_empresa'=>'required'
                    ],[
                        'email' => [
                            'is_unique' => 'E-mail já cadastrado',
                        ],
                        'nome_empresa'=>[
                            'required' => 'O campo NOME EMPRESA deve ser preenchido',
                        ],
                        'endereco_empresa'=>[
                            'required' => 'O campo ENDEREÇO deve ser preenchido',
                        ],
                        'pessoa_de_contato'=>[
                            'required' => 'O campo PESSOA DE CONTATO deve ser preenchido',
                        ],
                        'descricao_empresa'=>[
                            'required' => 'O campo DESCRIÇÃO EMPRESA deve ser preenchido',
                        ],
                        'produtos_empresa'=>[
                            'required' => 'O campo DESCRIÇÃO DA VAGA deve ser preenchido',
                        ]


                    ]);
                    if (!$validacao1) {
                        echo 'Preencha os campos de EMPREGADOR correto';
                        return redirect()->back()->withInput()->with('erro', $this->validator);
                        
                    }else{
                        if ($loginEmp->insert($dados)) {
                            echo 'certo, Email enviado!';
                            return redirect('/');
                        }else {
                            return redirect()->back()->withInput()->with('erro', $this->validator);
                        }
                    }
                }
                
            }
           
            
        }
        if (session()->has('erro')) {
            $data['erro']=session('erro');  
        };
        echo view('cadastro_usu',$data);
    }
}
?>