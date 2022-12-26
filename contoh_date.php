<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    
    <link rel="stylesheet" href="assets/datepicker/css/datepicker.css">
</head>
<body>
<div class="container">
    <br>
    <h4>Datepicker di PHP dengan Bootstrap</h4>

        <div class="form-group">
            <label>Tanggal:</label>
            <input type="text"  name="tanggal"  class="form-control datepicker"  required/>
            <!-- <input type="date" class="form-control"> -->
        </div>
    
</div>
<script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
<script src="assets/datepicker/js/bootstrap-datepicker.js"></script>
</body>
</html>