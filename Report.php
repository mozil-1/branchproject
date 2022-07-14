
<?php
$con = mysqli_connect('localhost', 'root', '', 'furnstore');
$sql = "select distinct product_title from products order by product_title";
$result = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generation of reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="pdfReport.php" method="POST" target="_blank">

           <select name="product">
            <?php
                while($row = mysqli_fetch_array($result)){
                    echo '<option value="'.$row["product_title"].'">'.$row["product_title"].'</option>';
                }
                
                ?>
            </select>
            <button name="button" type="submit">Generate Report</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>