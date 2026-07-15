
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
            <th>Judul TO</th>
            <th>Kategori</th>
            <th>Subtes</th>
            <th>Durasi</th>
            <th>Tanggal Ditambahkan</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $res = mysqli_query($conn,"SELECT * FROM exam_category");
        
        while($row = mysqli_fetch_array($res))
        {
            echo "<tr>
            <td>".$row['judul_to']."</td>
                    <td>".$row['kategori']."</td>
                    <td>".$row['subtes']."</td>
                    <td>".$row['duration']."</td>
                    <td>".$row['date_added']."</td>
                    <td><a class='btn btn-warning' href='edit_exam.php?id=$row[id]'><i class='fa fa-edit'></i></a></td>
                    <td><a class='btn btn-danger' href='delete.php?id=$row[id]'><i class='fa fa-trash'></i></a></td>

        </tr>";
        }
    ?>
    </tbody>

    <script>
        $(document).ready(function(){
            var table = $('#tabel-data').DataTable( {
                pageLength : 5,
                lengthMenu: [[5, 10, 20, 25], [5, 10, 20, 25]]
            } )
        });
    </script>

</table>
</body>
</html>
