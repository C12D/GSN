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
use backend\models\Kota;
use backend\models\Provinsi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter; 	
/* VARIABLE PRIMARY JOIN/SEARCH/FILTER/SORT Author: -ptr.nov- */
//use app\models\hrd\Dept;			/* TABLE CLASS JOIN */
//use app\models\hrd\DeptSearch;		/* TABLE CLASS SEARCH */
	
/**
 * HRD | CONTROLLER EMPLOYE .
 *
 */
class SendController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['send']),
                'actions' => [
                'delete' => ['POST'],
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
		/*	variable content View Employe Author: -ptr.nov- */
       // $searchModel_Dept = new DeptSearch();
		//$dataProvider_Dept = $searchModel_Dept->search(Yii::$app->request->queryParams);
        $kota = new Kota();
        $provinsi = new Provinsi();
		return $this->render('index', [
            'kota' => $kota,
            'provinsi' => $provinsi,
        ]);
    }
    public function actionGetKota() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $model = Kota::find()->asArray()->where(['PROVINCE_ID'=>$cat_id])->all();
            foreach ($model as $key => $value) {
                   $out[] = ['id'=>$value['PROVINCE_ID'],'name'=> $value['CITY_NAME']];
               }
 
               echo json_encode(['output'=>$out, 'selected'=>'']);
               return;
           }
       }
       echo Json::encode(['output'=>'', 'selected'=>'']);
   }
    public function actionLists($id)
    {
        $countPosts = Kota::find()
                ->where(['PROVINCE_ID' => $id])
                ->count();
 
        $posts = Kota::find()
                ->where(['PROVINCE_ID' => $id])
                //->orderBy('id DESC')
                ->all();
 
        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->CITY_ID."'>".$post->CITY_NAME."</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }
 
    }
    public function actionApi()
    {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://rajaongkir.com/api/starter/city",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key:f23794936f254ee0738d79110c112ad0"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    $data=$response;
    $data1=json_decode($data)->rajaongkir->results;
            $db = \Yii::$app->db;     
            foreach($data1 as $row)
            { 
            $city_id=$row->city_id;
            $prov_id=$row->province_id;
            $prov=$row->province;
            $type=$row->type;
            $city_name=$row->city_name;
            $postal_code=$row->postal_code;
            
            $db->createCommand()->batchInsert('a0002', ['CITY_ID','PROVINCE_ID', 'PROVINCE','TYPE', 'CITY_NAME','POSTAL_CODE'], [
            
                                                [$city_id,$prov_id,$prov,$type,$city_name,$postal_code],
                                            
                                            ])->execute();
    } 

            return $this->redirect('index');
        }
	
}
