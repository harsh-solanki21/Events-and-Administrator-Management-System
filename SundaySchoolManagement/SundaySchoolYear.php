<!DOCTYPE html>
<html>
    <head>
        <title>SELECT SUNDAY SCHOOL YEAR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <style>
        .mydiv
        {
            height: 100%;
            width: 100%;
            padding: 9.5%;
            text-align: center;
        }
        input[type="submit"]
        {
            border: none;
            border-radius: 20px;
            padding: 1%;
        }
        input[type="submit"]:hover
        {
            border: none;
            border-radius: 20px;
            padding: 1%;
            color: white;
            background-color: red;
        }
    </style>   
    </head>
    <body>
        <div class="mydiv"> 
            <h3>
                <font style="color: red; font-size:5vw">Sunday</font>
                <font style="color: silver; font-size:5vw">School</font>
                Record of
            </h3>
            <br>
            <form action="BatchDetails_or_ExamDetails.php" method="POST"  class="center">
                <input class="date-own form-control" style="width: 15%; margin-left: 42%;"
                       type="text" name="ss_year" autocomplete="off" required="required" />
                <br/>
                <input type="submit" value="Select Year"/>
            </form>
            
            <script type="text/javascript">
                $('.date-own').datepicker({minViewMode: 2,format: 'yyyy'});
            </script>
        </div>
    </body>
</html>
