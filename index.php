<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>To Do List</title>
</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
            <div class="card rounded-3">
            <div class="card-body p-4">

                <h4 class="text-center my-3 pb-3">To Do App</h4>

                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" action="./process.php" method="POST">
                <div class="col-12">
                    <div data-mdb-input-init class="form-outline">
                    <input type="text" id="txtTask" class="form-control" name="txtTask"/>
                    <label class="form-label" for="txtTask">Enter a task here</label>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Add to Task</button>
                </div>
                </form>

                
                <?php
                    if(isset($_COOKIE["todolist"])){
                        $data = $_COOKIE["todolist"];
                        $data = substr($data, 0, -3);
                        $result = explode(";;;",$data);

                        echo "<table class='table mb-4'>"
                            ."<thead>"
                                ."<tr>"
                                ."<th scope='col'>No.</th>"
                                ."<th scope='col'>Todo item</th>"
                                ."<th scope='col'>Actions</th>"
                                ."</tr>"
                            ."</thead>";
                        echo "<tbody>";
                        for($i=0; $i<count($result);$i++){
                                echo "<tr>"
                                    ."<th scope='row'>".($i+1)."</th>"
                                    ."<td>".$result[$i]."</td>"
                                    ."<td>"
                                    ."<form action='./process.php' method='POST'>"
                                        ."<input type='hidden' name='txtTask' value='".$result[$i]."'>"
                                        ."<button type='submit' data-mdb-button-init data-mdb-ripple-init class='btn btn-danger'>Done</button>"
                                        ."</form>"
                                    ."</td>"
                                ."</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }
                ?>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>