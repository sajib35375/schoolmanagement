<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Profit Data</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>EasyShop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               EasyShop Head Office
               Email:sajibsust99@gmail.com <br>
               Mob: 01779435375 <br>
               Dhaka 1219, Khilgaon, 338/13,C <br>

            </pre>
        </td>
    </tr>

  </table>




  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Employee Salary</th>
        <th>Student Fee</th>
        <th>Other Cost</th>
        <th>Total Cost</th>
        <th>Total Profit</th>

      </tr>
    </thead>
    <tbody>


      <tr class="font">

        <td align="center">{{ $employee_salary }} tk</td>
        <td align="center">{{ $student_fee }} tk</td>
        <td align="center">{{ $other_cost }} tk</td>
        <td align="center">{{ $total_cost }} tk</td>
        <td align="center">{{ $total_profit }} tk</td>
      </tr>

    </tbody>
  </table>
  <br>

  <div class="thanks mt-3">
    <p>Thanks For Using School..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
