<?php

namespace console\controllers;

#use yii\base\Security;
use common\models\User;

/**
 * Create superuser
 * @author maituanmte
 *
 */
class UserController extends \yii\console\Controller
{
	// The command "yii example/create test" will call "actionCreate('test')"
	public function actionCreate($username, $password) {
		$user = new User();
		$user->username = $username;
		$user->setPassword($password);
		$user->save();
	}
}