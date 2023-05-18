<?php
class Animal {
    protected $nama;
    protected $jenis;

    public function __construct($nama, $jenis) {
        $this->nama = $nama;
        $this->jenis = $jenis;
    }

    public function getInfo() {
        return "Hewan ini adalah " . $this->nama . " jenis " . $this->jenis . ".";
    }
}

class Cat extends Animal {
    public function __construct($nama) {
        parent::__construct($nama, "kucing");
    }

    public function getInfo() {
        return "Hewan ini adalah " . $this->nama . " jenis " . $this->jenis . ". Kucing adalah hewan yang suka bermain dan bersih.";
    }
}

class Dog extends Animal {
    public function __construct($nama) {
        parent::__construct($nama, "anjing");
    }

    public function getInfo() {
        return "Hewan ini adalah " . $this->nama . " jenis " . $this->jenis . ". Anjing adalah hewan yang setia dan cerdas.";
    }
}

$animal = new Animal("Harimau", "karnivora");
echo $animal->getInfo() . "<br>"; // Output: Hewan ini adalah Harimau jenis karnivora.

$cat = new Cat("Kitty");
echo $cat->getInfo() . "<br>"; // Output: Hewan ini adalah Kitty jenis kucing. Kucing adalah hewan yang suka bermain dan bersih.

$dog = new Dog("Buddy");
echo $dog->getInfo() . "<br>"; // Output: Hewan ini adalah Buddy jenis anjing. Anjing adalah hewan yang setia dan cerdas.

?>