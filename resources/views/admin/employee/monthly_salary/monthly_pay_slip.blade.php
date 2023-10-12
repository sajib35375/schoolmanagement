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
{{--@dd($pay_slip);--}}
@php

    $absent_count = $count_absent;
    $present_salary = $pay_slip->user->salary;
    $salary_per_day = $present_salary/30;
    $absent_amount = $salary_per_day*$absent_count;
    $month_salary = round($present_salary - $absent_amount);
@endphp
<table id="customers">
    <tr>
        <td class="size"><strong>Pay Slip For Admin</strong></td>
        <br>Month :
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
        <th width="45%">Employee Details</th>
        <th width="45%">Employee Data</th>
    </tr>




    <tr>
        <td>1</td>
        <td>Employee Name</td>
        <td>{{ $pay_slip->user->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Employee Id</td>
        <td>{{ $pay_slip->user->id_no }}</td>
    </tr>

    <tr>
        <td>3</td>
        <td>Employee Salary </td>
        <td>{{ $pay_slip->user->salary }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Employee Absent</td>
        <td>{{ $absent_count }}</td>
    </tr>


    <tr>
        <td>5</td>
        <td>Salary This Month</td>
        <td>{{ $month_salary }} BDT</td>
    </tr>



</table>
<br><br>
<i style="font-size:10px; margin-top: 10px;">Print Date : {{ date('d M Y') }}</i>

<hr style="width: 95%;border: #0b0b0b solid 1px;">





<table id="customers">
    <tr>
        <td class="size"><strong>Pay Slip For Employee</strong></td>
        <br>Month :
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
        <th width="45%">Employee Details</th>
        <th width="45%">Employee Data</th>
    </tr>




    <tr>
        <td>1</td>
        <td>Employee Name</td>
        <td>{{ $pay_slip->user->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Employee Id</td>
        <td>{{ $pay_slip->user->id_no }}</td>
    </tr>

    <tr>
        <td>3</td>
        <td>Employee Salary </td>
        <td>{{ $pay_slip->user->salary }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Employee Absent</td>
        <td>{{ $absent_count }}</td>
    </tr>


    <tr>
        <td>5</td>
        <td>Salary This Month</td>
        <td>{{ $month_salary }} BDT</td>
    </tr>



</table>
<br><br>
<i style="font-size:10px; margin-top: 10px;">Print Date : {{ date('d M Y') }}</i>

</body>
</html>


