<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use URL;

//ini_set('memory_limit','1024M');
//ini_set('upload_max_filesize','50M');

class ImageController extends Controller
{

    // pour les image slider ou n importe quel type d images

    public function modifierimageslider(Request $req)
    {

    //$input = $req->all();
    //dd($input);
     $imagesslider=Image::where('id',$req->get('iden'))->first();
     $imagesslider->update([
            'titre'=>$req->get('titre'),
            'descrip' => $req->get('descrip') ,   
            'numero' => $req->get('numero')             
        ]);
       //$a=$req->get('iden');
       return 'La modification est effectuée avec succès';

    }

    public function supimageslider($id)
    {

       $imagesslider=Image::where('id',$id)->first();
       $file_pointer=storage_path().$imagesslider->url;

       if (!unlink($file_pointer)) {  
         return ("Erreur lors de supression du fichier");  
         }  
       else { 
          $imagesslider->delete(); 
          return ("Le fichier a été supprimé avec succés");  
        }  

       

       //return 'ok';
    }


    public function mettreAjourSlider(Request $req)
    {

        //$array=json_decode($req->get('data'));
         $Word='';
       
         $imagesslider=Image::where('categorie','slider')->where('home',1)->get();

         foreach ($imagesslider as $is ) {
             if($is->visible==1)
             {
                $is->update(["visible"=>0]);
             }
         }

         $tok = strtok(trim($req->get('data')), " ");
         $imagesslider=Image::where('id',((int)$tok))->first();
         $imagesslider->update(["visible"=>1]);
       while ($tok !== false) {
            if($tok !=' ')
            {
            $imagesslider=Image::where('id',((int)$tok))->first();
            $imagesslider->update(['visible'=>1]);
        // $Word=$Word.' '.$tok;
         $tok = strtok(" ");
           }
         }
   
        return "Le carrousel a été mis à jour avec succès" ;

    }

 public function mettreAjourSliderScolaire(Request $req)
    {

        //$array=json_decode($req->get('data'));
         $Word='';
       
         $imagesslider=Image::where('categorie','slider')->where('home',0)->get();

         foreach ($imagesslider as $is ) {
             if($is->visible==1)
             {
                $is->update(["visible"=>0]);
             }
         }

         $tok = strtok(trim($req->get('data')), " ");
         $imagesslider=Image::where('id',((int)$tok))->first();
         $imagesslider->update(["visible"=>1]);
       while ($tok !== false) {
            if($tok !=' ')
            {
            $imagesslider=Image::where('id',((int)$tok))->first();
            $imagesslider->update(['visible'=>1]);
        // $Word=$Word.' '.$tok;
         $tok = strtok(" ");
           }
         }
   
        return "Le carrousel a été mis à jour avec succès" ;

    }


    function uploadExterneFile(Request $request)
    {

         $fichier = $request->file('imgInp');
         $Nouveautitrefichier =  $request->get("titrefileExterne");
         $descfichier =  $request->get("descripfileExterne");
         $numerofichier =  $request->get("numerofileExterne");
          $fichier_name="";
          $fichier_ext= "";

         if($Nouveautitrefichier)
         {
            $fichier_name=$Nouveautitrefichier;
            $fichier_ext= $fichier->getClientOriginalExtension();
            if($fichier_ext)
            {
               $fichier_name= $fichier_name. '.' .$fichier_ext;
            }
         }
         else
         {
           $fichier_name =  $fichier->getClientOriginalName();
           $fichier_ext= $fichier->getClientOriginalExtension();
         }
      // return  $fichier_name;
      

      $path= storage_path();

                   if (!file_exists($path."/ImagesSlider")) {
                        mkdir($path."/ImagesSlider", 0777, true);
                    }
                  /*  else
                    {
                      return('Ce fichier est déja existant');
                    }*/    

                    $path= storage_path()."/ImagesSlider";
        // contrôle si le fichier existe déja ou non 
        if($Nouveautitrefichier)
        {      
        $imageslid=Image::where('titre',$Nouveautitrefichier)->first();
        }
        else
        {
        $imageslid=Image::where('url',"/ImagesSlider/".$fichier_name)->first();
        }

        if($imageslid)
        {
           return ('Le titre ou le fichier est déja existant');
        }

        $fichier->move($path, $fichier_name);

        $fullpath=$path.'/'.$fichier_name ;
        $filesize= filesize($fullpath) ;
        $imageslider = new Image([

            'titre'=>$Nouveautitrefichier,
            'descrip' => $descfichier,
            'numero' => $numerofichier ,
            'url' => "/ImagesSlider/".$fichier_name,
            'type'  => $fichier_ext,
             'visible'=> 0,
             'categorie'=>'slider',
             'home'=> $request->get('home')
           
             
        ]);
        $imageslider->save();

         
          return  'Le fichier est envoyé au serveur avec succès';         
    
    }

     
     public function ChargerTableImagesSlider()
     {

        $output='';

     $output='<table class="table table-bordered" style="background-color:white">
    <thead>
      <tr>
      <th>Numéro</th>
        <th>titre image</th>
        <th>description image</th>
        <th>Vue</th>
        <th>Visible</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>';
      $imagesslider=Image::where('categorie','slider')->where('home',1)->orderBy('created_at','DESC')->get();

      foreach($imagesslider as $ims)
      {
       $urlimg= URL::to('/').'/storage/'.$ims->url;
      $output.='<tr>
      <td id="n'.$ims->id.'">'.$ims->numero.'</td>
        <td id="t'.$ims->id.'">'.$ims->titre.'</td>
        <td id="d'.$ims->id.'">'.$ims->descrip.'</td><td><img  width="100" height="100" src="'.$urlimg.'" alt="" /></td> <td><input id="c'.$ims->id.'" type="checkbox" class="checkboxkbs"'; 

         if($ims->visible==1){
          $output.='checked ></td>';
          }
          else
          {
            $output.=' ></td>';
          }
       $output.=' <td><i id="e'.$ims->id.'" class="fa fa-edit editkbs" style=" cursor:pointer;color:blue"></i> <i id="s'.$ims->id.'" class="fa fa-trash trashkbs" style=" cursor:pointer;color:red"></i></td>
          </tr>';
         }
     
       $output.='</tbody>
        </table>
        <br>
        <button id="majslider" class="btn  btn-success float-right"> Mettre à jour le carrousel </button>
       <br>';



        return $output;

      }

   
  public function ChargerTableImagesSliderScolaire()
     {

        $output='';

     $output='<table class="table table-bordered" style="background-color:white">
    <thead>
      <tr>
        <th>Numéro</th>
        <th>titre image</th>
        <th>description image</th>
        <th>Vue</th>
        <th>Visible</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>';
      $imagesslider=Image::where('categorie','slider')->where('home',0)->orderBy('created_at','DESC')->get();

      foreach($imagesslider as $ims)
      {
       $urlimg= URL::to('/').'/storage/'.$ims->url;
      $output.='<tr>
        <td id="n'.$ims->id.'">'.$ims->numero.'</td>
        <td id="t'.$ims->id.'">'.$ims->titre.'</td>
        <td id="d'.$ims->id.'">'.$ims->descrip.'</td><td><img  width="100" height="100" src="'.$urlimg.'" alt="" /></td> <td><input id="c'.$ims->id.'" type="checkbox" class="checkboxkbs"'; 

         if($ims->visible==1){
          $output.='checked ></td>';
          }
          else
          {
            $output.=' ></td>';
          }
       $output.=' <td><i id="e'.$ims->id.'" class="fa fa-edit editkbs" style=" cursor:pointer;color:blue"></i> <i id="s'.$ims->id.'" class="fa fa-trash trashkbs" style=" cursor:pointer;color:red"></i></td>
          </tr>';
         }
     
       $output.='</tbody>
        </table>
        <br>
        <button id="majslider" class="btn  btn-success float-right"> Mettre à jour le carrousel </button>
       <br>';



        return $output;

      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
