
<!DOCTYPE html>
<html>
<head>
    <title>Gamepage</title>
    <link rel="stylesheet" href="mystyle.css"/>
    
    <script>    
        function reset(){
            document.getElementById(1).style.backgroundColor = "white";
            document.getElementById(2).style.backgroundColor = "white";
            document.getElementById(3).style.backgroundColor = "white";
            document.getElementById(4).style.backgroundColor = "white";
            document.getElementById(5).style.backgroundColor = "white";
            document.getElementById(6).style.backgroundColor = "white";
        }
        function placeHere(id){
            reset();
            document.getElementById(id).style.backgroundColor = "#D3D3D3";
        }
        
        function buyCasaDeBanho(id){
            id.style.border = "2px solid red";
        }
    </script>
</head>
<body>
    
    <div id="wrapper">
        <div id="content">
            <div class="menu">
                <ul>
                    <li value="0"><div class="buybutton" onclick="buyCasaDeBanho(this)">Buy<p>10$</p></div></li>
                    <li value="0"><div class="buybutton">Buy<p>10$</p></div></li>
                    <li value="0"><div class="buybutton">Buy<p>10$</p></div></li>
                    <li value="0"><div class="buybutton">Buy<p>10$</p></div></li>
                    <li value="0"><div class="buybutton">Buy<p>10$</p></div></li>
                </ul>
            </div>
            <div class="game">
            </div>
            <div class="clearfix"></div>
        </div>
    <div class="footer">text</div>
    </div>
</body>
</html>