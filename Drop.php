<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        font-family: "Arial";
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    ul{
        list-style: none;
    }
    .dropdown{
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%);
    }
    button{
        position: relative;
        width: 200px;
        height: 60px;
        font-size: 24px;
        background: #2196F3;
        border: none;
        box-shadow: none;
        outline: none;
        cursor: pointer;
    }
    ul{
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%; 
        background: #CCC;
        text-align: center;
        transform-origin: top;
    }
    ul li a{
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #FFF;
        background: #262626;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
    }
    ul li a:hover{
        background: #000;
    }
</style>



<body>
    

    <div class="dropdown">
        <button id="boton">Drop</button>
        <ul id="dropMenu">
            <li><a href="#">OPCIÓN 1</a></li>
            <li><a href="#">OPCIÓN 2</a></li>
            <li><a href="#">OPCIÓN 3</a></li>
            <li><a href="#">OPCIÓN 4</a></li>
            <li><a href="#">OPCIÓN 5</a></li>
        </ul>
    </div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    let boton = $('#boton');
    let dropMenu = $('#dropMenu');
    
    dropMenu.hide();
    boton.click(function(){
        dropMenu.slideToggle(400);
    });

</script>






</body>
</html>