<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<br>
<form action="#" method="post">
    <div class="row">
        <div class="input-field col s12">
            <input id="first_name" type="text" name="catname">
            <label for="first_name">Category Name</label>
        </div>
    </div>

    <input type="hidden" name="action" value="add_cc" />
    <button type="submit" class="waves-effect waves-light btn-large red" value="add_cc" style="width:100%; margin:0 auto;">Add Category</button>
    <?php $catNam = filter_input(INPUT_POST, 'catname') ?>
</form>