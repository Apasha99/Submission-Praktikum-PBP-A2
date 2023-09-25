<?php include('header.php') ?>
<div class="card mt-5">
    <div class="card-header">Customers Data</div>
    <div class="card-body">
        <a href="add_customer.php" class="btn btn-primary mb-4">+ Add Customer Data</a>
        <a href="logout.php" class="btn btn-danger btn-md mb-4 ">Logout</a>
        <br>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            <?php
            // TODO 1: Buat koneksi dengan database
            // Cek apakah pengguna telah login sebagai admin
            session_start();
            // Cek apakah pengguna telah login sebagai admin
            if (!isset($_SESSION['username'])) {
                header('Location: login.php'); // Redirect ke halaman login jika bukan admin
                exit();
            }
            // TODO: Lakukan koneksi dengan database
            require_once('lib/db_login.php');

            // TODO 2: Tulis dan eksekusi query ke database\
            $query = "SELECT * FROM customers ORDER BY customerid";
            $result = $db->query($query);
            if(!$result){
                die ("Could not query the database: <br />").$db->error."<br>Query: ".$query;
            }

            // TODO 3: Parsing data yang diterima dari database ke halaman HTML/PHP
            $i = 1;
            while ($row = $result ->fetch_object()){
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row->name.'</td>';
                echo '<td>'.$row->address.'</td>';
                echo '<td>'.$row->city.'</td>';
                echo '<td><a class="btn btn-warning  btn-sm" href= "edit_customer.php?id='.$row->
                customerid.'">Edit</a>&nbsp;&nbsp;
                    <a class = "btn btn-danger btn-sm" href="confirm_delete_customer.php?id='.$row->customerid.'">Delete</a>
                    </td>';
                echo '</tr>';
                $i++;
            }
            echo '</table>';
            echo '<br />';
            echo 'Total Rows = '.$result->num_rows;

            // TODO 4: Lakukan dealokasi variabel $result
            $result->free();
            
            // TODO 5: Tutup koneksi dengan database
            $db->close();
            ?>
        <br><br>
    </div>
</div>
<?php include('footer.php') ?>