<?php
class Product {
    public $name;
    public $price;
    public $brand;
    public $image;
    public $description;
    public $tax;

    // Method to get the product name
    public function getName() {
        return $this->name;
    }

    // Method to calculate price after discount
    public function priceAfterDiscount($discount) {
        return $this->price - ($this->price * ($discount / 100));
    }

    // Method to get final price after adding tax
    public function getFinalPrice($discount) {
        $discountedPrice = $this->priceAfterDiscount($discount);
        return $discountedPrice + ($discountedPrice * ($this->tax / 100));
    }
}

// Create three product objects and assign values manually
$product1 = new Product();
$product1->name = "Laptop";
$product1->price = 1000;
$product1->brand = "Dell";
$product1->image = "laptop.jpg";
$product1->description = "High-performance laptop";
$product1->tax = 10;

$product2 = new Product();
$product2->name = "Smartphone";
$product2->price = 800;
$product2->brand = "Samsung";
$product2->image = "phone.jpg";
$product2->description = "Latest smartphone model";
$product2->tax = 12;

$product3 = new Product();
$product3->name = "Headphones";
$product3->price = 150;
$product3->brand = "Sony";
$product3->image = "headphones.jpg";
$product3->description = "Noise-cancelling headphones";
$product3->tax = 8;

// Display data in Bootstrap cards
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <div class="row">
            <?php foreach ([$product1, $product2, $product3] as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="images/<?= $product->image ?>" class="card-img-top" alt="<?= $product->getName() ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product->getName() ?></h5>
                            <p class="card-text"><?= $product->description ?></p>
                            <p>Brand: <?= $product->brand ?></p>
                            <p>Price After Discount: $<?= $product->priceAfterDiscount(20) ?></p>
                            <p>Final Price (with Tax): $<?= $product->getFinalPrice(20) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
