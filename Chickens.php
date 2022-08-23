<?php

//Класс Курица, с возвращением рандомного ресурса с животного
class Chickens extends Factory implements Animal{

    public function random() {
        return rand(0,1);
    }

    public function create($count){
        for($i = 1;$i<=$count;$i++){
            $this->idAnimal=parent::$id++;
            $this->barn[]= $this->idAnimal;
        }
        Chickens::printCount();
    }

    public function printCount() {
        $barn = $this->barn;
        //print_r($barn);
        echo "Куриц в хлеву: ".count($barn)."<br>";
    }

    public function getResurses(){
        $barn = $this->barn;
        $this->resurses = 0;

        for($i=1; $i<=7; $i++) {
            //собираем с куриц ресурсы за день
            foreach ($barn as $value) {
                $random = new Chickens;
                $random = $random->random();
                $this->resurses += $random;
            }
        }
        echo "Собрано за неделю: Яиц = ".$this->resurses."<br>";
    }
}