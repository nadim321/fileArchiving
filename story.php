<?php
class story
{
    // Properties
    private $id;
    private $description;
    private $photo_url;
    private $username;
    private $email;

    /**
     * story constructor.
     * @param $id
     * @param $description
     * @param $photo_url
     * @param $username
     * @param $email
     */
    public function __construct($id, $description, $photo_url, $username)
    {
        $this->id = $id;
        $this->description = $description;
        $this->photo_url = $photo_url;
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photo_url;
    }

    /**
     * @param mixed $photo_url
     */
    public function setPhotoUrl($photo_url)
    {
        $this->photo_url = $photo_url;
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


    function toListItem()
    {
        return $this;
    }


}
?>