<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Login
 *
 * @ORM\Table(name="login")
 * @ORM\Entity
 */
class Login
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idlogin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlogin;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=45, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=false)
     */
    private $password;



    /**
     * Get idlogin
     *
     * @return integer
     */
    public function getIdlogin()
    {
        return $this->idlogin;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Login
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Login
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
