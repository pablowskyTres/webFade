<?php 
class Contacto{

	private $id;
	private $nombre;
	private $email;
	private $mensaje;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $nombre   
	 * @param    $email   
	 * @param    $mensaje   
	 */
	public function __construct($nombre =NULL, $email=NULL, $mensaje=NULL)
	{
		$this->setNombre($nombre);
		$this->setEmail($email);
		$this->setMensaje($mensaje);
	}

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of nombre.
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sets the value of nombre.
     *
     * @param mixed $nombre the nombre
     *
     * @return self
     */
    private function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    private function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of mensaje.
     *
     * @return mixed
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Sets the value of mensaje.
     *
     * @param mixed $mensaje the mensaje
     *
     * @return self
     */
    private function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }
}
 ?>
