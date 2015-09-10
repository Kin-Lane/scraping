<?php
/**
 *  Copyright 2015 Reverb Technologies, Inc.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 *
 * NOTE: This class is auto generated by the swagger code generator program. Do not edit the class manually.
 */

namespace SwaggerClient;

class ImagesApi {

  function __construct($apiClient) {
    $this->apiClient = $apiClient;
  }

  
  /**
   * getAPIImages
   *
   * retrieve an APIs images
   *
   * @param string $api_id id for the API (required)
   * @param string $appid your appid for accessing the API (required)
   * @param string $appkey your appkey for accessing the API (required)
   * @return array[image]
   */
   public function getAPIImages($api_id, $appid, $appkey) {

      // parse inputs
      $resourcePath = "/api/{api_id}/images/";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = '';
      if ($_header_accept !== '') {
        $headerParams['Accept'] = $_header_accept;
      }
      $_header_content_type = array();
      $headerParams['Content-Type'] = count($_header_content_type) > 0 ? $_header_content_type[0] : 'application/json';

      // query params
      if($appid !== null) {
        $queryParams['appid'] = $this->apiClient->toQueryValue($appid);
      }// query params
      if($appkey !== null) {
        $queryParams['appkey'] = $this->apiClient->toQueryValue($appkey);
      }
      
      // path params
      if($api_id !== null) {
        $resourcePath = str_replace("{" . "api_id" . "}",
                                    $this->apiClient->toPathValue($api_id), $resourcePath);
      }
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      }
      
      // for HTTP post (form)
      if (strpos($headerParams['Content-Type'], "application/x-www-form-urlencoded") !== FALSE) {
        $httpBody = http_build_query($formParams);
      }

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams);

      if(! $response) {
        return null;
      }

  		$responseObject = $this->apiClient->deserialize($response,
  		                                                'array[image]');
  		return $responseObject;
  }
  
  /**
   * addAPIImage
   *
   * add an API image
   *
   * @param string $api_id id for the API (required)
   * @param string $appid your appid for accessing the API (required)
   * @param string $appkey your appkey for accessing the API (required)
   * @param string $name name of the image (required)
   * @param string $path path of the image (required)
   * @param string $type type of image (required)
   * @return array[image]
   */
   public function addAPIImage($api_id, $appid, $appkey, $name, $path, $type) {

      // parse inputs
      $resourcePath = "/api/{api_id}/images/";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "POST";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = '';
      if ($_header_accept !== '') {
        $headerParams['Accept'] = $_header_accept;
      }
      $_header_content_type = array();
      $headerParams['Content-Type'] = count($_header_content_type) > 0 ? $_header_content_type[0] : 'application/json';

      // query params
      if($appid !== null) {
        $queryParams['appid'] = $this->apiClient->toQueryValue($appid);
      }// query params
      if($appkey !== null) {
        $queryParams['appkey'] = $this->apiClient->toQueryValue($appkey);
      }// query params
      if($name !== null) {
        $queryParams['name'] = $this->apiClient->toQueryValue($name);
      }// query params
      if($path !== null) {
        $queryParams['path'] = $this->apiClient->toQueryValue($path);
      }// query params
      if($type !== null) {
        $queryParams['type'] = $this->apiClient->toQueryValue($type);
      }
      
      // path params
      if($api_id !== null) {
        $resourcePath = str_replace("{" . "api_id" . "}",
                                    $this->apiClient->toPathValue($api_id), $resourcePath);
      }
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      }
      
      // for HTTP post (form)
      if (strpos($headerParams['Content-Type'], "application/x-www-form-urlencoded") !== FALSE) {
        $httpBody = http_build_query($formParams);
      }

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams);

      if(! $response) {
        return null;
      }

  		$responseObject = $this->apiClient->deserialize($response,
  		                                                'array[image]');
  		return $responseObject;
  }
  
  /**
   * deleteAPIImage
   *
   * delete an API image
   *
   * @param string $api_id id for the API (required)
   * @param string $appid your appid for accessing the API (required)
   * @param string $appkey your appkey for accessing the API (required)
   * @param string $image_id id for the image (required)
   * @return array[image]
   */
   public function deleteAPIImage($api_id, $appid, $appkey, $image_id) {

      // parse inputs
      $resourcePath = "/api/{api_id}/images/{image_id}";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "DELETE";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = '';
      if ($_header_accept !== '') {
        $headerParams['Accept'] = $_header_accept;
      }
      $_header_content_type = array();
      $headerParams['Content-Type'] = count($_header_content_type) > 0 ? $_header_content_type[0] : 'application/json';

      // query params
      if($appid !== null) {
        $queryParams['appid'] = $this->apiClient->toQueryValue($appid);
      }// query params
      if($appkey !== null) {
        $queryParams['appkey'] = $this->apiClient->toQueryValue($appkey);
      }
      
      // path params
      if($api_id !== null) {
        $resourcePath = str_replace("{" . "api_id" . "}",
                                    $this->apiClient->toPathValue($api_id), $resourcePath);
      }// path params
      if($image_id !== null) {
        $resourcePath = str_replace("{" . "image_id" . "}",
                                    $this->apiClient->toPathValue($image_id), $resourcePath);
      }
      
      

      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      }
      
      // for HTTP post (form)
      if (strpos($headerParams['Content-Type'], "application/x-www-form-urlencoded") !== FALSE) {
        $httpBody = http_build_query($formParams);
      }

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams);

      if(! $response) {
        return null;
      }

  		$responseObject = $this->apiClient->deserialize($response,
  		                                                'array[image]');
  		return $responseObject;
  }
  

}