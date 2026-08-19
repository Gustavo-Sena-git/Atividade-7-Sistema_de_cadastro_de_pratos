function abrirFormulario(idModal){
    document.getElementById(idModal).style.display = "block"

}

function fecharFormulario(idModal){
    document.getElementById(idModal).style.display = "none"
}

function preencherEditar(prato){
    document.getElementById('editar-id').value = prato.id;
    document.getElementById('editar-nome').value = prato.nome;
    document.getElementById('editar-preco').value = prato.preco;
    document.getElementById('editar-descricao').value = prato.descricao;
    document.getElementById('editar-categoria').value = prato.categoria;

    abrirFormulario('editar')
}