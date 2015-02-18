<!DOCTYPE html>

<html>
<head>
    <title>LET'S BATTLE</title>
    <style>
        .player
        {
            float: left;
            height:  250px;
            width:  200px;
            border: 2px solid black;
            margin:  50px 25px 50px 50px;
        }
    </style>
    <script>
        function calcLuck(forca, defesaOp){
            var luck = (forca * 50)/defesaOp;
            if (luck > 80) {
                luck = 80;
            }
                var x = Math.floor(Math.random() * 101);
                if (x < luck) {
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            document.getElementById("popBox").innerHTML = xmlhttp.responseText;
                        }
                    }
                        xmlhttp.open("GET", "getItem.php", true);
                        xmlhttp.send();
                    }
                    else{
                    alert("Your attack failed");
                }
        }
    </script>
</head>

<body>
        <div class="player">
            
        </div>
        
        <div class="player"></div>
</body>
</html>
