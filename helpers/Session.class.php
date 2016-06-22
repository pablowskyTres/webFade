<?php 
class Session{

	private $css;
	private $contenido;
	private $js;

	// public function __construct($css, $contenido, $js)
	// {
	// 	$this->css = $css;
	// 	$this->contenido = $contenido;
	// 	$this->js = $js;
	// }

	public function setCss(){
		return null;
	}

	public function printHtml($contenido){
		$jsHtml = $this->js;
		$html=<<<HTML
			$contenido
			$jsHtml
HTML;
		print_r($html);
	}

	public function setJs($ruta){
		$html=<<<HTML
		<script language="JavaScript" type="text/javascript" src="$ruta"></script>
HTML;
		$this->js .= $html;
	}

}
?>