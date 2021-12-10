<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            font-size: 12px;
            line-height: 18px;
            font-family: 'Ubuntu', sans-serif;
        }
        h2 {
            font-size: 16px;
        }
        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }
        tr {border-bottom: 1px dashed #ddd;}
        td,th {padding: 7px 0;width: 50%;}

        table {width: 100%;}
        tfoot tr th:first-child {text-align: left;}

        .centered {
            text-align: center;
            align-content: center;
        }
        small{font-size:11px;}

        @media print {
            * {
                font-size:12px;
                line-height: 20px;
            }
            td,th {padding: 5px 0;}
            .hidden-print {
                display: none !important;
            }
            tbody::after {
                content: '';
                display: block;
                page-break-after: always;
                page-break-inside: auto;
                page-break-before: avoid;
            }
        }
    </style>
</head>
<body>

<div style="max-width:400px;margin:0 auto">
    <div id="receipt-data">
        <div class="centered">
            <h2 style="margin-bottom: 5px">{{ settings()->company_name }}</h2>

            <p style="font-size: 11px;line-height: 15px;margin-top: 0">
                {{ settings()->company_email }}, {{ settings()->company_phone }}
                <br>{{ settings()->company_address }}
            </p>
        </div>
        <p>
            Date: {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}<br>
            Reference: {{ $sale->reference }}<br>
        </p>
        <table class="table-data">
            <tbody>
            @foreach($sale->saleDetails as $saleDetail)
                <tr>
                    <td colspan="2">
                        {{ $saleDetail->product->product_name }}
                        ({{ $saleDetail->quantity }} x {{ format_currency($saleDetail->price) }})
                    </td>
                    <td style="text-align:right;vertical-align:bottom">{{ format_currency($saleDetail->sub_total) }}</td>
                </tr>
            @endforeach

            @if($sale->discount_percentage)
                <tr>
                    <th colspan="2" style="text-align:left">Discount ({{ $sale->discount_percentage }}%)</th>
                    <th style="text-align:right">{{ format_currency($sale->discount_amount) }}</th>
                </tr>
            @endif
           {{--  @if($sale->shipping_amount)
                <tr>
                    <th colspan="2" style="text-align:left">Shipping</th>
                    <th style="text-align:right">{{ format_currency($sale->shipping_amount) }}</th>
                </tr>
            @endif --}}
            <tr>
                <th colspan="2" style="text-align:left">Cash</th>
                <th style="text-align:right">{{ format_currency($sale->paid_amount) }}</th>
            </tr>
             <tr>
                <th colspan="2" style="text-align:left">Change</th>
                <th style="text-align:right">{{ format_currency($sale->due_amount) }}</th>
            </tr>
            <tr style="background-color:#ddd;">
                <th colspan="2" style="text-align:left">
                    <strong>Grand Total</strong>
                </th>
                <th style="text-align:right;">
                    {{ format_currency($sale->total_amount) }}
                </th>
            </tr>
            </tbody>
        </table>
      {{--   <table>
            <tbody>
                <tr style="background-color:#ddd;">
                    <td>
                        <strong>Grand Total</strong>
                    </td>
                    <th style="text-align:right;">
                        {{ format_currency($sale->total_amount) }}
                    </th>
                </tr>
                <tr style="border-bottom: 0;">
                    <td class="centered" colspan="3">
                        <div style="margin-top: 10px;">
                            {!! \Milon\Barcode\Facades\DNS1DFacade::getBarcodeSVG($sale->reference, 'C128', 1, 25, 'black', false) !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table> --}}
        <br>
        <br>
        <table>
            <tbody>
                <tr>
                    <th colspan="2" style="text-align:left">VAT Sale</th>
                    <th style="text-align:right">{{ format_currency($sale->total_amount - $sale->total_amount * .12) }}</th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align:left">VAT Exempt Sales</th>
                    <th style="text-align:right">{{ format_currency(0) }}</th>
                </tr>
                @if($sale->tax_percentage)
                    <tr>
                        <th colspan="2" style="text-align:left">12% VAT</th>
                        <th style="text-align:right">{{ format_currency($sale->total_amount * .12) }}</th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<br>
<div style="text-align:justify;">
    THIS SERVES AS YOUR SALES INVOICE. THIS INVOICE SHALL BE VALID FOR FIVE(5) YEARS FROM THE DATE OF THE PERMIT TO USE.
</div>
<br>
<div style="text-align:center;">
    ******RETURN POLICY******
</div>
<br>
<div style="text-align:justify">
    WE WILL ACCEPT, FOR RETURN OR EXCHANGE, ITEMS PURCHASED WITHIN 90 DAYS THAT ARE IN ITS ORIGINAL CONDITION AND PACKAGING, AND WITH ORIGINAL SALES INVOICE. SPECIAL ORDERS AND ITEMS ALTERED UPON PURCHASE ARE NOT ELIGIBLE FOR RETURN.
</div>
</body>
</html>
