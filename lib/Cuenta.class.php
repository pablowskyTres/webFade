<?php 
/**
* 
*/
class Cuenta{

	private $id;
	private $username;
	private $password;
	private $email;
    private $persona_id;

	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $username   
	 * @param    $password   
	 * @param    $email   
	 */
	public function __construct($username, $password, $email, $persona_id)
	{
		$this->setUsername($username);
		$this->setPassword($password);
		$this->setEmail($email);
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
     * Gets the value of username.
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Sets the value of username.
     *
     * @param mixed $username the username
     *
     * @return self
     */
    private function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    private function setPassword($password)
    {
        $this->password = $password;

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