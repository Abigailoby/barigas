<?php
    include '_dbconnect.php';

    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $categoryId = $_POST["categoryId"];
        $price = $_POST["price"];

        $sql = "INSERT INTO `barang` (`NamaBarang`, `hargaBarang`, `barangDesc`, `barangKategoriId`, `barangPubDate`) VALUES ('$name', '$price', '$description', '$categoryId', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $barangId = $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = 'barang-'.$barangId;
                $newfilename=$newName .".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/barigas/image/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('berhasil');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('gagal');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Mohon pilih gambar untuk upload.");
                        window.location=document.referrer;
                    </script>';
            }
        }
        else {
            echo "<script>alert('gagal');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $barangId = $_POST["barangId"];
        $sql = "DELETE FROM `barang` WHERE `barangId`='$barangId'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/barigas/image/makan-".$barangId.".jpg";
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Terhapus');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('Gagal');
            window.location=document.referrer;
            </script>";
        }
    }
    if(isset($_POST['updateItem'])) {
        $barangId = $_POST["barangId"];
        $barangName = $_POST["name"];
        $barangDesc = $_POST["desc"];
        $barangPrice = $_POST["price"];
        $barangKategoriId = $_POST["catId"];

        $sql = "UPDATE `barang` SET `barangName`='$barangName', `hargaBarang`='$barangPrice', `barangDesc`='$barangDesc', `barangKategoriId`='$barangKategoriId' WHERE `barangId`='$barangId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Perbarui');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Gagal');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateItemPhoto'])) {
        $barangId = $_POST["barangId"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'barang-'.$barangId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/barigas/image/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('Berhasil');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('Gagal');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Mohon pilih gambar untuk upload.");
            window.location=document.referrer;
                </script>';
        }
    }
?>