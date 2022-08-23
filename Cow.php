<?php

//Класс Корова, с возвращением рандомного ресурса с животного
class Cow extends Factory implements Animal{

    public function random() {
        return rand(8,12);
    }

    public function create($count){
        for($i = 1;$i<=$count;$i++){
            $this->idAnimal=parent::$id++;
            $this->barn[]= $this->idAnimal;
        }
        Cow::printCount();
    }

    public function printCount() {
        $barn = $this->barn;
        //print_r($barn);
        echo "Коров в хлеву: ".count($barn)."<br>";
    }

    public function getResurses(){
        $barn = $this->barn;
        $this->resurses = 0;
        for($i=1; $i<=7; $i++) {
            //собираем с куриц ресурсы за день
            foreach ($barn as $value) {
                $random = new Cow;
                $random = $random->random();
                $this->resurses += $random;
            }
        }
        echo "Собрано за неделю: Молока = ".$this->resurses."<br>";
    }
}