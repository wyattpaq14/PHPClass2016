<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$action = filter_input(INPUT_POST, 'action');

function verifyLogin($dbEmail, $username, $dbPassword, $password) {

    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        if ($dbEmail == $username && $dbPassword == $password) {
            return true;
        } else {
            return false;
        }
    } else {
        echo "email validation failed!";
    }
}

function verifyName($fname, $lname) {

    if (!empty($fname) && !empty($lname)) {
        return true;
    } else {
        return false;
    }
}

function getName() {

    $db = getDatabase();
    $userid = $_SESSION["uid"];
    //switch to binds!!!!!!!
    $stmt = $db->prepare("SELECT fname, lname FROM users WHERE user_id = :user_id");

    $binds = array(
        ":user_id" => $userid
    );

    $names = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $names = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    foreach ($names as $name) {
        $fname = $name['fname'];
        $lname = $name['lname'];
    }

    return $fname . " " . $lname;
}

function getLoginState() {
    if ($_SESSION["login"]) {
        return true;
    } else if (empty($_SESSION["login"])){
        header("Location: login.php");
        
        return false;
    }
}

function getItems() {

    $db = getDatabase();

    //Gets form input
    //$sortWay = filter_input(INPUT_GET, 'sort');
    //$sortColumn = filter_input(INPUT_GET, 'column');
    //Ran into problem where form values wouldn't be valid causing stmt to be false

    $stmt = $db->prepare("SELECT * FROM products");



    $items = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $items;
}

function getCategories() {
    $db = getDatabase();

    //Gets form input
    //$sortWay = filter_input(INPUT_GET, 'sort');
    //$sortColumn = filter_input(INPUT_GET, 'column');
    //Ran into problem where form values wouldn't be valid causing stmt to be false

    $stmt = $db->prepare("SELECT * FROM categories");



    $allCategories = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $allCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $allCategories;
}

function getItemsByCategory($id) {
    $items = getItems();
    $cart = [];
    foreach ($items as $product) {
        if ($product['category_id'] == $id) {
            $cart[] = $product;
        }
    }
    return $cart;
}

function emptyCart() {
    unset($_SESSION['cart']);
}

function startCart() {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
}

function getCart() {
    return $_SESSION['cart'];
}

function cartCount() {
    return count(getCart());
}

function addToCart($id) {
    $items = getItems();

    foreach ($items as $product) {
        if ($product['product_id'] == $id) {
            $_SESSION['cart'][] = $product;
            break;
        }
    }
}

function getCartTotal() {
    $items = getCart();
    $total = 0;
    foreach ($items as $product) {
        $total += $product['price'];
    }
    return $total;
}
