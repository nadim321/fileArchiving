<?php
class user {
    // Properties
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $username;
    private $password;
    private $profile_pic;

    /**
     * user constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $phone
     * @param $username
     * @param $password
     * @param $profile_pic
     */
    public function __construct($firstName, $lastName, $email, $phone, $username, $password, $profile_pic)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->username = $username;
        $this->password = $password;
        $this->profile_pic = $profile_pic;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getProfilePic()
    {
        return $this->profile_pic;
    }

    /**
     * @param mixed $profile_pic
     */
    public function setProfilePic($profile_pic)
    {
        $this->profile_pic = $profile_pic;
    }




    // return full object with a single row data
    function toListItem()
    {
        return $this;
    }
}



?>