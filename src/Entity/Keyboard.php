<?php

namespace App\Entity;

use App\Repository\KeyboardRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KeyboardRepository::class)]
class Keyboard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $word = null;

    #[ORM\Column(length: 255)]
    private ?string $combinations = null;

    #[ORM\Column(nullable:true)]
    private ?int $decodedWord = null;

    public function __construct(){
        $this->combinations = json_encode([
            '1' => [],
            '2' => ['a', 'b', 'c'],
            '3' => ['d', 'e', 'f'],
            '4' => ['g', 'h', 'i'],
            '5' => ['j', 'k', 'l'],
            '6' => ['m', 'n', 'o'],
            '7' => ['p', 'q', 'r', 's'],
            '8' => ['t', 'u', 'v'],
            '9' => ['w', 'x', 'y', 'z'],
            '0' => [' ']
        ]);

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWord(): ?string
    {
        return $this->word;
    }

    public function setWord(string $word): static
    {
        $this->word = $word;

        return $this;
    }

    public function getCombinations(): ?string
    {
        return $this->combinations;
    }

    public function setCombinations(string $combinations): static
    {
        $this->combinations = $combinations;

        return $this;
    }

    public function getDecodedWord(): ?int
    {
        return $this->decodedWord;
    }

    public function setDecodedWord(string $word, array $combinations)
    {
        $wordLen = strlen($word);

        $result ='';

        for($i=0; $i<$wordLen;$i++){

            foreach($combinations AS $key => $arr){

                foreach($arr AS $k => $val){
                    if($val==$word[$i]) {
                        for($l=0; $l<=$k; $l++){
                            $result .= $key;
                        }
                    }
                }

            }

        }

        $this->decodedWord =  $result;

        return $this;
    }
}
