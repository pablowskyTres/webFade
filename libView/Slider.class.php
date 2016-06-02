<?php 
class Slider{

	public function getHtml(){
		$html=<<<HTML
		<div class="">
	<section class="slider-container" >
		<ul id="slider" class="slider-wrapper">
			<li class="slide-current">
				<a href="contacto.php"><img src="/webFade/img/slide1.jpg" alt="Slider Image 1"></a>
	            <div><p>Descripcion imagen 1</p></div>
			</li>
			<li>
				<a href="contacto.php"><img src=/webFade/img/slide2.jpg alt="Slider Image 2"></a>
	            <div><p>Descripcion imagen 2</p></div>
			</li>
			<li>
				<a href="contacto.php"><img src=/webFade/img/petzlSitta.jpg alt="Slider Image 3"></a>
	            <div><p>Descripcion imagen 3</p></div>
			</li>
		</ul>
	</section>
</div>
HTML;
	return $html;
	}
}
 ?>
