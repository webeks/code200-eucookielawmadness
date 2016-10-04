<?php namespace Code200\Eucookielawmadness;

use Code200\Eucookielawmadness\models\Settings;
use Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use System\Classes\SettingsManager;
use Block;


class Plugin extends PluginBase
{
    private $pathToPlugin;


    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
        $this->pathToPlugin = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));
    }

    public function boot(){
        /** @var \Cms\Classes\Controller $controller  */
        Event::listen('cms.page.beforeDisplay', function($controller, $action, $params) {
            $controller->addJs($this->pathToPlugin . '/assets/cookieconsent.min.js');
            $controller->addCss($this->pathToPlugin . '/assets/cookieconsent.min.css');
            $this->initJs();
        });

    }
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'code200.eucookielawmadness::lang.settings.label',
                'description' => 'code200.eucookielawmadness::lang.settings.description',
                'icon'        => 'icon-pencil-square-o',
                'class'       => 'Code200\eucookielawmadness\models\Settings',
                'category'    => SettingsManager::CATEGORY_MISC
            ]
        ];
    }


    /**
     *
     */
    private function initJs() {

        $onDeniedJS = <<<JS
onStatusChange: function(status, chosenBefore) {
  var type = this.options.type;
   console.log(type);
   console.log(status);
   if(status == 'deny') {
        console.log("todo clear all and disable");
   }

  var didConsent = this.hasConsented();
  if (type == 'opt-in' && didConsent) {
    // enable cookies
  }
  if (type == 'opt-out' && !didConsent) {
    // disable cookies
  }
}
JS;

        $settings = new Settings();
        $dismissOnScroll = empty($settings::get('dismissOnScroll'))?false:$settings::get('dismissOnScroll');
        $dismissOnTimeout = empty($settings::get('dismissOnTimeout'))?false:$settings::get('dismissOnTimeout');
        $static = empty($settings::get('static'))?"false":"true";
        $revokable = empty($settings::get('revokable'))?false:true;
        $revokeBtnTemplate = json_encode($settings::get('revokeBtn'));
        $initJS = <<<JS

        window.cookieconsent.initialise({
            content: {
                "header":"{$settings::get('header')}",
                "message":"{$settings::get('message')}",
                "dismiss":"{$settings::get('dismiss')}",
                "allow":"{$settings::get('allow')}",
                "deny":"{$settings::get('deny')}",
                "link":"{$settings::get('link')}",
                "href":"{$settings::get('href')}"
            },
            "position":"{$settings::get('position')}",


            "container":"{$settings::get('container')}",
            "palette": {
                {$settings::get('palette')}
            },
            "theme":"{$settings::get('theme')}",
            "elements":{
                {$settings::get('elements')}
            },

            "compliance": {
                {$settings::get('compliance')}
            },
            "type":"{$settings::get('type')}",
            "revokable":{$revokable},
            "revokeBtn":{$revokeBtnTemplate},
            "static":{$static},
            "dismissOnScroll":"{$dismissOnScroll}",
            "dismissOnTimeout":"{$dismissOnTimeout}",

            "cookie.path": "{$settings::get('cookie_path')}",
            "cookie.name": "{$settings::get('cookie_name')}",
            "cookie.domain": "{$settings::get('cookie_domain')}",
            "cookie.expiryDays": "{$settings::get('cookie_expiryDays')}",
        });

JS;


        Block::append('scripts', '<script>'.$initJS.'</script>');
    }
}
