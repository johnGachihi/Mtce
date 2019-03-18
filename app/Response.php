<?php

class Response {
    
    static public function respond($response) {
        echo json_encode($response);
    }

    static public function respondWithError($errorMessage) {
        Response::respondWithErrorAndStatusCode($errorMessage, NULL);
    }

    static public function respondWithErrorAndStatusCode(
        string $errorMessage, $httpStatusCode) {
        
        $response["error"] = true;
        $response["errorMessage"] = $errorMessage;

        if($httpStatusCode)
            http_response_code($httpStatusCode);

        echo json_encode($response);
    }
}

?>