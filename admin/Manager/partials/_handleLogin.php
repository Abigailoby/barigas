<?php
    include ('_dbconnect.php');
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from users where userName='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userType = $row['userType'];
        if($userType == 2) {
            $userId = $row['id'];
            if (password_verify($password, $row['password'])){ 
                session_start();
                $_SESSION['Managerloggedin'] = true;
                $_SESSION['Managerusername'] = $username;
                $_SESSION['ManageruserId'] = $userId;
                header("location: /barigas/admin/Manager/index1.php");
                exit();
            } 
            else{
                echo "
                    <script>
                    alert('Username Atau Password Salah');
                    document.location.href = '/barigas/admin/Manager/loginM.php';
                    </script>";
            }
        }
        else {
            echo "
                    <script>
                    alert('Username Atau Password Salah');
                    document.location.href = '/barigas/admin/Manager/loginM.php';
                    </script>";
        }
    } 
    else{
        echo "
                    <script>
                    alert('Username Atau Password Salah');
                    document.location.href = '/barigas/admin/Manager/loginM.php';
                    </script>";
    }
?>