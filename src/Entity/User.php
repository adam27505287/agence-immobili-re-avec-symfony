<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface,\Serializable
{//pour la securitè,ce fichiers represente le table user avec ses attributs (avec controle de saisie) 
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
  /**

     * Returns the roles granted to the user.

     *

     *     public function getRoles()

     *     {

     *         return array('ROLE_USER');

     *     }

     *

     * Alternatively, the roles might be stored on a ``roles`` property,

     * and populated in any number of different ways when the user object

     * is created.

     *

     * @return (Role|string)[] The user roles

     */
    public function getRoles()
    {

    
       return ['ROLE_ADMIN'] ;

    }


    /**

     * Returns the salt that was originally used to encode the password.

     *

     * This can return null if the password was not encoded using a salt.

     *

     * @return string|null The salt

     */
    public function getSalt()
    {
   
       return null;

    }
    /**

     * Removes sensitive data from the user.

     *

     * This is important if, at any given point, sensitive information like

     * the plain-text password is stored on this object.

     */

    public function eraseCredentials()
    {

    }
     /**

     * {@inheritdoc}

     */

    public function serialize(): string

    {

        // add $this->salt too if you don't use Bcrypt or Argon2i

        return serialize([$this->id, $this->username, $this->password]);

    }



    /**

     * {@inheritdoc}

     */

    public function unserialize($serialized): void

    {


        [$this->id, $this->username, $this->password] = unserialize($serialized, ['allowed_classes' => false]);

    }
}
