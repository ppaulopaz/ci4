<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Cadastro de usuários</title>
</head>
<body>
        <!-- Formúlario de cadastro  -->
      
    <div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="container">
            <h3>Criar conta MOE</h3>
            <hr>
            <?php
            ///mostrar os possivéis erros
            if (isset($erro)) {?>
               <?php print_r($erro->listErrors()) ?>
            <?php
            }
            ?>
            <form class=""action="" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="firstname">E-mail</label>
                            <input class="form-control" type="email" name="email" id="email" value="<?= old('email') ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="senha" id="password" value="<?=  old('senha') ?>">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="password_confirm">Confirmar senha</label>
                            <input type="password" class="form-control" name="senhaconf" id="passwordConfirm" value="<?=  old('senhaconf') ?>">
                        </div>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="tipo_usuario" value="1">Estagiário
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="tipo_usuario" value="2">Empregador
                        </label>
                    </div>
                </div>

                <div class="row mt-3" id="cadastro_usuario"></div>

                <div class="row">
                    <div class="col-12 col-sm-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                    
                    <div class="col-12 col-sm-8 text-right">
                        <a href="<?=base_url()?>">Fazer Login</a>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- Script para criação dinâmicas de inputs  -->
    <script>
        function estilizarInput(input) 
        {
            const dive = document.createElement('div')
            dive.classList = "col-12 col-sm-6"
            const divForm = document.createElement('div')
            divForm.classList.add("form-group")
            divForm.appendChild(input)
            dive.appendChild(divForm)
            return dive
        }

        const inputRadio = document.getElementsByName('tipo_usuario')
        const campoCadastro = document.getElementById('cadastro_usuario')

        inputRadio[0].onchange = function() {
            campoCadastro.innerHTML = ''
            const nome = document.createElement('input')
            nome.placeholder="Nome"
            nome.name="nome_estagiario"
            nome.value="<?=  old('nome_estagiario') ?>"
            nome.classList.add("form-control")

            const curso = document.createElement('input')
            curso.placeholder = "Curso"
            curso.name="curso_estagiario"
            curso.value="<?=  old('curso_estagiario') ?>"
            curso.classList.add("form-control")

            const ano_ingresso = document.createElement('input')
            ano_ingresso.placeholder = "Ano de Ingresso"
            ano_ingresso.type="date"
            ano_ingresso.name="ano_ingresso_estagiario"
            ano_ingresso.value="<?= old('ano_ingresso_estagiario') ?>"
            ano_ingresso.classList.add("form-control")

            const minicurriculo = document.createElement('input')
            minicurriculo.placeholder = "Minicurrículo"
            minicurriculo.name="minicurriculo_estagiario"
            minicurriculo.value="<?=  old('minicurriculo_estagiario') ?>"
            minicurriculo.classList.add("form-control")            

            // adicionando na pagina
            campoCadastro.appendChild(estilizarInput(nome))
            campoCadastro.appendChild(estilizarInput(curso))
            campoCadastro.appendChild(estilizarInput(ano_ingresso))
            campoCadastro.appendChild(estilizarInput(minicurriculo))
        }

        inputRadio[1].onchange = function() {
            campoCadastro.innerHTML = ''

            const nome = document.createElement('input')
            nome.placeholder = "Nome"
            nome.name="nome_empresa"
            nome.value="<?=  old('nome_empresa') ?>"
            nome.classList.add("form-control")

            const endereco = document.createElement('input')
            endereco.placeholder = "Endereço"
            endereco.name="endereco_empresa"
            endereco.value="<?=  old('endereco_empresa') ?>"
            endereco.classList.add("form-control")

            const pessoa_contato = document.createElement('input')
            pessoa_contato.placeholder = "Pessoa para contato"
            pessoa_contato.name="pessoa_de_contato"
            pessoa_contato.value="<?=  old('pessoa_de_contato') ?>"
            pessoa_contato.classList.add("form-control")

            const descricao_empresa = document.createElement('input')
            descricao_empresa.placeholder = "Descrição da empresa"
            descricao_empresa.name="descricao_empresa"
            descricao_empresa.value="<?=  old('descricao_empresa') ?>"
            descricao_empresa.classList.add("form-control")

            const produtos_empresa = document.createElement('input')
            produtos_empresa.placeholder = "Produtos da empresa"
            produtos_empresa.name="produtos_empresa"
            produtos_empresa.value="<?=  old('produtos_empresa') ?>"
            produtos_empresa.classList.add("form-control")

            campoCadastro.appendChild(estilizarInput(nome))
            campoCadastro.appendChild(estilizarInput(endereco))
            campoCadastro.appendChild(estilizarInput(pessoa_contato))
            campoCadastro.appendChild(estilizarInput(descricao_empresa))
            campoCadastro.appendChild(estilizarInput(produtos_empresa))

        }

        valueRadio = parseInt("<?= old('tipo_usuario') ?>")
        if (valueRadio){ 
            inputRadio[valueRadio - 1].checked = true
            inputRadio[valueRadio - 1].onchange() 
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>