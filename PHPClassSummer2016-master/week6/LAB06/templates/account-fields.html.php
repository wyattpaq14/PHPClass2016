<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<ul class="collection with-header">
    <li class="collection-header"><h3>Hello, <?php echo getName(); ?> </h3></li>
</ul>
<ul class="collection with-header">
    <li class="collection-header"><h5>To change your account information, please fill out all of the fields! </h5></li>
</ul>


<form action="#" method="post">
    <?php include_once './templates/form2.php'; ?>
    <?php include_once './templates/form1.php'; ?>


    <input type="hidden" name="action" value="Submit1" />
    <button type="submit" class="waves-effect waves-light btn-large red" value="Submit1" style="width:100%; margin:0 auto;">Register</button>
</div>
<br><br>

</form>