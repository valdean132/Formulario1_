<section class="editar-Perfil section-fixed">
    <div class="center">
        <div class="container-central animate-form">
            <div class="title">
                <h2><i><?php echo Icon::$editarPerfil; ?></i> Editar Usuário</h2>
            </div>

            <div class="form-center">
                <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" required value="<?php echo $_SESSION['nome'];?>">
                </div><!-- Form-Group-Nome -->

                <div class="form-group">
                    <label for="">Login:</label>
                    <input type="text" name="user" required value="<?php echo $_SESSION['user'];?>">
                </div><!-- Form-Group-User -->

                <div class="form-group">
                    <label for="">Senha:</label>
                    <input type="text" name="password" required value="<?php echo $_SESSION['password'];?>">
                </div><!-- Form-Group-Senha -->

                <div class="form-group">
                    <label for="">Imagem:</label>
                    <input type="file" name="imagem">
                    <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];?>">
                </div><!-- Form-Group-Imagem -->

                <div class="form-group">
                    <input type="submit" name="acao" value="Atualizar!">
                </div><!-- Form-Group -->
                </form>
            </div><!-- Form Center -->
        </div><!-- Conteiner Central -->
    </div><!-- Center -->
</section><!-- Editar Perfil -->
