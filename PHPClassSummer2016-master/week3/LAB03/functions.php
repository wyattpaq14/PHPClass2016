<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function getRecord($id) {
    $db = getDatabase();
    $stmt = $db->prepare("SELECT * FROM corps where id = :id");
    $binds = array(
        ":id" => $id
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $results;
}

function updateRecord($id, $corp, $incorp_dt, $email, $zipcode, $owner, $phone) {
    $db = getDatabase();
    $stmt = $db->prepare("UPDATE corps set corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");

    $binds = array(
        ":id" => $id,
        ":corp" => $corp,
        ":incorp_dt" => $incorp_dt,
        ":email" => $email,
        ":zipcode" => $zipcode,
        ":owner" => $owner,
        ":phone" => $phone
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {

        return true;
    } else {
        return false;
    }
}
