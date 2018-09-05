<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRepository")
 */
class Score
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Response", inversedBy="scores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Response;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Element", inversedBy="scores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Element;

    /**
     * @ORM\Column(type="integer")
     */
    private $Points;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResponse(): ?Response
    {
        return $this->Response;
    }

    public function setResponse(Response $Response): self
    {
        $this->Response = $Response;

        return $this;
    }

    public function getElement(): ?Element
    {
        return $this->Element;
    }

    public function setElement(?Element $Element): self
    {
        $this->Element = $Element;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->Points;
    }

    public function setPoints(int $Points): self
    {
        $this->Points = $Points;

        return $this;
    }
}
