<?php


namespace App\Events;


use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\KernelEvent;

class CustomKernel
{
    function __construct(EntityManager $em)
    {
        $this->em=$em;
    }

    function onKernelTerminate(KernelEvent $event){
      $fp=fopen('/tmp/req_terminate','w+');
    fwrite($fp,'Request finished'.date('Y-m-d H:i:s'));
    fclose($fp);
  }

  function onKernelRequest(KernelEvent $event){
       # echo 'Requesting..';
  }

  function onKernelController(KernelEvent $event){
      $em=$this->em;
      $sql = 'show tables';
      $statement = $em->getConnection()->prepare($sql);
      // Set parameters
      // $statement->bindValue('status', 1);
      $statement->execute();
      $result = $statement->fetchAll();

  }
}