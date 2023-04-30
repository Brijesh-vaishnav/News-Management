<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $id=intval($_POST['catid']);
$query=mysqli_query($con,"SELECT * FROM subcategory WHERE CategoryId=$id and Is_Active=1");
?>
<option value="">Select subcategory</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['subcategoryId']); ?>"><?php echo htmlentities($row['subcategory']); ?></option>
  <?php
 }
}
?>