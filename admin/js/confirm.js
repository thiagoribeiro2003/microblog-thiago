const links = document.querySelectorAll('.excluir');
// for( let i = 0; i < links.length; i++ ){
for(let link of links){
    link.addEventListener("click", function(event){
        event.preventDefault();
        let resposta = confirm("Deseja realmente excluir?");
        if(resposta) location.href = link.getAttribute('href');
    });
}