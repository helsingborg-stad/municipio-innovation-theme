(function($) {
    if (typeof tinymce !== 'undefined') {
        const init = function (editor, url) {
            editor.addButton('mce_extended_quote', {
                text: 'Ext. Quote',
                icon: '',
                onclick: function() {
                    // Open window
                    editor.windowManager.open({
                        title: 'Insert quote',
                        body: [
                            {type: 'textbox', name: 'quote', label: 'Quote', multiline: true},
                            {type: 'textbox', name: 'author', label: 'Quote author'},
                        ],
                        onsubmit: function(e) {
                            var quote = e?.data?.quote,
                                author = e?.data?.author,
                                shortcodeParams = {},
                                params = [];

                            shortcodeParams = {
                                quote: quote,
                                author: author
                            };

                            params = Object.keys(shortcodeParams).map(function(key) {
                                return key + '="' + String(shortcodeParams[key]) + '"';
                            });
                   

                            editor.insertContent('[extended_quote ' + params.join(' ') + ']');
                        }
                    });
                }
            })
        }
        
        tinymce.PluginManager.add('mce_extended_quote', init);
    }
})(jQuery);
