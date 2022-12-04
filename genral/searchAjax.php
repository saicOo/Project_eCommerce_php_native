<?php
 include "./config.php";

$search = $_POST["search"];
$sql = "SELECT * FROM `product` WHERE `title` LIKE '%$search%' ORDER BY `title`";
$result = mysqli_query($connectSQL,$sql);
$numRow = mysqli_num_rows($result);
?>

<?php if($numRow > 0): ?>
<div class="main-search">
    <?php foreach($result as $item){ ?>
    <a class="result" href="<?php echo $root_path ?>/product_profile/profile.php?pId=<?php echo $item['id'];  ?>"><?php echo $item['title'];  ?></a>
    <?php }; ?>
    <p class="font-weight-bold">Result : <?php echo $numRow; ?> </p>
    <?php if($numRow > 1): ?>
        <a class="search-link text-center text-primary" href="<?php echo $root_path ?>/search/search.php?search=&search_term=<?php echo $search;  ?>">show more</a>
        <?php endif; ?>
    </div>
    <?php else: ?>
        <div class="main-search">
            <h5 class="text-center">Not Fund</h5>
            </div>
        <?php endif; ?>