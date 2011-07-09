<?php

class DonateController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// public function actionSearch(){
		// $model = new DonateSearchForm;
		// $form = new CForm('public.views.donate.searchForm', $model);
		// if($form->submitted('search') && $form->validate()){
			// $species = Species::Model()->findAllByAttributes(array('name'=>$model->name));
			// if(empty($species)){
				// $this->redirect(array('donate/create', 'name'=>CHtml::encode($model->name)));
			// }
			// $this->render('showSpecies', array('species'=>$species));
		// } else {
			// $this->render('search', array('form'=>$form));
		// }
	// }
	
	public function actionViewOrder(){
	}
	
	public function actionBook(){
		$bookModel = new BookModel;
		if(isset($_POST['ajax']) && $_POST['ajax']==='book-form'){
			$bookModel->attributes = $_POST['BookModel'];
			$connection = $bookModel->getDbConnection();
			$transaction = $connection->beginTransaction();
			try{
				$bookModel->save();
				dealOrderForBook($bookModel);

				echo CJavaScript::encode($bookModel);
				Yii::app()->end();
			} catch(Exception $e){
				$transaction->rollBack();
				throw new CHttpException(500);
			}
		}
		$this->renderPartial('book', array('book'=>$bookModel));
	}

	public function actionCreate(){
		$searchModel = new SearchFormModel;
		if(isset($_POST['ajax']) && $_POST['ajax']==='search-form'){
			$searchModel->attributes = $_POST['SearchFormModel'];
			if($searchModel->validate()){
				$species = Species::Model()->findByAttributes(array('name'=>$searchModel->name));
				if(empty($species)){
					$newSpeciesModel = new Species;
					$this->renderpartial('species', array('species'=>$newSpeciesModel));
					Yii::app()->end();
				}
				$this->renderPartial('species', array('species'=>$species));
				Yii::app()->end();
			}
		}
		$this->render('search', array('model'=>$searchModel));
	}
	
	public function assembleUserInfo($model){
		$model->id = Yii::app()->user->id;
	}
	
//	public function dealOrderForBook($book){
//		prepareOrder();
//		$orderItem = new OrderItem;
//		$orderItem->cr

//	}

	public function prepareOrder(){
		$user = User::Model()->findByPk(Yii::app()->user->id);
		$currentOrder = Order::Model()->current()->find();
		if(!$currentOrder){
			$currentOrder = new Order;
			$currentOrder->userId = $user->id;
			$currentOrder->created = date('Y-m-d H:i:s');
			$currentOrder->updated = date('Y-m-d H:i:s');
			$currentOrder->status = Order::STATUS_SAVED;
			$currentOrder->type = Order::TYPE_DONATE;
			$currentOrder->save();
		}
	}

	
	


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
