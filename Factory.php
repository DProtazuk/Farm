<?php

//Класс Фабрика, где перебирает какой именно клас животного нужен и возвращает его
//Для добавления нового животного(класса животного) достаточно добавить еще одно условие "case" с названием класса
class Factory
{
    // Статическая переменая для хранения ключа
    static $id = 1;
    // номер животного
    public $idAnimal=1;
    //массив для хранения уникальных id животных
    protected $barn;
    //регистрация переменной рандомного добывания ресурсов
    protected $random;
    //регистрируем переменную ресурсы
    protected $resurses = 0;

    public function select($animals) {
        switch($animals){
            case "Chickens": return new Chickens;
            case "Cow": return new Cow;
            default: throw new Exception("Error animal");
        }
    }
}