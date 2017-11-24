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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" alt.php
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
<p></p>
<script>

    var orders = "http://localhost/progexam/api.php/orders/";
    var selectedOrder = "http://localhost/progexam/order.php/orders/";
    var oder_id = 1;
    //handle json_decode
    $.get(orders, function (data) {
        var obj = JSON.parse(data);
        var count = obj.length;
        console.log(count);

        for (var x = 1; x < obj.length; x++) {

            $.ajax({
                url: selectedOrder + x,
                dataType: 'json',
                success: function (obj) {
                    // console.log(obj.foo);
                    console.log(obj.ORD_ID);

                    $("p").append("<b> Order ID :" + (obj.ORD_ID) + "</b> ");
                    $("p").append("<b> Agent ID :" + (obj.AGENT_ID) + "</b>");
                    $("p").append("<b> Order Date:" + (obj.ORD_DATE) + "</b> <br>");
                }
            });


        }

    });</script>
</body>
</html>


