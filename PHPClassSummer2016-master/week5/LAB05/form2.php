<form method="get">
    <fieldset>
        <legend>Search</legend>
        <label>Search</label>
        <input name="search" type="search" class="form-control" placeholder="Search...." value="<?php echo filter_input(INPUT_GET, 'search'); ?>" />
        <br>
        <br>
        <input class="btn btn-primary" type="submit" value="Submit" />
        <a  class="btn btn-default" href="view-search.php">Reset</a>

    </fieldset>            
</form>
<br>