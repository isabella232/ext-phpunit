<?php

use TYPO3\CMS\Core\SingletonInterface;

/**
 * This class provides functions for reading the settings of the PHPUnit extension (as set in the extension manager).
 *
 * @deprecated will be removed for PHPUnit 6.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Phpunit_Service_ExtensionSettingsService extends \Tx_Phpunit_AbstractDataContainer implements \Tx_Phpunit_Interface_ExtensionSettingsService, SingletonInterface
{
    /**
     * @var array
     */
    private $cachedSettings = [];

    /**
     * @var bool
     */
    private $settingsHaveBeenRetrieved = false;

    /**
     * Returns the value stored for the key $key.
     *
     * @param string $key the key of the value to retrieve, must not be empty
     *
     * @return mixed the value for the given key, will be NULL if there is no value for the given key
     */
    protected function get($key)
    {
        $this->checkForNonEmptyKey($key);
        if (!$this->settingsHaveBeenRetrieved) {
            $this->retrieveSettings();
        }
        if (!isset($this->cachedSettings[$key])) {
            return null;
        }

        return $this->cachedSettings[$key];
    }

    /**
     * Retrieves the EM configuration for the PHPUnit extension.
     *
     * @return void
     */
    protected function retrieveSettings()
    {
        if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['phpunit'])) {
            $this->cachedSettings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['phpunit']);
        } else {
            $this->cachedSettings = [];
        }

        $this->settingsHaveBeenRetrieved = true;
    }
}
