<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\GeneralException;
use App\Models\NewsCategory;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\NewsCategoryRepository;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories\Eloquent\Backend;
 */
class NewsCategoryRepositoryEloquent extends BaseRepository implements NewsCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NewsCategory::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 创建
     *
     * @param array $input
     * @return News
     * @throws GeneralException
     */
    public function create(array $input)
    {
        if ($id = parent::create($input)) {
            return $id;
        }
        throw new GeneralException('There was a problem creating this news. Please try again.');
    }

    /**
     * 更新
     *
     * @param array $input
     * @param       $id
     * @return bool
     * @throws GeneralException
     * @internal param $roles
     */
    public function update(array $input, $id)
    {
        if (parent::update($input, $id)) {
            return true;
        }
        throw new GeneralException('There was a problem updating this user. Please try again.');
    }
}
