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
        <select name="edit_iiSelect">
            <?php foreach ($items as $item): ?>

            <option value="<?php echo $item['product']; ?>"><?php echo $item['product']; ?></option>

            <?php endforeach; ?>
        </select>
        <label>Choose an item</label>
    </div>
</div>


    <input type="hidden" name="action" value="edit_ii" />
    <button type="submit" class="waves-effect waves-light btn-large red" value="edit_ii" style="width:100%; margin:0 auto;">Edit</button>

</form>