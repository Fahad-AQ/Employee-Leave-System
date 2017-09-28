$(function() {
	// Block page
 
        $.blockUI({ 
            message: '<img src="http://zaradevelopment.com/els/assets/images/loading_bar.gif" />',
            timeout: 1000, //unblock after 2 seconds
            overlayCSS: {
                backgroundColor: '#1b2024',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'transparent'
            }
        });

	
	// Multiple files uploader
    $('.bootstrap-uploader').fileinput({
        browseLabel: 'Browse',
        browseClass: 'btn btn-info',
        removeLabel: '',
        uploadLabel: '',
        browseIcon: '',
        uploadIcon: '<i class="icon-image4"></i> ',
        removeClass: 'btn btn-danger btn-icon',
        uploadClass: 'btn btn-default btn-icon',
        removeIcon: '<i class="icon-cross"></i> ',
        layoutTemplates: {
            caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
        },
        initialCaption: "No file selected"
    });
	
	// Initialize Switchery
    /*var controls = document.querySelector('.display-controls');
    var controlsInit = new Switchery(controls);

    // Change select state on toggle
    controls.onchange = function() {
        if(controls.checked) {
            $('#available_controls').select2("enable", true);
        }
        else {
            $('#available_controls').select2("enable", false);
        }
    };
	*/
	
	// Initialize editable
    $('#switchery-editable').editable({
        source: {'1': 'Enabled'},
        emptytext: 'Disabled',
        showbuttons: 'bottom',
        tpl: '<div class="checkbox checkbox-switchery switchery-xs"></div>'
    });

    // Initialize plugin
    $('#switchery-editable').on('shown', function (e, editable) {
        editable.input.$input.addClass('switcher-single');

        var elem = document.querySelector('.switcher-single');
        var init = new Switchery(elem);
    });
	
	// Switchery toggle
    var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });




});