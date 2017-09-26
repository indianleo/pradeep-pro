<head>
<?php include("help.php"); ?>
<style>
.feed
{
  position:absolute;
  top:100px;
   left:500px;
   height:300px;
   width:400px;
   }
</style>

</head>
<body>
<div class="feed">
<form  action="process.php" method="post">
<input type="hidden" name="action" value="feed">
<fieldset>
  <legend>Feedback</legend>
  <table>
  <tr>
  <td>Title</td><td><input type="text" name="tname" placeholder="title"></td>
  </tr>
  <tr>
  <td>Content</td><td><textarea name="tarea"></textarea></td>
  </tr>
  <tr>
  <td></td><td><input type="submit" id="sub" value="submit"></td>
  </tr>
  </table>
  
  </fieldset>
  </form>
  </div>