<html>
    <head></head>

    <body>
        <table>

<?php
include 'Login.php';
$q="SELECT * FROM UserData";
$r=mysqli_query($link,$q);
while($row=mysqli_fetch_row($r))
{

?>
            <tr>
                <td><?php echo $row[0]?></td>
                <td><?php echo $row[1]?></td>
                <td><?php echo $row[2]?></td>
                <td><a href="Edit.php?Id=<?=$row[0]?>">Edit</a></td>
            </tr>
<?php } ?>
        </table>
</body>
</html>