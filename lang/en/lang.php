<?php return [
    'plugin' => [
        'name' => 'EUCookieLawMadness',
        'description' => 'Display an EU cookie law popup.'
    ],
    'settings' => [
        'label' => "EU Cookie Law Madness",
        'description' => 'Manage cookie madness',
        'section_content'=> [
            'label' => 'Content'
        ],
        'header'=> [
            'label' => 'Header',
            'comment' => 'Header shown by the plugin.'
        ],
        'message'=> [
            'label' => 'Message',
            'comment' => 'The message shown by the plugin.'
        ],
        'dismiss'=> [
            'label' => 'Dismiss Text',
            'comment' => 'The text used on the dismiss button.'
        ],
        'allow'=> [
            'label' => 'Allow Text',
            'comment' => 'The text used on the allow cookies button.'
        ],
        'deny'=> [
            'label' => 'Deny Text',
            'comment' => 'The text used on the decline cookies button.'
        ],
        'link'=> [
            'label' => 'Learn More Link Text',
            'comment' => 'The text shown on the link to the cookie policy (requires the link option to also be set)'
        ],
        'href'=> [
            'label' => 'Link',
            'comment' => 'The url of your cookie policy. If not set, the link is hidden.'
        ],
        'section_template'=> [
            'label' => 'Template'
        ],
        'container'=> [
            'label' => 'CSS-selector for container',
            'comment' => 'The element you want the Cookie Consent notification to be appended to. If not set, the Cookie Consent plugin is appended to the body.'
        ],
        'theme'=> [
            'label' => 'Theme',
            'comment' => 'Cookie Consent is themed, so users can create their own themes. The chosen theme is added to the popup container as a CSS class in the form of .cc-style-THEME_NAME'
        ],
        'palette'=> [
            'label' => 'Pallete',
            'comment' => 'This is the HTML for the elements above. Any word surrounded by ‘{{‘ and ‘}}’ will be automatically replaced. The string {{header}} will be replaced with the equivalent text above. You can remove “{{header}}” and write the content directly inside the HTML if you want.'
        ],
        'elements'=> [
            'label' => 'Elements template',
            'comment' => 'This is the HTML for the elements above. Any word surrounded by ‘{{‘ and ‘}}’ will be automatically replaced. The string {{header}} will be replaced with the equivalent text above. You can remove “{{header}}” and write the content directly inside the HTML if you want.'
        ],
        'position'=> [
            'label' => 'Position',
            'comment' => 'Position is used to describe where on the screen your popup should display. We also use ‘position’ to assume the shape of your popup.'
        ],
        'compliance'=> [
            'label' => 'Complience template',
            'comment' => 'If you want an ‘opt-in’ level of compliance, then you have two buttons where the default choice is ‘cookies are disable by default’. There are other levels of compliance too. The ones we have by default are stored in the ‘compliance’ option. You can see that the only difference between the compliance levels are the buttons which are used, and how cookies are handled by default'
        ],
        'section_behaviour'=> [
            'label' => 'Behaviour settings'
        ],
        'type'=> [
            'label' => 'Complience type',
            'comment' => 'The compliance type, which refers to the compliance above. Please note the **standard cookie consent popup is purely informational**.'
        ],
        'revokable'=> [
            'label' => 'Revokable',
            'comment' => 'If set true, revoke button is displayed every time. If false, revoke button is only displayed for advanced compliance options (opt-in and opt-out) and in countries that require revokable consent. The latter can be disabled by regionalLaw below.'
        ],
        'revokeBtn'=> [
            'label' => 'Revoke button template',
            'comment' => 'This is the html for the revoke button. This only shows up after the user has selected their level of consent.'
        ],
        'static'=> [
            'label' => 'Static',
            'comment' => 'The popup uses position fixed to stay in one place on the screen despite any scroll bars. This option makes the popup position static so it displays at the top of the page. A height animation has also been added by default so the popup doesn’t make the page jump, but gradually grows and fades in.'
        ],
        'dismissOnScroll'=> [
            'label' => 'Dismiss on scroll',
            'comment' => 'Set value greater than 0 as scroll range to enable.'
        ],
        'dismissOnTimeout'=> [
            'label' => 'Dissmiss on timeout',
            'comment' => 'Set value as time in milliseconds to autodismiss after set time.'
        ],
        'section_cookies'=> [
            'label' => 'Cookie settings'
        ],
        'cookie_path'=> [
            'label' => 'Path',
            'comment' => 'The path for the consent cookie that Cookie Consent uses, to remember that users have consented to cookies. Use to limit consent to a specific path within your website.'
        ],
        'cookie_name'=> [
            'label' => 'Cookie name',
            'comment' => 'Name of the cookie that keeps track of users choice'
        ],
        'cookie_domain'=> [
            'label' => 'Cookie domain',
            'comment' => 'You will probably want to leave this empty. The domain that the cookie ‘name’ belongs to. The cookie can only be read on this domain. Guide to cookie domains'
        ],
        'cookie_expiryDays'=> [
            'label' => 'Expiry Days',
            'comment' => 'The number of days Cookie Consent should store the user’s consent information for.'
        ],
    ],
    'eucookielawmadness' => [
        'manage_eucookielawmadness' => 'Manage EUCookieLawMadness'
    ]
];
