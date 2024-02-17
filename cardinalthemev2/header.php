<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php the_field('insert_in_header', 'option'); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php the_field('insert_in_body', 'option'); 

    if (strpos($_SERVER['REQUEST_URI'], "/patients") !== false) {
        get_template_part('modules/global/nav-patient');
    }
    else if (strpos($_SERVER['REQUEST_URI'], "/partners") !== false) {
        get_template_part('modules/global/nav-partner');
    }
    else if (strpos($_SERVER['REQUEST_URI'], "/brokers-agents") !== false) {
        get_template_part('modules/global/nav-broker');
    }
    else if (strpos($_SERVER['REQUEST_URI'], "/talent") !== false) {
        get_template_part('modules/global/nav-talent');
    }
    else {
        get_template_part('modules/global/nav');
    }
?>
