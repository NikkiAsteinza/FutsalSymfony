<?php

namespace App\Manager;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;

 class UserManager{

    protected User $user;
    protected MailerInterface $mailer;

    public function __construct(MailerInterface $mailer){
        //Lo que symfony pueda hacer automaticamente.
        //Interfaces de symphone que quiera usar yo
        $this->mailer = $mailer;
    }

    public function sendEmail(User $user, string $clubName): Response
    {
        $email = (new Email())
            ->from('nikki@twist-club.com')
            ->to($user->getEmail())
            ->subject('[Futsal FM] - Alta de club - '.$clubName)
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            // some error prevented the email sending; display an
            // error message or try to resend the message
            return new Response("error ".$e->getMessage());
        }
        return new Response("Email enviado correctamente");
    }

    // public function procesarImagen(string $image, string $waterMark){
    //     $newImage = $this->imageManager->make($image)->insert($waterMark)->save($image);
    // }
}