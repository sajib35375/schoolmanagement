<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        span {
            font-size: 10px;
        }
        strong {
            font-weight: bold;
        }
        table tr td {
            font-size: 12px;
            font-weight: normal;
        }
        table tr td.size {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

@php

   $all_fee = \App\Models\FeeAmount::where('fee_id',1)->where('class_id',$data->class_id)->first();
   $original_fee = $all_fee->amount;
   $discount_fee = $data->discount->discount;
   $discount_amount = $discount_fee/100*$original_fee;
   $final_fee = $original_fee - $discount_amount;

@endphp
<table id="customers">
    <tr>
        <td class="size"><strong>Pay Slip For School</strong></td>
        <td class="size">

            <strong>Coders71</strong><br>
            <span>Company Address : Khilgaon</span><br>
            <span>Company Email : sajib@gmail.com</span><br>
            <span>Company Phone : 01779435375</span><br>


        </td>

    </tr>
</table>

<table id="customers">
    <tr>
        <th width="10%">SL</th>
        <th width="45%">Student Details</th>
        <th width="45%">Student Data</th>
    </tr>




    <tr>
        <td>1</td>
        <td>Student Name</td>
        <td>{{ $data->student->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Student Id</td>
        <td>{{ $data->student->id_no }}</td>
    </tr>

    <tr>
        <td>3</td>
        <td>Student Phone </td>
        <td>{{ $data->student->phone }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Student Address</td>
        <td>{{ $data->student->address }}</td>
    </tr>


    <tr>
        <td>5</td>
        <td>Original fee</td>
        <td>{{ $original_fee }} BDT</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Discount fee</td>
        <td> {{ $discount_amount }} BDT</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Total Fee</td>
        <td> {{ $final_fee }} BDT</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Student Year</td>
        <td>{{ $data->year->year_name }}</td>
    </tr>
    <tr>
        <td>7</td>
        <td>Student Class</td>
        <td>{{ $data->class->name }}</td>
    </tr>




</table>
<br><br>
<i style="font-size:10px; margin-top: 10px;">Print Date : {{ date('d M Y') }}</i>

<hr style="width: 95%;border: #0b0b0b solid 1px;">



<table id="customers">
    <tr>
        <td class="size"><strong>Pay Slip For Student</strong></td>
        <td class="size">

            <strong>Coders71</strong><br>
            <span>Company Address : Khilgaon</span><br>
            <span>Company Email : sajib@gmail.com</span><br>
            <span>Company Phone : 01779435375</span><br>


        </td>

    </tr>
</table>

<table id="customers">
    <tr>
        <th width="10%">SL</th>
        <th width="45%">Student Details</th>
        <th width="45%">Student Data</th>
    </tr>




    <tr>
        <td>1</td>
        <td>Student Name</td>
        <td>{{ $data->student->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Student Id</td>
        <td>{{ $data->student->id_no }}</td>
    </tr>

    <tr>
        <td>3</td>
        <td>Student Phone </td>
        <td>{{ $data->student->phone }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Student Address</td>
        <td>{{ $data->student->address }}</td>
    </tr>


    <tr>
        <td>5</td>
        <td>Original fee</td>
        <td>{{ $original_fee }} BDT</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Discount fee</td>
        <td> {{ $discount_amount }} BDT</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Total Fee</td>
        <td> {{ $final_fee }} BDT</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Student Year</td>
        <td>{{ $data->year->year_name }}</td>
    </tr>
    <tr>
        <td>7</td>
        <td>Student Class</td>
        <td>{{ $data->class->name }}</td>
    </tr>




</table>
<br><br>
<i style="font-size:10px; margin-top: 10px;">Print Date : {{ date('d M Y') }}</i>

</body>
</html>


