<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style> 

</style>
</head>
<body>

<p>Animated search form:</p>
<!-- pesquisa -->
<!-- Carregar a libraria de Icon-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- As formas -->
<form class="UserSearch" method="post" action="find_user_logic.php">
  <input type="text" placeholder="Search..." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

</body>
</html>
<form  name="frmPesquisa" method="post" action="find_user_logic.php">
           Search User: <input type="text" placeholder="Search" aria-label="Search" name="search">
            <button type="submit">Search</button>
          </form><br><br>