<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("db.php");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Livraria</title>
</head>
<body style="background-color: beige;">

    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <h4>Livro existentes numa livraria em portugal</h4>
                        <h5>('SearchAll' para ver lista toda)<h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>id</th>
                                    <th>ISBN</th>
                                    <th>Titulo</th>
                                    <th>Escritor</th>
                                    <th>Ano de publicação</th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
    // Enter your database credentials
    $host = 'localhost';
    $dbname = 'loginsystem';
    $username = 'root';
    $password = '';

    try {
        // Create a PDO instance
        $dsn = "mysql:host=$host;dbname=$dbname";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $con = new PDO($dsn, $username, $password, $options);
    } catch(PDOException $e) {
        // If connection fails, show error message
        echo "Failed to connect to MySQL: " . $e->getMessage();
    }

    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];
        if($filtervalues == 'SearchAll')
        {
            $query = "SELECT * FROM livro";
            $stmt = $con->query($query);
        }
        else
        {
            $query = "SELECT * FROM livro WHERE CONCAT(isbn,titulo,escritor,anoPublicacao) LIKE '%$filtervalues%' ";
            $stmt = $con->prepare($query);
            $stmt->execute();
        }

        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $items)
            {
                ?>
                <tr>
                    <td class="bg-info text-white"><?= $items['id']; ?></td>
                    <td><?= $items['isbn']; ?></td>
                    <td><?= $items['titulo']; ?></td>
                    <td><?= $items['escritor']; ?></td>
                    <td><?= $items['anoPublicacao']; ?></td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php
        }
    }
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-4">
                <div class="form">
                        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
                        <p>You are now user dashboard page.</p>
                        <p><a href="logout.php">Logout</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>