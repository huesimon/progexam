<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>

    <link href="https://v4-alpha.getbootstrap.com/examples/sticky-footer/sticky-footer.css" rel="stylesheet">


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css"
          rel="stylesheet"/>

<!--    javascript der loader datatable-->
    <script src="js/app.js"></script>


    <!--  DATA TABLE   -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
    <title>ProgExam xD </title>
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">ProgExam</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create.php">create</a>
            </li>

        </ul>
    </div>
</nav>


<h1>ProgExam</h1>




<div class="container">
    <table id="example" class="table table-striped table-inverse table-bordered table-hover" cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <th>ORDER ID</th>
            <th>ORDER DATE</th>
            <th>DESCRIPTION</th>
            <th>AMOUNT</th>
            <th>AGENT ID</th>
            <th>CUSTOMER ID</th>
        </tr>
        </thead>
        <tbody>


        <?php
        /**
         * Created by PhpStorm.
         * User: Simon_
         * Date: 31-10-2017
         * Time: 10:38
         */

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "progexam_1";
        // Create connection
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

//        $sql = "SELECT * FROM orders"; henter kun orders (opgave 1)
        $sql = "SELECT * FROM orders, agents, customers WHERE orders.AGENT_ID = agents.AGENT_ID AND orders.CUSTOMER_ID = customers.CUST_ID"; // henter data fra table order, agents, og customer.

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {


                //Opgave 1
                echo "<tr>";
                echo "<td>" . $row['ORD_ID'] . "</td>";
                echo "<td>" . $row['ORD_DATE'] . "</td>";
                echo "<td>" . $row['ORD_DESCRIPTION'] . "</td>";
                echo "<td>" . $row['ORD_AMOUNT'] . "</td>";
                //Opgave 2
                echo "<td>" . $row['AGENT_NAME'] . "</td>";
                echo "<td>" . $row['CUST_NAME'] . "</td>";
                echo "</tr>";


//        echo "title: " . $row["title"] . " - url: " . $row["url"] . " - category: " . $row["category"] . "<br>";
//        echo "id: " . $row["user_id"]. " - Name: " . $row["email"]. "<br>";
            }
        } else {
            echo "0 results";
        }

        ?>


        </tbody>
    </table>
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Startsiden er verdens bedste startside.</span>
    </div>
</footer>
</body>
</html>


