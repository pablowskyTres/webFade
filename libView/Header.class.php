<?php 
class Header{

	public function getHtml(){
		$html=<<<HTML
<div id="contenedor" class="contenido">
	<!--cabecera-->
    <div class="monito"><a href="#"><img src="/webFade/img/monito.png" /></a></div>
    <!-- <div><img src="img/header_bg.png" width="100%" height="100" alt="banner"/></div> -->
    <!--menu-->
	<div>
        <nav>
            <ul>
                <li><a href="index.php"><strong>Inicio</strong></a></li>
                <li><a href="index.php?op=cat"><strong>Productos</strong></a></li>
                <li><a href="index.php?op=6"><strong>Contacto</strong></a></li>
                <li><strong>Administración</strong>
                	<ul>
                        <li><a href="index.php?op=8"><strong>Producto</strong></a></li>
                    	<li><a href="index.php?op=7"><strong>Listado Mensajes</strong></a></li>
            		</ul>
                </li>
                <li><strong>Cuenta</strong>
            		<ul>
                    	<li><a href="index.php?op=2"><strong>Registro</strong></a></li>
                    	<li><a href="index.php?op=3"><strong>Ingreso</strong></a></li>
            		</ul>
            	</li>
            </ul>
        </nav>
    </div>
	<!--<script>
		$(document).ready(function(e) {
			var contador = 0;
            $(".navegador > ul > li").each(function(index, element) {
                contador ++;
            });			
			if(contador == 5) {
				$(".navegador > ul > li").addClass("clase20");
			}
			else if(contador == 4) {
				$(".navegador > ul > li").addClass("clase25");
			}
        });
	</script>-->
HTML;
	return $html;
	}
}
 ?>
