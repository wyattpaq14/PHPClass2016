<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<ul class="collection with-header">
    <li class="collection-header"><h5>Choose you desired function! </h5></li>
</ul>


<form action="#" method="post">


    <div class="input-field col s12">
        <select name="adminselect">
            <optgroup label="Add">
                <option value="add_c">Category</option>
                <option value="add_i">Item</option>
            </optgroup>
            <optgroup label="Edit">
                <option value="edit_c">Category</option>
                <option value="edit_i">Item</option>
            </optgroup>
            <optgroup label="Remove">
                <option value="remove_i">Item</option>
            </optgroup>
        </select>

    </div>


    <input type="hidden" name="action" value="Submit1" />
    <button type="submit" class="waves-effect waves-light btn-large red" value="Submit1" style="width:100%; margin:0 auto;">Continue</button>
</div>
<br><br>
<?php $selectAction = filter_input(INPUT_POST, 'adminselect') ?>

</form>