<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\UploadForm;
use yii\web\UploadedFile;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'home';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        // return $this->render('about');

        $model = new UploadForm();
        
        //         if (Yii::$app->request->isPost) {
        //             $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        //             if ($model->upload()) {
        //                 // file is uploaded successfully
        //                 return;
        //             }
        //         }

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $md = $model->upload();
            if ($md) {
                // file is uploaded successfully
                return $md;
                // echo ($md);
                // $this->redirect('about', ['model' => $model]);
            }
        }
        
        return $this->render('about', ['model' => $model]);
        
    }

    // public function actionUpload()
    // {
    //     $model = new UploadForm();

    //     if (Yii::$app->request->isPost) {
    //         $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
    //         if ($model->upload()) {
    //             // file is uploaded successfully
    //             return;
    //         }
    //     }

    //     return $this->render('upload', ['model' => $model]);
    // }

    // public function actionUpload()  
    // {
    //     $ds          = DIRECTORY_SEPARATOR;  //1
         
    //     $storeFolder = 'uploads';   //2
         
    //     if (!empty($_FILES)) {
             
    //         $tempFile = $_FILES['file']['tmp_name'];          //3             
              
    //         // $targetPath = '..'.$ds.dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    //         $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
             
    //         $targetFile =  $targetPath. $_FILES['file']['name'];  //5
         
    //         move_uploaded_file($tempFile,$targetFile); //6
             
    //     }
        
    // }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $md = $model->upload();
            if ($md) {
                // file is uploaded successfully
                return $md;
                // print_r($md);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionDelete()
    {
        $ds = DIRECTORY_SEPARATOR;  // Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
        $storeFolder = 'uploads'; 
        
        $fileList = $_POST['fileList'];
        // $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
        $targetPath = $storeFolder . $ds;
        
        
        if(isset($fileList)){
            unlink($targetPath.$fileList);
        }
    }


    public function beforeAction($action) { $this->enableCsrfValidation = false; return parent::beforeAction($action); }
    
    
}
