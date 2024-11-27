<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <!--Google Map Start-->
        <section class="google-map google-map-two">
            <div class="container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3831.10021723342!2d39.712859661850594!3d47.23620567845806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e3bbd25efc8dab%3A0xe71795934da757ba!2z0JTQvtC90YHQutC-0Lkg0LPQvtGB0YPQtNCw0YDRgdGC0LLQtdC90L3Ri9C5INGC0LXRhdC90LjRh9C10YHQutC40Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgg!5e0!3m2!1sru!2sru!4v1717487879917!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <!--Google Map End-->

        <!--Contact Info Start-->
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 wow fadeInLeft" data-wow-delay="200ms">
                        <div class="faq-page__help">
                            <div class="faq-page__help__icon"><span class="icon-phone-call-1"></span></div>
                            <h3 class="faq-page__help__title">Do you still<br> have questions?</h3>
                            <p class="faq-page__help__text">Call Anytime<a href="tel:+9288009850">+92 (8800) - 9850</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact__box">
                            <div class="contact__box__icon"><span class="icon-mailbox"></span></div>
                            <h5 class="contact__box__title">Write email</h5>
                            <p class="contact__box__text"><a href="mailto:needhelp@company.com">needhelp@company.com</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact__box contact__box-two">
                            <div class="contact__box__icon"><span class="icon-maps-and-flags"></span></div>
                            <h5 class="contact__box__title">Visit office</h5>
                            <p class="contact__box__text">24 Valentin, Street Road New York</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Info End-->

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>