<?php

abstract class Moto{

    public $hp, $model;
    protected $engine_type, $hp_type;
    private $_color, $brand;

    public function __construct($params){
        list($this->brand, $this->model, $color, $this->hp) = $params;
        $this->set_color($color);
    }

    private function set_color($color){
        $colors_available = ['red', 'yellow', 'blue', 'green', 'grey', 'black', 'white'];
        if (in_array($color, $colors_available)) {
            $this->_color = $color;
            return true;
        } else {
            return false;
        }
    }


    public function __get($name){
        echo "Oбращаемся к свойству $name -";
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
        echo "Свойству $name присвоино значение $value";
    }

    public function info(){
        return
            "У нас есть " . $this->brand . ' ' . $this->model . '. ' .
            "Цвет " . $this->_color . '. ' .
            "Тип двигателя " . $this->engine_type . ' ' .
            "Мощность " . $this->get_hp() . "\n";

    }

    public function get_hp(){
        return $this->hp . $this->hp_type. "\n";
    }


    public function __invoke(){
        return print($this);
    }

    public function __unset($name){
        echo "Удаление свойства $name \n";
        $this->$name = null;
    }
}


class Legend_moto extends Moto {

    protected $engine_type = "Бензин";
    protected $hp_type = "0.5 Л.С";

}

class Classic_moto extends Moto {

    protected $engine_type = "Бензин";
    protected $hp_type = "48 Л.С";

}

class Moped extends Moto {

    protected $engine_type = "Електро";
    protected $hp_type = "800 Вт";

}

class Atv extends Moto {

    protected $engine_type = "Бензин ";
    protected $hp_type = "78 Л.С";

}

$daimler = new Legend_moto(array("Daimler", "Reitwagen", "brown"));
$honda = new Classic_moto(array("Honda", "CB500F", "blue"));
$yamaha = new Moped(array("yamaha", "job sa16j", "white"));
$spark = new Atv(array("Kawasaki", "Brute", "red"));

$moto = [$daimler, $honda, $yamaha, $spark];

foreach ($moto as $item){
    echo $item->info()."<br>";
}

?>