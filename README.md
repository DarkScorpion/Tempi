Lightweight framework processing templates.

*Example:*
**main.php**
   
     require_once('Tempi/Tempi.php');
        
     $html = file_get_contents('test.html');
        
     $tempi = new Tempi(); //default marker variables: ##
     $testArr = Array(
        'T1' => 'replaced t1',
        'T2' => 'replaced t2',
        'T3' => 'replaced t3'
     );
     $result = $tempi->replace($html, $testArr);
     echo $result;
**test.html**

    <!DOCTYPE html>
    <html>
    <head>
      <title>Tempi test</title>
    </head>
    <body>
      ##T1## <br>
      {{T2}} <br>
      $T3$ <br>
    </body>
    </html>
If you want to choose your markers variables

    $tempi = new Tempi('$'); //$T3$ will be replaced
   or

    $tempi = new Tempi('{{','}}'); //{{T2}} will be replaced