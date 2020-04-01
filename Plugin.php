<?php namespace Code200\Eucookielawmadness;

use Code200\Eucookielawmadness\models\Settings;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use System\Classes\SettingsManager;
use Block;

class Plugin extends PluginBase
{
    private $pathToPlugin;

    const COOKIEVAL_DENY  = 'deny';
    const COOKIEVAL_ALLOW = 'allow';

    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
        $this->pathToPlugin = '/plugins/code200/eucookielawmadness';
    }

    public function boot()
    {
        /** @var \Cms\Classes\Controller $controller  */
        Event::listen('cms.page.beforeDisplay', function($controller, $action, $params) {
            $controller->addJs($this->pathToPlugin . '/assets/cookieconsent.min.js');
            $controller->addCss($this->pathToPlugin . '/assets/cookieconsent.min.css');
            $this->initJs();

            $cookieName = Settings::get('cookie_name');
            $controller->vars["cookieconsent_status"] = empty($_COOKIE[ $cookieName ]) ? "" : $_COOKIE[ $cookieName ];
        });
    }

    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'allow_cookies' => [$this, 'allowServingCookies']
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'code200.eucookielawmadness::lang.settings.label',
                'description' => 'code200.eucookielawmadness::lang.settings.description',
                'icon'        => 'icon-pencil-square-o',
                'class'       => 'Code200\eucookielawmadness\models\Settings',
                'category'    => SettingsManager::CATEGORY_MISC,
                'permissions' => ['code200.eucookielawmadness.access_settings'],
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'code200.eucookielawmadness.access_settings' => [
                'tab'   => 'code200.eucookielawmadness::lang.plugin.name',
                'label' => 'code200.eucookielawmadness::lang.eucookielawmadness.manage_eucookielawmadness'
            ],
        ];
    }
    
    private function initJs()
    {
        // Check if the translate plugin is installed
        if (class_exists('RainLab\Translate\Behaviors\TranslatableModel'))
        {
            $settings = Settings::instance();
            foreach($settings as $key => $setting)
            {
                $setting = $settings->getAttributeTranslated($key);
            }
        } else {
            $settings = Settings::instance();
        }
        $dismissOnScroll = empty($settings['dismissOnScroll'])?false:$settings['dismissOnScroll'];
        $dismissOnTimeout = empty($settings['dismissOnTimeout'])?false:$settings['dismissOnTimeout'];
        $static = empty($settings['static']) ? "false" : "true";
        $revokable = empty($settings['revokable']) ? "false" : "true";
        $revokeBtnTemplate = json_encode($settings['revokeBtn']);
        $initJS = <<<JS

        window.cookieconsent.initialise({
            content: {
                "header":"{$settings['header']}",
                "message":"{$settings['message']}",
                "dismiss":"{$settings['dismiss']}",
                "allow":"{$settings['allow']}",
                "deny":"{$settings['deny']}",
                "link":"{$settings['link']}",
                "href":"{$settings['href']}"
            },
            "position":"{$settings['position']}",
            "container":"{$settings['container']}",
            "palette": {
                {$settings['palette']}
            },
            "theme":"{$settings['theme']}",
            "elements":{
                {$settings['elements']}
            },
            "compliance": {
                {$settings['compliance']}
            },
            "type":"{$settings['type']}",
            "revokable":{$revokable},
            "revokeBtn":{$revokeBtnTemplate},
            "static":{$static},
            "dismissOnScroll":"{$dismissOnScroll}",
            "dismissOnTimeout":"{$dismissOnTimeout}",

            "cookie.path": "{$settings['cookie_path']}",
            "cookie.name": "{$settings['cookie_name']}",
            "cookie.domain": "{$settings['cookie_domain']}",
            "cookie.expiryDays": "{$settings['cookie_expiryDays']}",

            onStatusChange: function(status, chosenBefore) {
                if(status == 'deny'){
                    clearAllCookiesExceptCookieNotice();
                }

                window.location.reload();
            }
        });

        function getCookieDomain() {
            var cookieDomain = "{$settings['cookie_domain']}";
            if(cookieDomain.trim() == ""){
                cookieDomain = window.location.hostname;
            }
            return cookieDomain;
        }

        function getCookiePath() {
            var cookiePath =  "{$settings['cookie_path']}";
            if(cookiePath.trim() == "") {
                cookiePath = "/";
            }
            return cookiePath;
        }

        function clearAllCookiesExceptCookieNotice() {
            var cookies = document.cookie.split(";");
            var cookieDomain = getCookieDomain();
            var cookiePath = getCookiePath();

            for (var i = 0; i < cookies.length; i++) {
                var spcook =  cookies[i].split("=");
                var cookieName = spcook[0].trim();
                if(cookieName != "{$settings['cookie_name']}") {
                     document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT; domain="+cookieDomain+"; path="+cookiePath;
                     document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT; domain=."+cookieDomain+"; path="+cookiePath;
                }
            }
        }
JS;

        Block::append('scripts', '<script>'.$initJS.'</script>');
    }

    /**
     * Function that checks if setting cookies is even allowed
     * @return bool
     */
    public function allowServingCookies()
    {
        $complianceType = Settings::get('type');
        $cookieName = Settings::get('cookie_name');
        $cookieVal = empty($_COOKIE[ $cookieName ]) ? "" : $_COOKIE[ $cookieName ];

        switch($complianceType) {
            case "opt-in":
                if( $cookieVal == self::COOKIEVAL_ALLOW) {
                    return true;
                }
                return false;
            case "opt-out":
                if( $cookieVal == self::COOKIEVAL_DENY) {
                    return false;
                }
                return true;
            default: //info
                return true;
        }
    }
}
