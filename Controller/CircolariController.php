<?php
class CircolariController extends BaseController
{
    
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $circolariModel = new CircolariModel();
                $intLimit = 10;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }

                $arrCircolari = $circolariModel->getCircolari("Roma",$intLimit);
             //  print_r($arrCircolari);
                $responseData = json_encode($arrCircolari,JSON_THROW_ON_ERROR);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().' Something went wrong! Please contact support. ^_^';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
            catch (JsonException $e) {
                
                $strErrorDesc = $e->getMessage().' Something went wrong! Please contact support. ^_^';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}