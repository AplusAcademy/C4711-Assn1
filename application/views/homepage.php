<script type ='text/javascript'>
    function replaceImage(e) {
        if (e.selectedIndex < 3)
        	overlayImages(e.selectedIndex);
        else
        {
	    	var target = document.getElementById("paste_stuff_here");
	    	target.innerHTML = "";
        	document.getElementById("base-image").src = "./assets/img/" + e.value + ".png";
        }
    }

    function overlayImages(index) {
    	var l1 = ["weapon_10", "weapon_8", "helmet_1", "glove_1", "boot_0", "chest_3", "amulet_2", "ring_0", "ring_0", "belt_0"]
    	var l2 = ["weapon_9" , "weapon_9", "helmet_3", "",        "boot_1", "chest_1", "amulet_0", "",       "",       "belt_3"]
    	var l3 = ["weapon_1" , "weapon_0", "helmet_0", "glove_3", "",       "chest_2", "amulet_1", "ring_1", "ring_1", "belt_1"]
    	var base = ["weapon_left", "weapon_right", "helmet", "glove", "boot", "chest", "amulet", "ring_left", "ring_right", "belt"]
    	var curr;
    	switch(index)
    	{
    		case 0:
    		curr = l1;
    			break;
    		case 1:
    		curr = l2;
    			break;
    		case 2:
    		curr = l3;
    			break;
    	}

    	var target = document.getElementById("paste_stuff_here");
    	target.innerHTML = "";
    	for (var i = curr.length - 1; i >= 0; i--) {
    		if (curr[i] == "")
    		{
    			continue;
    		}

        	var newImg = document.createElement('img');
        	newImg.setAttribute("id", base[i]);
        	newImg.setAttribute("src", "./assets/img/" + curr[i] + ".png");
    		target.appendChild(newImg);

    	}
    }
</script>
<style type="text/css">

	.imageWrapper {
	  position: relative;
	}	

	#chest {
		position: absolute;
		top: 200px;
		left: 250px; /*shared*/
	}

	#helmet {
		position: absolute;
		top: 100px;
		left: 250px;
	}

	#ring_left {
		position: absolute;
		top: 250px;
		left: 180px;
	}
	/*ring is 50x50, each slot is 50x50*/
	#ring_right {
		position: absolute;
		top: 250px;
		left: 370px;
	}

	#amulet {
		position: absolute;
		top: 190px;
		left: 370px;
	}

	#belt {
		position: absolute;
		top: 350px;
		left: 250px;
	}

	#glove {
		position: absolute;
		top: 310px;
		left: 130px;
	}

	#boot {
		position: absolute;
		top: 310px;
		left: 370px;
	}

	#weapon_left {
		position: absolute;
		top: 110px;
		left: 65px;
	}

	#weapon_right {
		position: absolute;
		top: 110px;
		left: 440px;
	}

</style>
<div class="POE_main">
	
		<h1 id="homepage-title">Welcome to Path of Exile custom mod!</h1>
		<div class="homepage-content">
            <div id="preset-dropdown">
            <select class="round" name="preset-dropdown" onchange="replaceImage(this);">
                {parts}
                  <option value={name}>{name}</option>
                {/parts}
            </select>
            </div>
            <div class="imageWrapper">
            	
        		<img id="base-image" src="./assets/img/background.png" />
        		<div id="paste_stuff_here"/>
        		<!-- for testing only -->
				<!-- <img id="chest" src="./assets/img/chest_0.png">
				<img id="helmet" src="./assets/img/helmet_0.png">
				<img id="ring_left" src="./assets/img/ring_5.png">
				<img id="ring_right" src="./assets/img/ring_5.png">
				<img id="amulet" src="./assets/img/amulet_0.png">
				<img id="belt" src="./assets/img/belt_0.png">
				<img id="glove" src="./assets/img/glove_0.png">
				<img id="boot" src="./assets/img/boot_0.png">
				<img id="weapon_left" src="./assets/img/weapon_0.png">
				<img id="weapon_right" src="./assets/img/weapon_0.png"> -->
            </div>
            <p> This is a customized <strong>Path of Exile</strong> custom equipment build.</p>
            <p> The project consists of weapons and armors for the user to choose and build.</p>
            <p> We are dedicated provide the best gaming experience for you!</p>
		</div>
</div>
