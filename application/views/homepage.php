<link rel="stylesheet" type="text/css" href="/assets/css/homepage.css"/>
<script src="/assets/js/homepage.js" type="text/javascript"></script>
<div class="POE_main">
	
		<h1 id="homepage-title">Welcome to Path of Exile Inventory Simulator!</h1>
		<div class="homepage-content">
            <div id="preset-dropdown">
            <select id="presetDropdown" class="round" onchange="changePreset();">
                {presets}
                  <option id={id} value={name}>{name}</option>
                {/presets}
            </select>
        	</div>
			<div id="statsBox">
				<table>
					<tr>					
						<h3>Stats</h3 >
					</tr>
					<tr>					
						<td>Strength</td>
						<td>Dexterity</td>
						<td>Intelligence</td>
					</tr>
					<tr>					
						<td id="strField">0</td>	
						<td id="dexField">0</td>
						<td id="intField">0</td>
					</tr>
				</table>
			</div>	
		    {savingcontrols}
            <div class="imageWrapper">
        		<img id="base-image" src="./assets/img/background.png" />
        		<div id="slots"/>
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
						<button class="tabButton" onclick="openInventoryTab(event, 'beltTab')">Belts</button>
						<button class="tabButton" onclick="openInventoryTab(event, 'weaponTab')">Weapons</button>
					</div>
					<!-- Tab content -->
					<div id="chestTab" class="tabContent"></div>
					<div id="helmetTab" class="tabContent"></div>
					<div id="gloveTab" class="tabContent"></div>
					<div id="bootTab" class="tabContent"></div>
					<div id="ringTab" class="tabContent"></div>
					<div id="amuletTab" class="tabContent"></div>
					<div id="beltTab" class="tabContent"></div>
					<div id="weaponTab" class="tabContent"></div>
		    	</div>
        	</div>
    
            <p> This is a customized <strong>Path of Exile</strong> custom equipment build.</p>
            <p> The project consists of weapons and armors for the user to choose and build.</p>
            <p> We are dedicated provide the best gaming experience for you!</p>
		</div>
</div>