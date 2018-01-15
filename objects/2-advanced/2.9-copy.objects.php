<?php
class Product {
    private $name;
    private $price;
    private $id;
    public $account;

    public function __construct(string $name, float $price, Account $account) {
        $this->name = $name;
        $this->price = $price;
        $this->account = $account;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function __clone() {
        $this->id = 0;
        $this->account = clone $this->account;
    }
}

class Account {
    public $balance;

    public function __construct(float $balance) {
        $this->balance = $balance;
    }
}

$p1 = new Product("Computer", 2000, new Account(100));
$p1->setId(210);
var_dump($p1);
$p2 = clone $p1;
$p2->account->balance += 10;
var_dump($p2);