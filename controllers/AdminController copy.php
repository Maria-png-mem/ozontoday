<?php

namespace app\controllers;
use app\models\RegForm;
use      Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class AdminController extends Controller
{
  
    // protected  function beforeAction($action)
    // {
    //      if(Yii::app()->user->isGuest|| Yii::app()->user->identity->role !=1){
    //         $this->redirect(['/site/login']);
    //         return false;
    //      }
    //      {
    //          if(Yii::app()->user->isGuest)
    //                Yii::app()->user->loginRequired ();
    //      }
    //      return true;
    // }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
}
