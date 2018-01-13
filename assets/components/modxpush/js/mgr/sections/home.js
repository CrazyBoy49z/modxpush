modxpush.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'modxpush-panel-home',
            renderTo: 'modxpush-panel-home-div'
        }]
    });
    modxpush.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(modxpush.page.Home, MODx.Component);
Ext.reg('modxpush-page-home', modxpush.page.Home);