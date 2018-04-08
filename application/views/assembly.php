<script src="/assets/js/assembly.js" type="text/javascript"></script>
<div class="POE_assembly">
    <form method="post" action="/EquipmentsController/requestItemUpdate">
	    <h1 id="assembly-title">Equipment - Path of Exile Inventory Simulator 
	    	{saveButton}
	    	</h1>
	    <div class="assembly-content">
	        {adminWarning}
	        <p>This is the {page_category} page.</p>
	    </div>
	    <div class="row">
			{items}
			<div id={id} class="col-xs-4">
				<img class="img-responsive col-xs-6" src="/assets/img/{id}.png" title="{name}">
				<input hidden type="text" name="id[]" value="{id}">
				<input type="text" name="name[]" placeholder="item name" value="{name}">
		        <input type="number" name="str[]" placeholder="strength" value="{str}">
		        <input type="number" name="dex[]" placeholder="dexterity" value="{dex}">
		        <input type="number" name="int[]" placeholder="intelligence" value="{int}">
		        <select class="col-xs-6" name="category[]">
		            <option selected="selected" value={category}>
		                {category}
		            </option>
		        </select>
			</div>
			{/items}
	    </div> 
	</form>
</div>
