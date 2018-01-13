var modxpush = function (config) {
    config = config || {};
    modxpush.superclass.constructor.call(this, config);
};
Ext.extend(modxpush, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('modxpush', modxpush);

modxpush = new modxpush();