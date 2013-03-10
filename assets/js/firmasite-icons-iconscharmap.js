/**
 * iconscharmap.js
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

tinyMCEPopup.requireLangPack();

var iconscharmap = [
    ['icon-glass'], 
    ['icon-music'], 
    ['icon-search'], 
    ['icon-envelope'], 
    ['icon-heart'], 
    ['icon-star'], 
    ['icon-star-empty'], 
    ['icon-user'], 
    ['icon-film'], 
    ['icon-th-large'], 
    ['icon-th'], 
    ['icon-th-list'], 
    ['icon-ok'], 
    ['icon-remove'], 
    ['icon-zoom-in'], 
    ['icon-zoom-out'], 
    ['icon-off'], 
    ['icon-signal'], 
    ['icon-cog'], 
    ['icon-trash'], 
    ['icon-home'], 
    ['icon-file'], 
    ['icon-time'], 
    ['icon-road'], 
    ['icon-download-alt'], 
    ['icon-download'], 
    ['icon-upload'], 
    ['icon-inbox'], 
    ['icon-play-circle'], 
    ['icon-repeat'], 
    ['icon-refresh'], 
    ['icon-list-alt'], 
    ['icon-lock'], 
    ['icon-flag'], 
    ['icon-headphones'], 
    ['icon-volume-off'], 
    ['icon-volume-down'], 
    ['icon-volume-up'], 
    ['icon-qrcode'], 
    ['icon-barcode'], 
    ['icon-tag'], 
    ['icon-tags'], 
    ['icon-book'], 
    ['icon-bookmark'], 
    ['icon-print'], 
    ['icon-camera'], 
    ['icon-font'], 
    ['icon-bold'], 
    ['icon-italic'], 
    ['icon-text-height'], 
    ['icon-text-width'], 
    ['icon-align-left'], 
    ['icon-align-center'], 
    ['icon-align-right'], 
    ['icon-align-justify'], 
    ['icon-list'], 
    ['icon-indent-left'], 
    ['icon-indent-right'], 
    ['icon-facetime-video'], 
    ['icon-picture'], 
    ['icon-pencil'], 
    ['icon-map-marker'], 
    ['icon-adjust'], 
    ['icon-tint'], 
    ['icon-edit'], 
    ['icon-share'], 
    ['icon-check'], 
    ['icon-move'], 
    ['icon-step-backward'], 
    ['icon-fast-backward'], 
    ['icon-backward'], 
    ['icon-play'], 
    ['icon-pause'], 
    ['icon-stop'], 
    ['icon-forward'], 
    ['icon-fast-forward'], 
    ['icon-step-forward'], 
    ['icon-eject'], 
    ['icon-chevron-left'], 
    ['icon-chevron-right'], 
    ['icon-plus-sign'], 
    ['icon-minus-sign'], 
    ['icon-remove-sign'], 
    ['icon-ok-sign'], 
    ['icon-question-sign'], 
    ['icon-info-sign'], 
    ['icon-screenshot'], 
    ['icon-remove-circle'], 
    ['icon-ok-circle'], 
    ['icon-ban-circle'], 
    ['icon-arrow-left'], 
    ['icon-arrow-right'], 
    ['icon-arrow-up'], 
    ['icon-arrow-down'], 
    ['icon-share-alt'], 
    ['icon-resize-full'], 
    ['icon-resize-small'], 
    ['icon-plus'], 
    ['icon-minus'], 
    ['icon-asterisk'], 
    ['icon-exclamation-sign'], 
    ['icon-gift'], 
    ['icon-leaf'], 
    ['icon-fire'], 
    ['icon-eye-open'], 
    ['icon-eye-close'], 
    ['icon-warning-sign'], 
    ['icon-plane'], 
    ['icon-calendar'], 
    ['icon-random'], 
    ['icon-comment'], 
    ['icon-magnet'], 
    ['icon-chevron-up'], 
    ['icon-chevron-down'], 
    ['icon-retweet'], 
    ['icon-shopping-cart'], 
    ['icon-folder-close'], 
    ['icon-folder-open'], 
    ['icon-resize-vertical'], 
    ['icon-resize-horizontal'], 
    ['icon-hdd'], 
    ['icon-bullhorn'], 
    ['icon-bell'], 
    ['icon-certificate'], 
    ['icon-thumbs-up'], 
    ['icon-thumbs-down'], 
    ['icon-hand-right'], 
    ['icon-hand-left'], 
    ['icon-hand-up'], 
    ['icon-hand-down'], 
    ['icon-circle-arrow-right'], 
    ['icon-circle-arrow-left'], 
    ['icon-circle-arrow-up'], 
    ['icon-circle-arrow-down'], 
    ['icon-globe'], 
    ['icon-wrench'], 
    ['icon-tasks'], 
    ['icon-filter'], 
    ['icon-briefcase'], 
    ['icon-fullscreen']
];

tinyMCEPopup.onInit.add(function() {
	tinyMCEPopup.dom.setHTML('iconscharmapView', rendericonscharmapHTML());
	addKeyboardNavigation();
});

function addKeyboardNavigation(){
	var tableElm, cells, settings;

	cells = tinyMCEPopup.dom.select("a.iconscharmaplink", "iconscharmapgroup");

	settings ={
		root: "iconscharmapgroup",
		items: cells
	};
	cells[0].tabindex=0;
	tinyMCEPopup.dom.addClass(cells[0], "mceFocus");
	if (tinymce.isGecko) {
		cells[0].focus();		
	} else {
		setTimeout(function(){
			cells[0].focus();
		}, 100);
	}
	tinyMCEPopup.editor.windowManager.createInstance('tinymce.ui.KeyboardNavigation', settings, tinyMCEPopup.dom);
}

function rendericonscharmapHTML() {
	var charsPerRow = 20, tdWidth=20, tdHeight=20, i;
	var html = '<div id="iconscharmapgroup" aria-labelledby="iconscharmap_label" tabindex="0" role="listbox">'+
	'<table role="presentation" border="0" cellspacing="1" cellpadding="0" width="' + (tdWidth*charsPerRow) + 
	'"><tr height="' + tdHeight + '">';
	var cols=-1;

	for (i=0; i<iconscharmap.length; i++) {
		var previewCharFn;

			cols++;
			icon = '<i class="' + iconscharmap[i][0] + '"></i>';
			html += ''
				+ '<td class="iconscharmap">'
				+ '<a class="iconscharmaplink" role="button" href="javascript:void(0)" onclick="insertChar(\'' + iconscharmap[i][0] + '\');" onclick="return false;" onmousedown="return false;" title="">'
				+ icon
				+ '</a></td>';
			if ((cols+1) % charsPerRow == 0)
				html += '</tr><tr height="' + tdHeight + '">';
	 }

	if (cols % charsPerRow > 0) {
		var padd = charsPerRow - (cols % charsPerRow);
		for (var i=0; i<padd-1; i++)
			html += '<td width="' + tdWidth + '" height="' + tdHeight + '" class="iconscharmap">&nbsp;</td>';
	}

	html += '</tr></table></div>';
	html = html.replace(/<tr height="20"><\/tr>/g, '');

	return html;
}

function insertChar(chr) {
	tinyMCEPopup.execCommand('mceInsertContent', false, '<i class="' + chr + '"></i>&nbsp;');

	// Refocus in window
	if (tinyMCEPopup.isWindow)
		window.focus();

	tinyMCEPopup.editor.focus();
	tinyMCEPopup.close();
}

function previewChar(codeA, codeB, codeN) {
	var elmA = document.getElementById('codeA');
	var elmB = document.getElementById('codeB');
	var elmV = document.getElementById('codeV');
	var elmN = document.getElementById('codeN');

	if (codeA=='#160;') {
		elmV.innerHTML = '__';
	} else {
		elmV.innerHTML = '&' + codeA;
	}

	elmB.innerHTML = '&amp;' + codeA;
	elmA.innerHTML = '&amp;' + codeB;
	elmN.innerHTML = codeN;
}
