<?php

namespace app\modules\admin\controllers;
use app\modules\admin\controllers\Yii;
use yii\web\Controller;


/**
 * Default controller for the `admin` module
 */

class DefaultController extends Controller
{
// не могу исправить ошибку
    // Class "app\modules\admin\controllers\Yii" not found

//     public  function beforeAction($action)
// {
//      if(Yii::app()->user->isGuest|| Yii::app()->user->identity->role !=1){
//         $this->redirect(['/product']);
//         return false;
//      }
//      {
//          if(Yii::app()->user->isGuest)
//                Yii::app()->user->loginRequired ();
//      }
//      return true;
// }


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
