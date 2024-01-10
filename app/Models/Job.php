<?php

namespace App\Models;

use PDO;

class Job
{
    private int $id;
    private string $title;
    private string $description;
    private $location;
    private $company;
    #[Simple]
    private $is_active;
    #[Object]
    private User $author;

    #[Collection('lazy')]
    private array $applicants;


    public function __construct($id = null, $title = null, $description = null, $location = null, $company = null, $is_active = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->company = $company;
        $this->is_active = $is_active;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getIsActive()
    {
        return $this->is_active;
    }

    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }    

    /*
    public function setAuthorId($author_id): int
    {
        $this->author_id = $author_id; 
    }*/

    public function setAuthor(User $author)
    {
        $this->author = $author;
    }
}
