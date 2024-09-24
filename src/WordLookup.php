<?php

namespace wolfco\wordlookup;

use Craft;
use craft\base\Model;
use craft\base\Plugin;
use wolfco\wordlookup\models\Settings;

/**
 * Word Lookup plugin
 *
 * @method static WordLookup getInstance()
 * @method Settings getSettings()
 * @author Wolfco <jack@wolfco.us>
 * @copyright Wolfco
 * @license https://craftcms.github.io/license/ Craft License
 */
class WordLookup extends Plugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init(): void
    {
        parent::init();

        $this->attachEventHandlers();

        // Any code that creates an element query or loads Twig should be deferred until
        // after Craft is fully initialized, to avoid conflicts with other plugins/modules
        Craft::$app->onInit(function() {
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('word-lookup/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
        ]);
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/5.x/extend/events.html to get started)
    }
}
