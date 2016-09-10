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
        <div class="input-field col s6">
            <input id="first_name" type="text" name="itemname">
            <label for="first_name">Item Name</label>
        </div>
        <div class="input-field col s6">
            <input id="last_name" type="text" name="price">
            <label for="last_name">Item Price</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <select>
                <?php foreach ($allCategories as $Categories): ?>

                    <option value="<?php echo $Categories['category']; ?>"><?php echo $Categories['category']; ?></option>

                <?php endforeach; ?>
            </select>
            <label>Choose a category</label>
        </div>
    </div>








    <div class="file-field input-field">
        <div class="btn red">
            <span>Image</span>
            <input type="file">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path" type="text">
        </div>
    </div>

    <input type="hidden" name="action" value="add_ii" />
    <button type="submit" class="waves-effect waves-light btn-large red" value="add_ii" style="width:100%; margin:0 auto;">Add Item</button>

</form>