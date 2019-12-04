<?php   include "./templates/header.php"; ?>
<?php   include "./templates/connection.php"; ?>


        $getAll = "SELECT * FROM register order by ID desc";
        if($result = mysqli_query($conn, $getAll)){
            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                    echo "<tr>";
                        echo "<th>id</th>";
                        echo "<th>name</th>";
                        echo "<th>email</th>";
                        echo "<th>Edit</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>"; ?> 
                        <form method="post" action="register.php">
                            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                            <input type="submit" value="Update" id="return" name="return" />
                        </form>
                        <form method="post" action="delete.php">
                             <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                            <input type="submit" value="Delete" id="delete" name="delete" />
                        </form> <?php echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                // mysqli_free_result($result);
               // if ($bool) {
                 // echo "<p> Press to return to the registration page  </p>"; ?>
                <!-- <form method="post" action="register.php">
                    <input type="submit" value="Return" id="return" name="return" />
                </form> --><?php // }
                // Free result set

            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        }


?>
</body>
</html>
<?php  //	include "../login/templates/footer.html"; ?>
