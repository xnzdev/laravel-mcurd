<?php

namespace XnzDev\MCurd\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use XnzDev\MCurd\Business\ControllerBusiness;

/**
 * @group Class CrudController
 * @package XnzDev\MCurd\Controllers
 */
class CrudController extends Controller
{
    public function index(Request $request)
    {
        $response = ['files' => []];

        try {
            // preview
            if ($request->method() == 'POST') {

                $controllerClassName = trim($request->post('controller_class_name'));
                $modelClassName      = trim($request->post('model_class_name'));

                $fileList = (new ControllerBusiness($controllerClassName, $modelClassName))->preview();

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
                    $response['generate_info'] = ControllerBusiness::generateFile($fileList, $waitingFiles);
                }
            }
        } catch (\Exception $exception) {
            $response['alert'] = [
                'type'    => 'error',
                'message' => $exception->getMessage()
            ];
        }

        $viewPath = 'xnz_views::crud';

        return response()->view($viewPath, $response);
    }
}
