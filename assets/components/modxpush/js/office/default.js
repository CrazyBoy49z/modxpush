Ext.onReady(function () {
    modxpush.config.connector_url = OfficeConfig.actionUrl;

    var grid = new modxpush.panel.Home();
    grid.render('office-modxpush-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});