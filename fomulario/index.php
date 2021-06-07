<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Valdean Palmeira de Souza">
    <meta name="description" content="Essa página de formulario serve para que as pessoas necessitadas de alguma forma possa buscar ajuda e esse foi o meio que achamos para possamos ajudar essas pessoas.">
    <title>Acolhimento IBN Nova Canaã || Formulário</title>

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/index.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/animate.css">
</head>
<body>
    <div class="banner">
        <div class="alert-home-form">
            <?php echo EnvForm::envForm(); ?>
        </div>
        <div class="center">
            <img src="<?php echo INCLUDE_PATH; ?>img/banner.png" alt="Banner">
        </div><!-- Center -->
    </div>
    <header>
        <div class="center">
            <div class="contain">
                <h1>Acolhimento IBN Nova Canaã</h1>
                <p>
                    Para melhor atendê-los é necessário preencher esse formulário. 
                    Pedimos atenção na leitura das perguntas para que possamos lhe ajudar da maneira correta. 
                    <br><br>
                    * Esse serviço foi criado para dar assistência e orientações nesse período CONTRA A COVID-19, aos membros da nossa igreja e seus familiares. 
                    <br><br>
                    Desde já oramos por você e sua família!
                </p>
                <span>* Campo Obrigatório</span>
            </div><!-- Contain -->
        </div><!-- Center -->
    </header><!-- Header -->
    <section class="formulario">
        <div class="center">
            <div class="form">
                <form method="POST">
                    <div class="box-form">
                        <h3>Seu Nome Completo: <span>*</span></h3>
                        <input type="text" name="nome" placeholder="Digite aqui" maxlength="255" autofocus required>
                    </div><!-- Box-Form -->

                    <div class="box-form">
                        <h3>Seu E-mail: <span>*</span></h3>
                        <input type="email" name="email" placeholder="Digite aqui" maxlength="255" required>
                    </div><!-- Box-Form -->

                    <div class="box-form">
                        <h3>Seu Telefone Celular: <span>*</span></h3>
                        <input type="text" name="telefone" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>
                    </div><!-- Box-Form -->

                    <div class="box-form">
                        <h3>Seu Endereço: <span>*</span></h3>
                        <div class="box-form-casa_number">
                            <div class="box-form-endereco">
                                <h4>Qual o nome de sua Rua: <span>*</span></h4>
                                <input type="text" name="endereco_rua" placeholder="Digite aqui" maxlength="255" required>
                            </div><!-- Box-Form-endereco -->

                            <div class="box-form-endereco">
                                <h4>Qual o número de sua Casa: <span>*</span></h4>
                                <input type="text" name="endereco_numCasa" placeholder="Digite aqui" maxlength="255" required>
                            </div><!-- Box-Form-endereco -->
                        </div>
                        <div class="box-form-endereco">
                            <h4>Qual o nome de seu Bairro: <span>*</span></h4>
                            <input type="text" name="endereco_bairro" placeholder="Digite aqui" maxlength="255" required>
                        </div><!-- Box-Form-endereco -->
                    </div><!-- Box-Form -->

                    <div class="box-form">
                        <h3>Você participa de algum ged? <span>*</span></h3>
                        <div class="box-form-resp">
                            <input id="s" type="radio" name="resp_ged" value="1" checked>
                            <label for="s">Sim</label>
                            <input id="n" type="radio" name="resp_ged" value="2">
                            <label for="n">Não</label>
                        </div>
                        <div class="box-form-ged">
                            <h4>Se sim, qual o nome?</h4>
                            <input type="text" name="nome_ged" placeholder="Digite aqui" maxlength="255">
                    
                            <h4>Quem é seu Supervisor?</h4>
                            <input type="text" name="nome_supervisor" placeholder="Digite aqui" maxlength="255">
                        </div><!-- Box-Form-ged -->
                    </div><!-- Box-Form -->

                    <div class="box-form">
                        <h3>Que tipo de ajuda você está presisando neste momento? <span>*</span></h3>
                        <p>Você pode marcar mais de uma opção.</p>
                        <div class="box-selecao">
                            <div>
                                <input type="checkbox" name="tipo_ajuda_opcao[]" value="1" id="op1">
                                <label for="op1">Apoio Espiritual (Pedido de oração, palavra do pastor, leitura da palavra de Deus)</label>
                            </div>

                            <div>
                                <input type="checkbox" name="tipo_ajuda_opcao[]" value="2" id="op2">
                                <label for="op2">Apoio Psicológico (Estou de luto, depressão, ansiedade)</label>
                            </div>

                            <div>
                                <input type="checkbox" name="tipo_ajuda_opcao[]" value="3" id="op3">
                                <label for="op3">Ajuda Social (alimentícias, medicações, transporte para uma unidade de saúde, etc)</label>
                            </div>

                            <div>
                                <input type="checkbox" name="tipo_ajuda_opcao[]" value="4" id="op4">
                                <label for="op4">Atendimento de Fisioterapia</label>
                            </div>

                            <div>
                                <input type="checkbox" name="tipo_ajuda_opcao[]" value="5" id="op5">
                                <label for="op5">Atendimento de enfermagem (suspeita de Covid, dúvidas e suporte)</label>
                            </div>

                            <div>
                                <input type="checkbox" name="tipo_ajuda_opcao[]" value="6" id="op6">
                                <label for="op6">Outro:</label>
                                <input id="outros" type="text" name="outros" placeholder="Digite aqui" maxlength="255">
                            </div>
                        </div>
                    </div><!-- Box-Form -->

                    <div class="box-form">
                        <h3>Caso queira, pode descrever abaixo com mais detalhes suas necessidades:</h3>
                        <textarea name="necessidade" placeholder="Digite aqui" rows="1" id="autoTxtArea" onkeydown="autoResize()" maxlength="255" ></textarea>
                    </div><!-- Box-Form -->

                    <div class="box-form">
                        <h3 class="dwddd">Caso precise de algum tipo de ajuda ou tenha alguma dúvida, entre em contato <a href="https://api.whatsapp.com/send?l=pr_BR&phone=+5592981440771" target="_blank">(92) 9 8144-0771.</a></h3>
                    </div><!-- Box-Form -->
                    <div class="confDados">
                        <input type="checkbox" id="confDados" required>
                        <label for="confDados">Confirmo que, nesse formulário, os dados inseridos estão correto e que realmente necessito dessa ajuda que estão oferecendo.</label>
                    </div><!-- Box-Form -->
                    <input type="submit" value="Enviar Formulário" name="acao">
                </form>
            </div><!-- Form -->
        </div><!-- Center -->
    </section><!-- Section - formulario -->

    <script>        
        function autoResize(){
            objTextArea = document.getElementById('autoTxtArea');
            if (objTextArea.scrollHeight > objTextArea.offsetHeight){
                objTextArea.rows += 1;
            }
        }
    </script><!-- Height-TextAria-Auto -->
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.mask.min.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/main.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/pace.min.js"></script>
</body>
</html>