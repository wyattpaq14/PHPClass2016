<script type="text/javascript" src="js/init.js"></script>
<form method="POST">
    <fieldset>
        <div class="input-field col s12">
            <select name="selectedOption">
                <option value="" disabled selected>Choose your option</option>
                <?php foreach ($URLs as $URL): ?>
                    <option value="<?php echo $URL['site']; ?>"><?php echo $URL['site']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="action" value="Submit2" />
            <input class="waves-effect waves-light btn blue" style="width: 100%;" type="submit" value="Submit" />
        </div>
    </fieldset>
</form>
