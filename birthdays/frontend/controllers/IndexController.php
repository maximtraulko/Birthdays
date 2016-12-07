<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Employee;
use app\models\Depatment;

class IndexController extends Controller

{ 
	public function actionView()
	{
		$employees = Employee::find()
		-> orderBy (['date_of_birth' => SORT_ASC, 'Last_name' =>
		SORT_ASC]) 
		-> all();
		return $this->render('view', ['employees'=>$employees]);
	}
	
	public function actionView2($id){
		$employee = Employee::findOne($id);
		if ($employee) {
			return $this->render('view2',['employee' => $employee]);
		} else {
			return 'Побробная информация не найдена';
		}
	}
	   
	public function actionList(){
		$depatments = Depatment::find()
		-> orderBy (['name' => SORT_ASC, 'department_id' =>
		SORT_ASC]) 
		-> all();
		return $this->render('list', ['depatments'=>$depatments]);
	}
	
	public function actionList2($department_id){
		$employees = Depatment::findOne($department_id);
		return $this->render('list2',['employees' => $employees]);
	}	
}