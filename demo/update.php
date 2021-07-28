<?php
include "config.php";

if(isset($_POST['updste'])){
    $firstname = $_POST['firstname'];
    $user_id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $sql = "UPDATE 'users' SET 'firstname' =  '$firstname', 'lastname' = '$lastname', 'email' = '$email', 'password' = '$password' , 'gender' = '$gender WHERE 'id'='Suser_id' ";

$result = $conn->query($sql);

if($result == TRUE){
    echo "record updated succesfully";
}
else{
    echo "Error:" .$sql . "<br>" . $conn->error;
}
}

if(isset($_Get['id'])) {
    $user_id = $_Get['id'];

    $sql = "SELECT *FROM 'users' WHERE 'id'='$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $first_name = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
        }
        ?>
        <h2>User Update Form</h2>
        <form action="" method="post">
        <fieldset>
        <legend> Personnal Information: </legend>
        First Names: <br>
        <input type="text" name="firstname" value="<?php echo $first_name; ?>">
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        <br>
        Last Name: <br>
        <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        <br>
        Email: <br>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <br>
        Password: <br>
        <input type="password" name="password" value="<?php echo $password; ?>">
        <br>
        Gender: <br>
        <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){echo "checked";}?> >Male
        <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){echo "checked";}?> >female
        <br><br>
        <input type="submit" name="update" value="Update">
</fieldset>
</form>
</body>
</html>

<?php
    }else{
        header('Location: view.php');
    }
    }
    ?>
            
