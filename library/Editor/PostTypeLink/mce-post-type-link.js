(function($) {
    if (typeof tinymce !== 'undefined') {
        const init = function (editor, url) {
            editor.addButton('mce_post_type_link', {
                text: 'Post link',
                icon: '',
                onclick: function() {
                    // Open window
                    editor.windowManager.open({
                        title: 'Insert Post link',
                        body: [
                            {type: 'textbox', name: 'id', label: 'Post ID'},
                        ],
                        onsubmit: function(e) {
                            var id = e?.data?.id,
                                shortcodeParams = {},
                                params = [];

                            shortcodeParams = {
                                id: id,
                            };

                            params = Object.keys(shortcodeParams).map(function(key) {
                                return key + '="' + String(shortcodeParams[key]) + '"';
                            });
                   

                            editor.insertContent('[post_type_link ' + params.join(' ') + ']');
                        }
                    });
                }
            })
        }
        
        tinymce.PluginManager.add('mce_post_type_link', init);
    }
})(jQuery);
