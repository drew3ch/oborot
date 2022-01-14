<?php
// Класс количества животных
class Animal
{
    public $countCaw;
    public $countChicken;
    public function __construct($countCaw, $countChicken) // __construct дает возможность проинициализировать класс
    {
        $this->countCaw = $countCaw;
        $this->countChicken = $countChicken;
    }
}

// У каждой коровы есть уникальный регистрационный номер.
// Корова может давать 8-12 литров молока за один надой;
class Caw
{
    public $id;
    public $milk;
    public function __construct()
    {
        $this->id = mt_rand();
        $this->milk = rand(8, 12);
    }
}

// У каждой курицы есть уникальный регистрационный номер.
// Курица может нести 0-1 яйцо за одну кладку;
class Chicken
{
    public $id;
    public $eggs;
    public function __construct()
    {
        $this->id = mt_rand();
        $this->eggs = rand(0, 1);
    }
}

// В хлеву живут 7 коров и 15 кур;
class Shed
{
    public $animal;
    public $getMilk;
    public $getEggs;
    public function __construct()
    {
        $this->animal = new Animal(7, 15);
    }
    public function returnMilk()
    {
        for ($i = 0; $i < $this->animal->countCaw; $i++)
        {
            $newCaw = new Caw;
            $this->getMilk += $newCaw->milk;
        }
        echo $this->getMilk;
    }
    public function returnEggs()
    {
        for ($i = 0; $i < $this->animal->countChicken; $i++)
        {
            $newChicken = new Chicken;
            $this->getEggs += $newChicken->eggs;
        }
        echo $this->getEggs;
    }
}

$newShed = new Shed;
echo $newShed->returnMilk() . " литров молока надоено.<br>";
echo $newShed->returnEggs() . " штук яиц собрано.";
?>