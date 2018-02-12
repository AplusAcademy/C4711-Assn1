<script type ='text/javascript'>
    function replaceImage(e) {
        document.getElementById("base-image").src = "./assets/img/" + e.value + ".png";
    }
</script>
<div class="POE_main">
	<div> 
		<h1 id="homepage-title">Welcome to Path of Exile custom mod!</h1>
		<div class="homepage-content">
                    <div id="preset-dropdown">
                    <select class="round" name="preset-dropdown" onchange="replaceImage(this);">
                        {parts}
                          <option value={name}>{name}</option>
                        {/parts}
                    </select>
                    </div>
                    <img id="base-image" src="./assets/img/background.png" />
                    <p> This is a customized <strong>Path of Exile</strong> custom equipment build.</p>
                    <p> The project consists of weapons and armors for the user to choose and build.</p>
                    <p> We are dedicated provide the best gaming experience for you!</p>
		</div>
	</div>
</div>
