​

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <title>Insert title here</title>

</head>

<body>

  <style>
    table,
    tr,
    td {

      border: 1px solid #000000;

      border-collapse: collapse;

    }

    table {

      width: 100%;

    }

    h1 {

      text-align: center;

    }

    td {

      text-align: center;

    }

    a:active {
      text-decoration: none;
    }

    a:hover {
      text-decoration: none;
    }

    a:link {
      text-decoration: none;
    }

    a:visited {
      text-decoration: none;
    }

    #holiday {
      color: #FF0000
    }
  </style>

  </head>

  <body>

    <div>

      <h1>2022년</h1>

    </div>

    <h1>6월의 일정</h1>

    <table>

      <tr>

        <td>일요일</td>

        <td>월요일</td>

        <td>화요일</td>

        <td>수요일</td>

        <td>목요일</td>

        <td>금요일</td>

        <td>토요일</td>

      </tr>

      <tr>

        <td></td>

        <td></td>

        <td></td>

        <td>1</td>

        <td>2</td>

        <td>3</td>

        <td id="holiday">4</td>

      </tr>

      <tr>

        <td id="holiday">5</td>

        <td id="holiday">6</td>

        <td>7</td>

        <td>8</td>

        <td>9</td>

        <td>10</td>

        <td id="holiday">11</td>

      </tr>

      <tr>

        <td id="holiday">12</td>

        <td>13</td>

        <td>14</td>

        <td>15</td>

        <td>16</td>

        <td>17</td>

        <td id="holiday">18</td>

      </tr>

      <tr>

        <td id="holiday">19</td>

        <td>20</td>

        <td>21</td>

        <td>22</td>

        <td>23</td>

        <td>24</td>

        <td id="holiday">25</td>

      </tr>

      <tr>

        <td id="holiday">26</td>

        <td>27</td>

        <td>28</td>

        <td>29</td>

        <td>30</td>
      </tr>





    </table>

  </body>

</html>
        <br>
        
            <?php

                $conn = mysqli_connect("localhost", "dongjoo", "1234" , "calender");
                $sql = "SELECT * FROM calender ORDER BY no DESC";
                $result = mysqli_query($conn, $sql);

                $number = 0;

                echo "<center><table width = '1000' bordercolor='grey' cellpadding='0' cellspacing='0' bordercolor='#000000' style='border-collapse:collapse'><th>순서</th><th>월</th><th>일</th><th> 일정 이름 </th><th> 일정 정보 </th>";


                while($row = mysqli_fetch_assoc($result)) {      

                   echo "<tr>
                          <td width='40' align='center'>".$number."</td><td width='150' align='center'>".$row['month']."</td><td width='150' align='center'>".$row['day']."</td><td width='150' align='center'>".$row['name']."</td><td width='200' align='center'>".$row['contents']."</td><td width='200'</tr>";

                   $number = $number+1;

                } 

               
                echo "</table></center><br>";
                mysqli_close($conn);
                  
            ?> 

        <br><br>    

        </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-55c8"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">캘린더</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      
    </section>
  </body>
</html>
