<?php

class DonateController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionSearch(){
		$model = new DonateSearchForm;
		$form = new CForm('public.views.donate.searchForm', $model);
		if($form->submitted('search') && $form->validate()){
			$this->redirect(array('donate/showSpecies'));
		} else {
			$this->render('search', array('form'=>$form));
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
