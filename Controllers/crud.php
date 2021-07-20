<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use Session;

class crud extends Controller
{
    function registration(){
        return view("Register");
    }
    function postcrud(Request $req){
        $name=$req->get('name');
        $email=$req->get('email');
        $password=$req->get('password');
        $file=$req->file('file');
        $dest=public_path('/upload');
        $fname="Image-".rand()."-".time().".".$file->extension();
        if($file->move($dest,$fname))
        {
            $reg=new register();
            $reg->name=$name;
            $reg->email=$email;
            $reg->password=$password;
            $reg->file=$fname;
            if($reg->save())
            {
                Session::flash('succMsg','Registration Successfull');
                return redirect('/register');
            }
            else
            {
            //    $path=public_path()."/upload/".$fname;
            //    unlink($path);
                Session::flash('errMsg','Registration not Successfull');
                return redirect('/register');
            }
        }
        else
        {
            Session::flash('errMsg','Registration not Successfull');
            return redirect('/register'); 
        }
    }

    function showreg(){
        $regdata=register::get();
        return view('show',['regdata'=>$regdata]);
    }
    function delreg($id){
    $rdata=register::where('id',$id)->first();
    $filepath=public_path()."/upload/".$rdata->file;
    $reg=register::find($id);
    if($reg->delete()){
        unlink($filepath);
        Session::flash('succMsg','Record Deleted');
        return redirect('showdata');
    }
    else
    {
        Session::flash('errMsg','Record Not deleted');
        return redirect('showdata');
    }
    }

    function editcrud($id){
     $rdata=register::where('id',$id)->first();
     return view('editcrud',['rdata'=>$rdata]);
    }
    
    function editcrudpost(Request $req){
        $name=$req->get('name');
        $email=$req->get('email');
        $file=$req->file('file');
        $rid=$req->get('hid');
        $fname='file-'.rand().'-'.time().".".$file->extension();
        if($file->move('public/upload',$fname)){
         $reg=register::find($rid);
         $reg->name=$name;
         $reg->email=$email;
         $filepath=public_path()."/upload/".$reg->file;
         $reg->file=$fname;
         if($reg->save()){
             unlink($filepath);
             Session::flash('succMsg','Updated');
             return redirect('/showdata');
        }
        else
        {
         Session::flash('errMsg','Uploading Error');
         return redirect('/editcrud');
        }
     }
    }
        
}
       

    
       
