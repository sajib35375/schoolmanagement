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
        <td class="size"><strong>Employee Details</strong></td>
        <br>
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
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Employee Id</td>
        <td>{{ $data->id_no }}</td>
    </tr>

    <tr>
        <td>3</td>
        <td>Employee Phone </td>
        <td>{{ $data->phone }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Employee Address</td>
        <td>{{ $data->address }}</td>
    </tr>


    <tr>
        <td>5</td>
        <td>Gender</td>
        <td>{{ $data->gender }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Data of Birth</td>
        <td> {{ date('Y-m-d',strtotime($data->dob)) }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Join Date</td>
        <td> {{ date('Y-m-d',strtotime($data->join_date )) }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Employee Designation</td>
        <td>{{ $data->designation->name }}</td>
    </tr>


    <tr>
        <td>6</td>
        <td>Employee Photo</td>
        <td><img style="width: 50px;height: 50px;" src="{{ public_path('images/employee/'.$data->image) }}" alt=""></td>
    </tr>


</table>
<br><br>
<i style="font-size:10px; margin-top: 10px;">Print Date : {{ date('d M Y') }}</i>


</body>
</html>


