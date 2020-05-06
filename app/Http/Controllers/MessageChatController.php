<?php

namespace App\Http\Controllers;

use App\MessageChat;
use Illuminate\Http\Request;
use App\User;
use auth;

class MessageChatController extends Controller
{
   
 public function fetch_user_chat_history ($to_user_id)
   {
    $from_user_id =auth::user()->id;

   
    $result=MessageChat::where(function($q) use ($to_user_id){                             
                               $q->where('from_user','=' ,auth::user()->id)
                               ->where('to_user' ,'=',$to_user_id);                               
                                })
                             ->orWhere(function($q) use ($to_user_id){                             
                               $q->where('to_user' ,'=',auth::user()->id)
                               ->Where('from_user' ,'=',$to_user_id);
                               })
                             ->orderBy('created_at', 'ASC')
                             ->get(); 
    $output = '<ul class="list-unstyled">';
    foreach($result as $row)
    {
        $user_name = '';
        $dynamic_background = '';
        $chat_message = '';
        if($row->from_user == $from_user_id)
        {
            if($row->status == '2')
            {
                $chat_message = '<em>This message has been removed</em>';
                $user_name = '<b class="text-success">You</b>';
            }
            else
            {
                $chat_message = $row->message;
                $user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row->message.'">x</button>&nbsp;<b class="text-success">You</b>';
            }
            

            $dynamic_background = 'background-color:#ffe6e6;';
        }
        else
        {
            if($row->status == '2')
            {
                $chat_message = '<em>This message has been removed</em>';
            }
            else
            {
                $chat_message = $row->message;
            }
            $user_name = '<b class="text-danger">'.$this->get_user_name($row->from_user).'</b>';
            $dynamic_background = 'background-color:#ffffe6;';
        }
        $output .= '
        <li style="border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
            <p>'.$user_name.' - '.$chat_message.'
                <div align="right">
                    - <small><em>'.$row->created_at.'</em></small>
                </div>
            </p>
        </li>
        ';
    }
    $output .= '</ul>';

$querys=MessageChat::where('from_user',$to_user_id)->where('to_user',$from_user_id)->where('status',1)->get();
    
foreach ($querys as $qu) {
   $qu->update(['status'=> 0]);
}

  
    return $output;


   }

public function get_user_name($user_id)
{
    /*$query = "SELECT username FROM login WHERE user_id = '$user_id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();*/

    $result = User::where('id', $user_id)->get();

    foreach($result as $row)
    {
        return $row->name ;
    }




}


    public function insertchat (Request $req)
    {

        $mess= new MessageChat ([
             'to_user' =>  $req->get('to_user_id'),
             'from_user'  =>  auth::id(),
             'message' =>  $req->get('chat_message'),
             'status' => 1
        ]);
        $mess->save();
       // fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);

        return $this->fetch_user_chat_history ($req->get('to_user_id'));

    }

    public function fetchUser ($id)
    {
		//$user= User::where('id', $id )->first();
		//$type=user->user_type ;
       $result=User::where('id','!=',$id )->get();


                $output = '
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="70%">Pseudo</td>
                        <th width="20%">Statut</td>
                        <th width="10%">Action</td>
                    </tr>
                ';

                foreach($result as $row)
                {
				if($row->isOnline())
                    {	
                    $status = '';
                   /* $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
                    $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);*/
                    if($row->isOnline())
                    {
                        $status = '<span class="label label-success">En ligne</span>';
                    }
                    else
                    {
                        $status = '<span class="label label-danger">Hors Ligne</span>';
                    }
                    $output .= '
                    <tr>
                        <td>'.$row->name.' '.$this->count_unseen_message($row->id, auth::user()->id).' '.$this->fetch_is_type_status($row->id).'</td>
                        <td>'.$status.'</td>
                        <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row->id.'" data-tousername="'.$row->name.'">Start Chat</button></td>
                    </tr>
                    ';
                   }
                }

                $output .= '</table>';

               return  $output;

    }

function count_unseen_message($from_user_id, $to_user_id)
        {
            /*$query = "
            SELECT * FROM chat_message 
            WHERE from_user_id = '$from_user_id' 
            AND to_user_id = '$to_user_id' 
            AND status = '1'
            ";*/

            $result = MessageChat::where('from_user',$from_user_id)->where('to_user',$to_user_id)->where('status',1)->get();

            $count = $result->count();

           /* $statement = $connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();*/
            $output = '';
            if($count > 0)
            {
                $output = '<span class="label label-success">'.$count.'</span>';
            }
            return $output;
        }


function fetch_is_type_status($user_id)
            {
               
                $result=User::where('id',$user_id)->first();
               
                $output = '';
               
                if($result->typing == 1)
                {
                  $output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
                }
                
                return $output;
            }


    function  update_is_type_status ($user_id, Request $req)
     {
          $var=0;

          if($req->get('is_type')=='yes')
          {
            $var=1;
          }
      
            $result=User::where('id',$user_id)->first();
            $result->update(['typing'=>$var]);

                     

           return($user_id." ".$req->get('is_type'));



    }

    function fetch_user_last_activity($user_id)
        {
            $query = "
            SELECT * FROM login_details 
            WHERE user_id = '$user_id' 
            ORDER BY last_activity DESC 
            LIMIT 1
            ";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                return $row['last_activity'];
            }
        }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('messagechat.messagerie');
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
     * @param  \App\MessageChat  $messageChat
     * @return \Illuminate\Http\Response
     */
    public function show(MessageChat $messageChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MessageChat  $messageChat
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageChat $messageChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MessageChat  $messageChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageChat $messageChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MessageChat  $messageChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageChat $messageChat)
    {
        //
    }
}
