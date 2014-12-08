<?php
/**
 * Description of HtmlMacros
 *
 * @author nadinarturo
 */
namespace Ayudantes\Macros;

class HtmlServiceProvider extends \Illuminate\Html\HtmlServiceProvider {

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder() {
        $this->app->bindShared('html', function($app) {
            return new HtmlBuilder($app['url']);
        });
    }

    /**
     * Register the form builder instance.
     *
     * @return void
     */
    protected function registerFormBuilder() {
        $this->app->bindShared('form', function($app) {
            return new FormBuilder($app['html'], $app['url'], $app['session.store']->getToken());
        });
    }

}
