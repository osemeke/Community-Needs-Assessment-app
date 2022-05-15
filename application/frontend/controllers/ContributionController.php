<?php

namespace frontend\controllers;

use frontend\models\Contribution;
use frontend\models\ContributionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContributionController implements the CRUD actions for Contribution model.
 */
class ContributionController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'only' => ['*'],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ], 
            ]
        );
    }

    /**
     * Lists all Contribution models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ContributionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contribution model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $sections = \frontend\models\Section::find()
            ->from('section')
            ->innerJoinWith('quizzes', 'quiz.section_id = section.id')
            ->where(['quiz.active' => 1, 'section.active' => 1])
            ->orderby('section.sort_order,quiz.sort_order')
            ->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'sections' => $sections,
        ]);
    }

    /**
     * Creates a new Contribution model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Contribution();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Contribution model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Contribution model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contribution model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Contribution the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contribution::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private $columnIndex = 0;
    private $columnLabel = '';

    public function column($number)
    {
        // echo $this->getNameFromNumber($this->columnIndex); exit();
        $this->columnLabel = $this->getNameFromNumber($this->columnIndex);
        $this->columnIndex++;
        return $this->columnLabel;
    }

    //https://phpspreadsheet.readthedocs.io/en/latest/
    //composer require phpoffice/phpspreadsheet
    //https://www.geeksforgeeks.org/php-spreadsheet/
    public function actionDownload()
    {
        $cells = [];
        $contributions = Contribution::find()->where(['completed' => 1])->all();
        
        $sections = \frontend\models\Section::find()
            ->from('section')
            ->innerJoinWith('quizzes', 'quiz.section_id = section.id')
            ->where(['quiz.active' => 1, 'section.active' => 1])
            ->orderby('section.sort_order,quiz.sort_order')
            ->all();

        $row = 0;
        foreach($contributions as $contribution)
        {
            $row++;
            $this->columnIndex = 0;

            if ($row == 1) {
                $cells[$this->column($this->columnIndex) . $row] = 'S/N';
                $cells[$this->column($this->columnIndex) . $row] = 'Name';
                $cells[$this->column($this->columnIndex) . $row] = 'Gender';
                $cells[$this->column($this->columnIndex) . $row] = 'Phone Number';
                $cells[$this->column($this->columnIndex) . $row] = 'Email';
                $cells[$this->column($this->columnIndex) . $row] = 'Physical Disability';
                $cells[$this->column($this->columnIndex) . $row] = 'LGA';
                $cells[$this->column($this->columnIndex) . $row] = 'Community';
                $cells[$this->column($this->columnIndex) . $row] = 'Ward';
                $cells[$this->column($this->columnIndex) . $row] = 'Unit';
                $cells[$this->column($this->columnIndex) . $row] = 'Age Range';
                $cells[$this->column($this->columnIndex) . $row] = 'Education Obtained';
                $cells[$this->column($this->columnIndex) . $row] = 'Employment Status';
                $cells[$this->column($this->columnIndex) . $row] = 'Trade Skill';

                foreach ($sections as $section) {
                    foreach($section->quizzes as $quiz) $cells[$this->column($this->columnIndex) . $row] = $quiz->question;
                }

                $row++;
                $this->columnIndex = 0;
            }

            $cells[$this->column($this->columnIndex) . $row] = $row - 1;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->name;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->gender;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->phone_number;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->email;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->disability;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->lga;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->community;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->ward;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->unit;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->age_range;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->education_obtained;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->employment_status;
            $cells[$this->column($this->columnIndex) . $row] = $contribution->trade_skill;

            foreach ($sections as $section) {
                foreach ($section->quizzes as $quiz) $cells[$this->column($this->columnIndex) . $row] = $contribution->getQuizAnswer($quiz->id);
            }
        }

        // exit();

        // --------------------------------

        // require dirname(__FILE__) . '../../../vendor/autoload.php';

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach($cells as $key => $value) $sheet->setCellValue($key, $value);
        // $sheet->setCellValue('A1', 'INSIDE');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('downloads/community-needs-assessments-' . date('Ymd') . '.xlsx');

        $path = \Yii::getAlias('@webroot') . '/downloads';
        $file = $path . '/community-needs-assessments-' . date('Ymd') . '.xlsx';

//         echo $file;
// exit();
        if (file_exists($file)) {
            \Yii::$app->response->sendFile($file);
        }

        // return $this->redirect(['index']);

        return $this->render('download');
    }

    function getNameFromNumber($num)
    {
        $numeric = $num % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval($num / 26);
        if ($num2 > 0) {
            return $this->getNameFromNumber($num2 - 1) . $letter;
        } else {
            return $letter;
        }
    }

//     use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
// ...
// Coordinate::stringFromColumnIndex(1);
function columnLetter($c){

    $c = intval($c);
    if ($c <= 0) return '';

    $letter = '';
             
    while($c != 0){
       $p = ($c - 1) % 26;
       $c = intval(($c - $p) / 26);
       $letter = chr(65 + $p) . $letter;
    }
    
    return $letter;
        
}


}
