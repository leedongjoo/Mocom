<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Welcome">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>서버연동실습</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Monitoring.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.6.5, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{

}</script>
    <meta name="theme-color" content="#d8dfd0">
    <meta property="og:title" content="Monitoring">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-header" id="sec-623e"><div class="u-clearfix u-sheet u-sheet-1">

        </nav>
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-6d33">
      <div class="u-clearfix u-sheet u-sheet-1">

        <br><br><center><h3>서버 연동 연습</h3><br></center>
        <script>

          function realtimeClock() {
            document.rtcForm.rtcInput.value = getTimeStamp();
            setTimeout("realtimeClock()", 1000);
          }


          function getTimeStamp() { // 24시간제
            var d = new Date();

            var s =
              leadingZeros(d.getFullYear(), 4) + '-' +
              leadingZeros(d.getMonth() + 1, 2) + '-' +
              leadingZeros(d.getDate(), 2) + ' ' +

              leadingZeros(d.getHours(), 2) + ':' +
              leadingZeros(d.getMinutes(), 2) + ':' +
              leadingZeros(d.getSeconds(), 2);

            return s;
          }


          function leadingZeros(n, digits) {
            var zero = '';
            n = n.toString();

            if (n.length < digits) {
              for (i = 0; i < digits - n.length; i++)
                zero += '0';
            }
            return zero + n;
          }

        </script>

        <body onload="realtimeClock()">
        <center>
          <form name="rtcForm">
            <input style="border:none;border-right:0px; border-top:0px; boder-left:0px; boder-bottom:0px;" type="text" name="rtcInput" size="20" readonly="readonly" />
          </form>
        </center>

        <br>
        
            <?php

                $conn = mysqli_connect("localhost", "gabkeun", "1234" , "platon");
                $sql = "SELECT * FROM member ORDER BY no DESC";
                $result = mysqli_query($conn, $sql);

                $number = 0;

                echo "<center><table width = '1000' bordercolor='grey' cellpadding='0' cellspacing='0' bordercolor='#000000' style='border-collapse:collapse'><th>순서</th><th>이름</th><th>학번</th><th> 학과 </th><th> 전화번호 </th><th>주소</th>";


                while($row = mysqli_fetch_assoc($result)) {      

                   echo "<tr>
                          <td width='40' align='center'>".$number."</td><td width='150' align='center'>".$row['name']."</td><td width='150' align='center'>".$row['code']."</td><td width='150' align='center'>".$row['division']."</td><td width='200' align='center'>".$row['phoneNo']."</td><td width='200' align='center'>".$row['address']."</td></tr>";

                   $number = $number+1;

                } 

               
                echo "</table></center><br>";
                mysqli_close($conn);
                  
            ?> 

        <br><br>    

        </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-55c8"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">PLATON</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      
    </section>
  </body>
</html>