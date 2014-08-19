<?php
/**
*
* 文件上传
*
* @copyright Copyright (c) 2013 Haibian.com Inc.
* @package
* @version $Id: Upload.php 3355 2014-06-04 08:02:47Z  $
*/

App::uses('Component', 'Controller');
class UploadComponent  extends Component {
    public $defaults;

    protected $_imageMimetypes = array(
    'image/bmp',
    'image/gif',
    'image/jpeg',
    'image/pjpeg',
    'image/png',
    'image/vnd.microsoft.icon',
    'image/x-icon',
    );

    protected $_docMimetypes = array(
    'image/bmp',
    'image/gif',
    'image/jpeg',
    'image/pjpeg',
    'image/png',
    'image/vnd.microsoft.icon',
    'image/x-icon',
    );

    protected $_mediaMimetypes = array(
    'application/pdf',
    'application/postscript',
    );

    public $settings;

    public static $in;
    public function __construct()
    {
        $this->settings = array(
        'maxSize' => 10000000,
        'minSize' => 1, 
        );
    }
    /**
    * 配置
    * @param array $config
    */


    /**
    * 上传文件
    * @param string $file  文件
    * @param string $filePath 文件路径
    * @return boolean|Ambigous <boolean, number>
    */
    public function uploadedFile($file,$filePath = null)
    {
        $errCode = Config_ErrorCode::ERROR_CODE_NOT_ERROR;
        do{
            if(empty($file)){
                $errCode = Config_ErrorCode::UPLOAD_FILE_IS_NOT_EMPTY;
                break;
            }

            if($file['error'] != 0){
                $errCode = Config_ErrorCode::UPLOAD_FILE_IS_NOT_ERROR;
                break;
            }

            if(empty($file['tmp_name']) || !is_file($file['tmp_name'])){
                $errCode = Config_ErrorCode::UPLOAD_FILE_IS_NOT_ERROR;
                break;
            }

            $extension = $this->getExtension($file['name']);
            $fileName = $filePath.".".$extension;
            $isExt = $this->isValidExtension($file['name']);

            if(!$isExt){
                $errCode = Config_ErrorCode::UPLOAD_FILE_IS_NOT_VAILD_EXT;
                break;
            }

            if(!self::isAboveMinSize($file['size'])){
                $errCode = Config_ErrorCode::UPLOAD_FILE_IS_TOO_SMALL;
                break;
            }

            if(!self::isBelowMaxSize($file['size'])){
                $errCode = Config_ErrorCode::UPLOAD_FILE_IS_TOO_LARGE;
                break;
            }

            if(!file_exists($fileName)){
                @mkdir(dirname($fileName),0755,true);
            }

            if(is_uploaded_file($file['tmp_name'])) {
                move_uploaded_file($file['tmp_name'], $fileName);
            }else{
                rename($file['tmp_name'], $fileName);
            }

            if(!is_file($fileName)){
                $errCode = Config_ErrorCode::UPLOAD_FILE_IS_FIAL;
                break;
            }

        }while(false);

        //返回信息
        $return = Config_ErrorCode::getUpload($errCode);

        if(isset($fileName)){
            $return['data']['file_path'] = $fileName;
            $return['data']['file_url']  = $filePath.".".$extension;
            $return['data']['original_name']  = $file['name'];
        }
        return $return;
    }

    /**
    * 通过二进制保存文件
    * @param unknown_type $imgData
    * @param unknown_type $fileName
    * @return Ambigous <unknown, multitype:multitype:string  >
    */
    public function writeImgFile($imgData,$fileName)
    {
        $errCode = Config_ErrorCode::ERROR_CODE_NOT_ERROR;
        if(!file_exists($fileName)){
            @mkdir(dirname($fileName),0755,true);
        }

        @file_put_contents($fileName,$imgData);

        if(!is_file($fileName)){
            $errCode = Config_ErrorCode::UPLOAD_FILE_IS_FIAL;

        }

        //返回信息
        $return = Config_ErrorCode::getUpload($errCode);

        if(isset($fileName)){
            $return['data']['file_path'] = $fileName;
        }
        return $return;
    }

    /**
    * 删除文件
    * @param string $file 文件路径
    * @return boolean
    */
    public function unlink($file) {
        if (file_exists($file)) {
            return unlink($file);
        }
        return true;
    }

    /**
    * 是否有超过size
    * @param int $size
    * @return boolean
    */
    public function isBelowMaxSize($size)
    {
        return $size <= $this->settings['maxSize'];
    }

    /**
    * 是否大于最小值
    * @param int $size
    * @return boolean
    */
    public function isAboveMinSize($size)
    {
        return $size >= $this->settings['minSize'];
    }

    /**
    * 是否是有效的类型
    * @param unknown_type $mimeType
    * @return boolean
    */
    public function isValidMimeType($mimeType)
    {
        return in_array($mimeType, $this->settings['mimetypes']);
    }

    /**
    * 是否可写
    * @param string $fileName
    * @return boolean
    */
    public function isWritable($fileName)
    {
        return is_writable($fileName);
    }

    /**
    * 是否是有效的路径
    * @param string $path
    * @return boolean
    */
    public function isValidDir($path) {

        return is_dir($path);
    }


    /**
    * 是否是有效的扩展
    * @param string $name
    * @return Ambigous <string, unknown>
    */
    public function isValidExtension($name)
    {
        $ext = strtolower(pathinfo($name,PATHINFO_EXTENSION));

        return $ext;
    }


    public function getExtension($name)
    {
        return strtolower(pathinfo($name,PATHINFO_EXTENSION));
    }



    /**
    * 压缩图片
    * @param unknown_type $oriFilePath
    * @param unknown_type $newFilePath
    * @return boolean
    */
    public function compressImage($oriFileName,$newFileName)
    {

        $igk = new Imagick($oriFileName);
        $igk->stripImage(); //去除图片信息

        $igk->resizeImage(1024, 1024, imagick::FILTER_LANCZOS, 1, true);  //压缩图片
        $flag = $igk->writeImage($newFileName);
        $igk->destroy();

        //压缩成功
        if($flag){
            return true;
        }else{
            return false;
        }

    }

    /**
    * 生成缩略图
    * @param string $oriFilePath
    * @param string $thumbFilePath
    * @param string $width
    * @param string $height
    * @return boolean
    */
    public function createThumbnail($oriFileName,$thumbFileName,$width = 100,$height=0)
    {
        $igk = new Imagick($oriFileName);
        $igk->thumbnailImage($width,$height);
        $flag = $igk->writeImage($thumbFileName);
        $igk->destroy();

        if($flag){
            return true;
        }else{
            return false;
        }
    }
}

class Config_ErrorCode
{
    const ERROR_CODE_NOT_ERROR   = 0;//成功

    const RET_TYPE_NOT_ERROR     = 0;//成功
    const RET_TYPE_SYSTEM_ERROR  = 1;//系统级别错误
    const RET_TYPE_PARAMS_ERROR  = 2;//错误

    const ERROR_CODE_IS_EXIST    = 1111; //记录存在



    /*-------------------上传部分---------------------------*/

    const UPLOAD_FILE_IS_NOT_EMPTY = 24000; //上传附件不能为空
    const UPLOAD_FILE_IS_NOT_ERROR = 24001; //上传错误
    const UPLOAD_FILE_IS_TOO_LARGE = 24002;//上传文件太大
    const UPLOAD_FILE_IS_TOO_SMALL = 24003;//上传文件太小
    const UPLOAD_FILE_IS_NOT_VAILD_EXT = 24004;//不是有效的扩展
    const UPLOAD_FILE_IS_NOT_WRITE = 24005;//不能被写
    const UPLOAD_FILE_IS_FIAL      = 24006;//上传失败


    public static $upload = array(

    self::ERROR_CODE_NOT_ERROR => array(
    'errcode' => self::ERROR_CODE_NOT_ERROR,
    'msg'     => 'success',
    'ret'     => self::RET_TYPE_NOT_ERROR
    ),
    self::UPLOAD_FILE_IS_NOT_EMPTY => array(
    'errcode' => self::UPLOAD_FILE_IS_NOT_EMPTY,
    'msg'     => '上传文件不能为空',
    'ret'     => self::RET_TYPE_NOT_ERROR
    ),
    self::UPLOAD_FILE_IS_NOT_ERROR => array(
    'errcode' => self::UPLOAD_FILE_IS_NOT_ERROR,
    'msg'     => '上传错误',
    'ret'     => self::RET_TYPE_NOT_ERROR
    ),
    self::UPLOAD_FILE_IS_TOO_LARGE => array(
    'errcode' => self::UPLOAD_FILE_IS_TOO_LARGE,
    'msg'     => '上传文件太大',
    'ret'     => self::RET_TYPE_NOT_ERROR
    ),
    self::UPLOAD_FILE_IS_TOO_SMALL => array(
    'errcode' => self::UPLOAD_FILE_IS_TOO_SMALL,
    'msg'     => '文件太小',
    'ret'     => self::RET_TYPE_NOT_ERROR
    ),
    self::UPLOAD_FILE_IS_NOT_VAILD_EXT => array(
    'errcode' => self::UPLOAD_FILE_IS_NOT_VAILD_EXT,
    'msg'     => '不知该扩展名',
    'ret'     => self::RET_TYPE_NOT_ERROR
    ),
    self::UPLOAD_FILE_IS_NOT_WRITE => array(
    'errcode' => self::UPLOAD_FILE_IS_NOT_WRITE,
    'msg'     => '文件不可写',
    'ret'     => self::RET_TYPE_NOT_ERROR
    ),
    self::UPLOAD_FILE_IS_FIAL => array(
    'errcode' => self::UPLOAD_FILE_IS_FIAL,
    'msg'     => '上传失败',
    'ret'     => self::RET_TYPE_NOT_ERROR
    ),
    );


    public static function getUpload($errCode)
    {
        return self::$upload[$errCode];
    }

}