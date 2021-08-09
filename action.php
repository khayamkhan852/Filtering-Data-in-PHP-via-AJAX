<?php    
    $server = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "filterdatafromtable";

    $conn = mysqli_connect($server, $user, $password, $database); 

    $fields = array('Product', 'IndianCompany', 'ForeignCompany', 'ForeignCountry');

    $conditions = array();
    foreach ($fields as $field) {
        if(isset($_POST[$field]) && $_POST[$field] != '') {
            $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($conn, $_POST[$field]) . "%'";
        }
    }

    $query = "SELECT * FROM datatable ";
    if (count($conditions) > 0) {
        $query .= "WHERE " . implode (' AND ', $conditions);
    }   
    
    if (isset($_POST['start_date']) && $_POST['start_date'] != '' && isset($_POST['end_date']) && $_POST['end_date'] != '' ) {
        if (count($conditions) > 0) {
            $query .= " AND Date BETWEEN " . $_POST['start_date'] . " AND " . $_POST['end_date'];
        } else {
            $query .= "WHERE Date BETWEEN " . $_POST['start_date'] . " AND " . $_POST['end_date'];
        }
        
    }

    $data = mysqli_query($conn, $query);

    while ($result_Check = mysqli_fetch_array($data)) {
        $Product = $result_Check['Product'];
        $IndianCompany = $result_Check['IndianCompany'];
        $ForeignCompany = $result_Check['ForeignCompany'];
        $ForeignCountry = $result_Check['ForeignCountry'];
        $IndianPort = $result_Check['IndianPort'];
        $ModeofShipment = $result_Check['ModeofShipment'];
        $CUSH = $result_Check['CUSH'];
        $Invoice_No = $result_Check['Invoice_No'];
        $Item_No = $result_Check['Item_No'];
        $BillNO = $result_Check['BillNO'];
        $Digit = $result_Check['4Digit'];
        $Date = $result_Check['Date'];
        $HSCode = $result_Check['HSCode'];
        $Quantity = $result_Check['Quantity'];
        $Unit = $result_Check['Unit'];
        $Item_Rate_INR = $result_Check['Item_Rate_INR'];
        $Item_Rate_INV = $result_Check['Item_Rate_INV'];
        $Currency = $result_Check['Currency'];
        $Total_Amount_INV_FC = $result_Check['Total_Amount_INV_FC'];
        $FOBINR = $result_Check['FOBINR'];
        $IEC = $result_Check['IEC'];
        $Address1 = $result_Check['Address1'];
        $City = $result_Check['City'];
        $ForeignPort = $result_Check['ForeignPort'];

        $return_arr[] = array(
            "Product" => $Product, 
            "IndianCompany" => $IndianCompany, 
            "ForeignCompany" => $ForeignCompany, 
            "ForeignCountry" => $ForeignCountry,
            "IndianPort" => $IndianPort,
            "ModeofShipment" => $ModeofShipment,
            "cush" => $CUSH,
            "Invoice_No" => $Invoice_No,
            "Item_No" => $Item_No,
            "BillNO" => $BillNO,
            "Digit" => $Digit,
            "Date" => $Date,
            "HSCode" => $HSCode,
            "Quantity" => $Quantity,
            "Unit" => $Unit,
            "Item_Rate_INR" => $Item_Rate_INR,
            "Item_Rate_INV" => $Item_Rate_INV,
            "Currency" => $Currency,
            "Total_Amount_INV_FC" => $Total_Amount_INV_FC,
            "fibinr" => $FOBINR,
            "iec" => $IEC,
            "Address1" => $Address1,
            "City" => $City,
            "ForeignPort" => $ForeignPort
        );

    }

    
    echo json_encode($return_arr);
?>