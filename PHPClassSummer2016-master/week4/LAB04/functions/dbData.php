<?php

function getAllCorpData() {

    $db = dbconnect();

    //Gets form input
    $sortWay = filter_input(INPUT_GET, 'sort');
    $sortColumn = filter_input(INPUT_GET, 'column');

    //Ran into problem where form values wouldn't be valid causing stmt to be false
    if ($sortWay == NULL || $sortColumn == NULL) {
        $stmt = $db->prepare("SELECT * FROM corps");
    } else if ($sortWay == NULL && $sortColumn !== NULL) {
        $stmt = $db->prepare("SELECT * FROM corps GROUP BY $sortColumn");
    } else {
        $stmt = $db->prepare("SELECT * FROM corps GROUP BY $sortColumn $sortWay");
    }

    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function searchCorps() {


    $db = dbconnect();
    $searchWord = filter_input(INPUT_GET, 'search');
    $column = filter_input(INPUT_GET, 'colmunSearch');
    $search = '%' . $searchWord . '%';

    //Ran into problem where form values wouldn't be valid causing stmt to be false
    if ($searchWord == NULL || $column == NULL) {
        $stmt = $db->prepare("SELECT * FROM corps");
    } else {
        $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search");
        $binds = array(
            ":search" => $search
        );
        var_dump($stmt);
    }

    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

//Function to determine wether or not we are using sort or search

function checkSubmit() {
    $action = filter_input(INPUT_GET, 'action');

    if ($action == "Submit2") {
        return true;
    } else {
        return false;
    }
}

//Created function to count the number of rows

function resultCount($rowCount) {
    if ($rowCount == 0) {
        return "No results found!";
    } else if ($rowCount > 0) {
        return $rowCount . " rows found!";
    }
}
