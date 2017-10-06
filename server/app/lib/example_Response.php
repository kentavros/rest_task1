<?php
class Response {	
	private static function ClientErrorType() {
		return array(
			400 => "HTTP/1.0 400 Bad Request",
			401 => "HTTP/1.0 401 Unauthorized",
			402 => "HTTP/1.0 402",
			403 => "HTTP/1.0 403 Forbidden",
			404 => "HTTP/1.0 404 Not Found",
			405 => "HTTP/1.0 405 Method Not Allowed",
			406 => "HTTP/1.0 406 Not Acceptable"	
		);
	}
	
	private static function ServerErrorType() {
		return array(
			500 => "HTTP/1.0 500 Internal Server Error",
			501 => "HTTP/1.0 501 Not Implemented",
			502 => "HTTP/1.0 502 Bad Gateway",
			503 => "HTTP/1.0 503 Service Unavailable",
			504 => "HTTP/1.0 504 Gateway Timeout",
			505 => "HTTP Version Not Supported"
		);
	}
	
	private static function ServerOKType() {
		return array(
			200 => "HTTP/1.0 200 OK",
			201 => "HTTP/1.0 201 Created",
			202 => "HTTP/1.0 202 Accepted",
			203 => "HTTP/1.1 203 Non-Authoritative Information",
			204 => "HTTP/1.0 204 No Content",
			205 => "HTTP/1.0 205 Reset Content"
		);
	}
	
//	public static function JSON($data) {
//		//Set MIME-Type:
//		header('Content-Type: application/json');
//		return json_encode($data);
//	}
//
//	public static function XML($data) {
//		//Set MIME-Type:
//		header("Content-Type: application/xml");
//		$xml = new SimpleXMLElement("<" . get_class( $this ) . "/>");
//		//Make the structure ready for xml:
//		array_walk_recursive( $this->model->data, array ($xml, 'addChild') );
//
//		return $xml->asXML();
//	}
	
	public static function ServerSuccess( $type, $message = null, $header = null) {
		$responseHeader = self::ServerOKType();
		//Set header to 2xx success:
		header($responseHeader[$type]);
		return $message;
	}
			
	public static function ServerError( $errorType, $message ) {
		$responseHeader = self::ServerErrorType();
		//Set header to 5xx error:
		header($responseHeader[$errorType]);
		return $message;
	}	
	
	public static function ClientError( $errorType, $message ) {
		$responseHeader = self::ClientErrorType();
		//Set header to 4xx error:
		header($responseHeader[$errorType]);
		return $message;
	}
}
