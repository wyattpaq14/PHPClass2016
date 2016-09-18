<form method="get">
    <fieldset>
        <legend>Search</legend>
        <label>Search</label>
        <input name="search" type="search" class="form-control" placeholder="Search...." value="<?php echo filter_input(INPUT_GET, 'search'); ?>" />
        <br>
        <label>Column Name</label>
        <select class="form-control" name="colmunSearch">
            <option value="id">ID</option>
            <option value="corp">Corporation</option>
            <option value="incorp_dt">Incorporation Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zip Code</option>
            <option value="owner">Owner Name</option>
            <option value="phone">Phone Number</option>
        </select>
        <br><br>
        <input type="hidden" name="action" value="Submit2" />
        <input class="btn btn-primary" type="submit" value="Submit" />
        <a  class="btn btn-default" href="view-action.php">Reset</a>

    </fieldset>            
</form>
<br>