
<form method="POST">
    <fieldset>
        

        <select class="form-control" name="column">
            <option value="id">ID</option>
            <option value="corp">Corporation</option>
            <option value="incorp_dt">Incorporation Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zip Code</option>
            <option value="owner">Owner Name</option>
            <option value="phone">Phone Number</option>
        </select>
        <br><br>
        <input class="btn btn-default" type="hidden" name="action" value="Submit1" />
        <input class="btn btn-primary" type="submit" value="Submit" />
        <a  class="btn btn-default" href="view-action.php">Reset</a>
    </fieldset>    
</form>
<br>
