<?php

use PHPMailer\PHPMailer\PHPMailer;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

function makeDirectory($path){
    if(file_exists($path)){
        return true;
    }else{
       return mkdir($path, 0755 , true);
    }
}

function unlinkFile($path){
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

function uploadSingleImg($file,$location,$old = null,$size=null){

    $path = makeDirectory($location);
    if(!$path) throw new Exception('File counld not be Created');



    if(!empty($file) || $file != NULL){

        if(!empty($old) || $old != NULL){
            unlinkFile($location . '/' . $old);
        }


        $filename = md5(time().rand().uniqid()) .'.'. $file -> getClientOriginalExtension();



        $image = Image::make($file);

        if(!empty($size)){
            $array = explode('x', strtolower($size));
            $width = $array[0];
            $height = $array[1];

            $canvas = Image::canvas($width, $height);

            $image = $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });

            $canvas->insert($image, 'center');
            $canvas->save($location . '/' . $filename , 70);
        }else{
            $image->save($location . '/' . $filename , 70);
        }
    }else{
        $filename = $old;
    }



    return $filename;

}


function multiImageUpload($files,$location,$old = null,$size=null,$redio = 10){
    $path = makeDirectory($location);
    if(!$path) throw new Exception('File could not be created');

    if(!empty($old) || $old != NULL){
        foreach($old as $old){
            unlinkFile($location . '/' , $old);
        }
    }

    $images = [];



    foreach($files as $file){
        if(is_string($file)){
            $arr = json_decode($file);
            foreach($arr as $ar){
                array_push($images,$ar);
            }

        }else{

            $filename = time().uniqid() .'.'. $file -> getClientOriginalExtension();
            $image = Image::make($file);

            if(!empty($size)){
                $array = explode('x',strtolower($size));
                $width = $array[0];
                $height = $array[1];

                $canvas = Image::canvas($width, $height);

                $image = $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $canvas->insert($image, 'center');
                $canvas->save($location . '/' . $filename , $redio);

            }else{
                $image->save($location . '/' . $filename ,  $redio);
            }

            array_push($images,$filename);

        }


    }


    return $images;

}


function activeMenu($route){
    $class = 'active';

    if(is_array($route)){
        foreach($route as $route){
            if(request()->routeIs($route)){
                return $class;
            }
        }
    }elseif(request()->routeIs($route)){
        return $class;
    }

}


function slug($str){
    return strtolower(str_replace(' ' , '-' , $str));
}

function delete($data){

}

function verificationCode($length)
{
    if ($length == 0) return 0;

    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}

function phpMailer($data,$general){
    $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $general->email_method['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $general->email_method['user_name'];
            $mail->Password   = $general->email_method['password'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = $general->email_method['smtp_port'];
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($general->site_email, $general->site_title);
            $mail->addAddress($data['email'], $data['name']);
            $mail->addReplyTo($general->site_email, $general->site_title);
            $mail->isHTML(true);
            $mail->Subject = $data['subject'];
            $mail->Body    = $data['message'];
            $mail->send();
        } catch (Exception $e) {
            throw new Exception($e);
        }

}









?>
