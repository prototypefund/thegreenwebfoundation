<?php

namespace TGWF\Greencheck\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * GreencheckAsRepository.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GreencheckTldRepository extends EntityRepository implements GreencheckTldRepositoryInterface
{

    /**
     * Get all domain tld's we have data for.
     *
     * @return array
     */
    public function getTLDsWithData(): array
    {
        $result = $this->findBy([]);
        $domains = [];
        foreach ($result as $tld) {
            if ($tld->getGreenDomains() > 5) {
                $domain = strtolower($tld->getToplevel());
                $domains[$domain] = $domain;
            }
        }

        return $domains;
    }
}
