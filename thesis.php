<?php
class story
{
    // Properties
    private $id;
    private $title;
    private $abstract;
    private $username;
    private $file_path;
    private $status;

    
    public function __construct($id, $title, $abstract, $username, $file_path, $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->abstract = $abstract;
        $this->username = $username;
        $this->file_path = $file_path;
        $this->status = $status;
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