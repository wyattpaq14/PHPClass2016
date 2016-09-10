
<?php $itemInfo = getItemInformation($edit_iiSelect); ?>


<br>
<form action="#" method="post" class="col s12">

    <div class="row">
        <div class="row">
            <div class="input-field col s6">
                <input value="<?php echo $itemInfo['product']; ?>" id="first_name" type="text">
                <label for="first_name">Item Name</label>
            </div>
            <div class="input-field col s6">
                <input value="<?php echo $itemInfo['price']; ?>" id="last_name" type="text">
                <label for="last_name">Price</label>
            </div>
        </div>


        <div class="file-field input-field">
            <div class="btn red">
                <span>Image</span>
                <input value="<?php echo $itemInfo['image']; ?>" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path" type="text">
            </div>
        </div>





        <input type="hidden" name="action" value="edit_ii" />
        <button type="submit" class="waves-effect waves-light btn-large red" value="edit_ii" style="width:100%; margin:0 auto;">Submit Changes</button>

</form>