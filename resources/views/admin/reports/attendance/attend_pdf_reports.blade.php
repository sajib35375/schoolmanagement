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

<table id="customers">
    <tr>
        <td class="size"><strong>Employee Attendance Reports</strong></td>
        <br>Month :
        <td class="size">

            <strong>Coders71</strong><br>
            <span>Company Address : Khilgaon</span><br>
            <span>Company Email : sajib@gmail.com</span><br>
            <span>Company Phone : 01779435375</span><br>


        </td>

    </tr>
</table>
<br>
<table>
    <tr style="float: left;">
        <td><strong>Employeee Name </strong> {{ $all_data[0]['user']['name'] }}</td>

    </tr>
    <tr style="float: right;">
        <td><strong>Month </strong> {{ date('F',strtotime($month)) }}</td>
    </tr>
</table>
<br>
<table id="customers">
    <tr>
        <th width="45%">Date</th>
        <th width="45%">Attendance Status</th>
    </tr>


@foreach ($all_data as $data)
<tr>
    <td>{{ $data->date }}</td>
    <td>{{ $data->attend_status }}</td>
</tr>
@endforeach

</table>
<br><br>

<table>
    <tr style="float: left;">
        <td><strong>Total Leave </strong> {{ $all_leave }}</td>

    </tr>
    <tr style="float: right;">
        <td><strong>Total Absent </strong> {{ $all_absent }}</td>
    </tr>
</table>


<br><br>
<i style="font-size:10px; margin-top: 10px;">Print Date : {{ date('d M Y') }}</i>

<hr style="width: 95%;border: #0b0b0b solid 1px;">






<br><br>
<i style="font-size:10px; margin-top: 10px;">Print Date : {{ date('d M Y') }}</i>

</body>
</html>


