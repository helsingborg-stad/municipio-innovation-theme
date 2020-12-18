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
                            {type: 'textbox', name: 'id', label: 'Post ID (required)'},
                            {type: 'textbox', name: 'title', label: 'Tittle (optional)'},
                            {type: 'textbox', name: 'meta', label: 'Meta (optional)'},
                            {type: 'textbox', name: 'imageUrl', label: 'Image URL (optional)'},
                            {type: 'textbox', name: 'url', label: 'Button URL (optional)'},
                            {type: 'textbox', name: 'buttonText', label: 'Button text (optional)'},
                        ],
                        onsubmit: function(e) {
                            var id = e?.data?.id,
                                shortcodeParams = {},
                                params = [];

                            var optionalKeys = [
                                'title',
                                'meta',
                                'imageUrl',
                                'url',
                                'buttonText'
                            ];

                            shortcodeParams = {
                                id: id,
                            };

                            optionalKeys.forEach(function (key) {
                                if (e?.data[key] && e.data[key].length > 0) {
                                    shortcodeParams[key] = e.data[key];
                                }
                            });

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
