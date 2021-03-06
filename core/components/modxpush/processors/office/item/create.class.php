<?php

class modxpushOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'modxpushItem';
    public $classKey = 'modxpushItem';
    public $languageTopics = array('modxpush');
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('modxpush_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
            $this->modx->error->addField('name', $this->modx->lexicon('modxpush_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'modxpushOfficeItemCreateProcessor';