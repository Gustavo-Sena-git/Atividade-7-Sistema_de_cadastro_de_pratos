function preencherEditar(prato) {
        // Preenche os campos do modal de edição com os dados do prato
        document.getElementById('editar-id').value = prato.id;
        document.getElementById('editar-nome').value = prato.nome;
        document.getElementById('editar-preco').value = prato.preco;
        document.getElementById('editar-descricao').value = prato.descricao;
        document.getElementById('editar-categoria').value = prato.categoria;
        
        // Exibe o modal na tela
        document.getElementById('editar').style.display = 'block';
    }

    function fecharFormulario(idModal) {
        document.getElementById(idModal).style.display = 'none';
    }

    function abrirFormulario(idModal) {
        document.getElementById(idModal).style.display = 'block';
}
