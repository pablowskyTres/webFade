<?php  
class Usuario{

	private $id;
	private $persona_id;

	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $persona_id   
	 */
	public function __construct($persona_id)
	{
		$this->setPersonaId($persona_id);
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
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    private function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of persona_id.
     *
     * @return mixed
     */
    public function getPersonaId()
    {
        return $this->persona_id;
    }

    /**
     * Sets the value of persona_id.
     *
     * @param mixed $persona_id the persona id
     *
     * @return self
     */
    private function setPersonaId($persona_id)
    {
        $this->persona_id = $persona_id;

        return $this;
    }
}
?>