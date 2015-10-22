<?php
namespace frontend\controllers;

use Yii;
use backend\models\Provinsi;
use backend\models\Harga;
use backend\models\Kurir;
use backend\models\Chart;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use backend\models\Kota;
use yii\helpers\Json;
use backend\models\Order;
use backend\models\OrderSearch;
use yii\web\NotFoundHttpException;
use mPDF;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(['send']),
                'actions' => [
                'delete' => ['POST'],
             
                ],
            ],
        ];
      /* return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [ 
                        /* Author: -ptr.nov- : Permission Allow No Login |index|error|login */
                     /*   'actions' => ['index', 'error','login','subcat','site'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','subcat','site'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
        */

    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
       $provinsi = new Provinsi();
       $kota = new Kota();
       $harga = new Harga();
       

        if ($provinsi->load(Yii::$app->request->post()) && $provinsi->save()) {
            return $this->redirect(['view', 'id' => $model->G_ORDER]);
        } else {
            return $this->render('index', [
                'provinsi' => $provinsi,
                'kota' => $kota,
                'model' => $harga,
            ]);
        }
    }
    public function actionAct()
    {

        $model = new Kurir();
        $model1= new Chart();
        $data=Yii::$app->request->post();
        $model1->KURIR = $data['Kurir']['KURIR'];
        $model1->HARGA = $data['Kurir']['HARGA'];
        $model1->ORIGIN_CITY = $data['Kurir']['ORIGINCITY'];
        $model1->DES_CITY = $data['Kurir']['DESCITY'];
        $model1->KODE_POS_ORIGIN = $data['Kurir']['POSTALCODEORIGIN'];
        $model1->KODE_POS_DES = $data['Kurir']['POSTALCODEDESC'];
        //echo  $model1->KURIR = $data['Kurir']['KURIRKATEGORI'];
        $model1->PROVORIGIN = $data['Kurir']['ORIGINPROV'];
        $model1->TOTAL_BERAT = $data['Kurir']['TOTALWEIGHT'];
        $model1->PROVDES = $data['Kurir']['DESPROV'];
        $model1->KATEGORI_KIRIM = $data['Kurir']['KATEGORI'];
        $model1->KATEGORI_DETAIL = $data['Kurir']['KATEGORI_DETAIL'];
        $model1->USER_ID = $data['id'];
        $model1->USERNAME = $data['username'];
        $model1->FAKTUR = $data['generate'];
     
        $model1->save();
          
        return $this->redirect(['check', 'id' => $model1->FAKTUR]);

    } 
      public function actionCheckout()
    {

        $model = new Order();
       // $model1= new Chart();
        $data=Yii::$app->request->post();       
        $model->G_ORDER = $data['Order']['G_ORDER'];
        $model->G_RANDOM = $data['Order']['G_ORDER'];
        $model->G_PESAN = $data['Order']['G_PESAN'];
        $model->USER_ID = $data['Order']['USER_ID'];
        $model->USER_NAME = $data['Order']['USER_NAME'];
        $model->NAMA_CUSTOMER = $data['Order']['NAMA_CUSTOMER'];
        //echo  $model1->KURIR = $data['Kurir']['KURIRKATEGORI'];
        $model->ALAMAT_CUSTOMER = $data['Order']['ALAMAT_CUSTOMER'];
        $model->HANDPHONE = $data['Order']['HANDPHONE'];
        $model->EMAIL_CUSTOMER = $data['Order']['EMAIL_CUSTOMER'];
        $model->GRANDTOTAL = $data['total'];
        $model->STATUS = $data['Order']['STATUS'];
       
     
        $model->save();
        return $this->redirect(['confirm', 'id' => $model->G_ORDER]);

    } 
    public function actionCheck($id)
    {
        $model = new Order();

        return $this->render('checkout', [
            'model'=>$model,
            'sql' => Chart::find()->where(['FAKTUR'=>$id])->asArray()->all(),
            'total'=> Chart::find()->select('sum(HARGA) as total')->where(['FAKTUR' =>$id])->asArray()->all(),
        ]);
       
    }
    public function actionConfirm($id)
    {
        $model = new Order();

        return $this->render('confirm', [
            'model'=>$model,
            'sql' => Chart::find()->where(['FAKTUR'=>$id])->asArray()->all(),
            'total'=> Chart::find()->select('sum(HARGA) as total')->where(['FAKTUR' =>$id])->asArray()->all(),
            'queryorder'=>Order::find()->where(['G_ORDER'=>$id])->asArray()->all(),
        ]);
       
    }
    public function actionPdf($id)
    {
        /*
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('mpdf',['model' => $this->findModel($id),]));
        //$mpdf->WriteHTML($this->renderPartial('mpdf'));
        $mpdf->Output('Expdf.pdf', 'D');
        exit;
        */  
       // $model = new Order();
       // $total = new Chart();
        $sql = Order::find()->where(['G_ORDER'=>$id])->asArray()->one();
        $list= Chart::find()->where(['FAKTUR'=>$id])->asArray()->all();
        $total= Chart::find()->select('sum(HARGA) as total')->where(['FAKTUR' =>$id])->asArray()->all();
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('invoice', [
            'sql' => $sql,
            'list'=>$list,
            'total'=>$total,
          
        ]));
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }
      public function actionPrice()
    {
        $provinsi = new Provinsi();
        $kota = new Kota();
        $harga = new Harga();
        $model2 = new Kurir();
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

         $data = json_decode($response, true);
        }
         
        ?>
        <?php
         $coun = Kurir::find()->count();  
         if($coun>0)
         {
              $db = \Yii::$app->db; 
              $db->createCommand('DELETE FROM b0001')
             ->execute();
          
          
           for ($i=0; $i < count($data['rajaongkir']['results']); $i++) 
          {
          
           // echo strtoupper($data['rajaongkir']['results'][$i]['name']).'<br>';
            
            
            
             for ($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++) 
             {

                $province_id=$data['rajaongkir']['origin_details']['province_id'].'<br/>';
                $originprov=$data['rajaongkir']['origin_details']['province'];
                $origincity=$data['rajaongkir']['origin_details']['city_name'];
                $postalcodeorigin=$data['rajaongkir']['origin_details']['postal_code'];
                $desprov=$data['rajaongkir']['destination_details']['province'];
                $descity=$data['rajaongkir']['destination_details']['city_name'];
                $postalcodedes=$data['rajaongkir']['destination_details']['postal_code'];
                $weight=$data['rajaongkir']['query']['weight'];
                


                $province_id_des=$data['rajaongkir']['destination_details']['province_id'].'<br/>'; 
                $city_id_desc=$data['rajaongkir']['destination_details']['city_id'].'<br/>';
                $nama_kurir=$data['rajaongkir']['results'][$i]['name'];
                $servis_kurir=$data['rajaongkir']['results'][$i]['costs'][$j]['service'];

                $description=$data['rajaongkir']['results'][$i]['costs'][$j]['description'];
                //echo $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'].'<br><br>';
                $harga1=$data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value'];
                $db = \Yii::$app->db;     
                $prov_id=$row->province_id;
                $prov=$row->province;
                $db->createCommand()->batchInsert('b0001', ['KURIR','KATEGORI','KATEGORI_DETAIL','KURIRKATEGORI','ORIGINPROV','DESPROV','ORIGINCITY','DESCITY','POSTALCODEORIGIN','POSTALCODEDESC','TOTALWEIGHT','HARGA'], [
                [$nama_kurir,$servis_kurir,$description,$nama_kurir." ".$servis_kurir,$originprov,$desprov,$origincity,$descity,$postalcodeorigin,$postalcodedes,$weight,$harga1],])->execute();
             
             }
          }



         }
         else
         {
           for ($i=0; $i < count($data['rajaongkir']['results']); $i++) 
          {
          
           // echo strtoupper($data['rajaongkir']['results'][$i]['name']).'<br>';
            
            
            
             for ($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++) 
             {

                $province_id=$data['rajaongkir']['origin_details']['province_id'].'<br/>';
                $originprov=$data['rajaongkir']['origin_details']['province'];
                $origincity=$data['rajaongkir']['origin_details']['city_name'];
                $postalcodeorigin=$data['rajaongkir']['origin_details']['postal_code'];
                $desprov=$data['rajaongkir']['destination_details']['province'];
                $descity=$data['rajaongkir']['destination_details']['city_name'];
                $postalcodedes=$data['rajaongkir']['destination_details']['postal_code'];
                $weight=$data['rajaongkir']['query']['weight'];
                


                $province_id_des=$data['rajaongkir']['destination_details']['province_id'].'<br/>'; 
                $city_id_desc=$data['rajaongkir']['destination_details']['city_id'].'<br/>';
                $nama_kurir=$data['rajaongkir']['results'][$i]['name'];
                $servis_kurir=$data['rajaongkir']['results'][$i]['costs'][$j]['service'];

                $desc=$data['rajaongkir']['results'][$i]['costs'][$j]['description'];
                //echo $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'].'<br><br>';
                $harga1=$data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value'];
                $db = \Yii::$app->db;     
                $prov_id=$row->province_id;
                $prov=$row->province;
                $db->createCommand()->batchInsert('b0001', ['KURIR','KATEGORI','KATEGORI_DETAIL','KURIRKATEGORI','ORIGINPROV','DESPROV','ORIGINCITY','DESCITY','POSTALCODEORIGIN','POSTALCODEDESC','TOTALWEIGHT','HARGA'], [
                [$nama_kurir,$servis_kurir,$desc,$nama_kurir." ".$servis_kurir,$originprov,$desprov,$origincity,$descity,$postalcodeorigin,$postalcodedes,$weight,$harga1],])->execute();
             
             }
          }
         }
      
          
              
              
             return $this->render('view', [
                'provinsi' => $provinsi,
                'kota' => $kota,
                'model' => $harga,
                'model2' => $model2,
                'data'=> $data,
                'province_id'=>$province_id,
                'city_id'=>$city_id,
                'province_id_des'=>$province_id_des,
                'city_id_desc'=>$city_id_desc,
                'nama_kurir'=>$nama_kurir,
                'servis_kurir'=>$servis_kurir,
                'harga'=>$harga1,

            ]); 
            
    }
    public function actionHarga($ID)
    {
     // $location=Locations::find()->where(['zip_code'=>$zipId])->one();
      $location=Kurir::findOne($ID);
      echo json::encode($location);
    }
    public function actionGetKota() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $model = Kota::find()->asArray()->where(['PROVINCE_ID'=>$cat_id])->all();
            foreach ($model as $key => $value) {
                   $out[] = ['id'=>$value['CITY_ID'],'name'=> $value['CITY_NAME']];
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
          

          public function actionSubcat() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $model = Kota::find()->asArray()->where(['province_id'=>$cat_id])->all();
            //$out = self::getSubCatList($cat_id); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            foreach ($model as $key => $value) {
                   $out[] = ['id'=>$value['province_id'],'name'=> $value['city_name']];
               }
 
               echo json_encode(['output'=>$out, 'selected'=>'']);
               return;
           }
       }
       echo Json::encode(['output'=>'', 'selected'=>'']);
   }
        public function actionSubcat2() {
        $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = self::getSubCatList($cat_id); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
}
    public function actionProd() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            print_r($ids);
            $cat_id = empty($ids[0]) ? null : $ids[0];
            if ($cat_id != null) {
                $data = self::getProdList($cat_id);
                /**
                 * the getProdList function will query the database based on the
                 * cat_id and sub_cat_id and return an array like below:
                 *  [
                 *      'out'=>[
                 *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
                 *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
                 *       ],
                 *       'selected'=>'<prod-id-1>'
                 *  ]
                 */

                echo Json::encode(['output'=>$data['out'], 'selected'=>$data['selected']]);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
