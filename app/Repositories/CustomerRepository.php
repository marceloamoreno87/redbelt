<?php


namespace App\Repositories;


use App\Models\Customer;

/**
 * Class CustomerRepository
 * @package App\Repositories
 */
class CustomerRepository
{
    /**
     * @var Customer
     */
    private $model;

    /**
     * CustomerRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Customer();
    }

    /**
     * @return object
     */
    public function getAllCustomers(): object
    {
        return $this->model->all();
    }

    /**
     * @param array $arr
     * @return bool
     */
    public function addCustomer(array $arr): bool
    {
        return ($this->model->create($arr))->save();
    }

    /**
     * @param int $id
     * @return Customer
     */
    private function findCustomerById(int $id): Customer
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @param array $arr
     * @return bool
     */
    public function updateCustomer(int $id, array $arr): bool
    {
        return ($this->findCustomerById($id))->update($arr);
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function destroyCustomer(int $id): bool
    {
        return ($this->findCustomerById($id))->delete();
    }
}



