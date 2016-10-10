# EU law cookie madness
EU laws require sites to let the user know if cookies are stored on their
devices. Depending on EU country there are different types of compliance implementation. Usually scripts like this one only offer notifications and they dont implement real opt-in or opt-out compliance.
 
This script offers OctoberCMS implementation of [Cookie Consent JS](https://github.com/insites/cookieconsent/), additional Twig template function for easier checks whether or not to serve cookies and additional JS that cleans all cookies if user declines to accept cookies. 


# Configuration 
This plugin integrates the popular Cookie Consent tool in your theme. It requires
the theme to have the `scripts` and `styles` placeholder.

Simply configure the settings from the backend interface and then it automatically
runs on the frontend. Please see how to prevent cookies section as well. Remember that you are soly responsible for any law and regulation compliance.

## Compliance types
* info (allways serve cookies)
* opt-in (dont serve cookies unless explicit permission)
* opt-out (serve cookies unless visitor declines serving)

## Prevent cookies
This is only Javascript frontend (as all other plugins)! It sets cookies based on user decision whether to allow or reject cookies. 
You will need to code your PHP to check upon users decision before setting any cookies. 
 
There is a view helper `allow_cookies` that you can call from twig template.

Example: 
 
```
{% if allow_cookies()  %}
// javascript for serving cookies like Google Analytics etc
{% endif %}  
```

If you need to access user decision, cookie is named `cookieconsent_status` unless you renamed it in configuration. 

Cookie can have values:

* dismiss
* allow
* deny





# Attribution

The [Cookie Consent JS](https://github.com/insites/cookieconsent/) we link
to is developed by [Insites](https://cookieconsent.insites.com/) and
released under [MIT](https://en.wikipedia.org/wiki/MIT_License).

Icon made by [Freepik](http://www.flaticon.com/authors/freepik) from www.flaticon.com and released under [CC 3.0](http://creativecommons.org/licenses/by/3.0).
