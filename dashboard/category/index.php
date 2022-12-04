<?php
include_once  "../../init.php";
include "../../genral/functions.php";
include "../../genral/config.php";

$slecet = "SELECT * FROM category";
$s = mysqli_query($connectSQL ,$slecet );
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = "DELETE FROM category WHERE id = $id";
  mysqli_query($connectSQL, $delete);
  header("location: $root_path/dashboard/category/index.php");
}
include "../layouts/header.php";
include "../layouts/sidebar.php";
?>
<main class="app-content">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Display Category</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                  <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col" colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($s as $data){ ?>
    <tr>
      <th scope="row"><?php echo $data['id']; ?></th>
      <td><?php echo $data['name'] ;?></td>
      <td>
        <a href="<?php echo $root_path ?>/dashboard/category/index.php?edit=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a>
    </td>
      <td>
        <a href="<?php echo $root_path ?>/dashboard/category/index.php?delete=<?php echo $data['id']; ?> " class="btn btn-danger">remove</a>
    </td>
    </tr>
    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </main>
<?php
include "../layouts/footer.php";