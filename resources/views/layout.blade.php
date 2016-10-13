<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>

    <style type="text/css">
	
	body {  
		   text-align: center; 
	}  	
	
	div #wrapper {  
    	width: 800px;  
    	margin: 0 auto;  
    	text-align: left;  
    	border: 1px solid #FF0000;  
	}
	  
	</style>
	<!-- CSSを追加 --><!-- ① 追加 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>

	@section('sidebar')
            <!-- This is the master sidebar. -->
    @yield('contact')
    @show

	<div style="align:center" class="container">
    	@yield('content')
 	</div>
</body>
</html>