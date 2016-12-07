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
			throw new \yii\web\NotFoundHttpException ('Сотрудник не найден');
		}
	}
	   
	public function actionList(){
		$depatments = Depatment::find()
		-> orderBy (['name' => SORT_ASC, 'department_id' =>
		SORT_ASC]) 
		-> all();
		return $this->render('list', ['depatments'=>$depatments]);
	}
	
	public function actionList2($department_id)
	{
		$employees = Depatment::findOne($department_id);
		if ($employees) {
		return $this->render('list2',['employees' => $employees]);
		} else {
			throw new \yii\web\NotFoundHttpException ('Отдел не найден');
		}
	}	
}