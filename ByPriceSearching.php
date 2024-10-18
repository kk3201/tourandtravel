<?php
include("conn.php");
error_reporting(0);

$search_StartPrice = $_POST['search_S_Price'];
$search_EndPrice = $_POST['search_E_Price'];

if($search_StartPrice == null)
$sql = "SELECT * FROM package WHERE price <= '$search_EndPrice'";

else if($search_EndPrice == null)
$sql = "SELECT * FROM package WHERE price >= '$search_StartPrice'";

else
$sql = "SELECT * FROM package WHERE price  BETWEEN '$search_StartPrice' AND '$search_EndPrice'";


$result = mysqli_query($conn, $sql) or die("SQL query failed");
$output = "";

if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="text-center mb-3 pb-">
    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
    <h1>Pefect Tour Packages</h1>
</div><div class="container-fluid">
        <div class="container pt-5 pb-3">
            <table cellpadding="20">
                <tr>';
    
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<td>
        <img  class="" src="'.  $row['image'] .'" height="235px" width="350px">            <div class="p-4">
            <div class="p-4">
                <div class="d-flex justify-content-between mb-3">
                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>' . $row['packageName'] . '</small>
                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>' . $row['NumberOfDays'] . ' Days</small>
                    <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>' . $row['packageLocation'] . '</small>
                </div>
                <a class="h5 text-decoration-none" href="" style="display: block;width: 280px; height: 50px;">' . $row['packageDetail'] . '</a>
                <div class="border-top mt-4 pt-4">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                        <h5 class="m-0">' . $row['price'] . ' Rs/- </h5>
                    </div>
                </div>
            </div>';
            $output.= '<a class="btn btn-primary btn-block py-3" type="submit" name="btnSubmit" href="book.php">Book Now</a>';
            $output .= '</td>';
        
        $i++;
        if ($i % 3 == 0) {
            $output .= "</tr><tr>";
        }

    }
    
    $output .= '</table>
        </div>
    </div>';
    
    echo $output;
}
else{
    
}
?>
