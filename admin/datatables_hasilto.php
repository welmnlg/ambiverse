
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - AmbiVerse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

<table id="tabel-data" class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>Username</th>
            <th>Judul TO</th>
            <th>Total Soal</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
    <?php
        
        $res = mysqli_query($conn,"SELECT * FROM exam_results");
        
        while($row = mysqli_fetch_array($res))
        {
            $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
            echo "<tr>
            <td>".$row['username']."</td>
            <td>".$row['judul_to']."</td>
            <td>".$row['total_question']."</td>
            <td>".$nilai."</td>
        </tr>";
        }
    ?>
    </tbody>
</table>
</body>
</html>
