<!DOCTYPE html>
<html lang="en">

<head>
    <title>ISRC CTF</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: black;
        }
        
        div.box1 {
            background-color: white;
            border-style: groove;
            width: 1000px;
            height: 100px;
            padding: 180px;
            margin: 20px;
        }
        
        /* div.box2 {
            background-color: lightgray;
            border-style: groove;
            width: 900px;
            height: 50px;
            padding: 10px;
            margin: 20px;
            position: relative;
            left: 12px;
        } */
		input[type=text],
        select {
            width: 100%;
            padding: 10px;
            padding-right: 520px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            position: relative;
            left: 33px;
        }
        
		#but {
            position: relative;
            border-radius: 12px;
            top: 7px;
            left: 70px;
            padding: 9px;
            text-align: right;
            background-color: white;
        }

		#ad{

           position: relative;
		   left: 15px;

		}
        
        .header {
            position: relative;
            left: 40px;
        }
    </style>


</head>

<body>


    <div class="container-fluid">
        <br>
        <h1 class="header" style="color: white;">Evil Calculator </h1>



        <div class="box1">
            
<code class = "justify-center w-full items-center flex flex-grow text-9xl">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$calc = $_POST['calc'];
	// echo "<h1 class='text-white'>$calc;</h1>";
	if (1 == 1){
	  try{
		
		eval("\$result =  $calc ;");
		 echo ($result);
	  }
	  catch(Exception $e){
		echo("There was an error");
	  }
	}
	
}


?>

</code>
        </div>
		<div class="row">
            <div class="col-sm-7.5">


                <form id="calcForm" action="/CTF/index.php" method="POST" class="box2">

                    <input type="text" id="calc" name="calc" placeholder="Input Field"> <br>
					<!-- <button id="but" type="submit" value="Submit">Submit</button>
                    
                </form> -->


            </div>
            <div class="col-sm-4.5">

            <button id="but" type="submit" value="Submit">Submit</button>
                    
                    </form>
            </div>
        </div>

        <h2 id="ad" style="color: white;">You can use any math formul like the ones below:</h2>

        <ul style="color: white;">
            <li>
                <p>6 * 10 + (10 - 5 - 2)</p>
            </li>
            <li>
                <p>6 * 10 / 2 + 5</p>
            </li>
            <li>
                <p>1000 * 2000 / 500</p>
            </li>
        </ul>

        <br>
        <br>




    </div>

    </div>


</body>

</html>

<?php

$calc = '';

function clean($value) {

	$pattern = '/cat|tac|file/';

	if (preg_match($pattern,$value)){
		return '"Invalid string"';
	   }
	   return $value;
}

if (isset($_GET['calc']) && !empty($_GET['calc'])){

	$str = $_GET['calc'];

	

		try {
		
		$decoded = base64_decode($str,true);
		if (base64_encode($decoded) === $str ) {
		
		$calc = clean($decoded);

		if (substr($calc, -1)=== ';') {
			$calc .= ';';
		}

		}
	}
	

 catch(Exception $e){
	$calc = '';
}
}
		

?>