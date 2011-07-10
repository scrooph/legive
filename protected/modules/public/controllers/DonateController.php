<?php

class DonateController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionBookDetailDamages(){
		echo CJavaScript::encode(Book::getDamages());
	}
	
	public function actionUpdate(){
		if(isset($_GET['id'])){
			$orderItem = OrderItem::model()->findByPk($_GET['id']);
			$this->render('updateOrderItem', array('orderItem'=>$orderItem));
		}
	}
	
	public function actionDelete(){
		if(isset($_POST['ajax']) && $_POST['ajax']=''){
		}
	}
	
	public function actionSubmit(){
		if(isset($_POST['view-saved-form'])){
			$order=$this->findMyOrder();
			$order->status=Order::STATUS_SUBMITTED;
			$order->save();
		}
	}
	
	public function actionViewsaved(){
		$order = $this->findMyOrder();
		$dataProvider=new CActiveDataProvider('OrderItem', array(
			'criteria'=>array(
				'condition'=>'orderId='.$order->id,
				'with'=>array('book'),
				),
			'pagination'=>array(
				'pageSize'=>10,
				),
			));
		$this->render('viewSaved', array('dataProvider'=>$dataProvider));
	}
	
	public function actionCreateBooks(){
		if(isset($_POST['ajax']) && $_POST['ajax']==='create-books-form'){
			$books = CJavaScript::josnDecode($_POST['create-books-form']);
			foreach($books as $book){
				$book->save();
			}
		}
	}
	
	public function actionCreateBook(){
		$book = new BookModel;
		if(isset($_POST['ajax']) && $_POST['ajax']==='create-book-form'){
			$book->attributes = $_POST['BookModel'];
			echo $book->save();
			Yii::app()->end();
		}
		$this->renderPartial('book', array('book'=>$book));
	}

	public function actionSearchSpecies(){
		if(isset($_POST['ajax']) && $_POST['ajax']==='search-species-form'){
			$speciesName = $_POST['SearchFormModel']['name'];
			$species = Species::Model()->findByAttributes(array('name'=>$speciesName));
			if(!$species){
				$species = new Species;
			} 
			$this->renderPartial('species', array('species'=>$species, 'speciesName'=>$speciesName));
		}
	}
	
	public function actionCreateSpecies(){
		if(isset($_POST['ajax']) && $_POST['ajax']==='create-species-form'){
			$species->attributes = $_POST['SpeciesModel'];
			if($species->isNew()){
				$species->save();
			}
			echo $species->id;
		}
	}

	public function actionCreate(){
		$searchFormModel = new SearchFormModel;
		$this->render('search', array('model'=>$searchFormModel));
	}

	private function findMyOrder(){
	
		$user->id = 1;
	
		//$user = User::Model()->findByPk(Yii::app()->user->id);
		
		
		$order = Order::Model()->saved()->find();
		if(!$order){
			$order = Order::createDefaultOrder();
			$order->userId = $user->id;
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
