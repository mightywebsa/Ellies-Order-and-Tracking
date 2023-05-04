<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\base\Model;

class ResendVerificationEmailForm extends Model
{
    /**
     * @var string
     */
    public $user_email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['user_email', 'trim'],
            ['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => User::STATUS_INACTIVE],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }

    /**
     * Sends confirmation email to user
     *
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        $user = User::findOne([
            'user_email' => $this->user_email,
            'status' => User::STATUS_INACTIVE
        ]);

        if ($user === null) {
            return false;
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->user_email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
