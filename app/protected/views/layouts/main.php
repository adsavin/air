<!DOCTYPE html>
<?php $this->renderPartial('//Config/SetLanguage'); ?>

<?php
ini_set("memory_limit", "15000M");
Yii::app()->timeZone = 'Asia/Vientiane';

date_default_timezone_set('Asia/Vientiane');
@ini_alter('date.timezone', 'Asia/Vientiane');

//
// set language
//
$this->renderPartial('//Config/SetLanguage');
$org = Organization::model()->find();
?>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta charset="utf-8" />

        <?php
        // css
        echo CHtml::cssFile('css/bootstrap.min.css');
        echo CHtml::cssFile('css/ui-lightness/jquery-ui-1.10.3.custom.css');
        echo CHtml::cssFile('css/styles.css');
//        echo CHtml::cssFile('css/bootflat.css');
        // js
//        Yii::app()->clientScript->registerScriptFile('js/jquery-2.0.3.js');
        Yii::app()->clientScript->registerScriptFile('js/jquery-1.9.1.js');
        Yii::app()->clientScript->registerScriptFile('js/jquery-ui-1.10.3.custom.js');
        Yii::app()->clientScript->registerScriptFile('js/bootstrap.js');
        Yii::app()->clientScript->registerScriptFile('js/numeral/numeral.js');
        Yii::app()->clientScript->registerScriptFile('js/functions.js');
        ?>

        <script type="text/javascript">
            var dateBefore = null;
        </script>

        <title>Boutsawat</title>
    </head>

    <body onload="initCalendar()" style="background-color: #E6E9ED;">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <?php if (!empty($org->logo_show_on_header)): ?>
                            <?php if ($org->logo_show_on_header == "yes"): ?>
                                <img src="<?php echo Yii::app()->baseUrl; ?>/upload/<?php echo $org->org_logo; ?>" style="width: 50px; <?php echo $bg; ?>" />
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php echo $org->org_name; ?>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        if (Yii::app()->request->cookies['user_id'] != null) {
                            $this->renderPartial('//site/menu');
                        }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="flag" onclick="changeLanguage('lv')">
                                <img class="img-responsive" src="images/la.png" />
                            </a>
                        </li>
                        <li>
                            <a class="flag"  onclick="changeLanguage('th')">
                                <img class="img-responsive" src="images/th.png" />
                            </a>
                        </li>
                        <li>
                            <a class="flag"  onclick="changeLanguage('en')">
                                <img class="img-responsive" src="images/us.png" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <?php
                                $id = Yii::app()->request->cookies['user_id']->value;
                                $user = User::model()->findByPk($id);
                                ?>
                                <strong><?php echo @$user->user_name; ?> (<?php echo @$user->user_level; ?>)</strong>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?r=Site/Logout" class="btn" onclick="return confirm('Logout Now')">
                                <span class="glyphicon glyphicon-off"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">            
            <?php if (Yii::app()->request->cookies['user_id'] != null): ?>
                <?php echo $content; ?>
            <?php else: ?>
                <?php $this->renderPartial("//site/index"); ?>
            <?php endif; ?>
        </div>
    </body>
</html>
