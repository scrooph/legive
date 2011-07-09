<?php

class DonateController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionViewsaved(){
		$user = User::model()->findByPk(Yii::app()->user->id);
		$this->render('viewCurrent', array('order'=>$user->orders->saved()->find()));
	}
	
	
	public function actionCreateBook(){
		$bookModel = new BookModel;
		if(isset($_POST['ajax']) && $_POST['ajax']==='book-form'){
			$bookModel->attributes = $_POST['BookModel'];
			$connection = $bookModel->getDbConnection();
			$transaction = $connection->beginTransaction();
			try{
				$bookModel->save();
				addOrder($bookModel);
				$transaction->commit();

				echo CJavaScript::encode($bookModel);
				Yii::app()->end();
			} catch(Exception $e){
				$transaction->rollBack();
				throw new CHttpException(500);
			}
		}
		$this->renderPartial('book', array('book'=>$bookModel));
	}

	public function actionCreateSpecies(){
		if(isset($_POST['ajax']) && $_POST['ajax']==='search-form'){
			$species = Species::Model()->findByAttributes(array('name'=>$_POST['SearchForm']->name));
			if(!$species){
				$species = new Species;
				$this->renderpartial('species', array('species'=>$species));
				Yii::app()->end();
			}
			$this->renderPartial('species', array('species'=>$species));
			Yii::app()->end();
		}
		if(isset($_POST['ajax']) && $_POST['ajax']==='create-species-form'){
			$species->attributes = $_POST['SpeciesModel'];
			if($species->isNew()){
				$species->save();
			}
			$order = prepareOrder();
			$book = createDefaultBook();
			$orderItem = createDefaultOrderItem();

		}
	}
	public function createDefaultBook(){
		$book = new Book;
		$book->damage = Book::DAMAGE_DEFAULT;
		$book->status = Book::STATUS_CREATED;
		$book->seed = 1;
		$book.save();
		return $book;
	}

	public function actionCreate(){
		$searchModel = new SearchFormModel;
		$this->render('search', array('model'=>$searchModel));
	}
	
	public function createDefaultOrderItem(){
		$orderItem = new OrderItem;
		$orderItem->save();
		return $orderItem;
	}

	public function prepareOrder(){
		$user = User::Model()->findByPk(Yii::app()->user->id);
		$order = Order::Model()->saved()->find();
		if(!$order){
			$order = new Order;
			$order->userId = $user->id;
			$order->status = Order::STATUS_SAVED;
			$order->type = Order::TYPE_DONATE;
			$order->save();
		}

	
		return $order;
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
