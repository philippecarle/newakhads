<?php

namespace AA\Core\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="aa_brother")
 */
class Brother extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var string
	 * @ORM\Column(name="first_name", type="string", nullable=true)
	 */
	private $firstName;

	/**
	 * @var string
	 * @ORM\Column(name="last_name", type="string", nullable=true)
	 */
	private $lastName;

	/**
	 * @var string
	 */
	private $initials;

    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @param string $firstName
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	/**
	 * @return mixed
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * @param mixed $lastName
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	/**
	 * @return mixed
	 */
	public function getInitials()
	{
		return strtoupper($this->firstName[0].$this->lastName[0]);
	}


}
