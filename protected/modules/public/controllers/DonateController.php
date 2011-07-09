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
	
	public function actionBook(){
		$bookModel = new BookModel;
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
