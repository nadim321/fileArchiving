<?php
class likeCount{
    private $id;
    private $username;
    private $story_id;
    private $like_dislike;

    /**
     * likeCount constructor.
     * @param $id
     * @param $username
     * @param $story_id
     * @param $like_dislike
     */
    public function __construct($id, $username, $story_id, $like_dislike)
    {
        $this->id = $id;
        $this->username = $username;
        $this->story_id = $story_id;
        $this->like_dislike = $like_dislike;
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
    public function getStoryId()
    {
        return $this->story_id;
    }

    /**
     * @param mixed $story_id
     */
    public function setStoryId($story_id)
    {
        $this->story_id = $story_id;
    }

    /**
     * @return mixed
     */
    public function getLikeDislike()
    {
        return $this->like_dislike;
    }

    /**
     * @param mixed $like_dislike
     */
    public function setLikeDislike($like_dislike)
    {
        $this->like_dislike = $like_dislike;
    }

    function toListItem()
    {
        return $this;
    }



}


?>