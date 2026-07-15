<?php
    require ("../../includes/functions.php");
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM exam_category";
    $judul = mysqli_query($conn, $query);

?>
<table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul  TO</th>
                <th scope="col" colspan=2>Kategori & Subtes</th>
                <th scope="col">Durasi Ujian (menit)</th>
                <th scope="col">Date Added</th>
                <th scope="col" colspan=2>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $res = mysqli_query($conn, "SELECT * FROM exam_category");

                $no = 0;
                while ($row = mysqli_fetch_array($res)){ 
                        $no++;
                        echo "<tr>
                        <td>".$no."</td>
                        <td>".$row['judul_to']."</td>
                        <td>".$row['kategori']."</td>
                        <td>".$row['subtes']."</td>
                        <td>".$row['duration']."</td>
                        <td>".$row['date_added']."</td>
                        <td><a class='btn btn-warning' href='edit_exam.php?id=$row[id]'><i class='fa fa-edit'></i></a></td>
                        <td><a class='btn btn-danger' href='delete.php?id=$row[id]'><i class='fa fa-trash'></i></a></td>
                        </tr>";
                        ?>
                        <?php
                }
                                                        
                                                        
            ?>

        </tbody> 
        
    </table>
