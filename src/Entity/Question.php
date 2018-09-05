<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
    private $Question;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Psychotest", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Psychotest;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Response", mappedBy="Question", orphanRemoval=true)
     */
    private $responses;

    public function __construct()
    {
        $this->responses = new ArrayCollection();
    }
    
    public function __toString() 
    {
        return $this->getQuestion();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->Question;
    }

    public function setQuestion(string $Question): self
    {
        $this->Question = $Question;

        return $this;
    }

    public function getPsychotest(): ?Psychotest
    {
        return $this->Psychotest;
    }

    public function setPsychotest(?Psychotest $Psychotest): self
    {
        $this->Psychotest = $Psychotest;

        return $this;
    }

    /**
     * @return Collection|Response[]
     */
    public function getResponses(): Collection
    {
        return $this->responses;
    }

    public function addResponse(Response $response): self
    {
        if (!$this->responses->contains($response)) {
            $this->responses[] = $response;
            $response->setQuestion($this);
        }

        return $this;
    }

    public function removeResponse(Response $response): self
    {
        if ($this->responses->contains($response)) {
            $this->responses->removeElement($response);
            // set the owning side to null (unless already changed)
            if ($response->getQuestion() === $this) {
                $response->setQuestion(null);
            }
        }

        return $this;
    }
}
