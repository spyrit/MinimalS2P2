/**
 * jQuery Collection Plugin v1.0.0
 * This class provide javascript collection handler features to dynamically add and remove elements inside a form.
 * 
 * https://gist.github.com/Maxooo/85b67f72ec3840464c4e/edit
 * 
 * Copyright 2013, 2014 Maxime CORSON <maxime.corson@spyrit.net>
 * 
 * Released under the MIT license
 */
(function ($) {
    $.fn.collection = function( options ) {
        
        var defaults = {
            itemSelector: '.item',
            addSelector: '.add-item',
            removeSelector: '.remove-item',
            onAdd: function($item){},
            onRemove: function(){}
        };
        
        return this.each(function() {
            var $this = $(this);
            var settings = $.extend(true, {}, defaults, options, $this.data());
 
            function addAddListener()
            {
                $(settings.addSelector).on('click', function(e) {
                    var $item = addCollectionItem();
                    settings.onAdd($item);
                });
            };
            
            function addRemoveListener()
            {
                $this.find(settings.removeSelector).on('click', function(e) {
                    $(this).parents(settings.itemSelector).remove();
                    settings.onRemove();
                });
            };
            
            function addCollectionItem()
            {
                var item = $($this.attr('data-prototype').replace(/__name__/g, $this.children().length));
                $this.append(item);
                addRemoveListener();
                return item;
            };
            addAddListener();
            addRemoveListener();      
        });
    };
}( jQuery ));