/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl ='plugins/ckfinder/ckfinder.html';
 
	config.filebrowserImageBrowseUrl ='plugins/ckfinder/ckfinder.html?type=Images';
	 
	config.filebrowserFlashBrowseUrl ='plugins/ckfinder/ckfinder.html?type=Flash';
	 
	config.filebrowserUploadUrl ='plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	 
	config.filebrowserImageUploadUrl ='plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	 
	config.filebrowserFlashUploadUrl ='plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
