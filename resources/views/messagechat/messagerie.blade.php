 @extends('layouts.back')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
        <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>


    <!-- Latest compiled and minified CSS  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme - 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
-->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


 @section('content')
 
   
        <div class="container">
            <br />
            
            <h3 align="center">sélectionnez une personne pour discuter (chat) </h3><br />
            <br />
            <div class="row">
                <div class="col-md-8 col-sm-6">
                    <h4>Utilisateurs</h4>
                </div>
              <!--  <div class="col-md-2 col-sm-3">
                    <input type="hidden" id="is_active_group_chat_window" value="no" />
                    <button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Groupe de Chat</button>
                </div>
                <div class="col-md-2 col-sm-3">
                   
                </div>-->
            </div>
            <div class="table-responsive">
                
                <div id="user_details"></div>
                <div id="user_model_details"></div>
            </div>
            <br />
            <br />
            
        </div>
        
 

<style>

.chat_message_area
{
    position: relative;
    width: 100%;
    height: auto;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
    width: 100%;
    height: auto;
    min-height: 80px;
    overflow: auto;
    padding:6px 24px 6px 12px;
}

.image_upload
{
    position: absolute;
    top:3px;
    right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

</style>  

<div id="group_chat_dialog" title="Group Chat Window">
    <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

    </div>
    <div class="form-group">
        <!--<textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>!-->
        <div class="chat_message_area">
            <div id="group_chat_message" contenteditable class="form-control">

            </div>
            <div class="image_upload">
                <form id="uploadImage" method="post" action="upload.php">
                    <label for="uploadFile"><img src="upload.png" /></label>
                    <input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
                </form>
            </div>
        </div>
    </div>
    <div class="form-group" align="right">
        <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
    </div>
</div>

 
 
@endsection