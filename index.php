<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">


    <title>Data Filtering</title>
</head>

<body>
    <div class="container">
        <center>
            <h3 class="mt-3 mb-3">Select Filter to get Relavant data</h3>
        </center>

        <form>
            <div class="row">
                <div class="col">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date">
                </div>
                <div class="col">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date">
                </div>
            </div>
            <div class="row mt-5 mb-3">
                <div class="col">
                    <label for="product">product</label>
                    <input type="text" class="form-control" name="product" id="product">
                </div>
                <div class="col">
                    <label for="india_company">India Company</label>
                    <input type="text" class="form-control" name="india_company" id="india_company">
                </div>
                <div class="col">
                    <label for="foreign_company">Foreign Company</label>
                    <input type="text" class="form-control" name="foreign_company" id="foreign_company">
                </div>

                <div class="col">
                    <label for="foreign_country">Foreign Country</label>
                    <input type="text" class="form-control" name="foreign_country" id="foreign_country">
                </div>
            </div>
            <center>
                <button type="button" value="Submit" name="submit" id="submit" class="btn btn-primary mt-2 mr-2">Fetch Date</button>
                <button class="btn btn-danger mt-2" type="button" id="ClearAll">Clear All Filters</button>

            </center>
            <br>
        </form>


        <div class="table-responsive">
            <table class="table table-striped table-responsive table-hover table-sm" id="mytable">
                <thead>
                    <tr>
                        <th scope="col">Indian Port</th>
                        <th scope="col">Mode of Shipment</th>
                        <th scope="col">CUSH</th>
                        <th scope="col">Invoice No</th>
                        <th scope="col">Item No</th>
                        <th scope="col">BillNO</th>
                        <th scope="col">4Digit</th>
                        <th scope="col">Date</th>
                        <th scope="col">HS Code</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Item Rate INR</th>
                        <th scope="col">Item Rate INV</th>
                        <th scope="col">Currency</th>
                        <th scope="col">Total Amount INV FC</th>
                        <th scope="col">FOBINR</th>
                        <th scope="col">IEC</th>
                        <th scope="col">Indian Company</th>
                        <th scope="col">Address1</th>
                        <th scope="col">City</th>
                        <th scope="col">Foreign Company</th>
                        <th scope="col">Foreign Port</th>
                        <th scope="col">Foreign Country</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>            
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

</body>

</html>

<script>
    $(document).ready( function () {
        var table = $('#mytable').DataTable(
            {
                "pageLength": 25,
                dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                initComplete: function() {
                    var btns = $('.dt-button');
                    btns.addClass('btn btn-primary btn-sm mb-3 ml-3');
                    btns.removeClass('dt-button');
                }                                
            }
        );
        
        $("#submit").click(function() {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var product = $("#product").val();
            var india_company = $("#india_company").val();
            var foreign_company = $("#foreign_company").val();
            var foreign_country = $("#foreign_country").val();
            
            $.ajax({
                type: "POST",
                url: "action.php",
                dataType: 'JSON',
                data: {
                    start_date: start_date,
                    end_date: end_date,
                    Product: product,
                    IndianCompany: india_company,
                    ForeignCompany: foreign_company,
                    ForeignCountry: foreign_country,

                },
                cache: false,
                success: function(data) {
                    // console.log(data);
                    table.clear().draw();
                    for (index = 0; index < data.length; index++) {
                        table.row.add(
                            [
                                data[index].IndianPort,
                                data[index].ModeofShipment,
                                data[index].cush,
                                data[index].Invoice_No,
                                data[index].Item_No,
                                data[index].BillNO,
                                data[index].Digit,
                                data[index].Date,
                                data[index].HSCode,
                                data[index].Product,
                                data[index].Quantity,
                                data[index].Unit,
                                data[index].Item_Rate_INR,
                                data[index].Item_Rate_INV,
                                data[index].Currency,
                                data[index].Total_Amount_INV_FC,
                                data[index].fibinr,
                                data[index].iec,
                                data[index].IndianCompany,
                                data[index].Address1,
                                data[index].City,
                                data[index].ForeignCompany,
                                data[index].ForeignPort,
                                data[index].ForeignCountry,
                                data[index].Product                                
                            ]
                        ).draw();
                    }
                },
                error: function(xhr, status, error) {
                    alert('No Data to Show');
                    console.error(xhr);
                }
            });            

        });

        $("#ClearAll").click(function() {
            table.clear().draw();
            $("#start_date").val('');
            $("#end_date").val('');
            $("#product").val('');
            $("#india_company").val('');
            $("#foreign_company").val('');
            $("#foreign_country").val('');

        });
    } );
</script>