<?php return [
    'plugin' => [
        'name' => 'EUCookieLawMadness',
        'description' => 'Zeigt eine DSVGO konformes Popup an'
    ],
    'settings' => [
        'label' => "EU Cookie Law Madness",
        'description' => 'Verwalte den Cookie Wahnsinn',
        'section_content'=> [
            'label' => 'Inhalt'
        ],
        'header'=> [
            'label' => 'Header',
            'comment' => 'Header der vom Plugin angezeigt wird.'
        ],
        'message'=> [
            'label' => 'Nachricht',
            'comment' => 'Die Nachricht die vom Plugin angezeigt wird.'
        ],
        'dismiss'=> [
            'label' => 'Abweisentext',
            'comment' => 'Der Text für den Button um die Cookie Meldung abzuweisen'
        ],
        'allow'=> [
            'label' => 'Erlaubentext',
            'comment' => 'Der Text für den Button um Cookies zu erlauben'
        ],
        'deny'=> [
            'label' => 'Ablehnentext',
            'comment' => 'Der Text für den Button um Cookies abzulehnen'
        ],
        'link'=> [
            'label' => 'Mehr erfahren Linktext',
            'comment' => 'Der Text für den Link um die Cookie Richtlinien einzusehen (benötigt eine Eingabe bei Link)'
        ],
        'href'=> [
            'label' => 'Link',
            'comment' => 'Die URL zu Ihren Cookie Richtlinien. Wenn leer, wird der Link versteckt.'
        ],
        'section_template'=> [
            'label' => 'Vorlage'
        ],
        'container'=> [
            'label' => 'CSS-selector für Container',
            'comment' => 'Das Element an welches die Cookie Zustimmungsbenachrichtigung angehängt werden soll. Wenn leer, wird sie an den <body> tag angefügt.'
        ],
        'theme'=> [
            'label' => 'Theme',
            'comment' => 'Cookie Zustimmung ist formatiert, damit Benutzer Ihre eigenen Formatierungen anlegen können. Die ausgewählte Formatierung wird den Popup Container als CSS Klasse in Form von .cc-style-THEME_NAME hinzugefügt'
        ],
        'palette'=> [
            'label' => 'Pallete',
            'comment' => 'Dies ist der HTML Code für die oben genannten Elemente. Wörter die mit ´{{´ und ´}}´ umschweift sind, werden automatisch ersetzt. Der String {{header}} wird mit dem Text von obigen Einstellung ersetzt. Wenn Sie möchten, können Sie "{{header}}" entfernen und den Inhalt direkt in den HTML Code schreiben.'
        ],
        'elements'=> [
            'label' => 'Elements Vorlage',
            'comment' => 'Dies ist der HTML Code für die oben genannten Elemente. Wörter die mit ´{{´ und ´}}´ umschweift sind, werden automatisch ersetzt. Der String {{header}} wird mit dem Text von obigen Einstellung ersetzt. Wenn Sie möchten, können Sie "{{header}}" entfernen und den Inhalt direkt in den HTML Code schreiben.'
        ],
        'position'=> [
            'label' => 'Position',
            'comment' => 'Position beschreibt wo auf dem Bildschirm die Benachrichtigung erscheinen soll. Position wird darüber hinaus verwendet um die Form der Benachrichtigung einzustellen.'
        ],
        'compliance'=> [
            'label' => 'Einwilligung Vorlage',
            'comment' => 'Wenn Sie eine ´opt-in´ Möglichkeit für die Einwilligung wollen, dann haben Sie zwei Buttons deren Standard Auswahl ´Cookies sind standardmäßig deaktiviert´. Es gibt weitere Möglichkeiten der Einwilligung. Die zur Verfügung stehenden sind in der Option ´Einwilligung´ gespeichert. Der Unterschied zwischen den Einwilligungs Möglichkeiten ist lediglich welcher Button benutzt wird und wie Cookies standardmäßig behandelt werden.'
        ],
        'section_behaviour'=> [
            'label' => 'Verhaltenseinstellungen'
        ],
        'type'=> [
            'label' => 'Einwilligungstyp',
            'comment' => 'Der Einwilligungstyp welcher auf oben genannte Einwilligung verweist. Bitte beachten Sie **Standard Cookie Einwilligungs Popup ist rein informativ**.'
        ],
        'revokable'=> [
            'label' => 'Widerrufbar',
            'comment' => 'Wenn an, wird der Widerrufen Button immer angezeigt. Wenn aus, wird der Widerrufen Button nur bei erweiterten Einwilligungstypen (opt-in und opt-out) und in Ländern welche eine widerrufbare Einwilligung voraussetzen, angezeigt. Letzteres kann mit der Einstellung ´Regionale Gesetzmäßigkeiten´ deaktiviert werden.'
        ],
        'revokeBtn'=> [
            'label' => 'Vorlage für Widerrufen Button',
            'comment' => 'Dies ist der HTML Code für den Widerrufen Button. Dies wird nur angezeigt nachdem der Benutzer seine Einwilligungsmöglichkeit festgelegt hat.'
        ],
        'static'=> [
            'label' => 'Statisch',
            'comment' => 'Das Popup benutzt das position Attribut um unabhänging von Scrollbewegungen, fix in Position zu bleiben. Diese Option macht die Position des Popups statisch, so dass es oben auf der Seite angezeigt wird. Eine Animation für das height Attribut wurde ebenfalls standardmäßig hinzugefügt, dass das Popup allmählich wächst und einblendet anstatt die Seite ´springen´ zu lassen.'
        ],
        'dismissOnScroll'=> [
            'label' => 'Abweisen beim Scrollen',
            'comment' => 'Ein Wert größer 0 für den Bildlaufbereich aktiviert diese Funktion'
        ],
        'dismissOnTimeout'=> [
            'label' => 'Abweisen nach Auszeit',
            'comment' => 'Ein Wert als Millisekunden aktiviert die automatische Abweisung nach eingestellter Zeit'
        ],
        'section_cookies'=> [
            'label' => 'Cookie Einstellungen'
        ],
        'cookie_path'=> [
            'label' => 'Pfad',
            'comment' => 'Der Pfad für das Einwilligungscookie die von diesem Plugin verwendet wird um die Einwilligung des Nutzers zu merken. Verwenden Sie diese Option, um die Zustimmung auf einen bestimmten Pfad innerhalb Ihrer Website zu beschränken.'
        ],
        'cookie_name'=> [
            'label' => 'Cookie Name',
            'comment' => 'Name des Cookies welche die Auswahl des Nutzers verfolgt.'
        ],
        'cookie_domain'=> [
            'label' => 'Cookie Domäne',
            'comment' => 'Sie wollen diese Einstellung vermutlich leer lassen. Die Domäne zu der dieses Cookie gehört. Das Cookie kann nur von dieser Domäne gelesen werden. Beachten Sie die Leitfaden für Cookie-Domänen'
        ],
        'cookie_expiryDays'=> [
            'label' => 'Gültigkeit',
            'comment' => 'Die Anzahl der Tage, für die dieses Plugin die Einwilligungsinformationen des Benutzers speichern soll.'
        ],
    ]
];
