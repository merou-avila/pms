<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barcode {{ $medicine->name }}</title>
</head>
<style>
    td {
        text-align: center;
        border: .5px solid #00000;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 30px;
        padding-bottom: 30px;
    }
</style>
<body>

<div style="text-align: center;">
    <table style="width:100%;">
        <tr>
            <td>
                 <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($medicine->barcode_number, 'C39+',1,33,array(0,0,0), true)}}" alt="barcode" />
            </td>
            <td>
                 <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($medicine->barcode_number, 'C39+',1,33,array(0,0,0), true)}}" alt="barcode" />
            </td>
        </tr>
        <tr>
            <td>
                 <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($medicine->barcode_number, 'C39+',1,33,array(0,0,0), true)}}" alt="barcode" />
            </td>
            <td>
                 <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($medicine->barcode_number, 'C39+',1,33,array(0,0,0), true)}}" alt="barcode" />
            </td>
        </tr>
        <tr>
            <td>
                 <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($medicine->barcode_number, 'C39+',1,33,array(0,0,0), true)}}" alt="barcode" />
            </td>
            <td>
                 <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($medicine->barcode_number, 'C39+',1,33,array(0,0,0), true)}}" alt="barcode" />
            </td>
        </tr>
        <tr>
            <td>
                 <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($medicine->barcode_number, 'C39+',1,33,array(0,0,0), true)}}" alt="barcode" />
            </td>
            <td>
                 <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($medicine->barcode_number, 'C39+',1,33,array(0,0,0), true)}}" alt="barcode" />
            </td>
        </tr>
    </table>
</div>

</body>
</html>
