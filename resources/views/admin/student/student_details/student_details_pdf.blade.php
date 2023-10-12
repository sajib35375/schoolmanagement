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
        <td class="size"><strong>Company Name</strong></td>
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
        <td>Student Father's Name</td>
        <td>{{ $data->student->fname }}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Student Mother's Name </td>
        <td>{{ $data->student->mname }}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Student Phone </td>
        <td>{{ $data->student->phone }}</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Student Address</td>
        <td>{{ $data->student->address }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Student Gender</td>
        <td>{{ $data->student->gender }}</td>
    </tr>
    <tr>
        <td>7</td>
        <td>Date of Birth</td>
        <td>{{ $data->student->dob }}</td>
    </tr>
    <tr>
        <td>8</td>
        <td>Religion</td>
        <td>{{ $data->student->religion }}</td>
    </tr>
    <tr>
        <td>9</td>
        <td>Discount</td>
        <td>{{ $data->discount->discount }} %</td>
    </tr>
    <tr>
        <td>10</td>
        <td>Student Year</td>
        <td>{{ $data->year->year_name }}</td>
    </tr>
    <tr>
        <td>11</td>
        <td>Student Class</td>
        <td>{{ $data->class->name }}</td>
    </tr>
    <tr>
        <td>12</td>
        <td>Student Group</td>
        <td>{{ $data->group->group_name }}</td>
    </tr>
    <tr>
        <td>13</td>
        <td>Student Shift</td>
        <td>{{ $data->shift->shift }}</td>
    </tr>

    <tr>
        <td>14</td>
        <td>Student Photo</td>
        <td><img style="width: 60px;height: 60px;" src="{{ public_path('/upload/user/'.$data->student->image) }}" alt=""></td>
    </tr>

</table>

<i style="font-size:10px;">Print Date : {{ date('d M Y') }}</i>

</body>
</html>


