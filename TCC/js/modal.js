function abrirModal(carregarModal) {
  console.log("Carregar a janela modal:" + carregarModal);
  var modal = document.getElementById(carregarModal);
  modal.style.display = 'block';
  document.body.style.overflow = 'hidden';
}

function fecharModal(fecharModal) {
  console.log("Fechar a janela modal:" + fecharModal);
  var modal = document.getElementById(fecharModal);
  modal.style.display = 'none';
  document.body.style.overflow = 'auto';
}