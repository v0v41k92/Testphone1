<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Group;
use Collective\Html\FormFacade;

class ContactController extends Controller{

  public function index(){

  //$contact =new Contact;
  //return view('index',['contact' => $contact->all()]);

  }

  public function submit(ContactRequest $req){

    $contact= new Contact();
    $contact->name = $req->input('name');
    $contact->number = $req->input('number');
    $contact->email = $req->input('email');
    $contact->group = implode(",",$req->group);
    $contact->save();

    return redirect()->route('home')->with('succes','Контакт добавлен');

    //dd($req->group);
  }

  public function Search(Request $req){
    $s = $req->s;
    $user = Contact::where('name','LIKE',"%{$s}%")
                  ->orWhere('number','LIKE',"%{$s}%")
                  ->orWhere('email','LIKE',"%{$s}%")
                  -> orderBy('name')->paginate(10);
    return view ('/Search',compact('user'));
  }

  public function SearchGroup(Request $req){
    $q = $req->q;
    $group = new Group;
    $user = Contact::where('group','LIKE',"%{$q}%")
                  -> orderBy('name')->paginate(10);
    return view ('/group',compact('user'), ['group'=>$group->all()]);
  }

  public function allData(){
    $contact = new Contact;
    $group = new Group;
    return view('welcome',['data'=>$contact->all()], ['group'=>$group->all()]);
  }

  public function contactEdit($id){
    $contact = new Contact;
    $finds = chekbox::wheName($name)->get();
    foreach($finds as $find){array_puch($group, $find->group);}
    return view('edit-contact',compact('contact','group'));
  }

  public function contactUpdate($id){
    $contact = new Contact;
    $group = new Group;
    return view('update-contact',['data'=>$contact->find($id)], ['group'=>$group->all()]);
  }


  public function contactUpdateSucces($id, ContactRequest $req){

    $contact= Contact::find($id);
    $contact->name = $req->input('name');
    $contact->number = $req->input('number');
    $contact->email = $req->input('email');
    $contact->group = implode(",", $req->group);
    $contact->save();

    return redirect()->route('home')->with('succes','Контакт обновлен');
  }

public function contactDelete($id){
  Contact::find($id)->delete();
    return redirect()->route('home')->with('succes','Контакт удален');
}

function GroupSelectedAction(Request $req){
  $gn = $req->gn;
  dd($gname);
  $group = new Group;
  $userg = Contact::where('group','LIKE',"%{$gn}%");
  return view ('/',compact('userg'));
}

function createXMLAction(){

  $export =  Contact::all();
  $xml = new \DOMDocument('1.0', 'utf-8');
  $xmpContacts = $xml->appendChild($xml->createElement('contacts'));

  foreach ($export as $contacts) {
      $xmpContact = $xmpContacts->appendChild($xml->createElement('contact'));
      $xmlid = $xmpContact->appendChild($xml->createElement('id'));
      $xmlid->appendChild($xml->createTextNode($contacts->id));
      $xmlname = $xmpContact->appendChild($xml->createElement('name'));
      $xmlname->appendChild($xml->createTextNode($contacts->name));
      $xmlphone = $xmpContact->appendChild($xml->createElement('phonenumber'));
      $xmlphone->appendChild($xml->createTextNode($contacts->number));
      $xmlmail = $xmpContact->appendChild($xml->createElement('email'));
      $xmlmail->appendChild($xml->createTextNode($contacts->email));
      $xmlgroup = $xmpContact->appendChild($xml->createElement('group'));
      $xmlgroup->appendChild($xml->createTextNode($contacts->group));
  }

  $xml->save($_SERVER["DOCUMENT_ROOT"].'/contact.xml');
}

function uploadFile($localFilename, $localPath='/uploads/'){
  $maxSize = 2*1024*1024;
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
    $pathInfo = pathinfo($localFilename);
    if($ext != $pathInfo['extension']) return false;
    $newFileName = $pathInfo['filenae'].'_'.time().'.'.$pathInfo['extension'];
    if($_FILES["filename"]["size"] > $maxSize) return false;
    $path = $_SERVER['DOCUMENT_ROOT'].$localPath;
      if (! file_exists($path)){
        mkdir($path);
      }

if(is_uploaded_file($_FILES['filename']['tmp_name'])){
  $res = move_uploaded_file($_FILES['filename']['tmp_name'], $path.$newFileName);
  return($res==true)?$newFileName:false;}
else {return false;}

}

function loadfromxmlAction(){

  $successUploadFileName = uploadFile('import_contact.xml','/public/uploads/');

if(!$successUploadFileName){
  echo'Error Upload File contact.xml';
  return;
}

      $xmlFile = $_SERVER["DOCUMENT_ROOT"].'/public/uploads/'.$successUploadFileName;

      $xmpContacts = simplexml_load_file($xmlFile);

      $contacts = array(); $i=0;
      foreach ($xmpContacts as $contact) {
        $contacts[i]['id'] = intval($contact->id);
        $contacts[i]['name'] = htmlentities($contact->name);
        $contacts[i]['phonenumber'] = htmlentities($contact->number);
        $contacts[i]['email'] = htmlentities($contact->email);
        $contacts[i]['group'] = htmlentities($contact->group);
        $i++;
      }
      $res = insertImportContacts($contacts);
      if($res){
        redirect('home');
      }
  }






}
