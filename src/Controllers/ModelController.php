<?php

namespace XnzDev\MCurd\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use XnzDev\MCurd\Business\ModelBusiness;

/**
 * @group Class ModelController
 * @package XnzDev\MCurd\Controllers
 */
class ModelController extends Controller
{

    public function index(Request $request)
    {
        $response = ['files'=>[]];

        try {
            $response['table_list'] = ModelBusiness::getTableList();

            // preview
            if ($request->method() == 'POST') {

                $tableName       = trim($request->post('table_name'));
                $modelClassName  = trim($request->post('model_class_name'));
                $parentClassName = trim($request->post('parent_class_name'));

                $fileList = (new ModelBusiness($tableName, $modelClassName, $parentClassName))->preview();

                $response['files'] = $fileList;

                // generate file
                if (!is_null($request->post('generate'))) {

                    $waitingFiles = $request->post('waitingfiles');
                    // exception
                    if (!$waitingFiles) {
                        $response['alert'] = [
                            'type'    => 'error',
                            'message' => 'Please select items first!'
                        ];
                    }
                    // generate
                    $response['generate_info'] = ModelBusiness::generateFile($fileList, $waitingFiles);
                }
            }

            $viewPath = 'xnz_views::model';
            return response()->view($viewPath, $response);
        }catch (\Exception $exception) {
            $response['alert'] = [
                'type'    => 'error',
                'message' => $exception->getMessage()
            ];
        }
        echo json_encode($response);
    }
}
