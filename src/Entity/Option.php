<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Answer;
/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Option
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Answer", inversedBy="options")
     * 
     */
    private $answer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $optionStatement;

    /**
     * @return Answer
     */
    public function getAnswer(){
        return $this->answer;
    }


    /**
     * @var Answer
     * @return Option
     */
    public function setAnswer($answer){
        $this->answer = $answer;
        return $this;
    }

    public function getOptionStatement(): ?string
    {
        return $this->optionStatement;
    }

    public function setOptionStatement(string $optionStatement): self
    {
        $this->optionStatement = $optionStatement;

        return $this;
    }
}