<?php

namespace App\EventSubscriber;

use App\Entity\Vehicule;
use DateTime;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $slugger;
    private $security;

    public function __construct(SluggerInterface $slugger, Security $security)
    {
        $this->slugger = $slugger;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setVehiculeSlugAndDate'],
        ];
    }

    public function setVehiculeSlugAndDate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if(!($entity instanceof Vehicule)) {
            return;
        }
        $slug = $this->slugger->slug($entity->getNom());
        $entity->setSlug($slug);
        $now = new DateTime('now');
        $entity->setDateAnnonce($now);

        $user = $this->security->getUser();
        $entity->setUtilisateur($user);
    }
}