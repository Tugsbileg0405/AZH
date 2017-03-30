@extends('layouts.app')

<style type="text/css">

body{
	background:#f3f3e1;
}	
.wrap{
	margin:0 auto;
	width:1000px;
}
.logo{
	margin-top:50px;
}	
.logo h1{
	font-size:200px;
	color:#8F8E8C;
	text-align:center;
	margin-bottom:1px;
	text-shadow:1px 1px 6px #fff;
}	
.logo p{
	color:rgb(228, 146, 162);
	font-size:20px;
	margin-top:1px;
	text-align:center;
}	
.logo p span{
	color:lightgreen;
}	
.sub a{
	color:white;
	background:#8F8E8C;
	text-decoration:none;
	padding:7px 120px;
	font-size:13px;
	font-weight:bold;
	-webkit-border-radius:3em;
	-moz-border-radius:.1em;
	-border-radius:.1em;
}	
.sub a:hover{
	color:white;
}
</style>
</head>


<body>
	<div class="wrap">
	   <div class="logo">
	   <h1>503</h1>
	    <p>Алдаа! 503</p>
  	      <div class="sub">
	        <p><a href="{{url('/')}}">Нүүр хуудасруу очих</a></p>
	      </div>
        </div>
	</div>
	
</body>