<?php
require_once "config/conexao.php";

$sqlPratos = "SELECT pratos.*, usuarios.nome AS nome_usuario 
              FROM pratos 
              INNER JOIN usuarios ON pratos.usuario_id = usuarios.id";
$resultado = $conexao->query($sqlPratos);

$sqlUsuarios = "SELECT id, nome FROM usuarios";
$usuariosResultado = $conexao->query($sqlUsuarios);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="Script/script.js"></script>

</head>
<body>
    
    <nav class="navbar">
        <a class="botao" href="cadastro.html">Cadastrar cliente</a>

        <h3>Figueiró | Sena - Cucina italiana</h3>
    </nav>

    <header>
        <h2 class="titulo">Pratos:</h2>
    </header>

    <main>

       <div class="modificar">

            <button type="button" onclick="abrirFormulario('novo')">
                Adicionar prato
            </button>
        
    <!--FORMULÁRIO PARA OS PRATOS-->

            <div id="novo" class="formulario">
                <form action="pratos/cadastrar.php" method="POST">
                    <h2>Novo prato</h2>
                    

                <?php
                    $sqlUsuarios = "SELECT id, nome FROM usuarios";
                    $usuariosResultado = $conexao->query($sqlUsuarios);
                ?>


                    <label>Usuário Responsável:</label>
                    <select name="usuario_id" required>
                        <!--Arrumar essa parte para ficar dinamico-->
                        <option value="">Selecione o usuario</option>
                            <?php while($u = $usuariosResultado->fetch_assoc()): ?>
                                <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['nome']) ?></option>
                            <?php endwhile; ?>
                    </select>

                    <label>Nome do prato:</label>
                    <input class="imput" type="text" name="nome" required>
                
                    <label>Preço:</label>
                    <input type="number" name="preco" step="0.01" min="0" required placeholder="0.00">
                
                    <label>Descrição:</label>
                    <textarea name="descricao" required></textarea>

                    <label>Classe:</label>
                        <select name="categoria" required>
                            <option value="principal">Principal</option>
                            <option value="accompaniment">Acompanhamento</option>
                            <option value="dessert">Sobremesa</option>
                        </select>
                
                    <button type="submit">Salvar</button>
                    <button type="button" onclick="fecharFormulario('novo')">
                        Cancelar
                    </button>
                </form>
            </div>

        </div>


        <div class="pratos">

            <div class="tabela">
                <p>Nome:</p>
                <p>Prato:</p>
                <p>Categoria:</p>
                <p>Descrição:</p>
                <p>Preço:</p>
            </div>

            <?php if ($resultado && $resultado->num_rows > 0): ?>
                <?php while ($prato = $resultado->fetch_assoc()): ?>
                    <div class="linha">
                        <div class="prato">
                            <p><?= htmlspecialchars($prato['nome_usuario']) ?></p>
                            <p><?= htmlspecialchars($prato['nome']) ?></p>
                            <p><?= htmlspecialchars($prato['categoria']) ?></p>
                            <p><?= htmlspecialchars($prato['descricao']) ?></p>
                            <p>R$ <?= number_format($prato['preco'], 2, ',', '.') ?></p>
                        </div>

                        <button class="editar" type="button" onclick='preencherEditar(<?= htmlspecialchars(json_encode($prato), ENT_QUOTES, "UTF-8") ?>)'>
                            Editar prato
                        </button>

                        <a href="pratos/excluir.php?id=<?= $prato['id'] ?>" onclick="return confirm('Deseja realmente excluir?')">
                            <button type="button" class="excluir">Excluir</button>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="padding: 15px;">Nenhum prato cadastrado.</p>
            <?php endif; ?>

        </div>
            
    <!--FORMULÁRIO PARA EDIÇÃO-->

                <div id="editar" class="formulario">
                    <form action="pratos/editar.php" method="POST">
                        <h2>Editar prato</h2>
                    
                        <input type="hidden" name="id" id="editar-id">

                        <label>Nome:</label>
                        <input class="imput" type="text" name="nome" id="editar-nome" required>
                    
                        <label>Preço:</label>
                        <input type="number" name="preco" step="0.01" min="0" id="editar-preco" required>
                    
                        <label>Descrição:</label>
                        <textarea name="descricao" id="editar-descricao" required></textarea>
                        <label>Categoria:</label>
                        <select name="categoria" id="editar-categoria" required>

                            <option value="principal">Principal</option>

                            <option value="accompaniment">Acompanhamento</option>

                            <option value="dessert">Sobremesa</option>

                        </select>

                        <button type="submit">Salvar</button>

                        <button type="button" onclick="fecharFormulario('editar')">
                            Cancelar
                        </button>

                    </form>
                </div>

            </div>
            
        </div>

    </main>

    <footer>
        <p>Sempre faça tudo com amor</p>
    </footer>

    <script>

        function abrirFormulario(id) {
    document.getElementById(id).style.display = "block";
    }

    function fecharFormulario(id) {
        document.getElementById(id).style.display = "none";
    }

    </script>

</body>
</html>