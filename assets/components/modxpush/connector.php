<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var modxpush $modxpush */
$modxpush = $modx->getService('modxpush', 'modxpush', $modx->getOption('modxpush_core_path', null,
        $modx->getOption('core_path') . 'components/modxpush/') . 'model/modxpush/'
);
$modx->lexicon->load('modxpush:default');

// handle request
$corePath = $modx->getOption('modxpush_core_path', null, $modx->getOption('core_path') . 'components/modxpush/');
$path = $modx->getOption('processorsPath', $modxpush->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));