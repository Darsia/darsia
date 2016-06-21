<?php
namespace app\models;
use yii\easyii\models\Admin as User;
use yii\base\Model;
use yii\easyii\models\Admin;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\yii\easyii\models\Admin', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Admin();
        $user->scenario = 'create';
        return $user->save() ? $user : null;
    }
}