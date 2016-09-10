<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function getSites() {


    $db = getDatabase();
    $searchWord = filter_input(INPUT_GET, 'search');
    $search = '%' . $searchWord . '%';



    if (!isset($searchWord)) {
        $search = '%' . '' . '%';
    }

    $stmt = $db->prepare("SELECT * FROM sites WHERE site LIKE :search");


    $binds = array(
        ":search" => $search
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

//Created function to check for duplicate records in the database
function dupeCheck($linkboxx) {

    $db = getDatabase();

    $stmt = $db->prepare("SELECT * FROM sites WHERE site LIKE :search");


    $binds = array(
        ":search" => $linkboxx
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($stmt->rowCount() == 0) {
        return 0;
    } else if ($stmt->rowCount() > 0) {
        return 1;
    }
}

//Created function to validate URLs that were being entered
function validateRegex() {

    $linkboxx = filter_input(INPUT_GET, 'linkbox');
    if (isset($linkboxx)) {
        $siteRegex = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';

        preg_match_all($siteRegex, $linkboxx, $siteMatches);

        $removeDuplicates = array_unique($siteMatches[0]);
        if (!empty($removeDuplicates)) {
            return $removeDuplicates[0];
        } else {
            return false;
        }
    } else {
        
    }
}

function statusCheck($linkboxx) {
    if (validateRegex() !== false && dupeCheck($linkboxx) == 0 && isset($linkboxx)) {
        echo "<br><b>URL Added</b><br>";
    } else {
        echo "<br><b>URL not added!</b><br>";
    }
}

//Created a function to repopulate the text field
function repopulateField($linkboxx) {
    if (isset($linkboxx)) {
        if (dupeCheck($linkboxx) == 0 || !empty(validateRegex())) {

            return $linkboxx;
        }
    } else {
        
    }
}
