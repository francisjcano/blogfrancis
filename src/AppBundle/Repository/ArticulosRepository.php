<?php
// src/AppBundle/Repository/ArticulosRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ArticulosRepository extends EntityRepository
{
	public function findAllOrderedByfechaHora()
	{
		$entityManager = $this->getEntityManager();

		$query = $entityManager->createQuery(
			'SELECT n FROM AppBundle:Articulos n ORDER BY n.fechaHora ASC'
		);
		return $query->getResult();
	}
}