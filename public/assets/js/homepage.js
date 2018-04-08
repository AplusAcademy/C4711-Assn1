var str = 0;	
var dex = 0;	
var int = 0;	

function drag(target, event) {
    event.dataTransfer.setData("itemID", target.id);
    event.dataTransfer.setData("itemCategory", target.getAttribute("data-category"));
    event.dataTransfer.setData("itemStr", target.getAttribute("data-str"));
    event.dataTransfer.setData("itemDex", target.getAttribute("data-dex"));
    event.dataTransfer.setData("itemInt", target.getAttribute("data-int"));
}

function drop(target, event) {
    var itemID = event.dataTransfer.getData("itemID");
    var itemCategory = event.dataTransfer.getData("itemCategory");
    var itemStr = event.dataTransfer.getData("itemStr");
    var itemDex = event.dataTransfer.getData("itemDex");
    var itemInt = event.dataTransfer.getData("itemInt");
    // only allow dropping if correct item
    var slotCategory = target.getAttribute("data-category"); 
    if (itemCategory != slotCategory)
    	return;

    var origImg = document.getElementById(itemID);
    var newItem = origImg.cloneNode(true);

    var oldItem = target.firstElementChild;
    var oldItemID = oldItem.id;
    str -= parseInt(oldItem.getAttribute("data-str"));
    dex -= parseInt(oldItem.getAttribute("data-dex"));
    int -= parseInt(oldItem.getAttribute("data-int"));
    target.innerHTML = "";
    
    //will have problems with cloned ids
    newItem.setAttribute("id", oldItemID);
    str += parseInt(newItem.getAttribute("data-str"));
    dex += parseInt(newItem.getAttribute("data-dex"));
    int += parseInt(newItem.getAttribute("data-int"));
    target.appendChild(newItem);
    updateStats();
}

function updateStats() {
	var strField = document.getElementById("strField");
	strField.innerHTML = str;
	var dexField = document.getElementById("dexField");
	dexField.innerHTML = dex;
	var intField = document.getElementById("intField");
	intField.innerHTML = int;
}

function fillEmptySlot(slotID)
{
	// do a lookup of slotID to slot img
	$.getJSON("slots/" + slotID, function(data){
		var slot = data[0];

		var emptySlot = document.createElement("img");
	    emptySlot.setAttribute("id", slot.id);
		emptySlot.setAttribute("src", "./assets/img/" + slot.name + ".png");
		emptySlot.setAttribute("alt", "");
		emptySlot.setAttribute("data-str", 0);
		emptySlot.setAttribute("data-dex", 0);
		emptySlot.setAttribute("data-int", 0);
		emptySlot.setAttribute("title", slot.category);

		var oldItemRoot = document.querySelector("." + slotID);
		var oldItem = oldItemRoot.firstElementChild;
	    str -= parseInt(oldItem.getAttribute("data-str"));
	    dex -= parseInt(oldItem.getAttribute("data-dex"));
	    int -= parseInt(oldItem.getAttribute("data-int"));
	    oldItemRoot.innerHTML = "";
		oldItemRoot.appendChild(emptySlot);
	    updateStats();
	});
}

function changePreset() {
    var presetDropdown = document.getElementById("presetDropdown");
	var presetId = presetDropdown.options[presetDropdown.selectedIndex].id;
	$.getJSON("presets/" + presetId, function(data){
		var items = {};
        $.each(data[0], function(key, val)
        {        	
			if (key != "id" && key != "name" && val != ".")
				items[key] = val;
			if (val == ".")
				fillEmptySlot(key);
        });
        $.each( items, function( key, val ) {
			$.getJSON("singleItem/" + val, function(itemData){
				var item = itemData[0];
				// apparently jQuery can see key var even tho not passed in here
				var oldItemRoot = document.querySelector("." + key);
				var oldItem = oldItemRoot.firstElementChild;
			    str -= parseInt(oldItem.getAttribute("data-str"));
			    dex -= parseInt(oldItem.getAttribute("data-dex"));
			    int -= parseInt(oldItem.getAttribute("data-int"));
			    oldItemRoot.innerHTML = "";
			    
				var newItem = document.createElement("img");
			    newItem.setAttribute("id", key);
				newItem.setAttribute("src", "./assets/img/" + item.id + ".png");
				newItem.setAttribute("alt", item.id);
				newItem.setAttribute("data-str", item.str);
				newItem.setAttribute("data-dex", item.dex);
				newItem.setAttribute("data-int", item.int);

			    str += parseInt(newItem.getAttribute("data-str"));
			    dex += parseInt(newItem.getAttribute("data-dex"));
			    int += parseInt(newItem.getAttribute("data-int"));
			    oldItemRoot.appendChild(newItem);
			    updateStats();
			});
		});
    });
}

/* Load/Unloads the homepage inventory. */
function openInventoryTab(event, tabName) {
    // Declare all variables
    var tabContent, tabButton;

    // Get all elements with class="tabContent" and hide them
    tabContent = document.getElementsByClassName("tabContent");
    for (var i = 0; i < tabContent.length; i++)
        tabContent[i].style.display = "none";

    tabButton = document.getElementsByClassName("tabButton");
    for (var i = 0; i < tabButton.length; i++)
        tabButton[i].className = tabButton[i].className.replace(" active", "");

    document.getElementById(tabName).style.display = "block";
    event.currentTarget.className += " active";
}

$().ready(function() {
	//dropdown is already populated in php

	//populate inv
	$.ajax({
		url: "/category/all",
		dataType: 'json',
		error: function( data ) {
			console.log( 'ERROR: ', data );
		},
		success: function( data ) {
			console.log( 'SUCCESS INV: ' );
			$.each( data, function( key, val ) {

				var item = document.createElement("img");
				item.setAttribute("id", val.id);
				item.setAttribute("src", "./assets/img/" + val.id + ".png");
				item.setAttribute("alt", val.id);
				item.setAttribute("draggable", "true");
				item.setAttribute("ondragstart", "drag(this, event)");
				item.setAttribute("data-category", val.category);
				item.setAttribute("data-str", val.str);
				item.setAttribute("data-dex", val.dex);
				item.setAttribute("data-int", val.int);

				item.setAttribute("title", val.name + "\nCategory: " + val.category + "\nStr: " + val.str + "\nDex: " + val.dex + "\nInt: " + val.int);
				var tabName = val.category + "Tab";
				var tab = document.getElementById(tabName);
				tab.appendChild(item);		
			});
		}
	});

	//populate placeholder slots
	$.ajax({
		url: "/slots/all",
		dataType: 'json',
		error: function( data ) {
			console.log( 'ERROR: ', data );
		},
		success: function( data ) {
			console.log( 'SUCCESS SLOTS: ' );
			$.each( data, function( key, val ) {
				var slot = document.createElement("div");
				slot.setAttribute("class", val.id);
				slot.setAttribute("data-category", val.category);
				slot.setAttribute("ondrop", "drop(this, event)");
				slot.setAttribute("ondragenter", "return false");
				slot.setAttribute("ondragover", "return false");

				var placeholderItem = document.createElement("img");
				placeholderItem.setAttribute("id", val.id);
				placeholderItem.setAttribute("src", "./assets/img/" + val.name + ".png");
				placeholderItem.setAttribute("data-str", val.str);
				placeholderItem.setAttribute("data-dex", val.dex);
				placeholderItem.setAttribute("data-int", val.int);
				placeholderItem.setAttribute("title", val.category)

				slot.appendChild(placeholderItem);		
				var appendImageRoot = document.getElementById("slots");
				appendImageRoot.appendChild(slot);
			});
		}
	});
});

function updatePreset() 
{
	var helmetID = document.getElementById("helmet").alt;
	var chestID = document.getElementById("chest").alt;
	var gloveID = document.getElementById("glove").alt;
	var bootID = document.getElementById("boot").alt;
	var beltID = document.getElementById("belt").alt;
	var amuletID = document.getElementById("amulet").alt;
	var ringLeftID = document.getElementById("ring_left").alt;
	var ringRightID = document.getElementById("ring_left").alt;
	var weaponLeftID = document.getElementById("weapon_left").alt;
	var weaponRightID = document.getElementById("weapon_right").alt;
	var presetDropdown = document.getElementById("presetDropdown");
	var presetID = presetDropdown.options[presetDropdown.selectedIndex].id;
	var presetName = document.getElementById("newPresetName").value;
	if (presetName == "")
		presetName = presetDropdown.options[presetDropdown.selectedIndex].value;

	$.ajax({
        type: "POST",
        url: "/presets/update",
	    data : { id : presetID, name : presetName, helmet : helmetID, chest : chestID, glove : gloveID, boot : bootID, belt : beltID,  amulet : amuletID, ring_left : ringLeftID, ring_right: ringRightID, weapon_left : weaponLeftID, weapon_right : weaponRightID 
		},
        success: function (result) {
        	alert(result);
        	location.reload(); //preset list need to update
        }
	});
}

function createPreset() 
{
	var presetName = document.getElementById("newPresetName").value;
	//also checked on server side if client does something goofy
	if (presetName == "")
	{
		alert("Need a name for your new preset!")
		return;
	}
	var helmetID = document.getElementById("helmet").alt;
	var chestID = document.getElementById("chest").alt;
	var gloveID = document.getElementById("glove").alt;
	var bootID = document.getElementById("boot").alt;
	var beltID = document.getElementById("belt").alt;
	var amuletID = document.getElementById("amulet").alt;
	var ringLeftID = document.getElementById("ring_left").alt;
	var ringRightID = document.getElementById("ring_left").alt;
	var weaponLeftID = document.getElementById("weapon_left").alt;
	var weaponRightID = document.getElementById("weapon_right").alt;
	var newIndex = document.getElementById("presetDropdown").options.length; //length == 1 after last index
	var newPresetID = "pre" + newIndex;
	
	$.ajax({
        type: "POST",
        url: "/presets/create",
	    data : { id : newPresetID, name : presetName, helmet : helmetID, chest : chestID, glove : gloveID, boot : bootID, belt : beltID,  amulet : amuletID, ring_left : ringLeftID, ring_right: ringRightID, weapon_left : weaponLeftID, weapon_right : weaponRightID 
		},
		error: function( data ) {
			console.log( 'ERROR: ', data );
		},
        success: function (result) {
        	alert(result);
        	location.reload(); //preset list need to update
        }
	});
}