<?php
// src/Blogger/BlogBundle/Entity/Playlistlist.php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="playlist")
 */
class Playlist
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $track;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $singer;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $genre;

    /**
     * @ORM\Column(type="integer")
     */
    protected $year;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $duration;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set track
     *
     * @param string $track
     * @return Playlist
     */
    public function setTrack($track)
    {
        $this->track = $track;

        return $this;
    }

    /**
     * Get track
     *
     * @return string
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * Set singer
     *
     * @param string $singer
     * @return Playlist
     */
    public function setSinger($singer)
    {
        $this->singer = $singer;

        return $this;
    }

    /**
     * Get singer
     *
     * @return string
     */
    public function getSinger()
    {
        return $this->singer;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Playlist
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Playlist
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set duration
     *
     * @param string $duration
     * @return Playlist
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Playlist
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Playlist
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $em
     * @param $field
     * @return array
     */
    public static function getDistinctField($em, $field)
    {
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT DISTINCT `$field` FROM `playlist` ORDER BY $field");
        $statement->execute();
        return $statement->fetchAll();
    }

}
