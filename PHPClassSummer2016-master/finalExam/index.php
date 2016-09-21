<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title>Mailing List</title> 
 </head>
 <body>
 <div>
 <h1>Account Sign Up</h1>
 <form action="display_results.php" method="post">

 <fieldset>
 <legend>Account Information</legend>
 <label>E-Mail:</label>
 <input type="text" name="email" value="" class="textbox"/>
 <br />

 <label>Phone Number:</label>
 <input type="text" name="phone" value="" class="textbox"/>
 </fieldset>

 <fieldset>
 <legend>Settings</legend>

 <p>How did you hear about us?</p>
 <input type="radio" name="heard_from" value="Search Engine" />
 Search engine<br />
 <input type="radio" name="heard_from" value="Friend" />
 Word of mouth<br />
 <input type=radio name="heard_from" value="Other" />
 Other<br />

 <p>Contact via:</p>
 <select name="contact_via">
 <option value="email">Email</option>
 <option value="text">Text Message</option>
 <option value="phone">Phone</option>
 </select>

 <p>Comments: (optional)</p>
 <textarea name="comments" rows="4" cols="50"></textarea>
 </fieldset>

 <input type="submit" value="Submit" />

 </form>
 <br />
 </div>
 </body>
</html>