<?php



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;


$app->match('/', function() use ($app) {
    $app['session']->setFlash('warning', 'Warning flash message');
    $app['session']->setFlash('info', 'Info flash message');
    $app['session']->setFlash('success', 'Success flash message');
    $app['session']->setFlash('error', 'Error flash message');

    return $app['twig']->render('index.html.twig');
})->bind('homepage');

$app->match('/business-hosting', function() use ($app) {
    return $app['twig']->render(
        'webhosting_plan\business_hosting.html.twig');
})->bind('business_hosting');

$app->match('/vps-hosting', function() use ($app) {
    return $app['twig']->render(
        'webhosting_plan\vps_hosting.html.twig');
})->bind('vps_hosting');

$app->match('/dedicated-servers', function() use ($app) {
    return $app['twig']->render(
        'webhosting_plan\dedicated_servers.html.twig');
})->bind('dedicated_servers');

$app->match('/domains', function() use ($app) {
    return $app['twig']->render(
        'domains.html.twig');
})->bind('domains');

$app->match('/testimonials', function() use ($app) {
    return $app['twig']->render(
        'testimonials.html.twig');
})->bind('testimonials');

$app->match('/privacy-policy', function() use ($app) {
    return $app['twig']->render(
        'privacy_policy.html.twig');
})->bind('privacy_policy');

$app->match('/terms-of-service', function() use ($app) {
    return $app['twig']->render(
        'terms_of_service.html.twig');
})->bind('terms_of_service');

$app->match('/hosting-affiliate-program', function() use ($app) {
    return $app['twig']->render(
        'hosting_affiliate_program.html.twig');
})->bind('hosting_affiliate_program');

$app->match('/about-us', function() use ($app) {
    return $app['twig']->render(
        'about_us.html.twig');
})->bind('about_us');

$app->match('/sitemap', function() use ($app) {
    return $app['twig']->render(
        'sitemap.html.twig');
})->bind('sitemap');

$app->match('/webdesign', function() use ($app) {
    return $app['twig']->render(
        'webdesign.html.twig');
})->bind('webdesign');

$app->match('/site-hosting-tools', function() use ($app) {
    return $app['twig']->render(
        'site_hosting_tools.html.twig');
})->bind('site_hosting_tools');

$app->match('/why-us', function() use ($app) {
    return $app['twig']->render(
        'why_us.html.twig');
})->bind('why_us');

$app->match('/support', function() use ($app) {
    return $app['twig']->render(
        'support.html.twig');
})->bind('support');

$app->match('/contact', function() use ($app) {
    return $app['twig']->render(
        'contact.html.twig');
})->bind('contact');

// dedi/vps longtail controller $articles
$app->get('/{product}/articles/', function($product) use ($app){
    return $app['twig']->render('webhosting_plan/'.$product.'.html.twig');
})
->bind('redirect');

$app->get('/{product}/articles/{page}', function($product, $page) use ($app){
    return $app['twig']->render('/../'.$product.'/articles/'.$page.'.twig');
})
->bind('longtail_dedi_vps');


// cpanel controller $cpanel
$app->match('/cpanel-hosting/', function() use ($app) {
    return $app['twig']->render('/../cpanel-hosting/host-with-cpanel.html.twig');
})->bind('cpanel_site_hosting_tools');

$app->match('/host-with-cpanel.html', function() use ($app) {
    return $app['twig']->render('/../cpanel-hosting/host-with-cpanel.html.twig');
})->bind('longtail_host_with_cpanel');

$app->get('/cpanel-hosting/{page}', function($page) use ($app){
    return $app['twig']->render('/../cpanel-hosting/'.$page.'.twig');
})
->bind('longtail_cpanel');

//opencart controller
$app->match('/opencart/', function() use ($app){
    return $app['twig']->render('/../opencart/opencart-hosting.html.twig');
})
->bind('longtail_opencart_landng');

$app->match('/opencart-hosting.html', function() use ($app){
    return $app['twig']->render('/../opencart/opencart-hosting.html.twig');
})
->bind('longtail_opencart');

$app->match('/opencart/opencart-templates.html', function() use ($app){
    return $app['twig']->render('/../opencart/opencart-templates.html.twig');
})
->bind('longtail_opencart_templates');

// form controller
$app->match('/form', function() use ($app) {

    $builder = $app['form.factory']->createBuilder('form');
    $choices = array('choice a', 'choice b', 'choice c');

    $form = $builder
        ->add(
            $builder->create('sub-form', 'form')
                ->add('subformemail1', 'email', array(
                    'constraints' => array(new Assert\NotBlank(), new Assert\Email()),
                    'attr'        => array('placeholder' => 'email constraints'),
                    'label'       => 'A custome label : ',
                ))
                ->add('subformtext1', 'text')
        )
        ->add('text1', 'text', array(
            'constraints' => new Assert\NotBlank(),
            'attr'        => array('placeholder' => 'not blank constraints')
        ))
        ->add('text2', 'text', array('attr' => array('class' => 'span1', 'placeholder' => '.span1')))
        ->add('text3', 'text', array('attr' => array('class' => 'span2', 'placeholder' => '.span2')))
        ->add('text4', 'text', array('attr' => array('class' => 'span3', 'placeholder' => '.span3')))
        ->add('text5', 'text', array('attr' => array('class' => 'span4', 'placeholder' => '.span4')))
        ->add('text6', 'text', array('attr' => array('class' => 'span5', 'placeholder' => '.span5')))
        ->add('text8', 'text', array('disabled' => true, 'attr' => array('placeholder' => 'disabled field')))
        ->add('textarea', 'textarea')
        ->add('email', 'email')
        ->add('integer', 'integer')
        ->add('money', 'money')
        ->add('number', 'number')
        ->add('password', 'password')
        ->add('percent', 'percent')
        ->add('search', 'search')
        ->add('url', 'url')
        ->add('choice1', 'choice',  array(
            'choices'  => $choices,
            'multiple' => true,
            'expanded' => true
        ))
        ->add('choice2', 'choice',  array(
            'choices'  => $choices,
            'multiple' => false,
            'expanded' => true
        ))
        ->add('choice3', 'choice',  array(
            'choices'  => $choices,
            'multiple' => true,
            'expanded' => false
        ))
        ->add('choice4', 'choice',  array(
            'choices'  => $choices,
            'multiple' => false,
            'expanded' => false
        ))
        ->add('country', 'country')
        ->add('language', 'language')
        ->add('locale', 'locale')
        ->add('timezone', 'timezone')
        ->add('date', 'date')
        ->add('datetime', 'datetime')
        ->add('time', 'time')
        ->add('birthday', 'birthday')
        ->add('checkbox', 'checkbox')
        ->add('file', 'file')
        ->add('radio', 'radio')
        ->add('password_repeated', 'repeated', array(
            'type'            => 'password',
            'invalid_message' => 'The password fields must match.',
            'options'         => array('required' => true),
            'first_options'   => array('label' => 'Password'),
            'second_options'  => array('label' => 'Repeat Password'),
        ))
        ->getForm()
    ;

    if ('POST' === $app['request']->getMethod()) {
        $form->bindRequest($app['request']);
        if ($form->isValid()) {
            $app['session']->setFlash('success', 'The form is valid');
        } else {
            $form->addError(new FormError('This is a global error'));
            $app['session']->setFlash('info', 'The form is bind, but not valid');
        }
    }

    return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
})->bind('form');

$app->match('/logout', function() use ($app) {
    $app['session']->clear();

    return $app->redirect($app['url_generator']->generate('homepage'));
})->bind('logout');

$app->get('/page-with-cache', function() use ($app) {
    $response = new Response($app['twig']->render('page-with-cache.html.twig', array('date' => date('Y-M-d h:i:s'))));
    $response->setTtl(10);

    return $response;
})->bind('page_with_cache');
/*
$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message, $code);
});
*/

return $app;
