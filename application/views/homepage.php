<script type ='text/javascript'>
	function drag(target, event) {
        event.dataTransfer.setData("itemID", target.id);
        event.dataTransfer.setData("itemCategory", target.alt);
    }

    function drop(target, event) {
        var itemID = event.dataTransfer.getData("itemID");
        var itemCategory = event.dataTransfer.getData("itemCategory");
        // only allow dropping if correct item
        if (itemCategory.length > target.className.length)
        	return;
        var slotCategory = target.className.substring(0, itemCategory.length);
        if (itemCategory != slotCategory)
        	return;

        var origImg = document.getElementById(itemID);
        var copiedImg = origImg.cloneNode(true);
        copiedImg.setAttribute("id", target.className);
        target.innerHTML = "";
        target.appendChild(copiedImg);
    }

    function replaceImage(e) {
        
    }

    function openInventoryTab(event, tabName) {
	    // Declare all variables
	    var tabContent, tabButton;

	    // Get all elements with class="tabContent" and hide them
	    tabContent = document.getElementsByClassName("tabContent");
	    for (var i = 0; i < tabContent.length; i++) {
	        tabContent[i].style.display = "none";
	    }

	    tabButton = document.getElementsByClassName("tabButton");
	    for (var i = 0; i < tabButton.length; i++) {
	        tabButton[i].className = tabButton[i].className.replace(" active", "");
	    }

	    document.getElementById(tabName).style.display = "block";
	    event.currentTarget.className += " active";
	}
</script>
<style type="text/css">

	.imageWrapper {
	  position: relative;
	}	

	#chest {
		position: absolute;
		top: 200px;
		left: 247px;
	}

	#helmet {
		position: absolute;
		top: 100px;
		left: 251px;
	}

	#ring_left {
		position: absolute;
		top: 251px;
		left: 183px;
	}
	/*ring is 50x50, each slot is 50x50*/
	#ring_right {
		position: absolute;
		top: 251px;
		left: 368px;
	}

	#amulet {
		position: absolute;
		top: 193px;
		left: 368px;
	}

	#belt {
		position: absolute;
		top: 360px;
		left: 252px;
	}

	#glove {
		position: absolute;
		top: 312px;
		left: 135px;
	}

	#boot {
		position: absolute;
		top: 312px;
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
		left: 438px;
	}

	#inventoryBox {
		position: absolute;
		top: 0px;
		left: 650px;

		border-style: double;
		border-radius: 5px;
		border-width: 5px;
		border-color: black;
	}

	.tab button {
	    background-color: inherit;
	    float: left;
	    cursor: pointer;
	    padding: 14px 7px;
	    transition: 0.3s;
	}

	.tabContent {
	    display: none;
	    margin-top: 100px;
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
				<div class="chest" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="chest" src="./assets/img/chest_slot.png" >
				</div>	
				<div class="helmet" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="helmet" src="./assets/img/helmet_slot.png">
				</div>	
				<div class="glove" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="glove" src="./assets/img/helmet_slot.png" >
				</div>	
				<div class="boot" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="boot" src="./assets/img/helmet_slot.png" >
				</div>	
				<div class="ring_left" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="ring_left" src="./assets/img/ring_slot.png">
				</div>	
				<div class="ring_right" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="ring_right" src="./assets/img/ring_slot.png">
				</div>	
				<div class="amulet" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="amulet" src="./assets/img/ring_slot.png">
				</div>	
				<div class="belt" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="belt" src="./assets/img/belt_slot.png"				>
				</div>	
				<div class="weapon_left" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="weapon_left" src="./assets/img/weapon_slot.png">
				</div>	
				<div class="weapon_right" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" >
					<img id="weapon_right" src="./assets/img/weapon_slot.png">
				</div>	
	            <div id="inventoryBox" >
	            	<h3>Inventory</h3>
	            	<hr>
	            	<div class="tab">
						<button class="tabButton" onclick="openInventoryTab(event, 'chestTab')">Chests</button>
						<button class="tabButton" onclick="openInventoryTab(event, 'helmetTab')">Helmets</button>
						<button class="tabButton" onclick="openInventoryTab(event, 'gloveTab')">Gloves</button>
						<button class="tabButton" onclick="openInventoryTab(event, 'bootTab')">Boots</button>
						<button class="tabButton" onclick="openInventoryTab(event, 'ringTab')">Rings</button>
						<button class="tabButton" onclick="openInventoryTab(event, 'amuletTab')">Amulets</button>
						<button class="tabButton" onclick="openInventoryTab(event, 'weaponTab')">Amulets</button>
					</div>

					<!-- Tab content -->
					<div id="chestTab" class="tabContent">
						<img id="chest_0" alt="chest" src="./assets/img/chest_0.png" draggable="true" ondragstart="drag(this, event)">
						<img id="chest_1" alt="chest" src="./assets/img/chest_1.png" draggable="true" ondragstart="drag(this, event)">
						<img id="chest_2" alt="chest" src="./assets/img/chest_2.png" draggable="true" ondragstart="drag(this, event)">
						<img id="chest_3" alt="chest" src="./assets/img/chest_3.png" draggable="true" ondragstart="drag(this, event)">
					</div>

					<div id="helmetTab" class="tabContent">
						<img id="helmet_0" alt="helmet" src="./assets/img/helmet_0.png" draggable="true" ondragstart="drag(this, event)">
						<img id="helmet_1" alt="helmet" src="./assets/img/helmet_1.png" draggable="true" ondragstart="drag(this, event)">
						<img id="helmet_2" alt="helmet" src="./assets/img/helmet_2.png" draggable="true" ondragstart="drag(this, event)">
						<img id="helmet_3" alt="helmet" src="./assets/img/helmet_3.png" draggable="true" ondragstart="drag(this, event)">
					</div>

					<div id="gloveTab" class="tabContent">
						<img id="glove_0" alt="glove" src="./assets/img/glove_0.png" draggable="true" ondragstart="drag(this, event)">
						<img id="glove_1" alt="glove" src="./assets/img/glove_1.png" draggable="true" ondragstart="drag(this, event)">
						<img id="glove_2" alt="glove" src="./assets/img/glove_2.png" draggable="true" ondragstart="drag(this, event)">
						<img id="glove_3" alt="glove" src="./assets/img/glove_3.png" draggable="true" ondragstart="drag(this, event)">
					</div>

					<div id="bootTab" class="tabContent">
						<img id="boot_0" alt="boot" src="./assets/img/boot_0.png" draggable="true" ondragstart="drag(this, event)">
						<img id="boot_1" alt="boot" src="./assets/img/boot_1.png" draggable="true" ondragstart="drag(this, event)">
					</div>

					<div id="ringTab" class="tabContent">
						<img id="ring_0" alt="ring" src="./assets/img/ring_0.png" draggable="true" ondragstart="drag(this, event)">
						<img id="ring_1" alt="ring" src="./assets/img/ring_1.png" draggable="true" ondragstart="drag(this, event)">
						<img id="ring_2" alt="ring" src="./assets/img/ring_2.png" draggable="true" ondragstart="drag(this, event)">
						<img id="ring_3" alt="ring" src="./assets/img/ring_3.png" draggable="true" ondragstart="drag(this, event)">						
					</div>

					<div id="amuletTab" class="tabContent">
						<img id="amulet_0" alt="amulet" src="./assets/img/amulet_0.png" draggable="true" ondragstart="drag(this, event)">
						<img id="amulet_1" alt="amulet" src="./assets/img/amulet_1.png" draggable="true" ondragstart="drag(this, event)">
						<img id="amulet_2" alt="amulet" src="./assets/img/amulet_2.png" draggable="true" ondragstart="drag(this, event)">
					</div>

					<div id="beltTab" class="tabContent">
						<img id="belt_0" alt="belt" src="./assets/img/belt_0.png" draggable="true" ondragstart="drag(this, event)">
						<img id="belt_1" alt="belt" src="./assets/img/belt_1.png" draggable="true" ondragstart="drag(this, event)">
						<img id="belt_2" alt="belt" src="./assets/img/belt_2.png" draggable="true" ondragstart="drag(this, event)">
						<img id="belt_3" alt="belt" src="./assets/img/belt_3.png" draggable="true" ondragstart="drag(this, event)">
					</div>

					<div id="weaponTab" class="tabContent">
						<img id="weapon_0" alt="weapon" src="./assets/img/weapon_0.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_1" alt="weapon" src="./assets/img/weapon_1.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_2" alt="weapon" src="./assets/img/weapon_2.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_3" alt="weapon" src="./assets/img/weapon_3.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_4" alt="weapon" src="./assets/img/weapon_4.png" draggable="true" ondragstart="drag(this, event)">
						<br>
						<img id="weapon_5" alt="weapon" src="./assets/img/weapon_5.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_6" alt="weapon" src="./assets/img/weapon_6.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_7" alt="weapon" src="./assets/img/weapon_7.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_8" alt="weapon" src="./assets/img/weapon_8.png" draggable="true" ondragstart="drag(this, event)">
						<br>
						<img id="weapon_9" alt="weapon" src="./assets/img/weapon_9.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_10" alt="weapon" src="./assets/img/weapon_10.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_11" alt="weapon" src="./assets/img/weapon_11.png" draggable="true" ondragstart="drag(this, event)">
						<img id="weapon_12" alt="weapon" src="./assets/img/weapon_12.png" draggable="true" ondragstart="drag(this, event)">
					</div>
		    	</div>
        	</div>
    
            <p> This is a customized <strong>Path of Exile</strong> custom equipment build.</p>
            <p> The project consists of weapons and armors for the user to choose and build.</p>
            <p> We are dedicated provide the best gaming experience for you!</p>
		</div>
</div>
