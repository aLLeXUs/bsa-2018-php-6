<?php

namespace App\Services;

class Currency
{
    private $id;
    private $name;
    private $shortName;
    private $actualCourse;
    private $actualCourseDate;
    private $active;

    public function __construct($id, $name, $shortName, $actualCourse, $actualCourseDate, $active)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->actualCourse = $actualCourse;
        $this->actualCourseDate = $actualCourseDate;
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @return mixed
     */
    public function getActualCourse()
    {
        return $this->actualCourse;
    }

    /**
     * @return mixed
     */
    public function getActualCourseDate()
    {
        return $this->actualCourseDate;
    }

    /**
     * @return mixed
     */
    public function isActive()
    {
        return $this->active;
    }
}