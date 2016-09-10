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
            <select>
                <?php foreach ($allCategories as $Categories): ?>

                    <option value="<?php echo $Categories['category']; ?>"><?php echo $Categories['category']; ?></option>

                <?php endforeach; ?>
            </select>
            <label>Choose a category</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="email" type="email" name="catName">
            <label for="email">Category Name</label>
        </div>
    </div>

    <input type="hidden" name="action" value="edit_cc" />
    <button type="submit" class="waves-effect waves-light btn-large red" value="edit_cc" style="width:100%; margin:0 auto;">Change Name</button>

</form>





