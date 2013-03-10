tinymce.create('tinymce.plugins.firmasitebutton', {
    createControl: function(n, cm) {
        switch (n) {
            case 'firmasitebutton':
				var c = cm.createMenuButton('firmasitebutton', {
					title : firmasitebutton.title,
					image : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAABmJLR0QA9AD0APRM6qDrAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkI4MDUxOTQxQzRBNjExREY4MTYyRTQzNUJDQTZDODgxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkI4MDUxOTQyQzRBNjExREY4MTYyRTQzNUJDQTZDODgxIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QjgwNTE5M0ZDNEE2MTFERjgxNjJFNDM1QkNBNkM4ODEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QjgwNTE5NDBDNEE2MTFERjgxNjJFNDM1QkNBNkM4ODEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6AFv1rAAAAjklEQVR42mL8//8/AymAiYFEwAJjMDIyIouHA7EMEK8C4scgAbhLQAwszloLxM+A2AomAFNHspMYYaYDnQQybQ0uhUB1UqR6ej+6H/igbgbhPVA/pMLEgGr2g9SxIJnwCYiPQdkfofRVqFPuAHEhSrCigatIGr8B8QUG9ODCgnOAeAIQqyCLM5KaNAACDAANWmCnTcU0pgAAAABJRU5ErkJggg==',
					icons : false
				});

				c.onRenderMenu.add(function(c, m) {
					var sub;
					var sub2;
					
					tinymce.activeEditor.formatter.register('div_class', {block : 'div', classes : '%value'});
					tinymce.activeEditor.formatter.register('div_class_remove', {block : 'div', classes : 'alert alert-block alert-error alert-success alert-info'});
					tinymce.activeEditor.formatter.register('span_class', {inline : 'span', classes : '%value'});
					tinymce.activeEditor.formatter.register('span_class_remove', {inline : 'span', classes : 'muted text-alert text-error text-success text-info'});
					tinymce.activeEditor.formatter.register('span_class_remove_label', {inline : 'span', classes : 'label label-success label-warning label-important label-info label-inverse'});
					tinymce.activeEditor.formatter.register('span_class_remove_badge', {inline : 'span', classes : 'badge badge-success badge-warning badge-important badge-info badge-inverse'});
					tinymce.activeEditor.formatter.register('a_class', {inline : 'a', classes : '%value', attributes : {href: '%href_value'} });
					tinymce.activeEditor.formatter.register('a_class_remove', {inline : 'a', classes : 'btn btn-alert btn-primary btn-danger btn-success btn-info btn-inverse'});
					tinymce.activeEditor.formatter.register('a_class_remove_size', {inline : 'a', classes : 'btn btn-large btn-small btn-mini btn-block'});
					tinymce.activeEditor.formatter.register('div_class_remove_well', {block : 'div', classes : 'well well-small well-large'});
					tinymce.activeEditor.formatter.register('div_class_modal', {block : 'div', classes : 'modal firmasite-modal-static', wrapper : true, merge_siblings: false});
					tinymce.activeEditor.formatter.register('div_class_wrapper', {block : 'div', classes : '%value', wrapper: true});
					tinymce.activeEditor.formatter.register('div_class_modal_remove', {block : 'div', classes : 'modal-body modal-header modal-footer'});
					function firmasite_set_href(href){
						if ( null == href )	href = "#"; 
						return href;
					}

					// Container
					sub = m.addMenu({title : firmasitebutton.container});

							// Wells
							sub2 = sub.addMenu({title : firmasitebutton.well});
					
									//Small Well
									sub2.add({title : firmasitebutton.well_small, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_remove_well');
										tinymce.activeEditor.formatter.apply('div_class',{value : 'well well-small'});  
									}});

									//Standard Well
									sub2.add({title : firmasitebutton.well_standard, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_remove_well');
										tinymce.activeEditor.formatter.apply('div_class',{value : 'well'});  
									}});

									//Large Well
									sub2.add({title : firmasitebutton.well_large, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_remove_well');
										tinymce.activeEditor.formatter.apply('div_class',{value : 'well well-large'});  
									}});

							// Message Box
							sub2 = sub.addMenu({title : firmasitebutton.messagebox});
					
									//Alert Box
									sub2.add({title : firmasitebutton.messagebox_alert, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_remove');
										tinymce.activeEditor.formatter.apply('div_class',{value : 'alert alert-block'});  
									}});
		
									//Alert Box (Danger)
									sub2.add({title : firmasitebutton.messagebox_error, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_remove');  
										tinymce.activeEditor.formatter.apply('div_class',{value : 'alert alert-block alert-error'});  
									}});
		
									//Alert Box (Success)
									sub2.add({title : firmasitebutton.messagebox_success, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_remove');  
										tinymce.activeEditor.formatter.apply('div_class',{value : 'alert alert-block alert-success'});  
									}});
		
									//Alert Box (Info)
									sub2.add({title : firmasitebutton.messagebox_info, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_remove');  
										tinymce.activeEditor.formatter.apply('div_class',{value : 'alert alert-block alert-info'});  
									}});

							// Modal Box
							sub2 = sub.addMenu({title : firmasitebutton.modal});
					
									//Modal Header
									sub2.add({title : firmasitebutton.modal_header, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_modal_remove'); 
										tinymce.activeEditor.formatter.remove('div_class_modal');  
										tinymce.activeEditor.formatter.apply('div_class_modal');  
										tinymce.activeEditor.formatter.apply('div_class_wrapper',{value : 'modal-header'}); 
									}});

									//Modal Body
									sub2.add({title : firmasitebutton.modal_body, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_modal_remove'); 
										tinymce.activeEditor.formatter.remove('div_class_modal');  
										tinymce.activeEditor.formatter.apply('div_class_modal');  
										tinymce.activeEditor.formatter.apply('div_class_wrapper',{value : 'modal-body'}); 
									}});

									//Modal Footer
									sub2.add({title : firmasitebutton.modal_footer, onclick : function() {
										tinymce.activeEditor.formatter.remove('div_class_modal_remove'); 
										tinymce.activeEditor.formatter.remove('div_class_modal');  
										tinymce.activeEditor.formatter.apply('div_class_modal');  
										tinymce.activeEditor.formatter.apply('div_class_wrapper',{value : 'modal-footer'}); 
									}});

					// Text Style
					sub = m.addMenu({title : firmasitebutton.text});
							// Text Style
							sub2 = sub.addMenu({title : firmasitebutton.textcolor});
							
									//Muted
									sub2.add({title : firmasitebutton.text_muted, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'muted'});  
									}});
		
									//Alert
									sub2.add({title : firmasitebutton.text_alert, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove');
										tinymce.activeEditor.formatter.apply('span_class',{value : 'text-alert'});  
									}});
		
									//Danger
									sub2.add({title : firmasitebutton.text_error, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'text-error'});  
									}});
		
									//Success
									sub2.add({title : firmasitebutton.text_success, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'text-success'});  
									}});
		
									//Information
									sub2.add({title : firmasitebutton.text_info, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'text-info'});  
									}});

							// Label
							sub2 = sub.addMenu({title : firmasitebutton.label});
							
									// Label Standard
									sub2.add({title : firmasitebutton.label_standard, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_label');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'label'});  
									}});
		
									//Warning
									sub2.add({title : firmasitebutton.label_warning, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_label');
										tinymce.activeEditor.formatter.apply('span_class',{value : 'label label-warning'});  
									}});
		
									//Important
									sub2.add({title : firmasitebutton.label_important, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_label');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'label label-important'});  
									}});
		
									//Success
									sub2.add({title : firmasitebutton.label_success, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_label');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'label label-success'});  
									}});
		
									//Information
									sub2.add({title : firmasitebutton.label_info, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_label');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'label label-info'});  
									}});

									//Inverse
									sub2.add({title : firmasitebutton.label_inverse, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_label');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'label label-inverse'});  
									}});

							// Badge
							sub2 = sub.addMenu({title : firmasitebutton.badge});
							
									// Badge Standard
									sub2.add({title : firmasitebutton.badge_standard, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_badge');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'badge'});  
									}});
		
									//Warning
									sub2.add({title : firmasitebutton.badge_warning, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_badge');
										tinymce.activeEditor.formatter.apply('span_class',{value : 'badge badge-warning'});  
									}});
		
									//Important
									sub2.add({title : firmasitebutton.badge_important, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_badge');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'badge badge-important'});  
									}});
		
									//Success
									sub2.add({title : firmasitebutton.badge_success, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_badge');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'badge badge-success'});  
									}});
		
									//Information
									sub2.add({title : firmasitebutton.badge_info, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_badge');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'badge badge-info'});  
									}});

									//Inverse
									sub2.add({title : firmasitebutton.badge_inverse, onclick : function() {
										tinymce.activeEditor.formatter.remove('span_class_remove_badge');  
										tinymce.activeEditor.formatter.apply('span_class',{value : 'badge badge-inverse'});  
									}});

					// Button
					sub = m.addMenu({title : firmasitebutton.button});
							// Button Color
							sub2 = sub.addMenu({title : firmasitebutton.buttoncolor});
							
									//Standard
									sub2.add({title : firmasitebutton.button_standard, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove'); 
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn', href_value: href});  
									}});
		
									//Primary
									sub2.add({title : firmasitebutton.button_primary, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-primary', href_value: href});  
									}});
		
									//Alert
									sub2.add({title : firmasitebutton.button_alert, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove');
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-warning', href_value: href});  
									}});
		
									//Danger
									sub2.add({title : firmasitebutton.button_error, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-danger', href_value: href});  
									}});
		
									//Success
									sub2.add({title : firmasitebutton.button_success, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-success', href_value: href});  
									}});
		
									//Information
									sub2.add({title : firmasitebutton.button_info, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-info', href_value: href});  
									}});
		
									//Inverse
									sub2.add({title : firmasitebutton.button_inverse, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-inverse', href_value: href});  
									}});

							// Button Size
							sub2 = sub.addMenu({title : firmasitebutton.buttonsize});
						
									//Mini
									sub2.add({title : firmasitebutton.button_mini, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove_size');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-mini', href_value: href});  
									}});

									//Small
									sub2.add({title : firmasitebutton.button_small, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove_size');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-small', href_value: href});  
									}});

									//Standard
									sub2.add({title : firmasitebutton.button_standard, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove_size');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn', href_value: href});  
									}});

									//Large
									sub2.add({title : firmasitebutton.button_large, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove_size');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-large', href_value: href});  
									}});

									//Block
									sub2.add({title : firmasitebutton.button_block, onclick : function() {
										tinymce.activeEditor.formatter.remove('a_class_remove_size');  
										href = firmasite_set_href(tinymce.activeEditor.selection.getNode().getAttribute('href'));
										tinymce.activeEditor.formatter.apply('a_class',{value : 'btn btn-block', href_value: href});  
									}});

				});

				// Return the new menu button instance
				return c;
        }

        return null;
    }
});


    tinymce.PluginManager.add('firmasitebutton', tinymce.plugins.firmasitebutton);
 
