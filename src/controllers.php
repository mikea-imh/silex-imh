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

$app->match('/{category}/articles/{title}', function($category, $title) use ($app) {
    return $app['twig']->render(
        '/longtail.html.twig');
})->bind('longtail');

// cpanel controller pages
$app->match('/host-with-cpanel.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/host-with-cpanel.html.twig');
})->bind('longtail_host_with_cpanel');

$app->match('/cpanel-hosting', function() use ($app) {
    return $app['twig']->render(
        'site_hosting_tools.html.twig');
})->bind('site_hosting_tools');

$app->match('/cpanel-hosting/cpanel-features.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/cpanel-features.html.twig');
})->bind('longtail_cpanel_features');

$app->match('/cpanel-hosting/cpanel-domain-management-feature.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/cpanel-domain-management-feature.html.twig');
})->bind('longtail_cpanel_domain_management_feature');

$app->match('/cpanel-hosting/cpanel-file-management-feature.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/cpanel-file-management-feature.html.twig');
})->bind('longtail_cpanel_file_management_feature');

$app->match('/cpanel-hosting/cpanel-email-feature.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/cpanel-email-feature.html.twig');
})->bind('longtail_cpanel_email_feature');

$app->match('/cpanel-hosting/cpanel-security-feature.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/cpanel-security-feature.html.twig');
})->bind('longtail_cpanel_security_feature');

$app->match('/cpanel-hosting/cpanel-web-hosting.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/cpanel-web-hosting.html.twig');
})->bind('longtail_cpanel_web_hosting');

$app->match('/cpanel-hosting/free-cpanel-hosting.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/free-cpanel-hosting.html.twig');
})->bind('longtail_free_cpanel_hosting');

$app->match('/cpanel-hosting/reseller-hosting-with-cpanel.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/reseller-hosting-with-cpanel.html.twig');
})->bind('longtail_reseller_hosting_with_cpanel');

$app->match('/cpanel-hosting/vps-with-cpanel.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/vps-with-cpanel.html.twig');
})->bind('longtail');

$app->match('/cpanel-hosting/cpanel-backup-feature.html', function() use ($app) {
    return $app['twig']->render(
        'cpanel-hosting/cpanel-backup-feature.html.twig');
})->bind('longtail_cpanel_backup_feature');

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
