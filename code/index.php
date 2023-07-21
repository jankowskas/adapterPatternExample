<?php
    declare(strict_types=1);

    interface Feline {
        public function purr(): string;
    }

    interface Canis {
        public function tailWag(): string;
    }

    class Cat implements Feline
    {
        public function purr(): string
        {
            return "\nPurr purr I am a happy cat!\n";
        }
    }

    class Dog implements Canis
    {
        public function tailWag(): string
        {
            return "\nWoof woof I am happy dog!\n";
        }
    }

    class FelineToCanineAdapter implements Canis
    {
        private Feline $cat;

        public function __construct(Feline $cat)
        {
            $this->cat = $cat;
        }

        public function tailWag(): string
        {
            return $this->cat->purr();
        }
    }

    function pet(Canis $pies): string {
        return $pies->tailWag();
    }

    $kot = new Cat();
    $piesAdapter = new FelineToCanineAdapter($kot);

    echo pet($piesAdapter);

    //Conclusion: function pet only allows for dogs but with the Adapter Pattern I can pet a cat with this function
