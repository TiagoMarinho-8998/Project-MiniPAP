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
    <title>Games</title>
</head>
<body style="background-color: beige;">

    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <h4>Games existentes (ADMIN)</h4>
                        <h5>(Search 'All' para ver a lista toda)<h5>
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
                                    <th>ID</th>
                                    <th>Tipo</th>
                                    <th>nome</th>
                                    <th>Empresa</th>
                                    <th>Ano de creação</th>
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
        if($filtervalues == 'All')
        {
            $query = "SELECT * FROM games";
            $stmt = $con->query($query);
        }
        else
        {
            $query = "SELECT * FROM games WHERE CONCAT(tipo,nome,empresa,anocreacao) LIKE '%$filtervalues%' ";
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
                    <td><?= $items['tipo']; ?></td>
                    <td><?= $items['nome']; ?></td>
                    <td><?= $items['empresa']; ?></td>
                    <td><?= $items['anocreacao']; ?></td>
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
                        <p>ADMIN: <?php echo $_SESSION['username']; ?> LOGGED IN</p>
                        <p>You are now in the dashboard page.</p>
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