<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
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
	
	public function actionView2($id)
	{
		$employee = Employee::findOne($id);
		if ($employee) {
			return $this->render('view2',['employee' => $employee]);
		} else {
			return 'Побробная информация не найдена';
		}
	}
	   
	public function actionList()
	{
		$depatments = Depatment::find()
		-> orderBy (['name' => SORT_ASC, 'department_id' =>
		SORT_ASC]) 
		-> all();
		return $this->render('list', ['depatments'=>$depatments]);
	}
	
	public function actionList2($department_id)
	{
		$employees = Depatment::findOne($department_id);
		return $this->render('list2',['employees' => $employees]);
	}
	

	public function actionAdd_depatment ()
	{
		$depatment=new Depatment;
		if (isset($_POST['Depatment'])){
			$depatment->attributes=$_POST['Depatment'];
			if ($depatment->save()){
				return $this-> redirect(['index/list']);
			}
		}
		return $this->render ('add_depatment',['depatment'=>$depatment]);
	}
	
	public function actionEdit_depatment($department_id)
    {
        $depatment = Depatment::findOne($department_id);
        if ($department_id === null) {
            throw new \yii\web\NotFoundHttpException('Отдел не найден');
        }
        if (isset($_POST['Depatment'])) {
            if (isset($_POST['delete'])) {
                $depatment->delete();
                Yii::$app->session->setFlash('success', 'Запись удалена.');
                return $this->redirect(['index/list']);
            } else {
                $form = $_POST['Depatment'];
                $depatment->attributes = $form;
                if ($depatment->save()) {
                    Yii::$app->session->setFlash('success', 'Изменения сохранены.');
                    return $this->redirect(['index/list']);
                }
            }
        }
        return $this->render('edit_depatment', ['depatment' => $depatment]);
    }
	
	public function actionAdd_employee(){
		$employee=new Employee;
		$employee->status=1;
		$depatment=Depatment::find()->all();
		if (isset($_POST['Employee'])){
			$employee->attributes=$_POST['Employee'];
			if ($employee->save()){
				return $this-> redirect(['index/list2','department_id' => $employee ->department_id]);
			}
		}
		return $this->render ('add_employee',['employee'=>$employee, 'depatment'=>$depatment]);
	}
	
	public function actionEdit_employee($id)
    {
        $employee = Employee::findOne($id);
		$depatment=Depatment::find()->all();
        if ($id === null) {
            throw new \yii\web\NotFoundHttpException('Сотрудник не найден');
        }
        if (isset($_POST['Employee'])) {
            if (isset($_POST['delete'])) {
                $employee->delete();
                Yii::$app->session->setFlash('success', 'Запись удалена.');
                return $this->redirect(['index/list2','department_id' => $employee ->department_id]);
            } else {
                $form = $_POST['Employee'];
                $employee->attributes = $form;
                if ($employee->save()) {
                    Yii::$app->session->setFlash('success', 'Изменения сохранены.');
                    return $this->redirect(['index/list2','department_id' => $employee ->department_id]);
                }
            }
        }
        return $this->render('edit_employee', ['employee' => $employee, 'depatment'=>$depatment]);
    }
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }	
}