<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$action = filter_input(INPUT_POST, 'action');
$edit_iiSelect = filter_input(INPUT_POST, 'edit_iiSelect');

function saveCart() {
    $db = getDatabase();
    $sCart = serialize($_SESSION['cart']);

    $userid = $_SESSION["uid"];
    $stmt = $db->prepare("UPDATE users SET cart = :cart WHERE user_id = :user_id");

    $binds = array(
        ":user_id" => $userid,
        ":cart" => $sCart
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function removeProductDB($identity) {

    $db = getDatabase();

    $id = $identity;

    $stmt = $db->prepare("DELETE FROM products where product_id = :id");

    $binds = array(
        ":id" => $id
    );

    $isDeleted = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $isDeleted = true;
    }

    if ($isDeleted) {
        echo "Item Deleted!";
    }
}

function getItemInformation($edit_iiSelect) {

    $db = getDatabase();


    $stmt = $db->prepare("SELECT * FROM products WHERE product = :product");


    $binds = array(
        ":product" => $edit_iiSelect
    );





    $itemInfo = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $itemInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $itemInfo;
}

function retreiveCart() {

    $db = getDatabase();
    $userid = $_SESSION["uid"];

    $stmt = $db->prepare("SELECT cart FROM users WHERE user_id = :user_id");

    $binds = array(
        ":user_id" => $userid
    );

    $cart = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    foreach ($cart as $carts) {
        $_SESSION['cart'] = $carts['cart'];
    }

    $_SESSION['cart'] = unserialize($_SESSION['cart']);
    if ($_SESSION['cart'] == "") {
        unset($_SESSION['cart']);
        return false;
    } else {
        return $_SESSION['cart'];
    }
}

function isAdmin() {
    $db = getDatabase();
    $userid = $_SESSION["uid"];

    $stmt = $db->prepare("SELECT admin FROM users WHERE user_id = :user_id");

    $binds = array(
        ":user_id" => $userid
    );
    $admin = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $admin = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    foreach ($admin as $admins) {
        $isAdmin = $admins['admin'];
    }

    return $isAdmin;
}

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
    } else if (empty($_SESSION["login"])) {
        header("Location: login.php");

        return false;
    }
}

function getItems() {

    $db = getDatabase();

    $stmt = $db->prepare("SELECT * FROM products");



    $items = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $items;
}

function getCategories() {
    $db = getDatabase();


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
    $_SESSION['cart'] = "";
    saveCart();
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
            saveCart();
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
