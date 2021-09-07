<html>
<head>
        <title>My Pixabay API</title>
</head>
<body>  
<div class="container">
        <center>
                <h1>Welcome to my Pixabay API!</h1>
        </center>
        
        <form action="http://localhost/site/index.php/API/callapi" method="post">
           <center> 
             <label for="">Search Query :</label> <br/><br/>
             <input type="text" name="img_search" id="img_search" required>
           </center>
        <ul>
                <li>
                        <input type="radio" id="type" name="type" value="Images" required>
                        <label for="type" class="">IMAGE</label>
                        <div class="check"></div>
                </li>
                <li>
                        <input type="radio" id="types" name="type" value="Videos" required>
                        <label for="types" class="">VIDEO</label>
                        <div class="check"><div class="inside"></div></div>
                </li>
        </ul>
        <button type="submit" class="button -green center">Search</button>   
        </form>
</div>
<center >
        <h1>Result:</h1>
<?php echo $new_tags;?>
</center>

<style>
  @import url('https://fonts.googleapis.com/css?family=Lato');
  :root {
  --color-grass: #3dd28d;
  --color-snow: #FFFFFF;
}
body, html{
  height: 100%;
  background: #222222;
  font-family: 'Lato', sans-serif;
}
label{
  color:#fff;
}
input 				{
  font-size:18px;
  padding:10px 10px 10px 5px;
  display:block;
  width:300px;
  border:none;
  border-bottom:1px solid #757575;
}
.button {
  display: flex;
  overflow: hidden;

  margin-top: 25px;
  padding: 22px 220px;

  cursor: pointer;
  user-select: none;
  transition: all 150ms linear;
  text-align: center;
  white-space: nowrap;
  text-decoration: none !important;
  text-transform: none;
  text-transform: capitalize;

  color: #fff;
  border: 0 none;
  border-radius: var(--borderRadius);

  font-size: 18px;
  font-weight: 500;
  line-height: 2.3;
  justify-content: center;
  align-items: center;
  flex: 0 0 150px;
  
  &:hover {
    transition: all 150ms linear;

    opacity: .85;
  }
  
  &:active {
    transition: all 150ms linear;
    opacity: .75;
  }
  
  &:focus {
    outline: 1px dotted #959595;
    outline-offset: -4px;
  }
}
.button.-green {
  color: var(--color-snow);
  background: var(--color-grass);
}

.container{
  display: block;
  position: relative;
  margin: 40px auto;
  height: auto;
  width: 500px;
  padding: 20px;
}

h1 {
	color: #28a2a2;
}

ul li{
  color: #AAAAAA;
  display: block;
  position: relative;
  float: left;
  width: 100%;
  height: 100px;
	border-bottom: 1px solid #333;
}

ul li input[type=radio]{
  position: absolute;
  visibility: hidden;
}

ul li label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 1.15em;
  padding: 25px 25px 25px 80px;
  margin: 10px auto;
  height: 30px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
}

ul li:hover label{
	color: #FFFFFF;
}

ul li .check{
  display: block;
  position: absolute;
  border: 5px solid #AAAAAA;
  border-radius: 100%;
  height: 25px;
  width: 25px;
  top: 30px;
  left: 20px;
	z-index: 5;
	transition: border .25s linear;
	-webkit-transition: border .25s linear;
}

ul li:hover .check {
  border: 5px solid #FFFFFF;
}

ul li .check::before {
  display: block;
  position: absolute;
	content: '';
  border-radius: 100%;
  height: 15px;
  width: 15px;
  top: 5px;
	left: 5px;
  margin: auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 5px solid #0DFF92;
}

input[type=radio]:checked ~ .check::before{
  background: #0DFF92;
}

input[type=radio]:checked ~ label{
  color: #0DFF92;
}
        </style>
</body>
</html>