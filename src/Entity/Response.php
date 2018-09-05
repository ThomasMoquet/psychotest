<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResponseRepository")
 */
class Response
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Response;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="responses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Question;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Score", mappedBy="Element", orphanRemoval=true)
     */
    private $scores;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
    }
    
    public function __toString() 
    {
        return $this->getResponse();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResponse(): ?string
    {
        return $this->Response;
    }

    public function setResponse(string $Response): self
    {
        $this->Response = $Response;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->Question;
    }

    public function setQuestion(?Question $Question): self
    {
        $this->Question = $Question;

        return $this;
    }

    /**
     * @return Collection|Score[]
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(Score $score): self
    {
        if (!$this->scores->contains($score)) {
            $this->scores[] = $score;
            $score->setElement($this);
        }

        return $this;
    }

    public function removeScore(Score $score): self
    {
        if ($this->scores->contains($score)) {
            $this->scores->removeElement($score);
            // set the owning side to null (unless already changed)
            if ($score->getElement() === $this) {
                $score->setElement(null);
            }
        }

        return $this;
    }
}
