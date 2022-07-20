/* SCRIPT PARA CONTAGEM DE CARACTERES DO CAMPO TEXTAREA RESUMO
-Usado nas páginas noticia-insere.php e noticia-atualiza.php */

// Elementos a serem manipulados
const spanMaximo = document.querySelector("#maximo");
const textResumo = document.querySelector("#resumo");

// Obtendo e exibindo a quantidade atual de caracteres do resumo (página noticia-atualiza.php)
let quantidadeAtual = textResumo.value.length;
spanMaximo.textContent = quantidadeAtual;

// Monitor de evento de digitação de caracteres no campo resumo
textResumo.addEventListener("input", function(){

  // Obtendo e exibindo a quantidade de caracteres digitados
  let quantidadeDigitada = textResumo.value.length;
  spanMaximo.textContent = quantidadeDigitada;

  // Ajustando as classes de acordo com a quantidade digitada
  if(quantidadeDigitada == 300 || quantidadeDigitada == 0){
    spanMaximo.classList.remove("bg-success");
    spanMaximo.classList.add("bg-danger");
  } else {
    spanMaximo.classList.remove("bg-danger");
    spanMaximo.classList.add("bg-success");
  }
});

