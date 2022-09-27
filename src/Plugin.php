<?php
namespace usersignupnotification;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();

        // Custom initialization code goes here...

        craft()->on('users.saveUser', function(Event $event) 
        {
        
            $user = $event->params['user'];
            $isNewUser = $event->params['isNewUser'];

            if ($isNewUser) {
                // Send Mail
                $email = new EmailModel();
                $email->toEmail = "darrylvos@gmail.com";
                $email->subject = "New User Registration";
                $email->body    = "New User: ".$user->firstName." ".$user->lastName;

                craft()->email->sendEmail($email);
            }

        });


    }
}