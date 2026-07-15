<?php 

    //koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "ambiverse");

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function query($query){
        $result = mysqli_query($conn, $query);
    }
    

    function register($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"])); //stripslashes() biar user ga input simbol aneh" di username, strtolower() biar usernamenya tetep huruf kecil
        $email    = $data["email"];
        $password = mysqli_real_escape_string($conn, $data["password"]);

        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if ( mysqli_fetch_assoc($result) ) {
            echo "<script>
                    alert ('Username sudah terdaftar :( Coba pilih username lain!');
                </script>";

            return false;   //supaya berhenti dan data tidak tertambah ke database
        }

        //enkripsi password 
        $password = password_hash($password, PASSWORD_DEFAULT);

        //tambah user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$email', '$password')");

        return mysqli_affected_rows($conn);
    }


?>