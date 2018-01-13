<?php

/**
 * The home manager controller for modxpush.
 *
 */
class modxpushHomeManagerController extends modExtraManagerController
{
    /** @var modxpush $modxpush */
    public $modxpush;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('modxpush_core_path', null,
                $this->modx->getOption('core_path') . 'components/modxpush/') . 'model/modxpush/';
        $this->modxpush = $this->modx->getService('modxpush', 'modxpush', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('modxpush:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('modxpush');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modxpush->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->modxpush->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->modxpush->config['jsUrl'] . 'mgr/modxpush.js');
        $this->addJavascript($this->modxpush->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->modxpush->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->modxpush->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->modxpush->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->modxpush->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modxpush->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        modxpush.config = ' . json_encode($this->modxpush->config) . ';
        modxpush.config.connector_url = "' . $this->modxpush->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "modxpush-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->modxpush->config['templatesPath'] . 'home.tpl';
    }
}