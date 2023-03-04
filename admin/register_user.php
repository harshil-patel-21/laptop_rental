<?php
include('config.php');

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tbluser WHERE id=$id");
    header('location:register_user.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">register users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php
                    $query = "SELECT * FROM tbluser";
                    $query_run = mysqli_query($conn, $query);
                ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Username </th>
                                <th>Email </th>
                                <!-- <th>EDIT</th>
                                <th>DELETE</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(mysqli_num_rows($query_run) > 0)        
                            {
                                while($row = mysqli_fetch_assoc($query_run))
                                {
                            ?>
                                <tr style="border: 1px soild black;">
                                    <td><?php  echo $row['id']; ?></td>
                                    <td><?php  echo $row['name']; ?></td>
                                    <td><?php  echo $row['email']; ?></td>
                                    <!-- <td><form>
                                        <a href="register_edit.php?edit=<? echo $row['id']; ?>" target="_bl
                                        ">edit</a>
                                    
                                        <a href="register_edit.php?edit=<? echo $row['id']; ?>">delete</a>
                                        </form>
                                    </td> -->
                                </tr>
                            <?php
                                } 
                            }
                            else {
                                echo "No Record Found";
                            }
                            ?>
                        </tbody>
                    </table>
    
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
