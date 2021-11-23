<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $questionStatement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $questionLevel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $questionGroup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionStatement(): ?string
    {
        return $this->questionStatement;
    }

    public function setQuestionStatement(string $questionStatement): self
    {
        $this->questionStatement = $questionStatement;

        return $this;
    }

    public function getQuestionLevel(): ?int
    {
        return $this->questionLevel;
    }

    public function setQuestionLevel(?int $questionLevel): self
    {
        $this->questionLevel = $questionLevel;

        return $this;
    }

    public function getQuestionGroup(): ?string
    {
        return $this->questionGroup;
    }

    public function setQuestionGroup(string $questionGroup): self
    {
        $this->questionGroup = $questionGroup;

        return $this;
    }
}
