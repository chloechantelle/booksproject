<body>
<nav class="navbar navbar-default">
<div class="container-fluid">

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">	

<li class="logo"><a href="../index.php" class="item">Books Database</a></li>

<li><a class="active" href="../model/view_books.php" class="item"><i class="fas fa-book"></i> View Books</a></li>

<li><a class="active" href="../view/add.php" class="item"><i class="fas fa-plus"></i> Add Books</a></li>

<li><a class="active" href="../model/log.php" class="item"><i class="fas fa-clipboard-list"></i> Log</a></li>
<li class="active"><a href="../controller/logout_process.php" class="item"><i class="fas fa-sign-in-alt"></i> Log out</a></li>

<li class="right active"><a href="#" class="item"><i class="far fa-user"></i> Welcome <span><?php 
echo $_SESSION['CurrentUser'];
?></span>!</a></li>

</nav>
<div class="pagehead"><p>Books Database</p></div>
