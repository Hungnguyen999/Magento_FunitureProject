<?php
namespace Team2\RewardPoint\Api;

interface DatapointRepositoryInterface
{
    public function save(\Team2\RewardPoint\Api\Data\DatapointInterface $datapoint);

    public function getById($datapointId);

    public function delete(\Team2\RewardPoint\Api\Data\DatapointInterface $datapoint);

    public function deleteByid($datapointId);
}

