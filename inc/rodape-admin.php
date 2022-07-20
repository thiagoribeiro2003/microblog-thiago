    </div>
</main>

<footer class="footer mt-auto py-3 bg-dark border-top">
    <div class="container text-center text-white">
        Microblog é um site fictício desenvolvido para fins didáticos | Senac Penha &copy; 2022
    </div>
</footer>


<script src="../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<?php 
switch($pagina){
    case 'usuarios.php':
    case 'noticias.php':
    case 'categorias.php':
?>
<script src="js/confirm.js"></script>
<?php
    break;

    case 'noticia-insere.php':
    case 'noticia-atualiza.php':
?>
<script src="js/contador.js"></script>
<?php
    break;
}
?>
</body>
</html>