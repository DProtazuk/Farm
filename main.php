<?php
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}
autoload("Factory");
autoload("Cow");
autoload("Chickens");



//интерфейс для животных
interface Animal {
    public function random();
    public function create($count);
    public function printCount();
    public function getResurses();
}

//главный класс Ферма где создается фабрика
class Farm {

    public function createFactory() {
        return new Factory();
    }
}

//Создаем объект фермы
$Farm = new Farm();
//Создаем объект фабрики
$Factory = $Farm->createFactory();

//С фабрики вытаскиваем нужное животное, в данном случае Курицу
$Chickens = $Factory->select(Chickens);
//С фабрики вытаскиваем нужное животное, в данном случае Корову
$Cow = $Factory->select(Cow);

//добавляем в ферму столько куриц сколько нужно, по условию 20
$Chickens->create(20);
//добавляем в ферму столько коров сколько нужно, по условию 10
$Cow->create(10);

//выводим ресурсы
$Cow->getResurses();
$Chickens->getResurses();

echo"<br><br>";

$Chickens->create(5);
$Cow->create(1);

$Cow->getResurses();
$Chickens->getResurses();
