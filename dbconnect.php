<?php 

$servername = "89.252.138.98";
$database = "yukselo1_urunlerDB";
$username = "yukselo1_user";
$password = "yukselotomatuser.";
$num_per_page=10;

if(isset($_GET["page"])){
$page=$_GET["page"];
}
else{
    $page=1;
}

$start_from=($page-1)*$num_per_page;
// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);
$query = " select * from urunlerDB limit $start_from,$num_per_page";

$query_run=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($query_run)){
    ?>        
        <?php 


echo '<div class="Prod">';
echo '<div class="ProductsPhotosCont">';
echo '<img class="ProductsPhotos" src="products/'.$row['urunResmi'].'" width="100%" height="100%"/>';
echo '</div>';    
echo '<div class="ProductsDesc">';
echo ' <span class="Desc-Title">'.$row['urunAdi'].'</span>';       
echo '</div>';
echo '</div>';


       
        ?>
    
   

    <?php


}

$sql=" select * from urunlerDB";
$rs_result=mysqli_query($conn,$sql);
$total_recors=mysqli_num_rows($rs_result);
$total_page=ceil($total_recors/$num_per_page);



echo "<div class='paginationContentCont'>";
echo "<div class='paginationContent'>";
for($i=1;$i<=$total_page;$i++){
echo "<a class='paginations' href='products.php?page=".$i."'>".$i."</a> ";
}
echo "</div>";
echo "</div>";


if ($conn->connect_error) {

}


mysqli_close($conn);

?>