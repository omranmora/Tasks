<?php

class Product {
    // Properties
    protected $name;
    protected $price;
    protected $description;
    protected $image;

    // Constructor
    public function __construct($name, $price, $description, $image) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    // Method to upload an image
    public function uploadImage() {
        echo "Image for {$this->name} uploaded successfully.<br>";
    }

    // Method to calculate price
    public function calcPrice() {
        return $this->price;
    }

    // Method to display product info
    public function displayInfo() {
        echo "<strong>Product Name:</strong> {$this->name}<br>";
        echo "<strong>Price:</strong> {$this->price}$<br>";
        echo "<strong>Description:</strong> {$this->description}<br>";
        echo "<strong>Image:</strong> {$this->image}<br>";
    }
}

// Book class inheriting from Product
class Book extends Product {
    protected $publishers = [];
    protected $writer;
    protected $color;
    protected $supplier;

    public function __construct($name, $price, $description, $image, $writer, $color, $supplier) {
        parent::__construct($name, $price, $description, $image);
        $this->writer = $writer;
        $this->color = $color;
        $this->supplier = $supplier;
    }

    public function choosePublisher($publisher) {
        $this->publishers[] = $publisher;
    }

    public function setPublisher($publisher) {
        if (!in_array($publisher, $this->publishers)) {
            $this->publishers[] = $publisher;
        }
    }

    public function showAllPublishers() {
        echo "<strong>Publishers:</strong> " . implode(", ", $this->publishers) . "<br>";
    }
}

// BabyCar class inheriting from Product
class BabyCar extends Product {
    protected $age;
    protected $weight;
    protected $materials = [];
    protected $specialTax;

    public function __construct($name, $price, $description, $image, $age, $weight, $materials, $specialTax) {
        parent::__construct($name, $price, $description, $image);
        $this->age = $age;
        $this->weight = $weight;
        $this->materials = $materials;
        $this->specialTax = $specialTax;
    }

    public function displayMaterials() {
        echo "<strong>Materials:</strong> " . implode(", ", $this->materials) . "<br>";
    }

    public function getFinalPrice() {
        return $this->price + ($this->price * $this->specialTax / 100);
    }
}

// Creating objects and testing the classes
$book = new Book("PHP for Beginners", 20, "A complete guide to PHP", "php_book.jpg", "John Doe", "Blue", "ABC Publishers");
$book->choosePublisher("ABC Publishers");
$book->choosePublisher("XYZ Publishers");
$book->displayInfo();
$book->showAllPublishers();

echo "<hr>";

$babyCar = new BabyCar("Baby Racer", 100, "A safe and fun baby car", "baby_car.jpg", 2, 5, ["Plastic", "Metal"], 10);
$babyCar->displayInfo();
$babyCar->displayMaterials();
echo "<strong>Final Price:</strong> " . $babyCar->getFinalPrice() . "$<br>";

?>
