<?php $this->renderPartial('//Config/SetLanguage'); ?>

<div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading"><?= Yii::t("app", "Login") ?></div>
            <div class="panel-body">

                <?php if (Yii::app()->user->hasFlash('message')): ?>
                    <div class="alert alert-danger">
                        <?php echo Yii::app()->user->getFlash('message'); ?>
                    </div>
                <?php endif; ?>

                <form method="post" name="formLogin">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" name="User[user_username]" placeholder="<?=  Yii::t("app", "Username")?>" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="password" class="form-control" name="User[user_password]" placeholder="<?=  Yii::t("app", "Password")?>" />
                    </div>
                    <div class="center-block">
                        <input type="submit" class="center-block btn btn-primary" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>