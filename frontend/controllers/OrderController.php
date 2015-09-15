<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace frontend\controllers;

/* VARIABLE BASE YII2 Author: -YII2- */

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter; 	
use backend\models\Ordergenerate;
use backend\models\OrdergenerateSearch;
/* VARIABLE PRIMARY JOIN/SEARCH/FILTER/SORT Author: -ptr.nov- */
//use app\models\hrd\Dept;			/* TABLE CLASS JOIN */
//use app\models\hrd\DeptSearch;		/* TABLE CLASS SEARCH */
	
/**
 * HRD | CONTROLLER EMPLOYE .
 *
 */
class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['order']),
                'actions' => [
                    //'delete' => ['post'],
					'save' => ['post'],
                ],
            ],
        ];
    }

    /**
     * ACTION INDEX
     */
    public function actionIndex()
    {
	 $model = new Ordergenerate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->G_ORDER]);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
		
    }
     public function actionView($id)
    { 

        $searchModel = new OrdergenerateSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams);
        $model= new Ordergenerate();
        $detail=Ordergenerate::find()->Tes($id);
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'detail'=>$detail,
            'model' => $this->findModel($id),
        ]);
    }
	protected function findModel($id)
    {
        if (($model = Ordergenerate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
