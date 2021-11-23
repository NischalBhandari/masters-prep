<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Question;
use App\Entity\Option;
/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Question", inversedBy="answer")
     */
    private $question;

    /**
     * @ORM\Column(type="boolean")
     */
    private $multipleChoice;

    /**
     * @ORM\OneToMany(targetEntity="Option", mappedBy="answer")
     */
    private $options;


    public function __construct(){
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Question
     */
    public function getQuestion(){
        return $this->question;
    }
    
    /**
     * @param Question
     * @return Answer
     */
    public function setQuestion($question){
        $this->question = $question;
        return $this;
    }

    public function getOptions(){
        return $this->options;
    }

    public function addOption(Option $option){
        if(!$this->options->contains($option)){
            $this->options[] = $option;
            $option->setAnswer($this);
        }
        return $this;
    }

    public function isMultipleChoice(): ?bool
    {
        return $this->multipleChoice;
    }

    public function setMultipleChoice(bool $multipleChoice): self
    {
        $this->multipleChoice = $multipleChoice;

        return $this;
    }

    public function removeOption(Option $option): self
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getAnswer() === $this) {
                $option->setAnswer(null);
            }
        }

        return $this;
    }
}
