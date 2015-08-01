<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Generador de Ticket para el Soporte de Software">
        <meta name="author" content="Muñoz Daniel Eduardo">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <?php echo $this->tag->getTitle(); ?>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Css Externos -->
        <?php echo $this->tag->stylesheetLink('assets/font-awesome/css/font-awesome.css'); ?>
        <!-- Estilos Personalizados para el Template -->
        <?php echo $this->tag->stylesheetLink('assets/css/style.css'); ?>
        <?php echo $this->tag->stylesheetLink('assets/css/style-responsive.css'); ?>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
            <!-- Agregar Cabecera Individual -->

        
    </head>
    <body>

    <?php echo $this->getContent(); ?>

    <!-- Los siguientes JS se agregan al final para que la página carge más rápido. -->
    <?php echo $this->tag->javascriptInclude('assets/js/jquery.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/js/bootstrap.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/js/jquery-ui-1.9.2.custom.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('assets/js/jquery.ui.touch-punch.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('assets/js/jquery.dcjqaccordion.2.7.js'); ?>

    <?php echo $this->tag->javascriptInclude('assets/js/jquery.scrollTo.min.js'); ?>
    <?php echo $this->tag->javascriptInclude('assets/js/jquery.nicescroll.js'); ?>


        <!--Script Común para todas las Páginas-->
        <?php echo $this->tag->javascriptInclude('assets/js/common-scripts.js'); ?>

        <!--Script Particular de cada página -->
    <?php echo $this->assets->outputJs(); ?>
    <?php echo $this->assets->outputInlineJs(); ?>
    

    </body>
</html>
