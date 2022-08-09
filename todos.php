<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <h1 class="text-center py-4 my-4">Web-application To Do app (PHP)</h1>
    <div class="w-50 m-auto">
        <form action="data.php" method=POST autocomplete="off">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder=" Add On To Do" Required>
            </div><br>
            <button class="btn btn-danger">ADD-List</button>
        </form>
    </div>
    <br>
    <hr class="bg-dark w-50 m-auto">
    <div class="lists w-50 m-auto my-4">
        <h1>Items to be saved</h1>
        <div id="lists">
            <table class="table table-info table-hover">
                <thead>
                    <tr>
                        <th scope="col" name="id">number</th>
                        <th scope="col">your list</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include 'database.php';
                    $sql = "SELECT * FROM todos";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $title = $row['Title'];
                    ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $title  ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="edit.php?id=<?php echo $id ?>" role="button">edit</a>
                                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $id ?>" role="button">delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>