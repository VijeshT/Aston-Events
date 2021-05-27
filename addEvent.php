<?php include('navbar.php')?>
<?php include('footer.php'); ?>
<?php include('serverEvents.php') ?>

<!DOCTYPE html>
<html>
<style>

input[type=text], [type=datetime-local], [type=tel], select, textarea {
  width: 90%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Set a style for all buttons */
button {
  background-color: #8080FF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.resetbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.resetbtn, .addbtn {
  float: left;
  width: 50%;
}

</style>

<body>
  <div class="container">
    <form  id="addEvent" action="serverEvents.php" method="post">
      <h2>Organise an event</h2>
      <!-- Form input -->
      <select name="category" placeholder="Select" required>
        <option>Select a category</option/>
          <option>Sport</option/>
            <option>Culture</option/>
              <option>Other</option/>
              </select>
              <br>
              <input type = "text" name="name" placeholder="Name of Event"
              required/>
              <br>
              <textarea style="resize:none" type = "text" name="description" placeholder="Description of Event"
              required></textarea>
              <br>
              <input type = "text" name="venue" placeholder="Venue of Event"
              required/>
              <br>
              <input type ="datetime-local" placeholder="Time of Event" name="time" required/>
              <br>
              <input type = "tel" name="contactNumber" placeholder=" Your Contact Number"
              required/>
              <br>
              <br>
              Select Event Images: <input type = "file" name="picture" multiple/>
              <br>
              <!-- Submit button and Reset button -->
              <button type="submit" class="addbtn" name="add_event">Add Event</button>
              <button type="reset" class="resetbtn" name="reset">Reset</button>
      </form>
    </div>
  </body>
</html>
