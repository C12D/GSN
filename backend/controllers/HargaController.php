<?php

namespace backend\controllers;

use Yii;
use backend\models\Harga;
use backend\models\HargaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HargaController implements the CRUD actions for Harga model.
 */
class HargaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Harga models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HargaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Harga model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Harga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Harga();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->FWD_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Harga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->FWD_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Harga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Harga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Harga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPrice()
    {
        $model = new Harga();
        $data=Yii::$app->request->post();



        error_reporting(0);
       $origin = $data['Harga']['ORIGIN_CITY'];
       $destination = $data['Harga']['DES_CITY'];
       $weight = $data['Harga']['HARGA'];         
        $curl = curl_init();
         
        curl_setopt_array($curl, array(
         CURLOPT_URL => "http://rajaongkir.com/api/starter/cost",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight",
         CURLOPT_HTTPHEADER => array(
         "key:f23794936f254ee0738d79110c112ad0"
         ),
        ));
         
        $response = curl_exec($curl);
        $err = curl_error($curl);
         
        curl_close($curl);
         
        if ($err) {
         echo "cURL Error #:" . $err;
        } else {

          echo '<br/>';
         echo '<br/>';
         $data = json_decode($response, true);
   

         echo '<br/>';
         echo '<br/>';
         
        }
         
        ?>
         <?php echo "ORIGIN".'<br/><br/>';?>
          <?php echo "Province Id"." ".$data['rajaongkir']['origin_details']['province_id'].'<br/>';?> 
          <?php echo "City id"." ".$data['rajaongkir']['origin_details']['city_id'].'<br/><br/>';?> 
          
           <?php echo "Destination Detail".'<br/><br/>';?>
          <?php echo "Province Id"." ".$data['rajaongkir']['destination_details']['province_id'].'<br/>';?> 
          <?php echo "City id"." ".$data['rajaongkir']['destination_details']['city_id'].'<br/><br/>';

           
          ?> 
         
         
         <?php
          for ($i=0; $i < count($data['rajaongkir']['results']); $i++) 
          {
          
           // echo strtoupper($data['rajaongkir']['results'][$i]['name']).'<br>';
            
            echo "<br>";
            
             for ($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++) 
             {

                echo$data['rajaongkir']['origin_details']['province_id'].'<br/>';
                echo $data['rajaongkir']['origin_details']['city_id'].'<br/>';
                echo $data['rajaongkir']['destination_details']['province_id'].'<br/>'; 
                echo $data['rajaongkir']['destination_details']['city_id'].'<br/>';
                echo $data['rajaongkir']['results'][$i]['name'].'<br>';
                echo $data['rajaongkir']['results'][$i]['costs'][$j]['service'].'<br>';
                //echo $data['rajaongkir']['results'][$i]['costs'][$j]['description'].'<br><br>';
                //echo $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'].'<br><br>';
                echo number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']).'<br>';
             }
          }
    }
    protected function findModel($id)
    {
        if (($model = Harga::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
