<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap3.3.7.min.css"/>
        <script src="/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
        <script src="/assets/js/jquery3.3.7.min.js" type="text/javascript"></script>
        <script src="/assets/js/bootstrap3.3.7.min.js" type="text/javascript"></script>

        </head>
	<body>
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  
                  <a class="navbar-brand" href="/homepage">Path of Exile Customization</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="/homepage">Homepage</a></li>
                    <li><a href="">Equipments</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a role="menuitem" href="/EquipmentsController">All Equipments</a></li>
                            <li><a role="menuitem" href="/category/amulet">Amulet</a></li>
                            <li><a role="menuitem" href="/category/belt">Belt</a></li>
                            <li><a role="menuitem" href="/category/boot">Boots</a></li>
                            <li><a role="menuitem" href="/category/glove">Gloves</a></li>
                            <li><a role="menuitem" href="/category/helmet">Helmet</a></li>
                            <li><a role="menuitem" href="/category/chest">Chest</a></li>
                            <li><a role="menuitem" href="/category/ring">Ring</a></li>
                            <li><a role="menuitem" href="/category/weapon">Weapon</a></li>
                        </ul>
                    </li>
                    <li><a href="/assembly">Assembly</a></li>
                    <li><a href="/about">About</a></li>
                  </ul>
                  
                </div>
              </div>
            </nav>
            <div id="container">
                            {content}
                            <p class="footer">Path of Exile by Team Recoil</p>
            </div>
	</body>
</html>