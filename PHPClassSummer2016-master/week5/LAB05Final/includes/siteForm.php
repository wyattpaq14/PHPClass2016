<script type="text/javascript" src="js/init.js"></script>
<form method="POST">
    <fieldset>
        <legend>Search</legend>
        <label>Search</label>
        <input name="search" type="search" class="form-control" placeholder="Search...." value="<?php echo filter_input(INPUT_GET, 'search'); ?>" />
        <br>
        <label>Column Name</label>
        <br><br>
        <input type="hidden" name="action" value="Submit2" />
        <input class="btn btn-primary" type="submit" value="Submit" />
        <a  class="btn btn-default" href="view-action.php">Reset</a>

    </fieldset>            
</form>
<br>