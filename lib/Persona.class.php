<?php 
class Persona{

	private $id;
	private $nombre;
	private $ap_paterno;
	private $ap_materno;
	private $genero;
    private $direccion;
	private $email;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $nombre   
	 * @param    $ap_paterno   
	 * @param    $ap_materno   
	 * @param    $genero   
	 * @param    $direccion   
	 */
	public function __construct($nombre, $ap_paterno, $ap_materno, $genero, $direccion, $email)
	{
		$this->setNombre($nombre);
		$this->setApPaterno($ap_paterno);
		$this->setApMaterno($ap_materno);
		$this->setGenero($genero);
        $this->setDireccion($direccion);
		$this->setEmail($email);
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
     * Gets the value of ap_paterno.
     *
     * @return mixed
     */
    public function getApPaterno()
    {
        return $this->ap_paterno;
    }

    /**
     * Sets the value of ap_paterno.
     *
     * @param mixed $ap_paterno the ap paterno
     *
     * @return self
     */
    private function setApPaterno($ap_paterno)
    {
        $this->ap_paterno = $ap_paterno;

        return $this;
    }

    /**
     * Gets the value of ap_materno.
     *
     * @return mixed
     */
    public function getApMaterno()
    {
        return $this->ap_materno;
    }

    /**
     * Sets the value of ap_materno.
     *
     * @param mixed $ap_materno the ap materno
     *
     * @return self
     */
    private function setApMaterno($ap_materno)
    {
        $this->ap_materno = $ap_materno;

        return $this;
    }

    /**
     * Gets the value of genero.
     *
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Sets the value of genero.
     *
     * @param mixed $genero the genero
     *
     * @return self
     */
    private function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Gets the value of direccion.
     *
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Sets the value of direccion.
     *
     * @param mixed $direccion the direccion
     *
     * @return self
     */
    private function setDireccion($direccion)
    {
        $this->direccion = $direccion;

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
}
?>