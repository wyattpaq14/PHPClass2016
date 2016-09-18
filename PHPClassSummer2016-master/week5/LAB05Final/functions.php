<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
include './dbconnect.php';

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function getSiteOutput($url) {
    $curl = curl_init();

    // set url 
    curl_setopt($curl, CURLOPT_URL, $url);

    //return the transfer as a string 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string 
    $output = curl_exec($curl);

    // close curl resource to free up system resources 
    curl_close($curl);

    return $output;
}

function collectLinks($output) {
    $newRegex = "/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/";

    preg_match_all($newRegex, $output, $linkMatches); //gets html

    $removeDuplicates = array_unique($linkMatches[0]); //arrayunique removes duplicates

    return $removeDuplicates;
}

function insertSite($url, $links) {
    $db = getDatabase();



    $stmt = $db->prepare("INSERT INTO sites SET site = :link, date = NOW()");

    $site_id = $db->lastInsertId();


    $binds = array(
        ":link" => $url
    );


    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = 'Site Added';


        $site_id = $db->lastInsertId();


        $stmt = $db->prepare("INSERT INTO sitelinks SET link = :link, site_id = :site_id");

        foreach ($links as $link) {
            $binds = array(":link" => $link,
                ":site_id" => $site_id
            );
            $stmt->execute($binds);
        }
    } else {
        $result = 'Site Not Added';
    }
}
